<main class="nxl-container">

    <div class="nxl-content">

        <!-- Page Header -->
        <div class="page-header">

            <div class="page-header-left d-flex align-items-center">

                <div class="page-header-title">
                    <h5 class="m-b-10">Update Password</h5>
                </div>

                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('coordinator/dashboard') ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item">Update Password</li>
                </ul>

            </div>

        </div>


        <!-- Main Content -->
        <div class="main-content">

            <div class="row">

                <div class="col-lg-12">

                    <div class="card">

                        <div class="card-header">
                            <h4 class="fw-bold">Change Password</h4>
                        </div>

                        <div class="card-body">

                            <!-- Alerts -->
                            <?php if (session()->getFlashdata('success')): ?>
                                <div class="alert alert-success">
                                    <?= session()->getFlashdata('success') ?>
                                </div>
                            <?php endif; ?>

                            <?php if (session()->getFlashdata('error')): ?>
                                <div class="alert alert-danger">
                                    <?= session()->getFlashdata('error') ?>
                                </div>
                            <?php endif; ?>

                            <!-- Form -->
                            <form method="post" action="<?= base_url('coordinator/update-password') ?>">

                                <div class="row">

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Current Password</label>
                                        <input type="password" name="current_password" class="form-control" required>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">New Password</label>
                                        <input type="password" name="new_password" class="form-control" required>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" name="confirm_password" class="form-control" required>
                                    </div>

                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">
                                        Update Password
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