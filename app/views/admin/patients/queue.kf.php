<?php $this->view('admin/inc/admin-header', $data); ?>

<!-- ======= Sidebar ======= -->
<?php $this->view('admin/inc/admin-sidebar'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <?php $this->view('admin/inc/admin-welcome', $data); ?>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="table-responsive">
                                <!-- Table with stripped rows -->
                                <table class="table datatable table-striped table-hover" style="font-size: 11px;">
                                    <thead class="bg-<?= THEME_COLOR ?> text-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Patient</th>
                                            <th>Status</th>
                                            <th>Booked at</th>
                                            <th><span class="ms-2">Action</span></th>
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
                                                    <td><span class="td-btn-success"><?= $row->status ?></span></td>
                                                    <td><?= $row->date_created ?></td>
                                                    <td>
                                                        <?php
                                                        switch ($_SESSION['userRole']) {
                                                            case 'Admin': 
                                                            case 'Doctor': 
                                                            case 'Sister': 
                                                            ?>
                                                                <div class="text-center d-flex">
                                                                    <a class="btn btn-warning mx-1 shadow" style="border-radius: 20px;font-size:10px" href="<?= ROOT ?>/admin/patients/vitals/<?= $row->patient ?>">VITALS</a>
                                                                    <a class="btn btn-danger mx-1 shadow" style="border-radius: 20px;font-size:10px" href="<?= ROOT ?>/admin/patients/examine/<?= $row->patient ?>">CONSULT</a>
                                                                    <a class="btn btn-secondary mx-1 shadow" style="border-radius: 20px;font-size:10px" href="<?= ROOT ?>/admin/patients/pharmacy/<?= $row->patient ?>">DISPENSE</a>
                                                                </div> 
                                                                <?php break;
                                                            case 'Nurse': ?>
                                                                <div class="text-center d-flex">
                                                                    <a class="btn btn-warning mx-1 shadow" style="border-radius: 20px;font-size:10px" href="<?= ROOT ?>/admin/patients/vitals/<?= $row->patient ?>">VITALS</a>
                                                                </div>
                                                        <?php break;

                                                            default:
                                                                echo '<span class="text-danger" style="font-size:10px">No action for your role here</span>';
                                                                break;
                                                        }
                                                        ?>

                                                    </td>
                                                </tr>
                                        <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </tbody>
                                </table>
                                <!-- End Table with stripped rows -->
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