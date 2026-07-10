<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>YVu Cdoe Admin Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('admin-template/assets/images/yvu150-150.png') ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('admin-template/assets/css/bootstrap.min.css') ?>">

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url('admin-template/assets/vendors/css/vendors.min.css') ?>">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?= base_url('admin-template/assets/css/theme.min.css') ?>">

</head>

<body>

<main class="auth-minimal-wrapper">

    <div class="auth-minimal-inner">

        <div class="minimal-card-wrapper">

            <div class="card mb-4 mt-5 mx-4 mx-sm-0 position-relative">

                <!-- Logo -->
                <div class="wd-50 bg-white p-2 rounded-circle shadow-lg position-absolute translate-middle top-0 start-50">
                    <img src="<?= base_url('admin-template/assets/images/yvu150-150.png') ?>" class="img-fluid">
                </div>

                <div class="card-body p-sm-5">

                    <h2 class="fs-20 fw-bolder mb-4 text-center">
                        YVU Cdoe Admin Login
                    </h2>

                    <?php if (session()->getFlashdata('success')): ?>

                        <div class="alert alert-success text-center py-2">
                            <?= esc(session()->getFlashdata('success')) ?>
                        </div>

                    <?php endif; ?>

                    <!-- Flash Error -->
                    <?php if (session()->getFlashdata('error')): ?>

                        <div class="alert alert-danger text-center py-2">
                            <?= esc(session()->getFlashdata('error')) ?>
                        </div>

                    <?php endif; ?>


                    <!-- Validation Errors -->
                    <?php if (session()->getFlashdata('errors')): ?>

                        <div class="alert alert-danger">

                            <?php foreach (session()->getFlashdata('errors') as $error): ?>

                                <div><?= esc($error) ?></div>

                            <?php endforeach; ?>

                        </div>

                    <?php endif; ?>


                    <form action="<?= base_url('/admin/loginProcess') ?>" method="post" class="w-100 mt-4 pt-2">

                        <!-- Email -->
                        <div class="mb-4">

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                placeholder="Email Address"
                                value="<?= old('email') ?>"
                                required
                            >

                        </div>


                        <!-- Password -->
                        <div class="mb-3">

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Password"
                                required
                            >

                        </div>


                        <?= render_captcha('admin-login') ?>

                        <!-- Login Button -->
                        <div class="mt-4">

                            <button type="submit" class="btn btn-lg btn-primary w-100">
                                Login
                            </button>

                        </div>

                        <div class="text-center mt-3">
                            <a href="<?= base_url('/admin/reset-password') ?>" class="fs-12 text-primary">
                                Forgot / Reset Password?
                            </a>
                        </div>

                    </form>


                    <!-- Register Section -->
                    <p class="text-center text-muted mt-4">
                        Not yet registered?
                    </p>

                    <div class="text-center">

                        <a href="<?= base_url('/admin') ?>" class="btn btn-outline-danger w-100">
                            Register
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</main>


<!-- Vendors JS -->
<script src="<?= base_url('admin-template/assets/vendors/js/vendors.min.js') ?>"></script>

<!-- App Init -->
<script src="<?= base_url('admin-template/assets/js/common-init.min.js') ?>"></script>

</body>
</html>
