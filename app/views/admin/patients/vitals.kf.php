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
                        <?php if ($action == 'edit') : ?>
                            <div class="row my-3">
                                <h4>UPDATE VITALS SIGNS <a class="btn btn-outline-danger btn-sm float-end" href="<?= ROOT ?>/admin/patients/vitals/<?= $row->patient ?>" class="btn btn-danger">BACK TO PATIENT VITALS</a></h4>

                            </div>

                            <form method="POST" action="" enctype="multipart/form-data">
                                <!--#### START HIDDEN INPUTS  ####-->
                                <!--CSRF TOKEN-->
                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <!--USER UPDATING RECORD-->
                                <input type="hidden" name="<?= esc('updated_by') ?>" value="<?= user('firstname') . ' ' . user('surname') ?>">
                                <!--DATE RECORD UPDATED-->
                                <input type="hidden" name="<?= esc('date_updated') ?>" value="<?= date('Y-m-d H:i:s') ?>">
                                <!--#### END HIDDEN INPUTS  ####-->

                                <?php if (!empty($vserrors)) : ?>
                                    <div class="alert alert-danger text-center col-lg-12">
                                        <?= implode('<br>', $vserrors);  ?>
                                    </div>
                                <?php endif; ?>

                                <!--ROW 1-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="blood_sugar">Blood Sugar</label>
                                        <input type="text" name="<?= esc('blood_sugar') ?>" value="<?= old_value('blood_sugar', $row->blood_sugar) ?>" class="form-control mb-1" id="blood_sugar">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="blood_pressure">Blood Pressure</label>
                                        <input type="text" name="<?= esc('blood_pressure') ?>" value="<?= old_value('blood_pressure', $row->blood_pressure) ?>" class="form-control mb-1" id="blood_pressure">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="pulse_rate">Pulse Rate</label>
                                        <input type="text" name="<?= esc('pulse_rate') ?>" value="<?= old_value('pulse_rate', $row->pulse_rate) ?>" class="form-control mb-1" id="pulse_rate">
                                    </div>

                                </div>
                                <!--ROW 2-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="urinalysis">Urinalysis</label>
                                        <input type="text" name="<?= esc('urinalysis') ?>" value="<?= old_value('urinalysis', $row->urinalysis) ?>" class="form-control mb-1" id="urinalysis">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="pregnancy_test">Pregnancy Test</label>
                                        <input type="text" name="<?= esc('pregnancy_test') ?>" value="<?= old_value('pregnancy_test', $row->pregnancy_test) ?>" class="form-control mb-1" id="pregnancy_test">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="resting_ecg">Resting ECG</label>
                                        <input type="text" name="<?= esc('resting_ecg') ?>" value="<?= old_value('resting_ecg', $row->resting_ecg) ?>" class="form-control mb-1" id="resting_ecg">
                                    </div>
                                </div>
                                <!--ROW 3-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="oxygen_saturation">Oxygen Saturation</label>
                                        <input type="text" name="<?= esc('oxygen_saturation') ?>" value="<?= old_value('oxygen_saturation', $row->oxygen_saturation) ?>" class="form-control mb-1" id="oxygen_saturation">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="weight">Weight</label>
                                        <input type="text" name="<?= esc('weight') ?>" value="<?= old_value('weight', $row->weight) ?>" class="form-control mb-1" id="weight">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="height">Height</label>
                                        <input type="text" name="<?= esc('height') ?>" value="<?= old_value('height', $row->height) ?>" class="form-control mb-1" id="height">
                                    </div>
                                </div>
                                <!--ROW 4-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="temperature">Temperature</label>
                                        <input type="text" name="<?= esc('temperature') ?>" value="<?= old_value('temperature', $row->temperature) ?>" class="form-control mb-1" id="temperature">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="BMI">BMI</label>
                                        <input type="text" name="<?= esc('BMI') ?>" value="<?= old_value('BMI', $row->BMI) ?>" class="form-control mb-1" id="BMI">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="comments">Comments</label>
                                        <textarea name="<?= esc('comments') ?>" value="<?= old_value('comments', $row->comments) ?>" class="form-control mb-1" id="comments" cols="30" rows="1"></textarea>
                                    </div>
                                </div>

                                <!--SUBMIT BTN-->
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">UPDATE VITAL SIGNS</button>
                                        <a href="<?= ROOT ?>/admin/patients/vitals/<?= $row->patient ?>" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>
                        <?php elseif ($action == 'delete') : ?>
                            <div class="row my-3">
                                <h3 class="text-center">DELETE PATIENT</h3>
                            </div>
                            <form method="POST">
                                <!--#### START HIDDEN INPUTS  ####-->
                                <!--CSRF TOKEN-->
                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <!--USER DELETING RECORD-->
                                <input type="hidden" name="<?= esc('deleted_by') ?>" value="<?= user('firstname') . ' ' . user('surname') ?>">

                                <!--ROW 1-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="blood_sugar">Blood Sugar</label>
                                        <div class="form-control mb-1"><?= $row->blood_sugar ?></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="blood_pressure">Blood Pressure</label>
                                        <div class="form-control mb-1"><?= $row->blood_pressure ?></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="pulse_rate">Pulse Rate</label>
                                        <div class="form-control mb-1"><?= $row->pulse_rate ?></div>
                                    </div>
                                </div>
                                <!--ROW 2-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="urinalysis">Urinalysis</label>
                                        <div class="form-control mb-1"><?= $row->urinalysis ?></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="pregnancy_test">Pregnancy Test</label>
                                        <div class="form-control mb-1"><?= $row->pregnancy_test ?></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="resting_ecg">Resting ECG</label>
                                        <div class="form-control mb-1"><?= $row->resting_ecg ?></div>
                                    </div>
                                </div>
                                <!--ROW 3-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="oxygen_saturation">Oxygen Saturation</label>
                                        <div class="form-control mb-1"><?= $row->oxygen_saturation ?></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="weight">Weight</label>
                                        <div class="form-control mb-1"><?= $row->weight ?></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="height">Height</label>
                                        <div class="form-control mb-1"><?= $row->height ?></div>
                                    </div>
                                </div>
                                <!--ROW 4-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="temperature">Temperature</label>
                                        <div class="form-control mb-1"><?= $row->temperature ?></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="BMI">BMI</label>
                                        <div class="form-control mb-1"><?= $row->BMI ?></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="comments">Comments</label>
                                        <div class="form-control mb-1"><?= $row->comments ?></div>
                                    </div>
                                </div>

                                <!--SUBMIT BTN-->
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">UPDATE VITAL SIGNS</button>
                                        <a href="<?= ROOT ?>/admin/patients/vitals/<?= $row->patient ?>" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>
                        <?php else : ?>
                            <!--Check if its the doctor-->
                            <?php if ($_SESSION['userRole'] == 'Doctor' || $_SESSION['userRole'] == 'Admin') : ?>
                                <div class="row mt-3">
                                    <a href="<?= ROOT ?>/admin/doctorsnotes/new" class="btn btn-outline-<?= THEME_COLOR ?>">ADD DOCTOR'S NOTE</a>
                                </div>
                                <hr>
                                <div class="container-fluid">
                                <?= Util::displayFlash('vitals_update_success', 'success') ?>
                                <?= Util::displayFlash('vitals_delete_success', 'success') ?>
                                    <div class="row">
                                        <div class="col-lg-12 table-responsive">
                                            <div class="alert alert-success text-center">
                                                If you wish to search for a record, press "Ctrl" + "f", then key in the search string on the popup!! <br> For example: the <em>"surname</em> of the patient"
                                            </div>
                                            <?php

                                            if (!empty($rows)) :
                                                foreach ($rows as $row) :
                                                    switch ($_SESSION['userRole']) {
                                                        case 'Admin':
                                                        case 'Doctor':
                                                        case 'Sister':
                                                        case 'Nurse':
                                                            show($row);
                                                            break;

                                                        default:
                                                            Util::setFlash('no_access_vitals', 'You do not have adequate priviledge to view this data!!');
                                                            Util::displayFlash('no_access_vitals', 'danger');
                                                            break;
                                                    }
                                        
                                                endforeach;
                                            endif;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="text-center">
                                    <button type="button" class="btn btn-<?= THEME_COLOR ?>" onclick="window.history.back()"><i class="bi bi-arrow-left"></i>BACK</button>
                                    <img src="<?= ROOT ?>/assets/img/doctors-only.png" alt="">
                                </div>
                            <?php endif; ?>
                            <!--End Check-->
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main><!-- End #main -->


<!-- ======= Footer ======= -->
<?php $this->view('admin/inc/admin-footer') ?>