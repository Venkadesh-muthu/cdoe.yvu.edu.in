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
                    <li class="breadcrumb-item">Payment</li>
                    <li class="breadcrumb-item">Payment Details</li>
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
                                Payment Details
                            </h4>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body">

                            <!-- Success Message -->
                            <?php if (session()->getFlashdata('success')) : ?>
                                <div class="alert alert-success">
                                    <?= session()->getFlashdata('success') ?>
                                </div>
                            <?php endif; ?>

                            <!-- Error Message -->
                            <?php if (session()->getFlashdata('errors')) : ?>
                                <div class="alert alert-danger">
                                    <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                        <p><?= $error ?></p>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <form action="<?= base_url('admin/payment/store') ?>" method="post" enctype="multipart/form-data">

                                <input type="hidden" name="application_id" value="<?= $application_id ?>">

                                <div class="row">

                                    <!-- Course -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Course</label>

                                        <input 
                                            type="text"
                                            class="form-control"
                                            value="<?= $application['programme_name'] ?>"
                                            disabled
                                        >

                                        <input 
                                            type="hidden"
                                            name="course"
                                            value="<?= $application['programme_name'] ?>"
                                        >
                                    </div>

                                    <!-- Payment Mode -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Payment Mode</label>

                                        <select name="payment_mode" class="form-control" required>

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
                                            required
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
                                            required
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
                                            required
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
                                            <?= empty($payment['receipt'] ?? null) ? 'required' : '' ?>
                                        >

                                    </div>

                                </div>

                                <div class="text-center mt-4">

                                    <button type="submit" class="btn btn-primary">
                                        Submit Payment
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