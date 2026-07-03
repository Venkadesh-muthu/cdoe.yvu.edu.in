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
                    <li class="breadcrumb-item">Part - D</li>
                </ul>

            </div>

        </div>


        <!-- Main Content -->
        <div class="main-content">

            <div class="row">

                <div class="col-lg-12">

                    <div class="card">

                        <!-- Card Header -->
                        <div class="card-header d-flex justify-content-between align-items-center">

                            <h4 class="fw-bold mb-0">
                                Part - D : Document Uploads
                            </h4>

                            <button
                                type="button"
                                class="btn btn-primary btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#docInstruction">

                                Instruction to upload files

                            </button>

                        </div>


                        <?php if (session()->getFlashdata('errors')): ?>

                            <div class="alert alert-danger">

                                <?php foreach (session()->getFlashdata('errors') as $error): ?>

                                    <p><?= $error ?></p>

                                <?php endforeach; ?>

                            </div>

                        <?php endif; ?>


                        <!-- Card Body -->
                        <div class="card-body">

                           <form action="<?= base_url('admin/part-d/store') ?>"
                            method="post"
                            enctype="multipart/form-data">

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
                            <!-- Submit -->
                            <div class="text-center mt-4">

                                <button type="submit"
                                        class="btn btn-primary">
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

<!-- Instruction Modal -->

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

<!-- Bootstrap 5 JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
