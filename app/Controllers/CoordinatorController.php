<?php

namespace App\Controllers;

use App\Models\DebStudentModel;
use App\Models\ProgrammeModel;
use App\Models\ApplicationModel;
use App\Models\AddressModel;
use App\Models\FamilyModel;
use App\Models\ApplicationUploadModel;
use App\Models\EducationModel;
use App\Models\ApplicationDocumentModel;
use App\Models\CentresModel;
use App\Models\PaymentModel;
use App\Services\CaptchaService;
use Dompdf\Dompdf;
use Dompdf\Options;

class CoordinatorController extends BaseController
{
    private $debStudentModel;
    private $programmeModel;
    private $applicationModel;
    private $addressModel;
    private $familyModel;
    protected $uploadModel;
    private $educationModel;
    private $applicationDocumentModel;
    private $centresModel;
    private $paymentModel;

    public function __construct()
    {
        $this->debStudentModel   = new DebStudentModel();
        $this->programmeModel    = new ProgrammeModel();
        $this->applicationModel  = new ApplicationModel();
        $this->addressModel     = new AddressModel();
        $this->familyModel      = new FamilyModel();
        $this->uploadModel = new ApplicationUploadModel();
        $this->educationModel   = new EducationModel();
        $this->applicationDocumentModel = new ApplicationDocumentModel();
        $this->centresModel      = new CentresModel();
        $this->paymentModel      = new PaymentModel();
    }

    /*
    ==========================================
    LOGIN PAGE
    ==========================================
    */

    public function index()
    {
        helper('captcha');

        return view('coordinator/index');
    }

    /*
    ==========================================
    LOGIN PROCESS (Centre Login)
    ==========================================
    */

    public function loginProcess()
    {
        helper(['form']);
        $session = session();

        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required',
            'captcha'  => 'required'
        ];

        if (!$this->validate($rules)) {

            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $captcha = new CaptchaService();

        if (! $captcha->verify($this->request->getPost('captcha'))) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Invalid CAPTCHA. Please try again.');
        }

        // Find centre by email
        $centre = $this->centresModel
            ->where('email', $email)
            ->first();

        // Check if centre exists
        if (!$centre) {
            return redirect()->back()
                ->with('error', 'Invalid Email or Password');
        }

        // Verify password
        if (!password_verify($password, $centre['password'])) {
            return redirect()->back()
                ->with('error', 'Invalid Email or Password');
        }

        // Set session
        $session->set([
            'isCoordinatorLoggedIn' => true,
            'centre_id'             => $centre['id'],
            'centre_name'           => $centre['centre_name'],
            'email'                 => $centre['email'],
            'centre_type'           => $centre['centre_type'],
            'login_time'            => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/coordinator/dashboard');
    }

    /*
    ==========================================
    LOGOUT
    ==========================================
    */

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/coordinator');
    }

    /*
    ==========================================
    LOGIN CHECK
    ==========================================
    */

    private function checkLogin()
    {
        if (!session()->get('isCoordinatorLoggedIn')) {
            return redirect()->to('/coordinator')->send();
        }
    }

    /*
    ==========================================
    DASHBOARD
    ==========================================
    */

    public function dashboard()
    {
        if ($redirect = $this->checkLogin()) {
            return $redirect;
        }

        $data['title']   = 'Coordinator Dashboard';
        $data['content'] = 'coordinator/dashboard';

        return view('coordinator/layout/templates', $data);
    }

    /*
    ==========================================
    STUDENTS LIST (Centre Wise)
    ==========================================
    */

    public function students()
    {
        if ($redirect = $this->checkLogin()) {
            return $redirect;
        }

        $centre_id = session()->get('centre_id');

        $students = $this->applicationModel
        ->select('applications.*, 
                deb_students.student_name,
                deb_students.email as student_email,
                deb_students.mobile,
                deb_students.id as student_id,
                payments.amount,
                programmes.programme_name')
        ->join('deb_students', 'deb_students.id = applications.user_id', 'left')
        ->join('payments', 'payments.application_id = applications.id', 'left')
        ->join('programmes', 'programmes.id = applications.programme_id', 'left')
        ->where('applications.centre_id', $centre_id)
        ->where('deb_students.status', 1)
        ->orderBy('applications.created_at', 'DESC')
        ->findAll();

        $data['students'] = $students;

        $data['title']   = 'Students';
        $data['content'] = 'coordinator/students';

        return view('coordinator/layout/templates', $data);
    }

    /*
    ==========================================
    STUDENT VIEW (Application Details)
    ==========================================
    */

    public function studentView($student_id)
    {
        if ($redirect = $this->checkLogin()) {
            return $redirect;
        }

        $centre_id = session()->get('centre_id');

        // Get student
        $student = $this->debStudentModel
            ->where('id', $student_id)
            ->first();

        if (!$student) {
            return redirect()->back()->with('error', 'Student not found');
        }

        $data['student'] = $student;

        // Get application (restricted to this centre)
        $application = $this->applicationModel
            ->select('applications.*, programmes.programme_name, centres.centre_name, centres.centre_type')
            ->join('programmes', 'programmes.id = applications.programme_id', 'left')
            ->join('centres', 'centres.id = applications.centre_id')
            ->where('applications.user_id', $student_id)
            ->where('applications.centre_id', $centre_id)
            ->first();

        if (!$application) {
            return redirect()->back()->with('error', 'Application not found');
        }

        $app_id = $application['id'];

        $data['application'] = $application;

        // Uploads (Photo + Signature)
        $data['uploads'] = $this->uploadModel
            ->where('application_id', $app_id)
            ->first();

        // Address
        $data['addresses'] = $this->addressModel
            ->where('application_id', $app_id)
            ->findAll();

        // Family
        $data['family'] = $this->familyModel
            ->where('application_id', $app_id)
            ->first();

        // Education
        $data['education'] = $this->educationModel
            ->where('application_id', $app_id)
            ->findAll();

        // Documents
        $data['documents'] = $this->applicationDocumentModel
            ->where('application_id', $app_id)
            ->first();

        $data['app_id'] = $app_id;

        $data['title']   = 'Student Details';
        $data['content'] = 'coordinator/student_preview';

        return view('coordinator/layout/templates', $data);
    }


    public function downloadPDF($app_id)
    {
        if ($redirect = $this->checkLogin()) {
            return $redirect;
        }

        // Fetch application
        $application = $this->applicationModel
            ->select('applications.*, programmes.programme_name')
            ->join('programmes', 'programmes.id = applications.programme_id', 'left')
            ->where('applications.id', $app_id)
            ->first();

        if (!$application) {
            return redirect()->back()->with('error', 'Application not found');
        }

        // Fetch student
        $student = $this->debStudentModel
            ->where('id', $application['user_id'])
            ->first();

        $family = $this->familyModel
            ->where('application_id', $app_id)
            ->first();

        $addresses = $this->addressModel
            ->where('application_id', $app_id)
            ->findAll();

        $education = $this->educationModel
            ->where('application_id', $app_id)
            ->findAll();

        $documents = $this->applicationDocumentModel
            ->where('application_id', $app_id)
            ->first();

        // Safe PDF file name
        $filename = preg_replace('/[^A-Za-z0-9\-]/', '_', $student['student_name'])."_Application.pdf";

        // HTML
        $html = '
            <html>
            <head>
            <style>
            body{font-family:DejaVu Sans; font-size:12px;}
            table{width:100%; border-collapse:collapse; margin-bottom:15px;}
            table,th,td{border:1px solid #000;}
            th{background:#f0f0f0;}
            th,td{padding:6px;}
            .title{font-size:20px; text-align:center; font-weight:bold; margin-bottom:20px;}
            </style>
            </head>

            <body>

            <div class="title">YVU CDOE - Student Application</div>

            <h3>Student Details</h3>

            <table>
            <tr><th>Student ID</th><td>'.$student['student_id'].'</td></tr>
            <tr><th>Name</th><td>'.$student['student_name'].'</td></tr>
            <tr><th>Email</th><td>'.$student['email'].'</td></tr>
            <tr><th>Mobile</th><td>'.$student['mobile'].'</td></tr>
            <tr><th>Program</th><td>'.$student['program'].'</td></tr>
            <tr><th>Gender</th><td>'.$student['gender'].'</td></tr>
            <tr><th>DOB</th><td>'.$student['dob'].'</td></tr>
            <tr><th>Enrollment Number</th><td>'.$student['enrollment_number'].'</td></tr>
            <tr><th>ABC ID</th><td>'.$student['abc_id'].'</td></tr>
            <tr><th>Admission Date</th><td>'.$student['admission_date'].'</td></tr>
            </table>

            <h3>Application Details</h3>

            <table>
            <tr><th>Programme</th><td>'.$application['programme_name'].'</td></tr>
            <tr><th>Full Name</th><td>'.$application['full_name'].'</td></tr>
            <tr><th>Religion</th><td>'.$application['religion'].'</td></tr>
            <tr><th>DOB</th><td>'.$application['dob'].'</td></tr>
            <tr><th>Gender</th><td>'.$application['gender'].'</td></tr>
            <tr><th>Caste</th><td>'.$application['caste'].'</td></tr>
            <tr><th>Nationality</th><td>'.$application['nationality'].'</td></tr>
            <tr><th>Domicile State</th><td>'.$application['domicile_state'].'</td></tr>
            </table>

            <h3>Family Details</h3>

            <table>
            <tr><th>Father Name</th><td>'.$family['father_name'].'</td></tr>
            <tr><th>Father Occupation</th><td>'.$family['father_occupation'].'</td></tr>
            <tr><th>Mother Name</th><td>'.$family['mother_name'].'</td></tr>
            <tr><th>Mother Occupation</th><td>'.$family['mother_occupation'].'</td></tr>
            <tr><th>Guardian Name</th><td>'.$family['guardian_name'].'</td></tr>
            <tr><th>Father/Mother Mobile</th><td>'.$family['guardian_mobile'].'</td></tr>
            </table>

            <h3>Address Details</h3>

            <table>
            <tr>
            <th>Village</th>
            <th>Post Office</th>
            <th>Police Station</th>
            <th>District</th>
            <th>Pin</th>
            </tr>';
        foreach ($addresses as $addr) {

            $html .= '
                <tr>
                <td>'.$addr['village'].'</td>
                <td>'.$addr['post_office'].'</td>
                <td>'.$addr['police_station'].'</td>
                <td>'.$addr['district'].'</td>
                <td>'.$addr['pin'].'</td>
                </tr>';
        }
        $html .= '
                </table>

                <h3>Education Details</h3>

                <table>
                <tr>
                <th>Exam</th>
                <th>Institute</th>
                <th>Board</th>
                <th>Division</th>
                <th>Percentage</th>
                <th>Year</th>
                </tr>';
        foreach ($education as $edu) {

            $html .= '
                <tr>
                <td>'.$edu['exam_passed'].'</td>
                <td>'.$edu['institute'].'</td>
                <td>'.$edu['board_university'].'</td>
                <td>'.$edu['division'].'</td>
                <td>'.$edu['percentage'].'</td>
                <td>'.$edu['year_of_passing'].'</td>
                </tr>';
        }
        $html .= '
        </table>

        </body>
        </html>';
        $options = new Options();
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $dompdf->stream($filename, ["Attachment" => true]);
    }
    public function updatePassword()
    {
        if ($redirect = $this->checkLogin()) {
            return $redirect;
        }

        $data['title']   = 'Update Password';
        $data['content'] = 'coordinator/update_password';

        return view('coordinator/layout/templates', $data);
    }
    public function updatePasswordPost()
    {
        if ($redirect = $this->checkLogin()) {
            return $redirect;
        }

        $session = session();

        $currentPassword = $this->request->getPost('current_password');
        $newPassword     = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');

        // ✅ Check new password match
        if ($newPassword !== $confirmPassword) {
            return redirect()->back()->with('error', 'New passwords do not match');
        }

        // ✅ Get logged-in centre
        $centre_id = $session->get('centre_id');

        $centre = $this->centresModel
            ->where('id', $centre_id)
            ->first();

        if (!$centre) {
            return redirect()->back()->with('error', 'Centre not found');
        }

        // ✅ Verify current password (same as your login)
        if (!password_verify($currentPassword, $centre['password'])) {
            return redirect()->back()->with('error', 'Current password is incorrect');
        }

        // ✅ Hash new password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // ✅ Update password
        $this->centresModel->update($centre_id, [
            'password' => $hashedPassword
        ]);

        return redirect()->back()->with('success', 'Password updated successfully');
    }
}
