<main class="nxl-container">
    <div class="nxl-content">

        <div class="main-content">
            <div class="row mt-4">

                <!-- Courses Section -->
                <div class="col-lg-6 col-md-12">
                    <?php if (session()->getFlashdata('warning')): ?>
                        <div class="alert alert-warning">
                            <?= session()->getFlashdata('warning') ?>
                        </div>
                    <?php endif; ?>
                    <div class="card">

                        <div class="card-header">
                            <h4 class="card-title">Available Programmes</h4>
                        </div>

                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table table-bordered table-hover text-center">

                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Programme Name</th>
                                            <th>Programme Map Code</th>
                                            <th>Apply Now</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php $i = 1;
                    foreach ($programmes as $row): ?>

                                        <tr>
                                            <td><?= $i++ ?></td>

                                            <td class="text-wrap"><?= $row['programme_name'] ?></td>

                                            <td><?= $row['programme_map_code'] ?></td>

                                            <td>
                                                <a href="<?= base_url('admin/part-a/'.$row['id']) ?>" class="badge bg-success">
                                                    Apply Now
                                                </a>
                                            </td>
                                        </tr>

                                        <?php endforeach; ?>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- Instructions -->
                <div class="col-lg-6 col-md-12">

                    <div class="card">

                        <div class="card-header">
                            <h4 class="card-title">
                                Read the instructions carefully before filling the application form
                            </h4>
                        </div>

                        <div class="card-body">

                            <ul class="list-group list-group-flush">

                                <li class="list-group-item">a. Scanned copy of Photograph (Max 100 KB) – JPG, JPEG, PNG</li>
                                <li class="list-group-item">b. Scanned Signature (Max 100 KB) – JPG, JPEG, PNG</li>
                                <li class="list-group-item">c. SSC Mark Sheet (Max 100 KB)</li>
                                <li class="list-group-item">d. SSC Admit Card (Max 100 KB)</li>
                                <li class="list-group-item">e. Intermediate / 12th Mark Sheet (Max 100 KB)</li>
                                <li class="list-group-item">f. Intermediate / 12th Pass Certificate (Max 100 KB)</li>
                                <li class="list-group-item">g. Employment ID Card (Optional – if employed)</li>
                                <li class="list-group-item">h. Valid Photo ID Proof (PAN / Aadhar / Voter ID)</li>
                                <li class="list-group-item">i. UG Degree Final Mark Sheet / Consolidated Mark Sheet</li>
                                <li class="list-group-item">j. UG Degree Final Pass Certificate / Provisional Certificate</li>
                                <li class="list-group-item">k. Caste Certificate (If applicable)</li>

                            </ul>

                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>
</main>