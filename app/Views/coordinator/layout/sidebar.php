<nav class="nxl-navigation">
    <div class="navbar-wrapper">

        <!-- Header -->
        <div class="m-header">
            <a href="#" class="b-brand">
                <img 
                    src="<?= base_url('admin-template/assets/images/header-main-logo-1.png') ?>" 
                    class="logo logo-lg"
                    style="height:35px; position:relative; right:43px;"
                />

                <img 
                    src="<?= base_url('admin-template/assets/images/yvu150-150.png') ?>" 
                    class="logo logo-sm"
                />
            </a>
        </div>

        <div class="navbar-content">
            <ul class="nxl-navbar">

                <li class="nxl-item nxl-caption">
                    <label>Navigation</label>
                </li>

                <!-- Dashboard -->
                <li class="nxl-item <?= ($title === 'Dashboard') ? 'active' : '' ?>">
                    <a href="<?= base_url('coordinator/dashboard') ?>" class="nxl-link">
                        <span class="nxl-micon">
                            <i class="feather-airplay"></i>
                        </span>
                        <span class="nxl-mtext">Dashboard</span>
                    </a>
                </li>
               <li class="nxl-item <?= ($title === 'Students') ? 'active' : '' ?>">
                    <a href="<?= base_url('coordinator/students') ?>" class="nxl-link">
                        <span class="nxl-micon">
                            <i class="feather-user"></i>
                        </span>
                        <span class="nxl-mtext">Students</span>
                    </a>
                </li>
                <li class="nxl-item <?= ($title === 'Update Password') ? 'active' : '' ?>">
                    <a href="<?= base_url('coordinator/update-password') ?>" class="nxl-link">
                        <span class="nxl-micon">
                            <i class="feather-lock"></i>
                        </span>
                        <span class="nxl-mtext">Update Password</span>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</nav>