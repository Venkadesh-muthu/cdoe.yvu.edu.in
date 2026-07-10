<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>YVu Cdoe Reset Password</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('admin-template/assets/images/yvu150-150.png') ?>">
    <link rel="stylesheet" href="<?= base_url('admin-template/assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('admin-template/assets/vendors/css/vendors.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('admin-template/assets/css/theme.min.css') ?>">

</head>

<body>

<main class="auth-minimal-wrapper">
    <div class="auth-minimal-inner">
        <div class="minimal-card-wrapper">
            <div class="card mb-4 mt-5 mx-4 mx-sm-0 position-relative">
                <div class="wd-50 bg-white p-2 rounded-circle shadow-lg position-absolute translate-middle top-0 start-50">
                    <img src="<?= base_url('admin-template/assets/images/yvu150-150.png') ?>" class="img-fluid">
                </div>

                <div class="card-body p-sm-5">
                    <h2 class="fs-20 fw-bolder mb-4 text-center">
                        Reset Password
                    </h2>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger text-center py-2">
                            <?= esc(session()->getFlashdata('error')) ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('errors')): ?>
                        <div class="alert alert-danger">
                            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                <div><?= esc($error) ?></div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('/admin/reset-password') ?>" method="post" class="w-100 mt-4 pt-2">
                        <div class="mb-3">
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                placeholder="Registered Email Address"
                                value="<?= old('email') ?>"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <input
                                type="text"
                                name="mobile"
                                class="form-control"
                                placeholder="Registered Mobile Number"
                                value="<?= old('mobile') ?>"
                                maxlength="10"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <input
                                type="text"
                                name="debuniqueid"
                                class="form-control"
                                placeholder="DEB Unique ID"
                                value="<?= old('debuniqueid') ?>"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="New Password"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <input
                                type="password"
                                name="c_password"
                                class="form-control"
                                placeholder="Confirm New Password"
                                required
                            >
                        </div>

                        <?= render_captcha('admin-reset-password') ?>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-lg btn-primary w-100">
                                Reset Password
                            </button>
                        </div>
                    </form>

                    <div class="text-center mt-4">
                        <a href="<?= base_url('/admin/login') ?>" class="btn btn-outline-secondary w-100">
                            Back to Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="<?= base_url('admin-template/assets/vendors/js/vendors.min.js') ?>"></script>
<script src="<?= base_url('admin-template/assets/js/common-init.min.js') ?>"></script>

</body>
</html>
