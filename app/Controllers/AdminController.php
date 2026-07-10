<?php

namespace App\Controllers;

use App\Models\DebStudentModel;
use App\Models\ProgrammeModel;
use App\Models\ApplicationModel;
use App\Models\AddressModel;
use App\Models\FamilyModel;
use App\Models\ApplicationUploadModel;
use App\Models\EducationModel;
use App\Models\DocumentModel;
use App\Models\ApplicationDocumentModel;
use App\Models\PaymentModel;
use App\Models\CentresModel;
use App\Services\CaptchaService;
use Dompdf\Dompdf;
use Dompdf\Options;

class AdminController extends BaseController
{
    private $debStudentModel;
    private $programmeModel;
    private $applicationModel;
    private $addressModel;
    private $familyModel;
    protected $uploadModel;
    private $educationModel;
    private $documentModel;
    private $applicationDocumentModel;
    private $paymentModel;
    private $centresModel;

    public function __construct()
    {
        $this->debStudentModel = new DebStudentModel();
        $this->programmeModel = new ProgrammeModel();
        $this->applicationModel = new ApplicationModel();
        $this->addressModel     = new AddressModel();
        $this->familyModel      = new FamilyModel();
        $this->uploadModel = new ApplicationUploadModel();
        $this->educationModel   = new EducationModel();
        $this->documentModel    = new DocumentModel();
        $this->applicationDocumentModel = new ApplicationDocumentModel();
        $this->paymentModel = new PaymentModel();
        $this->centresModel = new CentresModel();
    }

    public function index()
    {
        return view('/admin/register');
    }
    // public function validateDeb()
    // {
    //     $debId = $this->request->getPost('devid');

    //     if (empty($debId)) {
    //         return redirect()->back()->with('error', 'DEB ID is required');
    //     }

    //     $clientId = "YVU0045_GetStudentDetails";   // Provided by DEB
    //     $apiKey   = "oTXMK7mBcK42ffY2lWVc0wI0CsWBkmf7";     // Provided by DEB

    //     $url = "https://deb.ugc.ac.in/api/DebUniqueID/GetStudentDetails?debUniqueId=".$debId;

    //     $client = \Config\Services::curlrequest();

    //     try {

    //         $response = $client->request('POST', $url, [
    //             'headers' => [
    //                 'ClientID' => $clientId,
    //                 'APIKey'   => $apiKey,
    //                 'Accept'   => 'application/json'
    //             ],
    //             'verify' => false // Disable SSL verification (for local testing)
    //         ]);

    //         $body = $response->getBody();
    //         $result = json_decode($body, true);
    //         // Check API response
    //         if (isset($result['Status']) && $result['Status'] == "Process Success") {

    //             $data['student'] = $result['Resource'][0];

    //             return view('admin/register', $data);

    //         } else {

    //             $data['error'] = "Invalid DEB ID";

    //             return view('admin/register', $data);

    //         }

    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'API connection failed');

    //     }
    // }
    public function validateDeb()
    {
        $debId = $this->request->getPost('devid');

        if (empty($debId)) {
            return redirect()->back()->with('error', 'DEB ID is required');
        }

        $clientId = "YVU0045_GetStudentDetails";
        $apiKey   = "oTXMK7mBcK42ffY2lWVc0wI0CsWBkmf7";
        $url      = "https://deb.ugc.ac.in/api/DebUniqueID/GetStudentDetails?debUniqueId=".$debId;

        $client = \Config\Services::curlrequest();

        try {

            $response = $client->request('POST', $url, [
                'headers' => [
                    'ClientID' => $clientId,
                    'APIKey'   => $apiKey,
                    'Accept'   => 'application/json'
                ],
                'json' => [
                    'devid' => $debId
                ],
                'verify' => ROOTPATH . 'certs/cacert.pem'
            ]);

            $result = json_decode($response->getBody(), true);

            if (isset($result['Status']) && $result['Status'] == "Process Success") {

                $data['student'] = $result['Resource'][0];

                return view('admin/register', $data);

            } else {

                $data['error'] = "Invalid DEB ID";
                return view('admin/register', $data);
            }

        } catch (\Exception $e) {

            echo $e->getMessage(); // show real error
        }
    }
    // public function registerStudent()
    // {
    //     if ($this->request->getMethod() !== 'POST') {
    //         return redirect()->back();
    //     }

    //     $rules = [
    //         'name' => 'required|min_length[3]',
    //         'email' => 'required|valid_email',
    //         'mobile' => 'required|numeric|min_length[10]|max_length[10]',
    //         'debuniqueid' => 'required',
    //         'password' => 'required|min_length[6]',
    //         'c_password' => 'required|matches[password]'
    //     ];

    //     if (!$this->validate($rules)) {

    //         return redirect()->back()
    //             ->withInput()
    //             ->with('error', $this->validator->listErrors());
    //     }
    //     $debUniqueId = $this->request->getPost('debuniqueid');

    //     // Check if DEB ID already exists in database
    //     $existing = $this->debStudentModel
    //                     ->where('deb_unique_id', $debUniqueId)
    //                     ->first();

    //     if ($existing) {

    //         $data['warning'] = "Data already available in our portal.";

    //         return view('admin/register', $data);
    //     }
    //     $data = [

    //         'student_id' => $this->request->getPost('studentID'),
    //         'program' => $this->request->getPost('program'),
    //         'email' => $this->request->getPost('email'),
    //         'student_name' => $this->request->getPost('name'),
    //         'father_name' => $this->request->getPost('fathername'),
    //         'mobile' => $this->request->getPost('mobile'),
    //         'created_date' => $this->request->getPost('cdate'),

    //         'institute_name' => $this->request->getPost('institutename'),
    //         'institute_id' => $this->request->getPost('instituteid'),
    //         'ip_address' => $this->request->getPost('ipaddress'),

    //         'program_code' => $this->request->getPost('programcode'),
    //         'mode' => $this->request->getPost('mode'),

    //         'admission_date' => $this->request->getPost('admissiondate'),
    //         'admission_details' => $this->request->getPost('admissiondetails'),

    //         'university_name' => $this->request->getPost('universityname'),
    //         'course_name' => $this->request->getPost('coursename'),

    //         'abc_id' => $this->request->getPost('abcid'),
    //         'deb_unique_id' => $this->request->getPost('debuniqueid'),

    //         'gender' => $this->request->getPost('gender'),
    //         'dob' => $this->request->getPost('dob'),

    //         'enrollment_number' => $this->request->getPost('enrollmentnumber'),

    //         'category' => $this->request->getPost('category'),
    //         'government_identifier' => $this->request->getPost('governmentidentifier'),
    //         'government_identifier_number' => $this->request->getPost('governmentidentifiernumber'),

    //         'nationality' => $this->request->getPost('nationality'),
    //         'country_residence' => $this->request->getPost('countryresidence'),
    //         'locality' => $this->request->getPost('locality'),

    //         'mode_education' => $this->request->getPost('modeeducation'),
    //         'year' => $this->request->getPost('year'),
    //         'session_api' => $this->request->getPost('session_api'),
    //         'list' => $this->request->getPost('list'),


    //         'session' => $this->request->getPost('session_id'),
    //         'lsc_reference_id' => $this->request->getPost('lsc'),

    //         'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
    //     ];

    //     // Insert student into DB
    //     $student_id = $this->debStudentModel->insert($data);

    //     /*
    //     ==========================================
    //     SEND DATA TO UGC DEB API
    //     ==========================================
    //     */

    //     $clientId = 'YVU0045_GetAdmissionDetails';
    //     $apiKey   = 'g1OvpRddbbDaebhakPN6gkLiV2IfKmZ4';

    //     $api_url = "https://deb.ugc.ac.in/api/DebUniqueID/GetAdmissionDetails";

    //     $apiData = [
    //         'DEBuniqueID' => $this->request->getPost('debuniqueid'),
    //         'UniversityName' => $this->request->getPost('universityname'),
    //         'CourseName' => $this->request->getPost('coursename'),
    //         'AdmissionDate' => $this->request->getPost('admissiondate'),
    //         'AdmissionDetails' => $this->request->getPost('admissiondetails'),
    //         'EnrollmentNumber' => $this->request->getPost('enrollmentnumber'),
    //         'ModeEducation' => $this->request->getPost('modeeducation'),
    //         'Category' => $this->request->getPost('category'),
    //         'GovernmentIdentifier' => $this->request->getPost('governmentidentifier'),
    //         'Locality' => $this->request->getPost('locality'),
    //         'Nationality' => $this->request->getPost('nationality'),
    //         'GovernmentIdentifierNumber' => $this->request->getPost('governmentidentifiernumber'),
    //         'CountryResidence' => $this->request->getPost('countryresidence')
    //     ];

    //     $client = \Config\Services::curlrequest();

    //     try {

    //         $response = $client->request('POST', $api_url, [

    //             'headers' => [
    //                 'ClientID' => $clientId,
    //                 'APIKey'   => $apiKey,
    //                 'Accept'   => 'application/json'
    //             ],

    //             'query' => $apiData,
    //             'verify' => false
    //         ]);

    //         $api_result = json_decode($response->getBody(), true);

    //         if (isset($api_result['Status']) && $api_result['Status'] == "Process Success") {

    //             // success
    //             session()->set('student_id', $student_id);

    //             return redirect()->to('/admin/login');

    //         } elseif (isset($api_result['Flag']) && $api_result['Flag'] == 3) {

    //             $data['warning'] = "Data already available in DEB portal.";

    //             return view('admin/register', $data);

    //         } else {

    //             $data['error'] = $api_result['Message'] ?? "Admission API failed";

    //             return view('admin/register', $data);
    //         }

    //     } catch (\Exception $e) {

    //         log_message('error', 'DEB API Error: ' . $e->getMessage());

    //         $data['error'] = "API connection failed";

    //         return view('admin/register', $data);
    //     }

    //     session()->set('student_id', $student_id);

    //     // return redirect()->to('/admin/login');

    // }
    public function registerStudent()
    {
        if ($this->request->getMethod() !== 'POST') {
            return view('admin/register');
        }

        $rules = [
            'name'       => 'required|min_length[3]',
            'email'      => 'required|valid_email',
            'mobile'     => 'required|numeric|min_length[10]|max_length[10]',
            'debuniqueid' => 'required',
            'password'   => 'required|min_length[6]',
            'c_password' => 'required|matches[password]'
        ];

        if (!$this->validate($rules)) {

            $data['validation'] = $this->validator;

            return view('admin/register', $data);
        }

        $debUniqueId = $this->request->getPost('debuniqueid');

        // Check if DEB ID already exists
        $existing = $this->debStudentModel
            ->where('deb_unique_id', $debUniqueId)
            ->first();

        if ($existing) {

            $data['warning'] = "Data already available in our portal.";

            return view('admin/register', $data);
        }

        $data = [

            'student_id' => $this->request->getPost('studentID'),
            'program' => $this->request->getPost('program'),
            'email' => $this->request->getPost('email'),
            'student_name' => $this->request->getPost('name'),
            'father_name' => $this->request->getPost('fathername'),
            'mobile' => $this->request->getPost('mobile'),

            'created_date' => $this->request->getPost('cdate'),

            'institute_name' => $this->request->getPost('institutename'),
            'institute_id' => $this->request->getPost('instituteid'),
            'ip_address' => $this->request->getPost('ipaddress'),

            'program_code' => $this->request->getPost('programcode'),
            'mode' => $this->request->getPost('mode'),

            'admission_date' => $this->request->getPost('admissiondate'),
            'admission_details' => $this->request->getPost('admissiondetails'),

            'university_name' => $this->request->getPost('universityname'),
            'course_name' => $this->request->getPost('coursename'),

            'abc_id' => $this->request->getPost('abcid'),
            'deb_unique_id' => $debUniqueId,

            'gender' => $this->request->getPost('gender'),
            'dob' => $this->request->getPost('dob'),

            'enrollment_number' => $this->request->getPost('enrollmentnumber'),

            'category' => $this->request->getPost('category'),
            'government_identifier' => $this->request->getPost('governmentidentifier'),
            'government_identifier_number' => $this->request->getPost('governmentidentifiernumber'),

            'nationality' => $this->request->getPost('nationality'),
            'country_residence' => $this->request->getPost('countryresidence'),
            'locality' => $this->request->getPost('locality'),

            'mode_education' => $this->request->getPost('modeeducation'),
            'year' => $this->request->getPost('year'),

            'session_api' => $this->request->getPost('session_api'),
            'list' => $this->request->getPost('list'),

            'session' => $this->request->getPost('session_id'),
            'lsc_reference_id' => $this->request->getPost('lsc'),

            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            )
        ];

        // Insert student
        $student_id = $this->debStudentModel->insert($data);

        // Set session
        session()->set('student_id', $student_id);

        // Redirect to login
        return redirect()->to('/admin/login')
            ->with('success', 'Registration successful. Please login.');
    }
    public function login()
    {
        helper('captcha');

        return view('/admin/login');
    }

    public function resetPassword()
    {
        helper('captcha');

        return view('/admin/reset_password');
    }

    public function loginProcess()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required',
            'captcha' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $captcha = new CaptchaService();

        if (! $captcha->verify($this->request->getPost('captcha'))) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Invalid CAPTCHA. Please try again.');
        }

        $student = $this->debStudentModel
                        ->where('email', $email)
                        ->first();

        if (!$student) {
            return redirect()->back()->with('error', 'Invalid Email or Password');
        }

        if (!password_verify($password, $student['password'])) {
            return redirect()->back()->with('error', 'Invalid Email or Password');
        }

        // create session
        $sessionData = [
            'student_id'   => $student['id'],
            'student_name' => $student['student_name'],
            'email'        => $student['email'],
            'logged_in'    => true
        ];

        session()->set($sessionData);

        return redirect()->to('/admin/dashboard');
    }

    public function resetPasswordProcess()
    {
        $rules = [
            'email'       => 'required|valid_email',
            'mobile'      => 'required|numeric|min_length[10]|max_length[10]',
            'debuniqueid' => 'required',
            'password'    => 'required|min_length[6]',
            'c_password'  => 'required|matches[password]',
            'captcha'     => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $captcha = new CaptchaService();

        if (! $captcha->verify($this->request->getPost('captcha'))) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Invalid CAPTCHA. Please try again.');
        }

        $student = $this->debStudentModel
            ->where('email', trim((string) $this->request->getPost('email')))
            ->where('mobile', trim((string) $this->request->getPost('mobile')))
            ->where('deb_unique_id', trim((string) $this->request->getPost('debuniqueid')))
            ->first();

        if (! $student) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'The details entered do not match any registered student.');
        }

        $this->debStudentModel->update($student['id'], [
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ]);

        return redirect()->to('/admin/login')
            ->with('success', 'Password reset successfully. Please login with your new password.');
    }

    public function logout()
    {
        session()->destroy();

        if (isset($_COOKIE['remember_login'])) {
            setcookie('remember_login', '', time() - 3600, '/');
        }

        return redirect()->to('/admin/login');
    }
    private function checkLogin()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/admin')->send();
        }
    }
    public function checkRejectedStudent()
    {
        $user_id = session()->get('student_id');

        if (!$user_id) {
            return;
        }

        $student = $this->debStudentModel
            ->where('id', $user_id)
            ->first();

        // ❌ If rejected
        if ($student && $student['status'] == 2) {

            // remove application session
            session()->remove('application_id');

            // show message only once
            if (!session()->get('rejected_shown')) {

                session()->setFlashdata(
                    'warning',
                    'Your application was rejected. Please reapply.'
                );

                session()->set('rejected_shown', true);
            }
        }
    }
    /* -------------------------------------------------
        DASHBOARD
    --------------------------------------------------*/

    public function dashboard()
    {
        if ($redirect = $this->checkLogin()) {
            return $redirect;
        }
        $this->checkRejectedStudent();
        $app_id = session()->get('application_id');

        // Load programmes
        $data['programmes'] = $this->programmeModel->findAll();

        if ($app_id) {

            $application = $this->applicationModel
                ->select('is_submitted')
                ->where('id', $app_id)
                ->first();

            if ($application && $application['is_submitted'] == 1) {

                $programme = $this->applicationModel
                    ->select('applications.*, programmes.programme_name')
                    ->join('programmes', 'programmes.id = applications.programme_id', 'left')
                    ->where('applications.id', $app_id)
                    ->first();

                $data['programme_name'] = $programme['programme_name'];

                $data['title']   = 'Dashboard';
                $data['content'] = 'admin/submitted_dashboard';

                return view('admin/layout/templates', $data);
            }
        }

        // Default dashboard
        $data['title']   = 'Dashboard';
        $data['content'] = 'admin/dashboard';

        return view('admin/layout/templates', $data);
    }

    /* -------------------------------------------------
        PART A  (APPLICATION DETAILS)
    --------------------------------------------------*/

    public function partA($programme_id)
    {
        if ($redirect = $this->checkLogin()) {
            return $redirect;
        }
        $this->checkSubmitted();
        $user_id = session()->get('student_id');

        // Get application
        $application = $this->applicationModel
            ->where('programme_id', $programme_id)   // <-- use correct column name
            ->where('user_id', $user_id)
            ->first();

        $app_id = $application['id'] ?? null;

        // Permanent Address
        $permanent = $this->addressModel
            ->where('application_id', $app_id)
            ->where('address_type', 'permanent')
            ->first();

        // Communication Address
        $communication = $this->addressModel
            ->where('application_id', $app_id)
            ->where('address_type', 'communication')
            ->first();

        // Family Details
        $family = $this->familyModel
            ->where('application_id', $app_id)
            ->first();

        // Get all centres
        $centres = $this->centresModel->findAll();

        // Store in session
        session()->set('application_id', $app_id);
        session()->set('programme_id', $programme_id);

        $data = [
            'programme_id'  => $programme_id,
            'application'   => $application,
            'permanent'     => $permanent,
            'communication' => $communication,
            'family'        => $family,
            'centres'       => $centres,

            'title'   => 'Part A',
            'content' => 'admin/part_a'
        ];

        return view('admin/layout/templates', $data);
    }

    public function storePartA()
    {
        $user_id = session()->get('student_id');

        // =========================
        // CHECK EXISTING APPLICATION
        // =========================

        $existing = $this->applicationModel
            ->where('user_id', $user_id)
            ->first();

        // =========================
        // APPLICATION DATA
        // =========================

        $applicationData = [

            'user_id' => $user_id,
            'programme_id' => $this->request->getPost('programme'),

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



        // =========================
        // INSERT OR UPDATE APPLICATION
        // =========================

        if ($existing) {

            $this->applicationModel->update($existing['id'], $applicationData);
            $app_id = $existing['id'];

        } else {

            $last = $this->applicationModel->orderBy('id', 'DESC')->first();

            $year = date('Y');
            $month = date('m');
            $day = date('d');

            if ($last) {
                $lastNumber = substr($last['application_no'], -4);
                $nextNumber = (int)$lastNumber + 1;
            } else {
                $nextNumber = 1;
            }

            $running = str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

            $applicationData['application_no'] = $year.$month.$day.$running;

            $app_id = $this->applicationModel->insert($applicationData);
        }



        // =========================
        // PERMANENT ADDRESS
        // =========================

        $permanentAddress = [

            'application_id' => $app_id,
            'address_type' => 'permanent',

            'village' => $this->request->getPost('per_village'),
            'post_office' => $this->request->getPost('per_post'),
            'police_station' => $this->request->getPost('per_ps'),
            'district' => $this->request->getPost('per_district'),
            'pin' => $this->request->getPost('per_pin')

        ];

        $permanent = $this->addressModel
            ->where('application_id', $app_id)
            ->where('address_type', 'permanent')
            ->first();

        if ($permanent) {

            $this->addressModel->update($permanent['id'], $permanentAddress);

        } else {

            $this->addressModel->insert($permanentAddress);
        }



        // =========================
        // COMMUNICATION ADDRESS
        // =========================

        $communicationAddress = [

            'application_id' => $app_id,
            'address_type' => 'communication',

            'village' => $this->request->getPost('com_village'),
            'post_office' => $this->request->getPost('com_post'),
            'police_station' => $this->request->getPost('com_ps'),
            'district' => $this->request->getPost('com_district'),
            'pin' => $this->request->getPost('com_pin')

        ];

        $communication = $this->addressModel
            ->where('application_id', $app_id)
            ->where('address_type', 'communication')
            ->first();

        if ($communication) {

            $this->addressModel->update($communication['id'], $communicationAddress);

        } else {

            $this->addressModel->insert($communicationAddress);
        }



        // =========================
        // FAMILY DETAILS
        // =========================

        $familyData = [

            'application_id' => $app_id,

            'father_name' => $this->request->getPost('father_name'),
            'father_occupation' => $this->request->getPost('father_occupation'),

            'mother_name' => $this->request->getPost('mother_name'),
            'mother_occupation' => $this->request->getPost('mother_occupation'),

            'guardian_name' => $this->request->getPost('guardian_name'),
            'guardian_mobile' => $this->request->getPost('guardian_mobile')

        ];

        $family = $this->familyModel
            ->where('application_id', $app_id)
            ->first();

        if ($family) {

            $this->familyModel->update($family['id'], $familyData);

        } else {

            $this->familyModel->insert($familyData);
        }



        // =========================
        // SAVE SESSION
        // =========================

        session()->set('application_id', $app_id);



        // =========================
        // NEXT PAGE
        // =========================

        return redirect()->to('/admin/part-b/'.$app_id);
    }

    // public function updatePartA($id)
    // {
    //     $data = $this->request->getPost();

    //     $this->applicationModel->update($id, $data);

    //     return redirect()->back()->with('success', 'Updated Successfully');
    // }

    // public function deletePartA($id)
    // {
    //     $this->applicationModel->delete($id);

    //     return redirect()->back();
    // }

    /* -------------------------------------------------
        PART B  (ADDRESS + FAMILY)
    --------------------------------------------------*/

    public function partB($app_id)
    {
        if ($redirect = $this->checkLogin()) {
            return $redirect;
        }
        $this->checkSubmitted();
        // get uploaded files
        $upload = $this->uploadModel
            ->where('application_id', $app_id)
            ->first();

        $data = [

            'application_id' => $app_id,
            'upload' => $upload,

            'title'   => 'Part B',
            'content' => 'admin/part_b'
        ];

        return view('admin/layout/templates', $data);
    }

    public function storePartB()
    {
        $app_id = session()->get('application_id');

        // =========================
        // CHECK EXISTING RECORD
        // =========================

        $existing = $this->uploadModel
            ->where('application_id', $app_id)
            ->first();

        $validationRules = [

            'photo' => [
            'label' => 'Photograph',
            'rules' => 'if_exist|ext_in[photo,jpg,jpeg,png]|max_size[photo,100]|min_size[photo,20]'
            ],

            'signature' => [
            'label' => 'Signature',
            'rules' => 'if_exist|ext_in[signature,jpg,jpeg,png]|max_size[signature,50]|min_size[signature,10]'
            ]

        ];

        if (!$this->validate($validationRules)) {

            return redirect()->back()
            ->withInput()
            ->with('errors', $this->validator->getErrors());

        }
        $files = $this->request->getFiles();

        foreach ($files as $name => $file) {

            if ($file->getError() == 1) { // UPLOAD_ERR_INI_SIZE

                return redirect()->back()
                    ->withInput()
                    ->with('errors', ['File size must be less than 2MB']);
            }

        }
        // =========================
        // GET OLD FILES
        // =========================

        $old_photo = $this->request->getPost('old_photo');
        $old_signature = $this->request->getPost('old_signature');


        // =========================
        // FILE UPLOAD FUNCTION
        // =========================

        function uploadFile($fileInput, $oldFile, $folder)
        {
            if ($fileInput && $fileInput->isValid() && !$fileInput->hasMoved()) {

                $newName = $fileInput->getRandomName();
                $fileInput->move('uploads/'.$folder, $newName);

                // delete old file
                if ($oldFile && file_exists('uploads/'.$folder.'/'.$oldFile)) {
                    unlink('uploads/'.$folder.'/'.$oldFile);
                }

                return $newName;
            }

            return $oldFile;
        }


        // =========================
        // PROCESS FILES
        // =========================

        $photoFile = $this->request->getFile('photo');
        $signatureFile = $this->request->getFile('signature');

        $photoName = uploadFile($photoFile, $old_photo, 'photos');
        $signatureName = uploadFile($signatureFile, $old_signature, 'signatures');


        // =========================
        // DATA ARRAY
        // =========================

        $uploadData = [

            'application_id' => $app_id,
            'photo' => $photoName,
            'signature' => $signatureName
        ];


        // =========================
        // INSERT OR UPDATE
        // =========================

        if ($existing) {

            $this->uploadModel->update($existing['id'], $uploadData);

        } else {

            $this->uploadModel->insert($uploadData);
        }


        // =========================
        // NEXT PAGE
        // =========================

        return redirect()->to('/admin/part-c/'.$app_id);
    }

    /* -------------------------------------------------
        PART C  (EDUCATION)
    --------------------------------------------------*/

    public function partC($app_id)
    {
        if ($redirect = $this->checkLogin()) {
            return $redirect;
        }

        $this->checkSubmitted();

        $data['application_id'] = $app_id;

        $data['education'] = $this->educationModel
            ->where('application_id', $app_id)
            ->findAll();

        $data['title']   = 'Part C';
        $data['content'] = '/admin/part_c';

        return view('/admin/layout/templates', $data);
    }

    public function storePartC()
    {
        $app_id = $this->request->getPost('application_id');

        $education = $this->request->getPost('education');

        // Delete old records
        $this->educationModel
            ->where('application_id', $app_id)
            ->delete();

        if (!empty($education)) {

            foreach ($education as $row) {

                $educationData = [

                    'application_id'   => $app_id,
                    'exam_passed'      => $row['exam_passed'],
                    'institute'        => $row['institute'],
                    'board_university' => $row['board'],
                    'subjects_stream'  => $row['subjects'],
                    'division'         => $row['division'],
                    'percentage'       => $row['percentage'],
                    'year_of_passing'  => $row['year']

                ];

                $this->educationModel->insert($educationData);
            }
        }

        return redirect()->to('/admin/part-d/' . $app_id);
    }

    /* -------------------------------------------------
        PART D  (DOCUMENTS)
    --------------------------------------------------*/

    public function partD($app_id)
    {
        if ($redirect = $this->checkLogin()) {
            return $redirect;
        }

        $this->checkSubmitted();

        $uploadDocs = $this->applicationDocumentModel
            ->where('application_id', $app_id)
            ->first();

        $data = [

            'application_id' => $app_id,
            'docs'           => $uploadDocs,

            'title'   => 'Part D',
            'content' => 'admin/part_d'
        ];

        return view('admin/layout/templates', $data);
    }
    public function storePartD()
    {
        $app_id = session()->get('application_id');

        // =========================
        // CHECK EXISTING RECORD
        // =========================

        $existing = $this->applicationDocumentModel
            ->where('application_id', $app_id)
            ->first();


        // =========================
        // VALIDATION
        // =========================

        // =========================
        // VALIDATION
        // =========================

        $validationRules = [

            'ssc_mark' => [
                'label' => 'SSC Marksheet',
                'rules' => 'if_exist|uploaded[ssc_mark]|max_size[ssc_mark,2048]|ext_in[ssc_mark,jpg,jpeg,png,pdf]|mime_in[ssc_mark,image/jpg,image/jpeg,image/png,application/pdf]'
            ],

            'inter_mark' => [
                'label' => 'Intermediate Marksheet',
                'rules' => 'if_exist|uploaded[inter_mark]|max_size[inter_mark,2048]|ext_in[inter_mark,jpg,jpeg,png,pdf]|mime_in[inter_mark,image/jpg,image/jpeg,image/png,application/pdf]'
            ],

            'valid_id' => [
                'label' => 'Valid Photo ID',
                'rules' => 'if_exist|uploaded[valid_id]|max_size[valid_id,2048]|ext_in[valid_id,jpg,jpeg,png,pdf]|mime_in[valid_id,image/jpg,image/jpeg,image/png,application/pdf]'
            ],

            'ug_mark' => [
                'label' => 'UG Marksheet',
                'rules' => 'if_exist|uploaded[ug_mark]|max_size[ug_mark,2048]|ext_in[ug_mark,jpg,jpeg,png,pdf]|mime_in[ug_mark,image/jpg,image/jpeg,image/png,application/pdf]'
            ],

            'caste_certificate' => [
                'label' => 'Caste Certificate',
                'rules' => 'if_exist|uploaded[caste_certificate]|max_size[caste_certificate,2048]|ext_in[caste_certificate,jpg,jpeg,png,pdf]|mime_in[caste_certificate,image/jpg,image/jpeg,image/png,application/pdf]'
            ],

            'student_declaration' => [
                'label' => 'Student Declaration',
                'rules' => 'if_exist|uploaded[student_declaration]|max_size[student_declaration,2048]|ext_in[student_declaration,jpg,jpeg,png,pdf]|mime_in[student_declaration,image/jpg,image/jpeg,image/png,application/pdf]'
            ],

        ];


        if (!$this->validate($validationRules)) {

            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $files = $this->request->getFiles();

        foreach ($files as $name => $file) {

            if ($file->getError() == 1) { // UPLOAD_ERR_INI_SIZE

                return redirect()->back()
                    ->withInput()
                    ->with('errors', ['File size must be less than 2MB']);
            }

        }
        // =========================
        // GET OLD FILES
        // =========================

        $old_ssc_mark = $this->request->getPost('old_ssc_mark');

        $old_inter_mark = $this->request->getPost('old_inter_mark');

        $old_valid_id = $this->request->getPost('old_valid_id');

        $old_ug_mark = $this->request->getPost('old_ug_mark');

        $old_caste_certificate = $this->request->getPost('old_caste_certificate');

        $old_student_declaration = $this->request->getPost('old_student_declaration');


        // =========================
        // FILE UPLOAD FUNCTION
        // =========================

        function uploadFile($fileInput, $oldFile, $folder)
        {
            if ($fileInput && $fileInput->isValid() && !$fileInput->hasMoved()) {

                $newName = $fileInput->getRandomName();
                $fileInput->move('uploads/'.$folder, $newName);

                // delete old file if exists
                if ($oldFile && file_exists('uploads/'.$folder.'/'.$oldFile)) {
                    unlink('uploads/'.$folder.'/'.$oldFile);
                }

                return $newName;
            }

            return $oldFile;
        }


        // =========================
        // UPLOAD FILES
        // =========================

        $ssc_mark  = uploadFile($this->request->getFile('ssc_mark'), $old_ssc_mark, 'documents');

        $inter_mark = uploadFile($this->request->getFile('inter_mark'), $old_inter_mark, 'documents');

        $valid_id = uploadFile($this->request->getFile('valid_id'), $old_valid_id, 'documents');

        $ug_mark = uploadFile($this->request->getFile('ug_mark'), $old_ug_mark, 'documents');

        $caste_certificate = uploadFile($this->request->getFile('caste_certificate'), $old_caste_certificate, 'documents');

        $student_declaration = uploadFile($this->request->getFile('student_declaration'), $old_student_declaration, 'documents');


        // =========================
        // DATA ARRAY
        // =========================

        $documentData = [

            'application_id' => $app_id,

            'ssc_mark'  => $ssc_mark,

            'inter_mark' => $inter_mark,

            'valid_id' => $valid_id,

            'ug_mark' => $ug_mark,

            'caste_certificate' => $caste_certificate,

            'student_declaration' => $student_declaration
        ];


        // =========================
        // INSERT OR UPDATE
        // =========================

        if ($existing) {

            $this->applicationDocumentModel
                ->update($existing['id'], $documentData);

        } else {

            $this->applicationDocumentModel
                ->insert($documentData);
        }


        // =========================
        // NEXT PAGE
        // =========================

        return redirect()->to('/admin/preview/'.$app_id);
    }

    /* -------------------------------------------------
        PREVIEW
    --------------------------------------------------*/

    public function preview($app_id)
    {
        if ($redirect = $this->checkLogin()) {
            return $redirect;
        }
        // Get Application
        $application = $this->applicationModel
        ->select('applications.*, programmes.programme_name, centres.centre_name, centres.centre_type')
        ->join('programmes', 'programmes.id = applications.programme_id', 'left')
        ->join('centres', 'centres.id = applications.centre_id')
        ->where('applications.id', $app_id)
        ->first();

        if (!$application) {
            return redirect()->back()->with('error', 'Application not found');
        }

        $data['application'] = $application;

        // Uploads (Photo + Signature)
        $data['uploads'] = $this->uploadModel
            ->where('application_id', $app_id)
            ->first();

        // Address
        $data['addresses'] = $this->addressModel
            ->where('application_id', $app_id)
            ->findAll();

        // Family Details
        $data['family'] = $this->familyModel
            ->where('application_id', $app_id)
            ->first();

        // Education Details
        $data['education'] = $this->educationModel
            ->where('application_id', $app_id)
            ->findAll();

        // Uploaded Documents
        $data['documents'] = $this->applicationDocumentModel
            ->where('application_id', $app_id)
            ->first();

        $data['app_id'] = $app_id;

        $data['title']   = 'Preview';
        $data['content'] = 'admin/preview';

        return view('admin/layout/templates', $data);
    }
    public function finalSubmit($app_id)
    {
        $user_id = session()->get('student_id');

        // ✅ Get student
        $student = $this->debStudentModel
            ->where('id', $user_id)
            ->first();

        // 🔄 If rejected → update status to 0
        if ($student && $student['status'] == 2) {
            $this->debStudentModel->update($user_id, [
                'status' => 0
            ]);
        }
        $data = [
            'is_submitted' => 1
        ];

        $this->applicationModel->update($app_id, $data);

        return redirect()->to('/admin/dashboard')
            ->with('success', 'Application submitted successfully');
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
    public function paymentDetails($app_id)
    {
        if ($redirect = $this->checkLogin()) {
            return $redirect;
        }

        // Get Application
        $application = $this->applicationModel
            ->select('applications.*, programmes.programme_name')
            ->join('programmes', 'programmes.id = applications.programme_id', 'left')
            ->where('applications.id', $app_id)
            ->first();

        if (!$application) {
            return redirect()->back()->with('error', 'Application not found');
        }

        $data['application'] = $application;

        // Payment details
        $data['payment'] = $this->paymentModel
            ->where('application_id', $app_id)
            ->first();

        $data['application_id'] = $app_id;

        $data['title']   = 'Payment Details';
        $data['content'] = 'admin/payment_details';

        return view('admin/layout/templates', $data);
    }
    private function checkSubmitted()
    {
        $app_id = session()->get('application_id');

        if (!$app_id) {
            return false;
        }

        $application = $this->applicationModel
            ->select('is_submitted')
            ->where('id', $app_id)
            ->first();

        if ($application && $application['is_submitted'] == 1) {

            $programme = $this->applicationModel
                ->select('applications.*, programmes.programme_name')
                ->join('programmes', 'programmes.id = applications.programme_id', 'left')
                ->where('applications.id', $app_id)
                ->first();

            $data['programme_name'] = $programme['programme_name'] ?? '';

            $data['title']   = 'Dashboard';
            $data['content'] = 'admin/submitted_dashboard';

            echo view('admin/layout/templates', $data);
            exit;
        }
    }
    public function paymentStore()
    {
        if ($redirect = $this->checkLogin()) {
            return $redirect;
        }
        $files = $this->request->getFiles();

        foreach ($files as $name => $file) {

            if ($file->getError() == 1) { // UPLOAD_ERR_INI_SIZE

                return redirect()->back()
                    ->withInput()
                    ->with('errors', ['File size must be less than 2MB']);
            }

        }
        $app_id = $this->request->getPost('application_id');

        $file = $this->request->getFile('receipt');
        $oldReceipt = $this->request->getPost('old_receipt');

        $fileName = $oldReceipt; // keep old by default

        if ($file && $file->isValid() && !$file->hasMoved()) {

            // Generate new name
            $fileName = $file->getRandomName();

            // Move file
            $file->move('uploads/payment/', $fileName);

            // Delete old file
            if (!empty($oldReceipt) && file_exists('uploads/payment/' . $oldReceipt)) {
                unlink('uploads/payment/' . $oldReceipt);
            }
        }

        $data = [
            'application_id' => $app_id,
            'course' => $this->request->getPost('course'),
            'payment_mode' => $this->request->getPost('payment_mode'),
            'transaction_id' => $this->request->getPost('transaction_id'),
            'payment_date' => $this->request->getPost('payment_date'),
            'amount' => $this->request->getPost('amount'),
            'receipt' => $fileName
        ];

        $existing = $this->paymentModel
            ->where('application_id', $app_id)
            ->first();

        if ($existing) {
            $this->paymentModel->update($existing['id'], $data);
        } else {
            $this->paymentModel->insert($data);
        }

        return redirect()->back()->with('success', 'Payment details saved successfully');
    }

}
