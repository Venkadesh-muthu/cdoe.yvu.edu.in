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
                <li class="breadcrumb-item">Part - B</li>
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
                            Part - B : Upload Photograph & Signature
                        </h4>

                        <button 
                            type="button"
                            class="btn btn-primary btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#uploadInstruction">
                            Instruction to upload files
                        </button>
                    </div>


                    <!-- Card Body -->
                    <div class="card-body">
                        <?php if (session()->getFlashdata('errors')): ?>

                        <div class="alert alert-danger">

                        <?php foreach (session()->getFlashdata('errors') as $error): ?>

                        <p><?= $error ?></p>

                        <?php endforeach; ?>

                        </div>

                        <?php endif; ?>
                        <form action="<?= base_url('admin/part-b/store') ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="application_id" value="<?= $application_id ?>">

                            <div class="row justify-content-center">

                                <!-- Photo Upload -->
                                <div class="col-md-4 text-center">

                                    <label class="fw-bold mb-2">
                                        Upload Photograph
                                    </label>

                                    <?php if (!empty($upload['photo'])): ?>

                                        <div class="mb-2">
                                            <img 
                                                src="<?= base_url('uploads/photos/'.$upload['photo']) ?>"
                                                style="width:120px;height:120px;object-fit:cover;border-radius:6px;border:1px solid #ddd;padding:3px;"
                                            >
                                        </div>

                                        <input type="hidden" name="old_photo" value="<?= $upload['photo'] ?>">

                                    <?php endif; ?>

                                    <input 
                                        type="file"
                                        name="photo"
                                        class="form-control mb-3"
                                        accept=".jpg,.jpeg,.png"
                                        <?= empty($upload['photo']) ? 'required' : '' ?>
                                    >

                                </div>


                                <!-- Signature Upload -->
                                <div class="col-md-4 text-center">

                                    <label class="fw-bold mb-2">
                                        Upload Signature
                                    </label>

                                    <?php if (!empty($upload['signature'])): ?>

                                        <div class="mb-2">
                                            <img 
                                                src="<?= base_url('uploads/signatures/'.$upload['signature']) ?>"
                                                style="width:120px;height:120px;object-fit:contain;border-radius:6px;border:1px solid #ddd;padding:3px;background:#fff;"
                                            >
                                        </div>

                                        <input type="hidden" name="old_signature" value="<?= $upload['signature'] ?>">

                                    <?php endif; ?>

                                    <input 
                                        type="file"
                                        name="signature"
                                        class="form-control mb-3"
                                        accept=".jpg,.jpeg,.png"
                                        <?= empty($upload['signature']) ? 'required' : '' ?>
                                    >

                                </div>

                            </div>


                            <div class="text-center mt-4">
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

<!-- Upload Instruction Modal -->

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
                <li>Photo size should be between <strong>20KB – 2MB</strong>.</li>
                <li>Signature size should be between <strong>10KB – 2MB</strong>.</li>
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

<!-- Bootstrap JS (required for modal) -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
