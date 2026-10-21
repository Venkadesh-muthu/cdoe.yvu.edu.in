<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\DebStudentModel;
use App\Models\ProgrammeModel;
use App\Models\ApplicationModel;
use App\Models\AddressModel;
use App\Models\FamilyModel;
use App\Models\ApplicationUploadModel;
use App\Models\EducationModel;
use App\Models\DocumentModel;
use App\Models\ApplicationDocumentModel;
use App\Models\CentresModel;
use App\Models\PaymentModel;
use App\Services\CaptchaService;

class SuperAdminController extends BaseController
{
    private $adminModel;
    private $debStudentModel;
    private $programmeModel;
    private $applicationModel;
    private $addressModel;
    private $familyModel;
    protected $uploadModel;
    private $educationModel;
    private $documentModel;
    private $applicationDocumentModel;
    private $centresModel;
    private $paymentModel;

    public function __construct()
    {
        $this->adminModel        = new AdminModel();
        $this->debStudentModel   = new DebStudentModel();
        $this->programmeModel    = new ProgrammeModel();
        $this->applicationModel  = new ApplicationModel();
        $this->addressModel     = new AddressModel();
        $this->familyModel      = new FamilyModel();
        $this->uploadModel = new ApplicationUploadModel();
        $this->educationModel   = new EducationModel();
        $this->documentModel    = new DocumentModel();
        $this->applicationDocumentModel = new ApplicationDocumentModel();
        $this->centresModel      = new CentresModel();
        $this->paymentModel      = new PaymentModel();
    }

    // Super Admin Login Page
    public function index()
    {
        helper('captcha');

        return view('superadmin/index');
    }

    public function login()
    {
        return $this->index();
    }

    // Login Process
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

        $email    = trim($this->request->getPost('email'));
        $password = $this->request->getPost('password');

        $captcha = new CaptchaService();

        if (! $captcha->verify($this->request->getPost('captcha'))) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Invalid CAPTCHA. Please try again.');
        }

        // Find user
        $user = $this->adminModel
            ->where('email', $email)
            ->where('user_type', 'superadmin')
            ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Invalid email or password');
        }

        // Verify password
        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Invalid email or password');
        }

        // Security: regenerate session ID
        $session->regenerate();

        // Set session
        $sessionData = [
            'isAdminLoggedIn' => true,
            'user_id'         => $user['id'],
            'username'        => $user['name'],
            'email'           => $user['email'],
            'user_type'       => $user['user_type'],
            'login_time'      => date('Y-m-d H:i:s')
        ];

        $session->set($sessionData);

        return redirect()->to('/superadmin/dashboard');
    }
    // Logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/superadmin');
    }

    // Check Login
    private function checkLogin()
    {
        if (!session()->get('isAdminLoggedIn') || session()->get('user_type') != 'superadmin') {
            return redirect()->to('/superadmin')->send();
        }
    }

    // Dashboard
    public function dashboard()
    {
        if ($redirect = $this->checkLogin()) {
            return $redirect;
        }

        $data['title']   = 'Super Admin Dashboard';
        $data['content'] = 'superadmin/dashboard';

        return view('superadmin/layout/templates', $data);
    }
    public function Students()
    {
        if ($redirect = $this->checkLogin()) {
            return $redirect;
        }

        $students = $this->applicationModel
        ->select('applications.*, applications.id as applications_id,deb_students.student_name, deb_students.email as student_email, deb_students.mobile, payments.amount, programmes.programme_name, deb_students.status, deb_students.session as admission_session, deb_students.id as student_id')
        ->join('deb_students', 'deb_students.id = applications.user_id', 'left')
        ->join('payments', 'payments.application_id = applications.id', 'left')
        ->join('programmes', 'programmes.id = applications.programme_id', 'left')
        ->where('applications.is_submitted', 1)
        ->orderBy('applications.created_at', 'DESC')
        ->findAll();

        $data['students'] = $students;

        $data['title']   = 'Students';
        $data['content'] = 'superadmin/students';

        return view('superadmin/layout/templates', $data);
    }
    public function studentView($student_id)
    {
        if ($redirect = $this->checkLogin()) {
            return $redirect;
        }

        // Get student
        $student = $this->debStudentModel
            ->where('id', $student_id)
            ->first();

        if (!$student) {
            return redirect()->back()->with('error', 'Student not found');
        }

        $data['student'] = $student;

        // Get application
        $application = $this->applicationModel
        ->select('applications.*, 
                programmes.programme_name, 
                centres.centre_name, 
                centres.centre_type,
                deb_students.email as student_email')
        ->join('programmes', 'programmes.id = applications.programme_id', 'left')
        ->join('centres', 'centres.id = applications.centre_id', 'left')
        ->join('deb_students', 'deb_students.id = applications.user_id', 'left')
        ->where('applications.user_id', $student_id)
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

        $data['payment'] = $this->paymentModel
            ->where('application_id', $app_id)
            ->first();

        $data['app_id'] = $app_id;

        $data['title']   = 'Student Details';
        $data['content'] = 'superadmin/student_preview';

        return view('superadmin/layout/templates', $data);
    }
    public function exportStudentsExcel()
    {
        if ($redirect = $this->checkLogin()) {
            return $redirect;
        }

        $students = $this->applicationModel
        ->select('applications.*, 
                deb_students.student_name,
                deb_students.email,
                deb_students.mobile,
                programmes.programme_name,
                centres.centre_name,
                centres.centre_type as centre_type_name')
        ->join('deb_students', 'deb_students.id = applications.user_id', 'left')
        ->join('programmes', 'programmes.id = applications.programme_id', 'left')
        ->join('centres', 'centres.id = applications.centre_id', 'left')

        // ✅ IMPORTANT CONDITION
        ->where('deb_students.status', 1)

        ->where('applications.is_submitted', 1)
        // Accept the session formats used by the imported June-session records.
        ->groupStart()
            ->like('LOWER(deb_students.session)', 'jun', 'both', false)
            ->orWhereIn('deb_students.session', ['6', '06'])
        ->groupEnd()
        ->findAll();

        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=june_2026_approved_students.xls");

        echo "S.No\tApplication No\tStudent Name\tEmail\tMobile\tProgramme\tCentre Name\tCentre Type\tFull Name\tReligion\tSpecify Religion\tDOB\tGender\tCaste\tMarital Status\tNationality\tDomicile State\tAlt Email\tAnnual Income\tLocality\tID Proof\tID Number\tEmployment\tABC ID\tAadhar\tAadhar Mobile\tMinority\tDifferently Abled\tPermanent Address\tCommunication Address\tFather\tFather Occupation\tMother\tMother Occupation\tGuardian\tGuardian Mobile\tEducation\tPayment Mode\tTransaction ID\tPayment Date\tAmount\n";

        $i = 1;

        foreach ($students as $s) {

            $app_id = $s['id'];

            // ================= ADDRESS =================
            $addresses = $this->addressModel
                ->where('application_id', $app_id)
                ->findAll();

            $permanent = '';
            $communication = '';

            foreach ($addresses as $a) {
                $addr = "{$a['village']}, {$a['post_office']}, {$a['police_station']}, {$a['district']}, {$a['pin']}";

                if ($a['address_type'] == 'permanent') {
                    $permanent = $addr;
                } else {
                    $communication = $addr;
                }
            }

            // ================= FAMILY =================
            $family = $this->familyModel
                ->where('application_id', $app_id)
                ->first();

            // ================= EDUCATION =================
            $educationRows = $this->educationModel
                ->where('application_id', $app_id)
                ->findAll();

            $educationText = '';
            foreach ($educationRows as $e) {
                $educationText .= "{$e['exam_passed']} - {$e['institute']} - {$e['board_university']} - {$e['percentage']}% ({$e['year_of_passing']}), ";
            }

            // ================= PAYMENT =================
            $payment = $this->paymentModel
                ->where('application_id', $app_id)
                ->first();

            echo $i++ . "\t" .
                ($s['application_no'] ?? '') . "\t" .
                ($s['student_name'] ?? '') . "\t" .
                ($s['email'] ?? '') . "\t" .
                ($s['mobile'] ?? '') . "\t" .
                ($s['programme_name'] ?? '') . "\t" .
                ($s['centre_name'] ?? '') . "\t" .
                ($s['centre_type_name'] ?? '') . "\t" .

                // Application fields
                ($s['full_name'] ?? '') . "\t" .
                ($s['religion'] ?? '') . "\t" .
                ($s['specify_religion'] ?? '') . "\t" .
                (!empty($s['dob']) ? date('d-m-Y', strtotime($s['dob'])) : '') . "\t" .
                ($s['gender'] ?? '') . "\t" .
                ($s['caste'] ?? '') . "\t" .
                ($s['marital_status'] ?? '') . "\t" .
                ($s['nationality'] ?? '') . "\t" .
                ($s['domicile_state'] ?? '') . "\t" .
                ($s['alternative_email'] ?? '') . "\t" .
                ($s['annual_income'] ?? '') . "\t" .
                ($s['locality'] ?? '') . "\t" .
                ($s['id_proof_type'] ?? '') . "\t" .
                ($s['id_proof_number'] ?? '') . "\t" .
                ($s['employment_status'] ?? '') . "\t" .
                ($s['abc_id'] ?? '') . "\t" .
                ($s['aadhar_number'] ?? '') . "\t" .
                ($s['aadhar_mobile'] ?? '') . "\t" .
                ($s['minority'] ?? '') . "\t" .
                ($s['differently_abled'] ?? '') . "\t" .

                // Address
                $permanent . "\t" .
                $communication . "\t" .

                // Family
                ($family['father_name'] ?? '') . "\t" .
                ($family['father_occupation'] ?? '') . "\t" .
                ($family['mother_name'] ?? '') . "\t" .
                ($family['mother_occupation'] ?? '') . "\t" .
                ($family['guardian_name'] ?? '') . "\t" .
                ($family['guardian_mobile'] ?? '') . "\t" .

                // Education
                $educationText . "\t" .

                // Payment
                ($payment['payment_mode'] ?? '') . "\t" .
                ($payment['transaction_id'] ?? '') . "\t" .
                (!empty($payment['payment_date']) ? date('d-m-Y', strtotime($payment['payment_date'])) : '') . "\t" .
                ($payment['amount'] ?? '') . "\n";
        }

        exit;
    }
    public function activateStudent($id)
    {
        if ($redirect = $this->checkLogin()) {
            return $redirect;
        }

        // Fetch student data
        $student = $this->debStudentModel
            ->select('applications.*, programmes.programme_name, deb_students.deb_unique_id')
            ->join('applications', 'applications.user_id = deb_students.id', 'left')
            ->join('programmes', 'programmes.id = applications.programme_id', 'left')
            ->where('deb_students.id', $id)
            ->first();
        if (!$student) {
            return redirect()->back()->with('error', 'Student not found');
        }
        if (!empty($student['course_name']) && !empty($student['university_name'])) {
            return redirect()->back()->with('error', 'Course or University already exist');
        }

        if (!empty($student['course_name'])) {
            return redirect()->back()->with('error', 'Course already exists');
        }

        if (!empty($student['university_name'])) {
            return redirect()->back()->with('error', 'University already exists');
        }
        /*
        ==========================================
        SEND DATA TO UGC DEB API
        ==========================================
        */

        $clientId = 'YVU0045_GetAdmissionDetails';
        $apiKey   = 'g1OvpRddbbDaebhakPN6gkLiV2IfKmZ4';

        $api_url = "https://deb.ugc.ac.in/api/DebUniqueID/GetAdmissionDetails";

        // Only required API fields
        $apiData = [
            'DEBuniqueID' => $student['deb_unique_id'],
            'UniversityName' => 'U-0045',
            'CourseName' => $student['programme_name'],
            'DateOfAdmission' => date('d-m-Y', strtotime($student['created_at'])),
            'AdmissionDetails' => 'NA',
            'EnrollmentNumber' => $student['application_no'],
            'ModeEducation' => 'Open and Distance Learning (ODL)',
            'Category' => $student['caste'],
            'GovernmentIdentifier' => $student['id_proof_type'],
            'Locality' => $student['locality'],
            'Nationality' => $student['nationality'],
            'GovernmentIdentifierNumber' => $student['id_proof_number'],
            'CountryResidence' => 'India'
        ];

        $client = \Config\Services::curlrequest();

        try {

            $response = $client->request('POST', $api_url, [

                'headers' => [
                    'ClientID' => $clientId,
                    'APIKey'   => $apiKey,
                    'Accept'   => 'application/json'
                ],

                'query' => $apiData,
                'verify' => ROOTPATH . 'certs/cacert.pem'
            ]);

            $api_result = json_decode($response->getBody(), true);

            if (isset($api_result['Status']) && $api_result['Status'] == "Process Success") {

                // Activate student
                $this->debStudentModel->update($id, [
                    'status' => 1
                ]);
                return redirect()->to('/superadmin/students')
                    ->with('success', 'Student activated');

            } elseif (isset($api_result['Flag']) && $api_result['Flag'] == 3) {

                // Activate student
                $this->debStudentModel->update($id, [
                    'status' => 1
                ]);
                return redirect()->back()
                    ->with('warning', 'Data already available in DEB portal');

            } else {

                $message = $api_result['Message'] ?? "Admission API failed";

                return redirect()->back()
                    ->with('error', $message);
            }

        } catch (\Exception $e) {

            log_message('error', 'DEB API Error: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'API connection failed');
        }
    }
    public function rejectStudent($id)
    {
        if ($redirect = $this->checkLogin()) {
            return $redirect;
        }

        $student = $this->debStudentModel
            ->where('id', $id)
            ->first();

        if (!$student) {
            return redirect()->back()->with('error', 'Student not found');
        }

        // ============================
        // GET APPLICATION ID
        // ============================
        $application = $this->applicationModel
            ->where('user_id', $id)
            ->first();

        if ($application) {

            $app_id = $application['id'];

            // ============================
            // DELETE RELATED DATA
            // ============================

            // Address
            $this->addressModel
                ->where('application_id', $app_id)
                ->delete();

            // Family
            $this->familyModel
                ->where('application_id', $app_id)
                ->delete();

            // Education
            $this->educationModel
                ->where('application_id', $app_id)
                ->delete();

            // Uploads (photo/signature)
            $this->uploadModel
                ->where('application_id', $app_id)
                ->delete();

            // Documents
            $this->applicationDocumentModel
                ->where('application_id', $app_id)
                ->delete();

            // Payment
            $this->paymentModel
                ->where('application_id', $app_id)
                ->delete();

            // Application
            $this->applicationModel
                ->where('id', $app_id)
                ->delete();
        }

        // ============================
        // UPDATE STATUS (REJECTED)
        // ============================
        $this->debStudentModel->update($id, [
            'status' => 2
        ]);

        return redirect()->to('/superadmin/students')
            ->with('success', 'Student rejected and all data deleted successfully');
    }
    public function edit_student($app_id)
    {
        if ($redirect = $this->checkLogin()) {
            return $redirect;
        }

        $application = $this->applicationModel
        ->select('applications.*, programmes.programme_name')
        ->join('programmes', 'programmes.id = applications.programme_id', 'left')
        ->where('applications.id', $app_id)
        ->first();

        $permanent = $this->addressModel
            ->where('application_id', $app_id)
            ->where('address_type', 'permanent')
            ->first();

        $communication = $this->addressModel
            ->where('application_id', $app_id)
            ->where('address_type', 'communication')
            ->first();

        $family = $this->familyModel
            ->where('application_id', $app_id)
            ->first();

        $upload = $this->uploadModel
            ->where('application_id', $app_id)
            ->first();

        $education = $this->educationModel
            ->where('application_id', $app_id)
            ->findAll();

        $docs = $this->applicationDocumentModel
            ->where('application_id', $app_id)
            ->first();

        $centres = $this->centresModel->findAll();

        $payment = $this->paymentModel
            ->where('application_id', $app_id)
            ->first();



        $data = [

            'application_id' => $app_id,
            'application' => $application,
            'permanent' => $permanent,
            'communication' => $communication,
            'family' => $family,
            'upload' => $upload,
            'education' => $education,
            'docs' => $docs,
            'centres' => $centres,
            'payment' => $payment,

            'title' => 'Edit Student',
            'content' => 'superadmin/edit_student'

        ];

        return view('superadmin/layout/templates', $data);
    }
    public function update_student($app_id)
    {

        /* =============================
           PART A – APPLICATION
        ============================= */

        $applicationData = [

        'centre_type' => $this->request->getPost('centre_type'),
        'centre_id' => $this->request->getPost('centre_id'),

        'full_name' => $this->request->getPost('full_name'),
        'religion' => $this->request->getPost('religion'),
        'specify_religion' => $this->request->getPost('specify_religion'),

        'dob' => $this->request->getPost('dob'),
        'gender' => $this->request->getPost('gender'),
        'caste' => $this->request->getPost('caste'),
        'marital_status' => $this->request->getPost('marital_status'),

        'nationality' => $this->request->getPost('nationality'),
        'domicile_state' => $this->request->getPost('domicile_state'),

        'annual_income' => $this->request->getPost('annual_income'),
        'alternative_email' => $this->request->getPost('alt_email'),

        'locality' => $this->request->getPost('locality'),
        'minority' => $this->request->getPost('minority'),
        'differently_abled' => $this->request->getPost('differently_abled'),

        'employment_status' => $this->request->getPost('employment_status'),

        'id_proof_type' => $this->request->getPost('id_proof_type'),
        'id_proof_number' => $this->request->getPost('id_proof_number'),

        'abc_id' => $this->request->getPost('abc_id'),
        'aadhar_number' => $this->request->getPost('aadhar'),
        'aadhar_mobile' => $this->request->getPost('aadhar_mobile')

        ];

        $this->applicationModel->update($app_id, $applicationData);

        $this->addressModel
        ->where('application_id', $app_id)
        ->where('address_type', 'permanent')
        ->set([

        'village' => $this->request->getPost('per_village'),
        'post_office' => $this->request->getPost('per_post'),
        'police_station' => $this->request->getPost('per_ps'),
        'district' => $this->request->getPost('per_district'),
        'pin' => $this->request->getPost('per_pin')

        ])
        ->update();

        $this->addressModel
        ->where('application_id', $app_id)
        ->where('address_type', 'communication')
        ->set([

        'village' => $this->request->getPost('com_village'),
        'post_office' => $this->request->getPost('com_post'),
        'police_station' => $this->request->getPost('com_ps'),
        'district' => $this->request->getPost('com_district'),
        'pin' => $this->request->getPost('com_pin')

        ])
        ->update();

        $this->familyModel
        ->where('application_id', $app_id)
        ->set([

        'father_name' => $this->request->getPost('father_name'),
        'father_occupation' => $this->request->getPost('father_occupation'),

        'mother_name' => $this->request->getPost('mother_name'),
        'mother_occupation' => $this->request->getPost('mother_occupation'),

        'guardian_name' => $this->request->getPost('guardian_name'),
        'guardian_mobile' => $this->request->getPost('guardian_mobile')

        ])
        ->update();

        $photo = $this->request->getFile('photo');
        $signature = $this->request->getFile('signature');

        $upload = $this->uploadModel->where('application_id', $app_id)->first();

        if ($photo && $photo->isValid()) {

            $new = $photo->getRandomName();
            $photo->move('uploads/photos', $new);

            $this->uploadModel
            ->where('application_id', $app_id)
            ->set(['photo' => $new])
            ->update();
        }

        if ($signature && $signature->isValid()) {

            $new = $signature->getRandomName();
            $signature->move('uploads/signatures', $new);

            $this->uploadModel
            ->where('application_id', $app_id)
            ->set(['signature' => $new])
            ->update();
        }
        $education = $this->request->getPost('education');

        $this->educationModel
        ->where('application_id', $app_id)
        ->delete();

        if (!empty($education)) {

            foreach ($education as $row) {

                $this->educationModel->insert([

                'application_id' => $app_id,
                'exam_passed' => $row['exam_passed'],
                'institute' => $row['institute'],
                'board_university' => $row['board'],
                'subjects_stream' => $row['subjects'],
                'division' => $row['division'],
                'percentage' => $row['percentage'],
                'year_of_passing' => $row['year']

                ]);

            }

        }
        function uploadFile($fileInput, $oldFile, $folder)
        {
            if ($fileInput && $fileInput->isValid() && !$fileInput->hasMoved()) {

                $newName = $fileInput->getRandomName();
                $fileInput->move('uploads/'.$folder, $newName);

                if ($oldFile && file_exists('uploads/'.$folder.'/'.$oldFile)) {
                    unlink('uploads/'.$folder.'/'.$oldFile);
                }

                return $newName;
            }

            return $oldFile;
        }
        $old = $this->applicationDocumentModel
            ->where('application_id', $app_id)
            ->first();

        // $old_ssc_admit = $old['ssc_admit'] ?? null;
        $old_ssc_mark  = $old['ssc_mark'] ?? null;
        // $old_ssc_pass  = $old['ssc_pass'] ?? null;

        // $old_inter_pass = $old['inter_pass'] ?? null;
        $old_inter_mark = $old['inter_mark'] ?? null;

        // $old_emp_id = $old['emp_id'] ?? null;

        $old_valid_id = $old['valid_id'] ?? null;

        $old_ug_mark = $old['ug_mark'] ?? null;
        // $old_ug_pass = $old['ug_pass'] ?? null;

        // $old_age_proof = $old['age_proof'] ?? null;

        $old_caste_certificate = $old['caste_certificate'] ?? null;

        $old_student_declaration = $old['student_declaration'] ?? null;

        // $ssc_admit = uploadFile($this->request->getFile('ssc_admit'), $old_ssc_admit, 'documents');
        $ssc_mark  = uploadFile($this->request->getFile('ssc_mark'), $old_ssc_mark, 'documents');
        // $ssc_pass  = uploadFile($this->request->getFile('ssc_pass'), $old_ssc_pass, 'documents');

        // $inter_pass = uploadFile($this->request->getFile('inter_pass'), $old_inter_pass, 'documents');
        $inter_mark = uploadFile($this->request->getFile('inter_mark'), $old_inter_mark, 'documents');

        // $emp_id = uploadFile($this->request->getFile('emp_id'), $old_emp_id, 'documents');

        $valid_id = uploadFile($this->request->getFile('valid_id'), $old_valid_id, 'documents');

        $ug_mark = uploadFile($this->request->getFile('ug_mark'), $old_ug_mark, 'documents');
        // $ug_pass = uploadFile($this->request->getFile('ug_pass'), $old_ug_pass, 'documents');

        // $age_proof = uploadFile($this->request->getFile('age_proof'), $old_age_proof, 'documents');

        $caste_certificate = uploadFile($this->request->getFile('caste_certificate'), $old_caste_certificate, 'documents');

        $student_declaration = uploadFile($this->request->getFile('student_declaration'), $old_student_declaration, 'documents');

        $documentData = [

            // 'ssc_admit' => $ssc_admit,
            'ssc_mark'  => $ssc_mark,
            // 'ssc_pass'  => $ssc_pass,

            // 'inter_pass' => $inter_pass,
            'inter_mark' => $inter_mark,

            // 'emp_id' => $emp_id,

            'valid_id' => $valid_id,

            'ug_mark' => $ug_mark,
            // 'ug_pass' => $ug_pass,

            // 'age_proof' => $age_proof,

            'caste_certificate' => $caste_certificate,

            'student_declaration' => $student_declaration

        ];

        // =============================
        // PAYMENT INSERT / UPDATE
        // =============================

        // File validation (optional but recommended)
        $receiptFile = $this->request->getFile('receipt');
        $oldReceipt = $this->request->getPost('old_receipt');

        $fileName = $oldReceipt; // keep old by default

        if ($receiptFile && $receiptFile->isValid() && !$receiptFile->hasMoved()) {

            // check size (2MB = 2097152 bytes)
            if ($receiptFile->getSize() > 2097152) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Receipt must be less than 2MB');
            }

            // new file name
            $fileName = $receiptFile->getRandomName();

            // move file
            $receiptFile->move('uploads/payment/', $fileName);

            // delete old file
            if (!empty($oldReceipt) && file_exists('uploads/payment/' . $oldReceipt)) {
                unlink('uploads/payment/' . $oldReceipt);
            }
        }

        // Payment data
        $paymentData = [
            'application_id' => $app_id,
            'course' => $this->request->getPost('course'),
            'payment_mode' => $this->request->getPost('payment_mode'),
            'transaction_id' => $this->request->getPost('transaction_id'),
            'payment_date' => $this->request->getPost('payment_date'),
            'amount' => $this->request->getPost('amount'),
            'receipt' => $fileName
        ];

        // Check existing payment
        $existingPayment = $this->paymentModel
            ->where('application_id', $app_id)
            ->first();

        if ($existingPayment) {
            $this->paymentModel->update($existingPayment['id'], $paymentData);
        } else {
            $this->paymentModel->insert($paymentData);
        }

        $this->applicationDocumentModel
        ->where('application_id', $app_id)
        ->set($documentData)
        ->update();
        return redirect()->to('/superadmin/students')
        ->with('success', 'Student Updated Successfully');
    }

}
