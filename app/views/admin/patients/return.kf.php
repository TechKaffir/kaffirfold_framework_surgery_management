<?php $this->view('admin/inc/admin-header', $data); ?>

<!-- ======= Sidebar ======= -->
<?php $this->view('admin/inc/admin-sidebar'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <?php $this->view('admin/inc/admin-welcome', $data); ?>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <?= Util::displayFlash('log_insert_success', 'success') ?>
            <?= Util::displayFlash('log_update_success', 'success') ?>
            <div class="col-lg-12">
                <div class="accordion" id="followUp" style="width: 100%;">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button bg-<?= THEME_COLOR ?> text-light mt-1" type="button" data-bs-toggle="collapse" data-bs-target="#vitals" aria-expanded="true" aria-controls="vitals">
                                Return Dates based on the previous Doctor's examination
                            </button>
                        </h2>
                        <div id="vitals" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#followUp">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-lg-12 table-responsive ">
                                        <!-- Follow Up Table -->
                                        <table class="table datatable table-striped table-hover">
                                            <thead class="bg-<?= THEME_COLOR ?> text-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Patient</th>
                                                    <th>Date Consulted</th>
                                                    <th>Return Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $userRow = 1;
                                                if (!empty($rows)) :
                                                    foreach ($rows as $row) :
                                                ?>
                                                        <tr>
                                                            <th><?= $userRow++ ?></th>
                                                            <td><?= $row->Surname . ', ' . $row->First_Name ?></td>
                                                            <td><?= $row->date ?></td>

                                                            <td><?= $row->Return_Date ?></td>
                                                            <td>
                                                                <div class="text-center d-flex">
                                                                    <a class="btn btn-secondary mx-1 shadow" style="border-radius: 20px;" href="<?= ROOT ?>/admin/patients/followup/<?= $row->patient ?>">FOLLOW UP</a>

                                                                </div>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </tbody>
                                        </table>
                                        <!-- End Follow Up Table -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-12">
                <h4 class="text-center">REPORT ON PATIENTS FOLLOW UP</h4>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="table-responsive">
                                <!-- Follow Up Table -->
                                <table class="table datatable table-striped table-hover">
                                    <thead class="bg-<?= THEME_COLOR ?> text-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Report Date</th>
                                            <th>Patient</th>
                                            <th>Modus</th>
                                            <th>Intention</th>
                                            <th>Report</th>
                                            <th>Report by:</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $userRow = 1;
                                        if (!empty($reports)) :
                                            foreach ($reports as $row) :
                                        ?>
                                                <tr>
                                                    <th><?= $userRow++ ?></th>
                                                    <td><?= $row->date_created ?></td>
                                                    <td><?= $row->Surname . ', ' . $row->First_Name ?></td>
                                                    <td><?= $row->modus ?></td>
                                                    <td><?= $row->intention ?></td>
                                                    <td><?= $row->report ?></td>
                                                    <td><?= $row->created_by ?></td>
                                                    <td>
                                                        <div class="text-center d-flex">
                                                            <a href="<?= ROOT ?>/admin/reportUpdate/edit/<?= $row->id ?>"><i class="bi bi-pencil-square text-primary"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                        <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </tbody>
                                </table>
                                <!-- End Follow Up Table -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php $this->view('admin/inc/admin-footer') ?>