<style>
    .done-menu > a{
    background-color:#e8f5e9 !important;
}
</style>
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

        <?php
        $programme_id = session()->get('programme_id');
                    $app_id       = session()->get('application_id');
                    ?>

        <div class="navbar-content">
            <ul class="nxl-navbar">

                <li class="nxl-item nxl-caption">
                    <label>Navigation</label>
                </li>

                <!-- Dashboard -->
                <li class="nxl-item <?= ($title === 'Dashboard') ? 'active' : '' ?>">
                    <a href="<?= base_url('admin/dashboard') ?>" class="nxl-link">
                        <span class="nxl-micon">
                            <i class="feather-airplay"></i>
                        </span>
                        <span class="nxl-mtext">Dashboard</span>
                    </a>
                </li>

                <?php if (!empty($programme_id)) : ?>

                <!-- Part A -->
                <li class="nxl-item <?= ($title === 'Part A') ? 'active' : '' ?><?= ($applicationStatus == 1) ? 'done-menu' : '' ?>">
                    <a 
                        href="<?= ($applicationStatus == 1) ? '#' : base_url('admin/part-a/' . $programme_id) ?>" 
                        class="nxl-link"
                        <?= ($applicationStatus == 1) ? 'onclick="return false;"' : '' ?>
                    >
                        <span class="nxl-micon">
                            <i class="feather-user"></i>
                        </span>

                        <span class="nxl-mtext">
                            <?php
                                        if ($applicationStatus == 1) {
                                            echo "Part-A (Done)";
                                        } else {
                                            echo $app_id ? "Edit Part A" : "Part A";
                                        }
                    ?>
                        </span>
                    </a>
                </li>

                <!-- Part B -->
                <li class="nxl-item <?= ($title === 'Part B') ? 'active' : '' ?><?= ($applicationStatus == 1) ? 'done-menu' : '' ?>">
                    <a 
                        href="<?= ($applicationStatus == 1) ? '#' : ($app_id ? base_url('admin/part-b/' . $app_id) : '#') ?>" 
                        class="nxl-link"
                        <?= ($applicationStatus == 1) ? 'onclick="return false;"' : (!$app_id ? 'onclick="return showPartAAlert()"' : '') ?>
                    >
                        <span class="nxl-micon">
                            <i class="feather-book-open"></i>
                        </span>

                        <span class="nxl-mtext">
                            <?php
                    if ($applicationStatus == 1) {
                        echo "Part-B (Done)";
                    } else {
                        echo $partBExists ? "Edit Part B" : "Part B";
                    }
                    ?>
                        </span>
                    </a>
                </li>

                <!-- Part C -->
                <li class="nxl-item <?= ($title === 'Part C') ? 'active' : '' ?><?= ($applicationStatus == 1) ? 'done-menu' : '' ?>">
                    <a 
                        href="<?= ($applicationStatus == 1) ? '#' : ($app_id ? base_url('admin/part-c/' . $app_id) : '#') ?>" 
                        class="nxl-link"
                        <?= ($applicationStatus == 1) ? 'onclick="return false;"' : (!$app_id ? 'onclick="return showPartAAlert()"' : '') ?>
                    >
                        <span class="nxl-micon">
                            <i class="feather-folder"></i>
                        </span>

                        <span class="nxl-mtext">
                            <?php
                    if ($applicationStatus == 1) {
                        echo "Part-C (Done)";
                    } else {
                        echo $partCExists ? "Edit Part C" : "Part C";
                    }
                    ?>
                        </span>
                    </a>
                </li>

                <!-- Part D -->
                <li class="nxl-item <?= ($title === 'Part D') ? 'active' : '' ?><?= ($applicationStatus == 1) ? 'done-menu' : '' ?>">
                    <a 
                        href="<?= ($applicationStatus == 1) ? '#' : ($app_id ? base_url('admin/part-d/' . $app_id) : '#') ?>" 
                        class="nxl-link"
                        <?= ($applicationStatus == 1) ? 'onclick="return false;"' : (!$app_id ? 'onclick="return showPartAAlert()"' : '') ?>
                    >
                        <span class="nxl-micon">
                            <i class="feather-check-square"></i>
                        </span>

                        <span class="nxl-mtext">
                            <?php
                    if ($applicationStatus == 1) {
                        echo "Part-D (Done)";
                    } else {
                        echo $partDExists ? "Edit Part D" : "Part D";
                    }
                    ?>
                        </span>
                    </a>
                </li>

                <?php endif; ?>
                <!-- Payment Details (New Menu after submission) -->
                <?php if ($applicationStatus == 1) : ?>

                <li class="nxl-item <?= ($title === 'Payment Details') ? 'active' : '' ?>">
                    <a 
                        href="<?= base_url('admin/payment-details/' . $app_id) ?>" 
                        class="nxl-link"
                    >
                        <span class="nxl-micon">
                            <i class="feather-credit-card"></i>
                        </span>

                        <span class="nxl-mtext">
                            Payment Details
                        </span>
                    </a>
                </li>

                <?php endif; ?>
                <!-- Preview -->
                <li class="nxl-item <?= ($title === 'Preview') ? 'active' : '' ?> <?= ($applicationStatus == 1) ? 'done-menu' : '' ?>">
                    <a 
                        href="<?= base_url('admin/preview/' . $app_id) ?>" 
                        class="nxl-link"
                        <?= ($applicationStatus == 1) ? 'onclick="return true;"' : (empty($app_id) ? 'onclick="return showPartAAlert()"' : '') ?>
                    >
                        <span class="nxl-micon">
                            <i class="feather-eye"></i>
                        </span>

                        <span class="nxl-mtext">
                            <?= ($applicationStatus == 1) ? "Preview (Done)" : "Preview" ?>
                        </span>
                    </a>
                </li>

            </ul>
        </div>

    </div>
</nav>

<script>
function showPartAAlert() {
    alert("Please add Part A details first.");
    return false;
}
</script>