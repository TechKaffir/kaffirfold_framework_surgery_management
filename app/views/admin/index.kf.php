<?php $this->view('admin/inc/admin-header', $data); ?>

<!-- ======= Sidebar ======= -->
<?php $this->view('admin/inc/admin-sidebar'); ?> 

<main id="main" class="main">
    <?php $this->view('admin/inc/admin-welcome', $data); ?>
    <!--Patient registration success message-->
    <?= Util::displayFlash('patient_reg_success', 'success') ?>
    <?= Util::displayFlash('patient_update_success', 'success') ?>

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <!-- Consultation Bookings Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card shadow">
                            <div class="card-body">
                                <h5 class="card-title">Patients Queue <span>| Today - <?= date('Y-m-d') ?></span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person-fill"></i> <i class="bi bi-clock"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $queue ? count($queue) : '0' ?> <a class="ms-5 btn btn-outline-<?= THEME_COLOR ?> btn-lg" href="<?= ROOT ?>/admin/queue"><i class="bi bi-eye"></i> View the Queue</a>
                                            <h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End  Consultation Bookings Card -->

                    <!-- Patients Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card shadow">
                            <div class="card-body">
                                <h5 class="card-title">Patients <span>| Total Registered</span><a href="<?= ROOT ?>/admin/patients/new"><i class="bi bi-plus bg-<?= THEME_COLOR ?> text-light float-end" style="border-radius:20px"></i></a></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $patients ? count($patients) : '0' ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Patients Card -->
                </div>
            </div><!-- End Left side columns -->
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow">
                    <h5 class="card-title mx-3"><strong><u>TODAY'S BOOKINGS (<?= $todays_bookings ? count($todays_bookings) : '0' ?>)</u></strong> <a class="btn btn-outline-<?= THEME_COLOR ?> float-end" href="<?= ROOT ?>/admin/consultation/new">BOOK CONSULTATION</a></h5>
                    <!-- Table -->
                    <table class="table datatable px-2" style="font-size: 12px;">
                        <thead class="bg-<?= THEME_COLOR ?> text-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Patient</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Med Aid/Cash</th>
                                <th scope="col">Funds</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $userRows = 1;
                            if (!empty($todays_bookings)) :
                                foreach ($todays_bookings as $row) :
                            ?>
                                    <tr>
                                        <th scope="row"><?= $userRows++ ?></th>

                                        <td><a href="<?= ROOT ?>/admin/patients/view/<?= $row->patient ?>">
                                                <?= $row->Surname . ', ' . $row->First_Name ?>
                                            </a>
                                        </td>
                                        <td><?= $row->reg_date ?></td>
                                        <td><?= $row->reg_time ?></td>
                                        <td><?= $row->cash_or_medical ?></td>
                                        <td><?= $row->funds_status ?></td>
                                        <td>
                                            <?php
                                            switch ($row->status) {
                                                case 'Queuing: Reception Area': ?>
                                                    <span class="td-btn-secondary">Queuing: Reception Area<span>
                                                        <?php break;
                                                    case 'Vitals captured: Nurse': ?>
                                                            <span class="td-btn-warning">Vitals captured: Nurse</span>
                                                        <?php break;
                                                    case 'Examined by Doctor': ?>
                                                            <span class="td-btn-danger">Examined by Doctor</span>
                                                        <?php break;
                                                    case 'Medication dispensed': ?>
                                                            <span class="td-btn-success">Medication dispensed</span>
                                                    <?php break;
                                                }
                                                    ?>
                                        </td>
                                        <td>
                                            <div class="text-center d-flex">
                                                <a href="<?= ROOT ?>/admin/consultation/view/<?= $row->id ?>">[Notes <i class="bi bi-eye"></i>]</a>
                                                <a href="<?= ROOT ?>/admin/consultation/edit/<?= $row->id ?>"><i class="bi bi-pencil-square m-2 text-primary"></i></a>
                                                <a href="<?= ROOT ?>/admin/consultation/delete/<?= $row->id ?>" onclick="alert('Are you sure you want to delete this consultation booking? This action cannot be reversed. Click \'OK\' to proceed OR \'JUST REFRESH THE PAGE\' to cancel the action!')"><i class="bi bi-trash m-2 text-danger "></i></a>
                                            </div>
                                        </td>
                                    </tr>
                            <?php
                                endforeach;
                            endif;
                            ?>
                        </tbody>
                    </table>
                    <!-- End Table -->
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php $this->view('admin/inc/admin-footer') ?>