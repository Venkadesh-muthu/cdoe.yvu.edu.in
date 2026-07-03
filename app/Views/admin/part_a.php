<main class="nxl-container">
    <div class="nxl-content">

        <!-- ================= Page Header ================= -->
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
                </ul>

            </div>
        </div>


        <!-- ================= Main Content ================= -->
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">

                        <div class="card-header">
                            <h4 class="fw-bold">Part - A : Personal Details</h4>
                            <p class="text-danger">All the fields marked with * are mandatory</p>
                        </div>

                        <div class="card-body">

                            <form method="post" action="<?= base_url('admin/part-a/store') ?>">
                                <input type="hidden" name="programme" value="<?= $programme_id ?>">
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
                                            <option value="" disabled selected>Select Marital Status</option>
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
                                            <option value="" disabled selected>Select State</option>
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
                                            <option value="" disabled selected>Select Locality</option>
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
                                            <option value=""disabled selected>Select ID Proof</option>
                                            <option <?= (isset($application['id_proof_type']) && $application['id_proof_type'] == 'PAN Card') ? 'selected' : '' ?>>PAN Card</option>
                                            <option <?= (isset($application['id_proof_type']) && $application['id_proof_type'] == 'Voter id') ? 'selected' : '' ?>>Voter ID</option>
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
                                            <option value="" disabled selected>Select Employment Status</option>
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
                                        <label>Father/Mother Phone</label>
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

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save & Next
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