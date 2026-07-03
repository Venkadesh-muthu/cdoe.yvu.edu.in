<style>

.academic-scroll{
    overflow-x:auto;
}

.academic-table{
    min-width:1400px;
}

.academic-table th{
    white-space:nowrap;
}

.academic-table input{
    width:100%;
    min-width:250px;
}

</style>
<main class="nxl-container">

<div class="nxl-content">

<div class="page-header mb-4">

<div class="page-header-left d-flex align-items-center">

<div class="page-header-title">
<h5 class="m-b-10">Students</h5>
</div>

<ul class="breadcrumb mb-0">
<li class="breadcrumb-item">
<a href="<?= base_url('superadmin/dashboard') ?>">Home</a>
</li>
<li class="breadcrumb-item">
<a href="<?= base_url('superadmin/students') ?>">Students</a>
</li>
<li class="breadcrumb-item">Edit Students</li>
</ul>

</div>
</div>



<div class="main-content">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">


<form method="post"
action="<?= base_url('superadmin/update-student/'.$application_id) ?>"
enctype="multipart/form-data">

<input type="hidden" name="application_id" value="<?= $application_id ?>">


<!-- ================= PART A ================= -->

<div class="card mb-4">

<div class="card-header">
<h4 class="fw-bold">Part-A : Personal Details</h4>
<p class="text-danger mb-0">Fields marked * are mandatory</p>
</div>

<div class="card-body">

<!-- Personal Details -->
                                <div class="row">

                                    <div class="col-md-4 mb-3">
                                        <label>Full Name *</label>
                                        <input type="text" name="full_name" class="form-control" value="<?= $application['full_name'] ?? '' ?>"required>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Religion *</label>
                                        <select name="religion" class="form-control" required>
                                            <option value="">Select Religion</option>
                                            <option <?= (isset($application['religion']) && $application['religion'] == 'Hinduism') ? 'selected' : '' ?>>Hinduism</option>
                                            <option <?= (isset($application['religion']) && $application['religion'] == 'Islam') ? 'selected' : '' ?>>Islam</option>
                                            <option <?= (isset($application['religion']) && $application['religion'] == 'Christianity') ? 'selected' : '' ?>>Christianity</option>
                                            <option <?= (isset($application['religion']) && $application['religion'] == 'Sikhism') ? 'selected' : '' ?>>Sikhism</option>
                                            <option <?= (isset($application['religion']) && $application['religion'] == 'Buddhism') ? 'selected' : '' ?>>Buddhism</option>
                                            <option <?= (isset($application['religion']) && $application['religion'] == 'Jainism') ? 'selected' : '' ?>>Jainism</option>
                                            <option <?= (isset($application['religion']) && $application['religion'] == 'Others') ? 'selected' : '' ?>>Others</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Specify Religion</label>
                                        <input type="text" name="specify_religion" class="form-control" value="<?= $application['specify_religion'] ?? '' ?>">
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Date of Birth *</label>
                                        <input type="date" name="dob" class="form-control" value="<?= $application['dob'] ?? '' ?>" required>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Gender *</label>
                                        <select name="gender" class="form-control" required>
                                            <option value="">Select Gender</option>
                                            <option <?= (isset($application['gender']) && $application['gender'] == 'Male') ? 'selected' : '' ?>>Male</option>
                                            <option <?= (isset($application['gender']) && $application['gender'] == 'Female') ? 'selected' : '' ?>>Female</option>
                                            <option <?= (isset($application['gender']) && $application['gender'] == 'Others') ? 'selected' : '' ?>>Others</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Caste *</label>
                                        <select name="caste" class="form-control" required>
                                            <option value="">Select Caste</option>
                                            <option <?= (isset($application['caste']) && $application['caste'] == 'General') ? 'selected' : '' ?>>General</option>
                                            <option <?= (isset($application['caste']) && $application['caste'] == 'OBC') ? 'selected' : '' ?>>OBC</option>
                                            <option <?= (isset($application['caste']) && $application['caste'] == 'EWS') ? 'selected' : '' ?>>EWS</option>
                                            <option <?= (isset($application['caste']) && $application['caste'] == 'SC') ? 'selected' : '' ?>>SC</option>
                                            <option <?= (isset($application['caste']) && $application['caste'] == 'ST') ? 'selected' : '' ?>>ST</option>
                                            <option <?= (isset($application['caste']) && $application['caste'] == 'PWD') ? 'selected' : '' ?>>PWD</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Marital Status *</label>
                                        <select name="marital_status" class="form-control" required>
                                            <option <?= (isset($application['marital_status']) && $application['marital_status'] == 'Unmarried') ? 'selected' : '' ?>>Unmarried</option>
                                            <option <?= (isset($application['marital_status']) && $application['marital_status'] == 'Married') ? 'selected' : '' ?>>Married</option>
                                            <option <?= (isset($application['marital_status']) && $application['marital_status'] == 'Divorced') ? 'selected' : '' ?>>Divorced</option>
                                            <option <?= (isset($application['marital_status']) && $application['marital_status'] == 'Widowed') ? 'selected' : '' ?>>Widowed</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Nationality *</label>
                                        <input type="text" name="nationality" class="form-control" value="<?= $application['nationality'] ?? 'Indian' ?>" required>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>State of Domicile</label>
                                        <select name="domicile_state" class="form-control">
                                            <option <?= (isset($application['domicile_state']) && $application['domicile_state'] == 'Andhra Pradesh') ? 'selected' : '' ?>>Andhra Pradesh</option>
                                            <option <?= (isset($application['domicile_state']) && $application['domicile_state'] == 'Tamil Nadu') ? 'selected' : '' ?>>Tamil Nadu</option>
                                            <option <?= (isset($application['domicile_state']) && $application['domicile_state'] == 'Karnataka') ? 'selected' : '' ?>>Karnataka</option>
                                            <option <?= (isset($application['domicile_state']) && $application['domicile_state'] == 'Kerala') ? 'selected' : '' ?>>Kerala</option>
                                            <option <?= (isset($application['domicile_state']) && $application['domicile_state'] == 'Telangana') ? 'selected' : '' ?>>Telangana</option>
                                        </select>
                                    </div>

                                </div>

                                <hr>
                                <!-- Permanent Address -->
                                <h5 class="mb-3">Permanent Address</h5>

                                <div class="row">

                                    <div class="col-md-4 mb-3">
                                        <label>Village/Town</label>
                                        <input type="text" name="per_village" class="form-control" value="<?= $permanent['village'] ?? '' ?>">
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Post Office</label>
                                        <input type="text" name="per_post" class="form-control" value="<?= $permanent['post_office'] ?? '' ?>">
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Police Station</label>
                                        <input type="text" name="per_ps" class="form-control" value="<?= $permanent['police_station'] ?? '' ?>">
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>District</label>
                                        <input type="text" name="per_district" class="form-control" value="<?= $permanent['district'] ?? '' ?>">
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Pin Code</label>
                                        <input type="text" name="per_pin" class="form-control" value="<?= $permanent['pin'] ?? '' ?>">
                                    </div>

                                </div>

                                <hr>

                                <!-- Communication Address -->
                                <h5 class="mb-3">Communication Address</h5>

                                <div class="row">

                                    <div class="col-md-4 mb-3">
                                        <label>Village/Town</label>
                                        <input type="text" name="com_village" class="form-control" value="<?= $communication['village'] ?? '' ?>">
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Post Office</label>
                                        <input type="text" name="com_post" class="form-control" value="<?= $communication['post_office'] ?? '' ?>">
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Police Station</label>
                                        <input type="text" name="com_ps" class="form-control" value="<?= $communication['police_station'] ?? '' ?>">
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>District</label>
                                        <input type="text" name="com_district" class="form-control" value="<?= $communication['district'] ?? '' ?>">
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Pin Code</label>
                                        <input type="text" name="com_pin" class="form-control" value="<?= $communication['pin'] ?? '' ?>">
                                    </div>

                                </div>

                                <hr>

                                <!-- Contact Details -->
                                <div class="row">

                                    <div class="col-md-4 mb-3">
                                        <label>Alternative Email *</label>
                                        <input type="email" name="alt_email" class="form-control" value="<?= $application['alternative_email'] ?? '' ?>" required>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Annual Household Income *</label>
                                        <input type="text" name="annual_income" class="form-control" value="<?= $application['annual_income'] ?? '' ?>" required>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Locality *</label>
                                        <select name="locality" class="form-control" required>
                                            <option <?= (isset($application['locality']) && $application['locality'] == 'Urban') ? 'selected' : '' ?>>Urban</option>
                                            <option <?= (isset($application['locality']) && $application['locality'] == 'Rural') ? 'selected' : '' ?>>Rural</option>
                                        </select>
                                    </div>

                                </div>

                                <hr>

                                <!-- ID Details -->
                                <div class="row">

                                    <div class="col-md-4 mb-3">
                                        <label>Valid ID Proof *</label>
                                        <select name="id_proof_type" class="form-control" required>
                                            <option <?= (isset($application['id_proof_type']) && $application['id_proof_type'] == 'PAN Card') ? 'selected' : '' ?>>PAN Card</option>
                                            <option <?= (isset($application['id_proof_type']) && $application['id_proof_type'] == 'Voter id') ? 'selected' : '' ?>>Voter id</option>
                                            <option <?= (isset($application['id_proof_type']) && $application['id_proof_type'] == 'AADHAR Card') ? 'selected' : '' ?>>AADHAR Card</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>ID Proof Number *</label>
                                        <input type="text" name="id_proof_number" class="form-control" value="<?= $application['id_proof_number'] ?? '' ?>" required>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Employment Status *</label>
                                        <select name="employment_status" class="form-control" required>
                                            <option <?= (isset($application['employment_status']) && $application['employment_status'] == 'No') ? 'selected' : '' ?>>No</option>
                                            <option <?= (isset($application['employment_status']) && $application['employment_status'] == 'Yes') ? 'selected' : '' ?>>Yes</option>
                                        </select>
                                    </div>

                                </div>

                                <hr>

                                <!-- Parent Details -->
                                <div class="row">

                                    <div class="col-md-4 mb-3">
                                        <label>Father Name *</label>
                                        <input type="text" name="father_name" class="form-control" value="<?= $family['father_name'] ?? '' ?>" required>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Father Occupation *</label>
                                        <input type="text" name="father_occupation" class="form-control" value="<?= $family['father_occupation'] ?? '' ?>" required>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Mother Name *</label>
                                        <input type="text" name="mother_name" class="form-control" value="<?= $family['mother_name'] ?? '' ?>" required>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Mother Occupation *</label>
                                        <input type="text" name="mother_occupation" class="form-control" value="<?= $family['mother_occupation'] ?? '' ?>" required>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Guardian Name</label>
                                        <input type="text" name="guardian_name" class="form-control" value="<?= $family['guardian_name'] ?? '' ?>">
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Guardian Phone</label>
                                        <input type="text" name="guardian_mobile" class="form-control" value="<?= $family['guardian_mobile'] ?? '' ?>">
                                    </div>

                                </div>

                                <hr>

                                <!-- Common Fields -->

                                <div class="row">

                                    <div class="col-md-4 mb-3">
                                        <label>Do you belong to Minority? *</label>
                                        <select name="minority" class="form-control" required>
                                            <option value="">Select</option>
                                            <option value="Yes" <?= (isset($application['minority']) && $application['minority'] == 'Yes') ? 'selected' : '' ?>>Yes</option>
                                            <option value="No" <?= (isset($application['minority']) && $application['minority'] == 'No') ? 'selected' : '' ?>>No</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Differently Abled *</label>
                                        <select name="differently_abled" class="form-control" required>
                                            <option value="">Select</option>
                                            <option value="No" <?= (isset($application['differently_abled']) && $application['differently_abled'] == 'No') ? 'selected' : '' ?>>No</option>
                                            <option value="Yes" <?= (isset($application['differently_abled']) && $application['differently_abled'] == 'Yes') ? 'selected' : '' ?>>Yes</option>
                                        </select>
                                    </div>

                                </div>

                                <hr>

                                <!-- Government Details -->
                                <div class="row">

                                    <div class="col-md-4 mb-3">
                                        <label>ABC ID *</label>
                                        <input type="text" name="abc_id" class="form-control" value="<?= $application['abc_id'] ?? '' ?>" required>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Aadhar Number *</label>
                                        <input type="text" name="aadhar" class="form-control" value="<?= $application['aadhar_number'] ?? '' ?>" required>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Aadhar Linked Mobile *</label>
                                        <input type="text" name="aadhar_mobile" class="form-control" value="<?= $application['aadhar_mobile'] ?? '' ?>" required>
                                    </div>

                                </div>

                                <hr>

                                <div class="row">

                                    <!-- Centre Type -->
                                    <div class="col-md-4 mb-3">
                                        <label>Centre Type *</label>
                                        <select name="centre_type" id="centre_type" class="form-control" required>
                                            <option value="">Select</option>

                                            <option value="LSC"
                                                <?= (isset($application['centre_type']) && $application['centre_type'] == 'LSC') ? 'selected' : '' ?>>
                                                LSC
                                            </option>

                                            <option value="EXAM_CENTER"
                                                <?= (isset($application['centre_type']) && $application['centre_type'] == 'EXAM_CENTER') ? 'selected' : '' ?>>
                                                Exam Centre
                                            </option>

                                        </select>
                                    </div>

                                    <!-- Centre Name -->
                                    <div class="col-md-8 mb-3">
                                        <label>Centre Name *</label>
                                        <select name="centre_id" id="centre_id" class="form-control" required>
                                            <option value="">Select Centre</option>

                                            <?php foreach ($centres as $centre): ?>
                                                <option 
                                                    value="<?= $centre['id'] ?>"
                                                    data-type="<?= $centre['centre_type'] ?>"
                                                    <?= (isset($application['centre_id']) && $application['centre_id'] == $centre['id']) ? 'selected' : '' ?>
                                                >
                                                    <?= $centre['centre_name'] ?>
                                                </option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>

                                </div>

</div>
</div>



<!-- ================= PART B ================= -->

<div class="card mb-4">

<div class="card-header">
<h4 class="fw-bold">Part-B : Photo & Signature</h4>
</div>

<div class="card-body">

<div class="row text-center">

<div class="col-md-6">

<label>Photo</label>

<?php if (!empty($upload['photo'])): ?>

<img src="<?= base_url('uploads/photos/'.$upload['photo']) ?>"
class="img-thumbnail"
width="120" style="width:120px;height:120px;object-fit:cover;border-radius:6px;border:1px solid #ddd;padding:3px;">

<input type="hidden"
name="old_photo"
value="<?= $upload['photo'] ?>">

<?php endif; ?>

<input type="file"
name="photo"
class="form-control">

</div>



<div class="col-md-6">

<label>Signature</label>

<?php if (!empty($upload['signature'])): ?>

<img src="<?= base_url('uploads/signatures/'.$upload['signature']) ?>"
class="img-thumbnail"
width="120" style="width:120px;height:120px;object-fit:cover;border-radius:6px;border:1px solid #ddd;padding:3px;">

<input type="hidden"
name="old_signature"
value="<?= $upload['signature'] ?>">

<?php endif; ?>

<input type="file"
name="signature"
class="form-control">

</div>

</div>

</div>

</div>



<!-- ================= PART C ================= -->

<div class="card mb-4">

<div class="card-header">
<h4 class="fw-bold">Part-C : Academic Details</h4>
</div>

<div class="card-body">

<button type="button"
class="btn btn-success mb-3"
onclick="addRow()">

Add Row

</button>

<div class="table-responsive">

<table class="table table-bordered academic-table">

<thead>

<tr>

<th>Exam</th>
<th>Institute</th>
<th>Board</th>
<th>Subjects</th>
<th>Division</th>
<th>Percentage</th>
<th>Year</th>
<th>Action</th>

</tr>

</thead>


<tbody id="academicTable">

<?php if (!empty($education)): ?>

<?php foreach ($education as $key => $row): ?>

<tr>

<td><input type="text" name="education[<?= $key ?>][exam_passed]" class="form-control" value="<?= $row['exam_passed'] ?>"></td>

<td><input type="text" name="education[<?= $key ?>][institute]" class="form-control" value="<?= $row['institute'] ?>"></td>

<td><input type="text" name="education[<?= $key ?>][board]" class="form-control" value="<?= $row['board_university'] ?>"></td>

<td><input type="text" name="education[<?= $key ?>][subjects]" class="form-control" value="<?= $row['subjects_stream'] ?>"></td>

<td><input type="text" name="education[<?= $key ?>][division]" class="form-control" value="<?= $row['division'] ?>"></td>

<td><input type="text" name="education[<?= $key ?>][percentage]" class="form-control" value="<?= $row['percentage'] ?>"></td>

<td><input type="text" name="education[<?= $key ?>][year]" class="form-control" value="<?= $row['year_of_passing'] ?>"></td>

<td>
<button type="button"
class="btn btn-danger btn-sm"
onclick="removeRow(this)">Remove</button>
</td>

</tr>

<?php endforeach; ?>

<?php endif; ?>

</tbody>

</table>

</div>

</div>

</div>



<!-- ================= PART D ================= -->

<div class="card mb-4">

<div class="card-header">
<h4 class="fw-bold">Part-D : Documents</h4>
</div>

<div class="card-body">

<input type="hidden"
                                name="application_id"
                                value="<?= $application_id ?>">


                            <!-- Row 1 -->
                            <div class="row">
                                <!-- SSC Mark -->
                                <div class="col-md-6 text-center">

                                    <p>SSC Marksheet *</p>

                                    <?php if (!empty($docs['ssc_mark'])): ?>

                                        <div class="mb-2">
                                            <a href="<?= base_url('uploads/documents/'.$docs['ssc_mark']) ?>" target="_blank">
                                                View File
                                            </a>
                                        </div>

                                        <input type="hidden"
                                            name="old_ssc_mark"
                                            value="<?= $docs['ssc_mark'] ?>">

                                    <?php endif; ?>

                                    <input type="file"
                                        name="ssc_mark"
                                        class="form-control"
                                        accept=".jpg,.jpeg,.png,.pdf"
                                        <?= empty($docs['ssc_mark']) ? 'required' : '' ?>>

                                    <small class="text-muted">
                                        Allowed: jpg, jpeg, png, pdf | Max: 2MB
                                    </small>

                                </div>
                                <div class="col-md-6 text-center">

                                    <p>Intermediate Marksheet *</p>

                                    <?php if (!empty($docs['inter_mark'])): ?>

                                        <div class="mb-2">
                                            <a href="<?= base_url('uploads/documents/'.$docs['inter_mark']) ?>" target="_blank">
                                                View File
                                            </a>
                                        </div>

                                        <input type="hidden"
                                            name="old_inter_mark"
                                            value="<?= $docs['inter_mark'] ?>">

                                    <?php endif; ?>

                                    <input type="file"
                                        name="inter_mark"
                                        class="form-control"
                                        accept=".jpg,.jpeg,.png,.pdf"
                                        <?= empty($docs['inter_mark']) ? 'required' : '' ?>>

                                    <small class="text-muted">
                                        Allowed: jpg, jpeg, png, pdf | Max: 2MB
                                    </small>

                                </div>
                            </div>

                            <hr>

                            <!-- Row 3 -->
                            <div class="row">

                                <div class="col-md-4 text-center">

                                    <p>Valid Photo ID *</p>

                                    <?php if (!empty($docs['valid_id'])): ?>

                                        <div class="mb-2">
                                            <a href="<?= base_url('uploads/documents/'.$docs['valid_id']) ?>" target="_blank">
                                                View File
                                            </a>
                                        </div>

                                        <input type="hidden"
                                            name="old_valid_id"
                                            value="<?= $docs['valid_id'] ?>">

                                    <?php endif; ?>

                                    <input type="file"
                                        name="valid_id"
                                        class="form-control"
                                        accept=".jpg,.jpeg,.png,.pdf"
                                        <?= empty($docs['valid_id']) ? 'required' : '' ?>>

                                    <small class="text-muted">
                                        Allowed: jpg, jpeg, png, pdf | Max: 2MB
                                    </small>

                                </div>


                                <div class="col-md-4 text-center">

                                    <p>UG Marksheet *</p>

                                    <?php if (!empty($docs['ug_mark'])): ?>

                                        <div class="mb-2">
                                            <a href="<?= base_url('uploads/documents/'.$docs['ug_mark']) ?>" target="_blank">
                                                View File
                                            </a>
                                        </div>

                                        <input type="hidden"
                                            name="old_ug_mark"
                                            value="<?= $docs['ug_mark'] ?>">

                                    <?php endif; ?>

                                    <input type="file"
                                        name="ug_mark"
                                        class="form-control"
                                        accept=".jpg,.jpeg,.png,.pdf"
                                        <?= empty($docs['ug_mark']) ? 'required' : '' ?>>

                                    <small class="text-muted">
                                        Allowed: jpg, jpeg, png, pdf | Max: 2MB
                                    </small>

                                </div>

                                <div class="col-md-4 text-center">

                                    <p>Caste Certificate</p>

                                    <?php if (!empty($docs['caste_certificate'])): ?>

                                        <div class="mb-2">
                                            <a href="<?= base_url('uploads/documents/'.$docs['caste_certificate']) ?>" target="_blank">
                                                View File
                                            </a>
                                        </div>

                                        <input type="hidden"
                                            name="old_caste_certificate"
                                            value="<?= $docs['caste_certificate'] ?>">

                                    <?php endif; ?>

                                    <input type="file"
                                        name="caste_certificate"
                                        class="form-control"
                                        accept=".jpg,.jpeg,.png,.pdf">

                                    <small class="text-muted">
                                        Allowed: jpg, jpeg, png, pdf | Max: 2MB
                                    </small>

                                </div>

                            </div>

                            <hr>

                            <div class="row mt-4">

                                <div class="col-md-12 text-center">

                                    <p><b>Student Declaration *</b></p>

                                    <!-- Download Declaration Form -->
                                    <div class="mb-2">
                                        <a href="<?= base_url('admin-template/assets/document/STUDENT DECLARATION.docx') ?>" 
                                        class="btn btn-sm btn-primary" 
                                        target="_blank">
                                            Download Declaration Form
                                        </a>
                                    </div>

                                    <?php if (!empty($docs['student_declaration'])): ?>

                                        <div class="mb-2">
                                            <a href="<?= base_url('uploads/documents/'.$docs['student_declaration']) ?>" target="_blank">
                                                View Uploaded Declaration
                                            </a>
                                        </div>

                                        <input type="hidden"
                                            name="old_student_declaration"
                                            value="<?= $docs['student_declaration'] ?>">

                                    <?php endif; ?>

                                    <!-- Upload Declaration -->
                                    <input type="file"
                                        name="student_declaration"
                                        class="form-control"
                                        accept=".jpg,.jpeg,.png,.pdf, .docx"
                                        <?= empty($docs['student_declaration']) ? 'required' : '' ?>>

                                </div>

                            </div>

</div>

</div>

<div class="card mb-4">

<div class="card-header d-flex justify-content-between align-items-center">
    <h4 class="fw-bold mb-0">Payment Details</h4>
</div>

<div class="card-body">

<div class="row">

    <!-- Course -->
    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Course</label>

        <input 
            type="text"
            class="form-control"
            value="<?= $application['programme_name'] ?? '' ?>"
            disabled
        >

        <input 
            type="hidden"
            name="course"
            value="<?= $application['programme_name'] ?? '' ?>"
        >
    </div>

    <!-- Payment Mode -->
    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Payment Mode</label>

        <select name="payment_mode" class="form-control">

            <option value="">Select Payment Mode</option>

            <option value="UPI" <?= (($payment['payment_mode'] ?? '') == 'UPI') ? 'selected' : '' ?>>UPI</option>
            <option value="Net Banking" <?= (($payment['payment_mode'] ?? '') == 'Net Banking') ? 'selected' : '' ?>>Net Banking</option>
            <option value="Debit Card" <?= (($payment['payment_mode'] ?? '') == 'Debit Card') ? 'selected' : '' ?>>Debit Card</option>
            <option value="Credit Card" <?= (($payment['payment_mode'] ?? '') == 'Credit Card') ? 'selected' : '' ?>>Credit Card</option>
            <option value="Bank Transfer" <?= (($payment['payment_mode'] ?? '') == 'Bank Transfer') ? 'selected' : '' ?>>Bank Transfer</option>

        </select>
    </div>

    <!-- Transaction ID -->
    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Transaction ID</label>

        <input
            type="text"
            name="transaction_id"
            class="form-control"
            placeholder="Enter Transaction ID"
            value="<?= $payment['transaction_id'] ?? '' ?>"
        >
    </div>

    <!-- Payment Date -->
    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Payment Date</label>

        <input
            type="date"
            name="payment_date"
            class="form-control"
            value="<?= $payment['payment_date'] ?? '' ?>"
        >
    </div>

    <!-- Amount -->
    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Amount</label>

        <input
            type="number"
            name="amount"
            class="form-control"
            placeholder="Enter Amount"
            value="<?= $payment['amount'] ?? '' ?>"
        >
    </div>

    <!-- Upload Receipt -->
    <div class="col-md-6 mb-3">

        <label class="form-label fw-bold">Upload Payment Receipt</label>

        <?php if (!empty($payment['receipt'] ?? null)) : ?>

            <?php
                $file = $payment['receipt'];
            $ext  = pathinfo($file, PATHINFO_EXTENSION);
            ?>

            <div class="mb-2">

                <?php if (in_array(strtolower($ext), ['jpg','jpeg','png'])) : ?>

                    <img
                        src="<?= base_url('uploads/payment/' . $file) ?>"
                        style="width:120px;height:120px;object-fit:cover;border:1px solid #ddd;padding:3px;border-radius:6px;"
                    >

                <?php elseif (strtolower($ext) == 'pdf') : ?>

                    <a href="<?= base_url('uploads/payment/' . $file) ?>" target="_blank" class="btn btn-sm btn-info">
                        View Uploaded Receipt (PDF)
                    </a>

                <?php endif; ?>

            </div>

            <input type="hidden" name="old_receipt" value="<?= $file ?>">

        <?php endif; ?>

        <input
            type="file"
            name="receipt"
            class="form-control"
            accept=".jpg,.jpeg,.png,.pdf"
        >

    </div>

</div>

</div>

</div>

<div class="text-center mb-5">

<button type="submit"
class="btn btn-primary btn-lg px-5">

Update Student

</button>

</div>

</form>


</div>
</div>
</div>
</div>
</div>

</div>
</main>
<div class="modal fade" id="uploadInstruction" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">
                Photo & Signature Upload Instructions
            </h5>

            <button 
                type="button"
                class="btn-close"
                data-bs-dismiss="modal">
            </button>
        </div>

        <div class="modal-body">

            <ul>
                <li>Photograph must be a recent passport size photo.</li>
                <li>Allowed formats: JPG, JPEG, PNG.</li>
                <li>Photo size should be between <strong>20KB – 100KB</strong>.</li>
                <li>Signature size should be between <strong>10KB – 50KB</strong>.</li>
                <li>Photo background should be white or light color.</li>
                <li>Signature must be done using black or blue ink.</li>
            </ul>

        </div>

        <div class="modal-footer">
            <button 
                class="btn btn-secondary"
                data-bs-dismiss="modal">
                Close
            </button>
        </div>

    </div>
</div>

</div>

<div class="modal fade" id="docInstruction" tabindex="-1">

<div class="modal-dialog modal-lg">

    <div class="modal-content">

        <div class="modal-header">

            <h5 class="modal-title">
                Document Upload Instructions
            </h5>

            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

        </div>


        <div class="modal-body">

            <div class="table-responsive">

                <table class="table table-bordered">

                    <thead class="table-light">
                        <tr>
                            <th>File Name</th>
                            <th>File Format</th>
                            <th>File Size</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>SSC Admit Card</td>
                            <td>jpg, jpeg, png, pdf</td>
                            <td>Within 2 MB</td>
                        </tr>

                        <tr>
                            <td>SSC Marksheet</td>
                            <td>jpg, jpeg, png, pdf</td>
                            <td>Within 2 MB</td>
                        </tr>

                        <tr>
                            <td>SSC Pass Certificate</td>
                            <td>jpg, jpeg, png, pdf</td>
                            <td>Within 2 MB</td>
                        </tr>

                        <tr>
                            <td>Intermediate/12th Pass Certificate</td>
                            <td>jpg, jpeg, png, pdf</td>
                            <td>Within 2 MB</td>
                        </tr>

                        <tr>
                            <td>Intermediate/12th Marksheet</td>
                            <td>jpg, jpeg, png, pdf</td>
                            <td>Within 2 MB</td>
                        </tr>

                        <tr>
                            <td>Employment ID Card (If Employed)</td>
                            <td>jpg, jpeg, png, pdf</td>
                            <td>Within 2 MB</td>
                        </tr>

                        <tr>
                            <td>Valid Photo ID Proof (PAN / AADHAR / VOTER ID)</td>
                            <td>jpg, jpeg, png, pdf</td>
                            <td>Within 2 MB</td>
                        </tr>

                        <tr>
                            <td>UG Degree Final Marksheet / Consolidated Marksheet</td>
                            <td>jpg, jpeg, png, pdf</td>
                            <td>Within 2 MB</td>
                        </tr>

                        <tr>
                            <td>UG Degree Pass Certificate / Provisional Certificate</td>
                            <td>jpg, jpeg, png, pdf</td>
                            <td>Within 2 MB</td>
                        </tr>

                        <tr>
                            <td>Age Proof (DOB Document)</td>
                            <td>jpg, jpeg, png, pdf</td>
                            <td>Within 2 MB</td>
                        </tr>

                        <tr>
                            <td>Caste Certificate (If Applicable)</td>
                            <td>jpg, jpeg, png, pdf</td>
                            <td>Within 2 MB</td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </div>


        <div class="modal-footer">

            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                Close
            </button>

        </div>

    </div>

</div>
</div>
<!-- Bootstrap JS (required for modal) -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>

let rowIndex = <?= !empty($education) ? count($education) : 1 ?>;

function addRow(){

    var table = document.getElementById("academicTable");

    var row = table.insertRow();

    row.innerHTML = `

    <td>
        <input type="text" name="education[${rowIndex}][exam_passed]" class="form-control">
    </td>

    <td>
        <input type="text" name="education[${rowIndex}][institute]" class="form-control">
    </td>

    <td>
        <input type="text" name="education[${rowIndex}][board]" class="form-control">
    </td>

    <td>
        <input type="text" name="education[${rowIndex}][subjects]" class="form-control">
    </td>

    <td>
        <input type="text" name="education[${rowIndex}][division]" class="form-control">
    </td>

    <td>
        <input type="text" name="education[${rowIndex}][percentage]" class="form-control">
    </td>

    <td>
        <input type="text" name="education[${rowIndex}][year]" class="form-control">
    </td>

    <td class="text-center">
        <button
            type="button"
            class="btn btn-danger btn-sm"
            onclick="removeRow(this)">
            Remove
        </button>
    </td>

    `;

    rowIndex++;

}


function removeRow(button){

    button.closest("tr").remove();

}

</script>
<script>
    document.addEventListener("DOMContentLoaded", function(){

        const centreType = document.getElementById("centre_type");
        const centreSelect = document.getElementById("centre_id");
        const options = centreSelect.querySelectorAll("option");

        function filterCentres(){

            const selectedType = centreType.value;

            // reset centre selection
            centreSelect.value = "";

            options.forEach(option => {

                if(option.value === ""){
                    option.hidden = false;
                    return;
                }

                if(option.getAttribute("data-type") === selectedType){
                    option.hidden = false;
                } else {
                    option.hidden = true;
                }

            });

        }

        centreType.addEventListener("change", filterCentres);

    });
</script>