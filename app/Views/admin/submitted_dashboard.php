<main class="nxl-container">

    <div class="nxl-content">

        <div class="main-content">


            <!-- Welcome Card -->
            <div class="row mb-4">

                <div class="col-lg-12">

                    <div class="card border-0 shadow-sm">

                        <div class="card-body p-4">

                            <h4 class="fw-bold mb-2">
                                Welcome back, <?= session()->get('full_name') ?>
                            </h4>

                            <p class="text-muted mb-3">
                                You have successfully filled the application for
                                <strong>
                                    <?= $programme_name ?? '' ?>
                                </strong>
                            </p>

                            <a href="https://onlinesbi.sbi.bank.in/sbicollect/icollecthome.htm" class="btn btn-danger px-4 py-2" target="_blank">
                                Pay Admission Fee
                            </a>

                        </div>

                    </div>

                </div>

            </div>



            <!-- Information Cards -->
            <div class="row">


                <!-- Payment Details -->
                <div class="col-lg-6 mb-4">

                    <div class="card h-100 shadow-sm">

                        <div class="card-header bg-white border-bottom">

                            <h5 class="mb-0 fw-bold">
                                Payment Details
                            </h5>

                        </div>

                        <div class="card-body">

                            <p class="text-danger">

                                After successful payment and verification by the authority,
                                you can download your application form within
                                <strong>72 hours</strong> of payment.

                            </p>

                        </div>

                    </div>

                </div>



                <!-- Important Information -->
                <div class="col-lg-6 mb-4">

                    <div class="card h-100 shadow-sm">

                        <div class="card-header bg-white border-bottom">

                            <h5 class="mb-0 fw-bold">
                                Important Information
                            </h5>

                        </div>

                        <div class="card-body">

                            <ul class="ps-3">

                                <li class="mb-2">
                                    To know your course fee
                                    <a href="<?= base_url('admin-template/assets/document/fee_details.pdf') ?>" class="text-primary" target ='_blank'>
                                        click here
                                    </a>.
                                </li>

                                <li class="mb-2">
                                    After successful payment the details will be updated
                                    within <strong>72 working hours</strong>.
                                </li>

                                <li>
                                    If your payment is not updated within 72 working hours,
                                    please contact CDOE for updation. Do not make multiple payments.
                                </li>

                            </ul>

                        </div>

                    </div>

                </div>


            </div>


        </div>

    </div>

</main>