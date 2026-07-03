<main class="nxl-container">
<div class="nxl-content">

<!-- Page Header -->

<div class="page-header">
<div class="page-header-left d-flex align-items-center">

<div class="page-header-title">
<h5 class="m-b-10">Online Education</h5>
</div>

<ul class="breadcrumb">
<li class="breadcrumb-item">
<a href="<?= base_url('admin/dashboard') ?>">Home</a>
</li>
<li class="breadcrumb-item">Online Education</li>
<li class="breadcrumb-item">Application Preview</li>
</ul>

</div>
</div>

<!-- ================= PART A & B ================= -->
<div class="main-content">
<div class="row">
<div class="col-lg-12">

<div class="card">

<div class="card-header">
<h4 class="fw-bold">Part - A & B : Personal Details</h4>
</div>

<div class="card-body">
<a href="<?= base_url('admin/download-pdf/'.$app_id) ?>" 
   class="btn btn-danger mb-3" target="_blank">
   Download PDF
</a>
<div class="row">

<div class="col-md-8">

<table class="table table-borderless">
<tr>
<td>Applocation no :</td>
<th><?= $application['application_no'] ?? 'NA' ?></th>
</tr>
<tr>
<td>Centre Type :</td>
<th><?= $application['centre_type'] ?? 'NA' ?></th>
</tr>
<tr>
<td>Centre Name :</td>
<th><?= $application['centre_name'] ?? 'NA' ?></th>
</tr>
<tr>
<td>Programme Applied for :</td>
<th><?= $application['programme_name'] ?? 'NA' ?></th>
</tr>

<tr>
<td>Mobile No :</td>
<th><?= session()->get('mobile') ?? 'NA' ?></th>
</tr>

<tr>
<td>Email :</td>
<th><?= session()->get('email') ?? 'NA' ?></th>
</tr>

<tr>
<td>Full Name :</td>
<th><?= $application['full_name'] ?? 'NA' ?></th>
</tr>

<tr>
<td>Religion :</td>
<th><?= $application['religion'] ?? 'NA' ?></th>
</tr>

<tr>
<td>Date of Birth :</td>
<th>
<?= !empty($application['dob']) ? date('d-m-Y', strtotime($application['dob'])) : 'NA' ?>
</th>
</tr>

</table>

</div>

<div class="col-md-4 text-center">

<?php if (!empty($uploads['photo'])): ?>
<img src="<?= base_url('uploads/photos/'.$uploads['photo']) ?>" width="200">
<?php endif; ?>

<br><br>

<?php if (!empty($uploads['signature'])): ?>
<img src="<?= base_url('uploads/signatures/'.$uploads['signature']) ?>" width="120">
<?php endif; ?>

</div>

</div>

<div class="row">

<div class="col-md-6">

<table class="table table-borderless">

<tr>
<td>Gender :</td>
<th><?= $application['gender'] ?? 'NA' ?></th>
</tr>

<tr>
<td>Caste :</td>
<th><?= $application['caste'] ?? 'NA' ?></th>
</tr>

<tr>
<td>Marital Status :</td>
<th><?= $application['marital_status'] ?? 'NA' ?></th>
</tr>

<tr>
<td>State of Domicile :</td>
<th><?= $application['domicile_state'] ?? 'NA' ?></th>
</tr>

<tr>
<td>Nationality :</td>
<th><?= $application['nationality'] ?? 'NA' ?></th>
</tr>

<tr>
<td>Annual Household Income :</td>
<th><?= $application['annual_income'] ?? 'NA' ?></th>
</tr>

</table>

<!-- Permanent Address -->

<div class="p-3 mt-3" style="background:#fff397">

<h5>Permanent Address</h5>

<table class="table table-borderless">

<?php foreach ($addresses as $addr): ?>
<?php if ($addr['address_type'] == 'permanent'): ?>

<tr>
<td>Village/Town :</td>
<th><?= $addr['village'] ?? 'NA' ?></th>
</tr>

<tr>
<td>Post Office :</td>
<th><?= $addr['post_office'] ?? 'NA' ?></th>
</tr>

<tr>
<td>Police Station :</td>
<th><?= $addr['police_station'] ?? 'NA' ?></th>
</tr>

<tr>
<td>District :</td>
<th><?= $addr['district'] ?? 'NA' ?></th>
</tr>

<tr>
<td>Pin :</td>
<th><?= $addr['pin'] ?? 'NA' ?></th>
</tr>

<?php endif; ?>
<?php endforeach; ?>

</table>

</div>

<table class="table table-borderless mt-3">

<tr>
<td>Alternative Email :</td>
<th><?= $application['alternative_email'] ?? 'NA' ?></th>
</tr>

<tr>
<td>Employment Status :</td>
<th><?= $application['employment_status'] ?? 'NA' ?></th>
</tr>

<tr>
<td>Valid ID Proof :</td>
<th><?= $application['id_proof_type'] ?? 'NA' ?></th>
</tr>

<tr>
<td>Academic Bank of Credit ID :</td>
<th><?= $application['abc_id'] ?? 'NA' ?></th>
</tr>

<tr>
<td>Aadhar Card No :</td>
<th><?= $application['aadhar_number'] ?? 'NA' ?></th>
</tr>

<tr>
<td>Aadhar Linked Mobile :</td>
<th><?= $application['aadhar_mobile'] ?? 'NA' ?></th>
</tr>

</table>

</div>

<div class="col-md-6">

<table class="table table-borderless">

<tr>
<td>Father Name :</td>
<th><?= $family['father_name'] ?? 'NA' ?></th>
</tr>

<tr>
<td>Father Occupation :</td>
<th><?= $family['father_occupation'] ?? 'NA' ?></th>
</tr>

<tr>
<td>Mother Name :</td>
<th><?= $family['mother_name'] ?? 'NA' ?></th>
</tr>

<tr>
<td>Mother Occupation :</td>
<th><?= $family['mother_occupation'] ?? 'NA' ?></th>
</tr>

<tr>
<td>Minority :</td>
<th><?= $application['minority'] ?? 'NA' ?></th>
</tr>

<tr>
<td>Differently Abled :</td>
<th><?= $application['differently_abled'] ?? 'NA' ?></th>
</tr>

</table>

<!-- Communication Address -->

<div class="p-3 mt-3" style="background:#fff397">

<h5>Communication Address</h5>

<table class="table table-borderless">

<?php foreach ($addresses as $addr): ?>
<?php if ($addr['address_type'] == 'communication'): ?>

<tr>
<td>Village/Town :</td>
<th><?= $addr['village'] ?? 'NA' ?></th>
</tr>

<tr>
<td>Post Office :</td>
<th><?= $addr['post_office'] ?? 'NA' ?></th>
</tr>

<tr>
<td>Police Station :</td>
<th><?= $addr['police_station'] ?? 'NA' ?></th>
</tr>

<tr>
<td>District :</td>
<th><?= $addr['district'] ?? 'NA' ?></th>
</tr>

<tr>
<td>Pin :</td>
<th><?= $addr['pin'] ?? 'NA' ?></th>
</tr>

<?php endif; ?>
<?php endforeach; ?>

</table>

</div>

<table class="table table-borderless mt-3">

<tr>
<td>Guardian Name :</td>
<th><?= $family['guardian_name'] ?? 'NA' ?></th>
</tr>

<tr>
<td>Father/Mother Mobile :</td>
<th><?= $family['guardian_mobile'] ?? 'NA' ?></th>
</tr>

<tr>
<td>Locality :</td>
<th><?= $application['locality'] ?? 'NA' ?></th>
</tr>

<tr>
<td>ID Proof Number :</td>
<th><?= $application['id_proof_number'] ?? 'NA' ?></th>
</tr>

</table>

</div>

</div>

</div>
</div>

</div>
</div>

<!-- ================= PART C ================= -->

<div class="row">
<div class="col-lg-12">

<div class="card">

<div class="card-header">
<h4 class="fw-bold">Part - C : Education Qualifications</h4>
</div>

<div class="card-body">

<div class="table-responsive">

<table class="table table-bordered">

<thead>
<tr>
<th>Exam Passed</th>
<th>Institute</th>
<th>Board / University</th>
<th>Subjects / Stream</th>
<th>Division</th>
<th>Percentage</th>
<th>Year of Passing</th>
</tr>
</thead>

<tbody>

<?php if (!empty($education)): ?>
<?php foreach ($education as $edu): ?>

<tr>
<td><?= $edu['exam_passed'] ?></td>
<td><?= $edu['institute'] ?></td>
<td><?= $edu['board_university'] ?></td>
<td><?= $edu['subjects_stream'] ?></td>
<td><?= $edu['division'] ?></td>
<td><?= $edu['percentage'] ?></td>
<td><?= $edu['year_of_passing'] ?></td>
</tr>

<?php endforeach; ?>
<?php else: ?>

<tr>
<td colspan="7" class="text-center">No records found</td>
</tr>

<?php endif; ?>

</tbody>

</table>

</div>

</div>
</div>

</div>
</div>

<!-- ================= PART D ================= -->

<div class="row">
<div class="col-lg-12">

<div class="card">

<div class="card-header">
<h4 class="fw-bold">Part - D : Uploaded Documents</h4>
</div>

<div class="card-body">

<table class="table table-borderless">

<!-- <tr>
<td>SSC Admit Card</td>
<td><a href="<?= base_url('uploads/documents/'.$documents['ssc_admit']) ?>" class="badge bg-success" target="_blank">Download</a></td>
</tr> -->

<tr>
<td>SSC Marksheet</td>
<td><a href="<?= base_url('uploads/documents/'.$documents['ssc_mark']) ?>" class="badge bg-success" target="_blank">Download</a></td>
</tr>

<!-- <tr>
<td>SSC Pass Certificate</td>
<td><a href="<?= base_url('uploads/documents/'.$documents['ssc_pass']) ?>" class="badge bg-success" target="_blank">Download</a></td>
</tr>

<tr>
<td>Intermediate Pass Certificate</td>
<td><a href="<?= base_url('uploads/documents/'.$documents['inter_pass']) ?>" class="badge bg-success" target="_blank">Download</a></td>
</tr> -->

<tr>
<td>Intermediate Marksheet</td>
<td><a href="<?= base_url('uploads/documents/'.$documents['inter_mark']) ?>" class="badge bg-success" target="_blank">Download</a></td>
</tr>

<!-- <tr>
<td>Employment ID Card</td>
<td><a href="<?= base_url('uploads/documents/'.$documents['emp_id']) ?>" class="badge bg-success" target="_blank">Download</a></td>
</tr> -->

<tr>
<td>Valid Photo ID Proof</td>
<td><a href="<?= base_url('uploads/documents/'.$documents['valid_id']) ?>" class="badge bg-success" target="_blank">Download</a></td>
</tr>

<tr>
<td>UG Marksheet</td>
<td><a href="<?= base_url('uploads/documents/'.$documents['ug_mark']) ?>" class="badge bg-success" target="_blank">Download</a></td>
</tr>

<!-- <tr>
<td>UG Pass Certificate</td>
<td><a href="<?= base_url('uploads/documents/'.$documents['ug_pass']) ?>" class="badge bg-success" target="_blank">Download</a></td>
</tr>

<tr>
<td>Age Proof</td>
<td><a href="<?= base_url('uploads/documents/'.$documents['age_proof']) ?>" class="badge bg-success" target="_blank">Download</a></td>
</tr> -->

<tr>
<td>Caste Certificate</td>
<td><a href="<?= base_url('uploads/documents/'.$documents['caste_certificate']) ?>" class="badge bg-success" target="_blank">Download</a></td>
</tr>

<tr>
<td>Student Declaration</td>
<td><a href="<?= base_url('uploads/documents/'.$documents['student_declaration']) ?>" class="badge bg-success" target="_blank">Download</a></td>
</tr>
</table>

</div>

<div class="card-footer text-end">
<?php if ($applicationStatus == 0) : ?>
<form action="<?= base_url('admin/final-submit/'.$application['id']) ?>" method="post">

<button class="btn btn-primary">
Final Submit
</button>

</form>
<?php endif; ?>
</div>

</div>

</div>
</div>

</div>
</div>
</div>
</main>