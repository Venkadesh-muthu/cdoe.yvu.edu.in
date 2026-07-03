<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>YVU Code Registration</title>

    <link rel="shortcut icon" href="<?= base_url('admin-template/assets/images/yvu150-150.png') ?>">

    <link rel="stylesheet" href="<?= base_url('admin-template/assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('admin-template/assets/vendors/css/vendors.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('admin-template/assets/css/theme.min.css') ?>">

</head>

<body>

<main class="auth-minimal-wrapper">

    <div class="auth-minimal-inner">

        <div class="container">

            <div class="row justify-content-center">

                <!-- REGISTER CARD -->
                <div class="col-lg-6 col-md-6">

                    <div class="card mb-4 mt-5 mx-4 mx-sm-0 position-relative">

                        <div class="wd-50 bg-white p-2 rounded-circle shadow-lg position-absolute translate-middle top-0 start-50">
                            <img src="<?= base_url('admin-template/assets/images/yvu150-150.png') ?>" class="img-fluid">
                        </div>

                        <div class="card-body p-sm-5">

                            <h2 class="fs-20 fw-bolder mb-4 text-center">
                                Create your Account
                            </h2>

                            <div class="row mb-3">

                                <div class="col-6">
                                    <a href="<?= base_url('/admin/login') ?>" class="btn btn-primary btn-lg w-100">
                                        Already have account?
                                    </a>
                                </div>

                                <div class="col-6">
                                    <a href="https://deb.ugc.ac.in/StudentDEBId" target="_blank" class="btn btn-primary btn-lg w-100">
                                        Get DEB ID
                                    </a>
                                </div>

                            </div>
                            <?php if (isset($error)): ?>
                                <div class="alert alert-danger text-center">
                                    <?= $error ?>
                                </div>
                            <?php endif; ?>
                            <?php if (isset($validation)): ?>
                                <div class="alert alert-danger">
                                    <?= $validation->listErrors() ?>
                                </div>
                            <?php endif; ?>
                            <!-- DEB VALIDATION FORM -->
                            <form method="post" action="<?= base_url('admin/validateDeb') ?>">

                                <div class="mb-3">
                                    <label class="form-label">
                                        Enter your valid DEB ID
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        name="devid"
                                        class="form-control"
                                        placeholder="Enter DEB ID"
                                        required
                                    >
                                </div>

                                <button type="submit" class="btn btn-outline-info btn-lg w-100">
                                    Validate
                                </button>

                            </form>

                            <?php if (isset($student)): ?>

                                <hr>

                                <div class="alert alert-success text-center">
                                    Data fetched successfully.
                                </div>

                                <?php $s = $student; ?>

                                <form method="post" action="<?= base_url('admin/registerStudent') ?>">

                                    <div class="row mb-3">

                                        <div class="col-md-6">
                                            <label>Session <span class="text-danger">*</span></label>
                                            <select name="session_id" class="form-control" required>
                                                <option value="">--Select Your Session--</option>
                                                <option value="10">2026 (Spring)</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label>LSC Reference ID</label>
                                            <input type="text" name="lsc" class="form-control">
                                        </div>

                                    </div>


                                    <div class="row mb-3">

                                        <div class="col-md-6">
                                            <label>Student ID</label>
                                            <input type="text" class="form-control" name="studentID" value="<?= $s['StudentID'] ?>" readonly>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name" value="<?= $s['stdname'] ?>" readonly>
                                        </div>

                                    </div>


                                    <div class="row mb-3">

                                        <div class="col-md-6">
                                            <label>Mobile</label>
                                            <input type="text" class="form-control" name="mobile" value="<?= $s['mobile'] ?>" readonly>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="email" value="<?= $s['email'] ?>" readonly>
                                        </div>

                                    </div>


                                    <div class="row mb-3">

                                        <div class="col-md-6">
                                            <label>Gender</label>
                                            <input type="text" class="form-control" name="gender" value="<?= $s['Gender'] ?>" readonly>
                                        </div>

                                        <div class="col-md-6">
                                            <label>DOB</label>
                                            <input type="text" class="form-control" name="dob" value="<?= $s['DOB'] ?>" readonly>
                                        </div>

                                    </div>


                                    <div class="row mb-3">

                                        <div class="col-md-6">
                                            <label>ABC ID</label>
                                            <input type="text" class="form-control" name="abcid" value="<?= $s['ABCID'] ?>" readonly>
                                        </div>

                                        <div class="col-md-6">
                                            <label>DEB Unique ID</label>
                                            <input type="text" class="form-control" name="debuniqueid" value="<?= $s['DEBUniqueID'] ?>" readonly>
                                        </div>

                                    </div>


                                    <!-- Hidden values from API -->

                                    <input type="hidden" name="program" value="<?= $s['Program'] ?>">
                                    <input type="hidden" name="fathername" value="<?= $s['fathername'] ?>">
                                    <input type="hidden" name="cdate" value="<?= $s['cdate'] ?>">
                                    <input type="hidden" name="institutename" value="<?= $s['institutename'] ?>">
                                    <input type="hidden" name="instituteid" value="<?= $s['InstituteID'] ?>">
                                    <input type="hidden" name="ipaddress" value="<?= $s['ipaddress'] ?>">
                                    <input type="hidden" name="programcode" value="<?= $s['programcode'] ?>">
                                    <input type="hidden" name="mode" value="<?= $s['mode'] ?>">
                                    <input type="hidden" name="admissiondate" value="<?= $s['AdmissionDate'] ?>">
                                    <input type="hidden" name="admissiondetails" value="<?= $s['AdmissionDetails'] ?>">
                                    <input type="hidden" name="universityname" value="<?= $s['UniversityName'] ?>">
                                    <input type="hidden" name="coursename" value="<?= $s['CourseName'] ?>">
                                    <input type="hidden" name="enrollmentnumber" value="<?= $s['EnrollmentNumber'] ?>">
                                    <input type="hidden" name="uniquenumber" value="<?= $s['UniqueNumber'] ?>">
                                    <input type="hidden" name="document" value="<?= $s['Document'] ?>">
                                    <input type="hidden" name="category" value="<?= $s['Category'] ?>">
                                    <input type="hidden" name="governmentidentifier" value="<?= $s['GovernmentIdentifier'] ?>">
                                    <input type="hidden" name="governmentidentifiernumber" value="<?= $s['GovernmentIdentifierNumber'] ?>">
                                    <input type="hidden" name="nationality" value="<?= $s['Nationality'] ?>">
                                    <input type="hidden" name="countryresidence" value="<?= $s['CountryResidence'] ?>">
                                    <input type="hidden" name="locality" value="<?= $s['Locality'] ?>">
                                    <input type="hidden" name="bulkdebiddata" value="<?= $s['BulkDEBIDData'] ?>">
                                    <input type="hidden" name="modeeducation" value="<?= $s['ModeEducation'] ?>">
                                    <input type="hidden" name="year" value="<?= $s['Year'] ?>">
                                    <input type="hidden" name="session_api" value="<?= $s['session'] ?>">
                                    <input type="hidden" name="list" value="<?= $s['_list'] ?>">


                                    <div class="row mb-3">

                                        <div class="col-md-6">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control" name="c_password" required>
                                        </div>

                                    </div>


                                    <button type="submit" class="btn btn-success w-100">
                                        Register
                                    </button>

                                </form>

                            <?php endif; ?>

                        </div>

                    </div>

                </div>


                <!-- INSTRUCTIONS CARD -->
                <div class="col-lg-6 col-md-6">

                    <div class="card mb-4 mt-5 mx-4 mx-sm-0">

                        <div class="card-body p-sm-5">

                            <h3 class="text-center mb-3">
                                Registration Instructions
                            </h3>

                            <ul>
                                <li>Scanned Photograph (100 KB)</li>
                                <li>Scanned Signature (100 KB)</li>
                                <li>SSC Mark Sheet</li>
                                <li>SSC Admit Card</li>
                                <li>SSC Pass Certificate</li>
                                <li>Intermediate/12th Mark Sheet</li>
                                <li>Intermediate/12th Pass Certificate</li>
                                <li>UG Degree Mark Sheet</li>
                                <li>UG Degree Certificate</li>
                            </ul>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</main>
<?php if (isset($warning)): ?>

<div class="modal fade" id="debWarningModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header bg-warning">
        <h5 class="modal-title text-white">Warning</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body text-center">
        <p class="mb-0">
          <?= $warning; ?>
        </p>
      </div>

      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
          OK
        </button>
      </div>

    </div>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    var warningModal = new bootstrap.Modal(document.getElementById('debWarningModal'));
    warningModal.show();
});
</script>

<?php endif; ?>
<script src="<?= base_url('admin-template/assets/vendors/js/vendors.min.js') ?>"></script>
<script src="<?= base_url('admin-template/assets/js/common-init.min.js') ?>"></script>

</body>
</html>