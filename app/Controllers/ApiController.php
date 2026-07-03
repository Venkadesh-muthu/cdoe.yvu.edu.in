<?php

/*
==========================================
SEND DATA TO UGC DEB API
==========================================
*/

$clientId = 'YVU0045_GetAdmissionDetails';
$apiKey   = 'g1OvpRddbbDaebhakPN6gkLiV2IfKmZ4';

$api_url = "https://deb.ugc.ac.in/api/DebUniqueID/GetAdmissionDetails";

$apiData = [
    'DEBuniqueID' => $this->request->getPost('debuniqueid'),
    'UniversityName' => $this->request->getPost('universityname'),
    'CourseName' => $this->request->getPost('coursename'),
    'AdmissionDate' => $this->request->getPost('admissiondate'),
    'AdmissionDetails' => $this->request->getPost('admissiondetails'),
    'EnrollmentNumber' => $this->request->getPost('enrollmentnumber'),
    'ModeEducation' => $this->request->getPost('modeeducation'),
    'Category' => $this->request->getPost('category'),
    'GovernmentIdentifier' => $this->request->getPost('governmentidentifier'),
    'Locality' => $this->request->getPost('locality'),
    'Nationality' => $this->request->getPost('nationality'),
    'GovernmentIdentifierNumber' => $this->request->getPost('governmentidentifiernumber'),
    'CountryResidence' => $this->request->getPost('countryresidence')
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
        'verify' => false
    ]);

    $api_result = json_decode($response->getBody(), true);

    if (isset($api_result['Status']) && $api_result['Status'] == "Process Success") {

        // success
        session()->set('student_id', $student_id);

        return redirect()->to('/admin/login');

    } elseif (isset($api_result['Flag']) && $api_result['Flag'] == 3) {

        $data['warning'] = "Data already available in DEB portal.";

        return view('admin/register', $data);

    } else {

        $data['error'] = $api_result['Message'] ?? "Admission API failed";

        return view('admin/register', $data);
    }

} catch (\Exception $e) {

    log_message('error', 'DEB API Error: ' . $e->getMessage());

    $data['error'] = "API connection failed";

    return view('admin/register', $data);
}
