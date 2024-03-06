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
                                <h4>UPDATE DOCTOR'S NOTE <button type="button" class="btn btn-danger float-end" onclick="window.history.back()">BACK TO PATIENT RECORDS</button></h4>
                            </div>

                            <form method="POST" action="" enctype="multipart/form-data">
                                <!--#### START HIDDEN INPUTS  ####-->
                                <!--CSRF TOKEN-->
                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <!--USER UPDATING RECORD-->
                                <input type="hidden" name="<?= esc('updated_by') ?>" value="<?= user('firstname') . ' ' . user('surname') ?>">
                                <!--DATE UPDATED-->
                                <input type="hidden" name="<?= esc('date_updated') ?>" value="<?= date('Y-m-d H:i:s') ?>">
                                <!--#### END HIDDEN INPUTS  ####-->

                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger text-center col-lg-12">
                                        <?= implode('<br>', $errors);  ?>
                                    </div>
                                <?php endif; ?>


                                <!--ROW 1-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="Relevant_History">Relevant History</label>
                                        <textarea name="<?= esc('Relevant_History') ?>" class="form-control mb-1" id="Relevant_History" cols="30" rows="4"><?= old_value('Relevant_History', $row->Relevant_History) ?></textarea>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="Comobidities">Comobidities</label>
                                        <textarea name="<?= esc('Comobidities') ?>" class="form-control mb-1" id="Comobidities" cols="30" rows="4"><?= old_value('Comobidities', $row->Comobidities) ?></textarea>
                                    </div>
                                </div>
                                <!--ROW 2-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="Clinical_Examination">Clinical Examination</label>
                                        <textarea name="<?= esc('Clinical_Examination') ?>" class="form-control mb-1" id="Clinical_Examination" cols="30" rows="4"><?= old_value('Clinical_Examination', $row->Clinical_Examination) ?></textarea>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="Diagnosis">Diagnosis</label>
                                        <textarea name="<?= esc('Diagnosis') ?>" class="form-control mb-1" id="Diagnosis" cols="30" rows="4"><?= old_value('Diagnosis', $row->Diagnosis) ?></textarea>
                                    </div>
                                </div>
                                <!--ROW 3-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="Plan">Plan</label>
                                        <textarea name="<?= esc('Plan') ?>" class="form-control mb-1" id="Plan" cols="30" rows="4"><?= old_value('Plan', $row->Plan) ?></textarea>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="Note">Note</label>
                                        <textarea name="<?= esc('Note') ?>" class="form-control mb-1" id="Note" cols="30" rows="4"><?= old_value('Note', $row->Note) ?></textarea>
                                    </div>
                                </div>
                                <!--ROW 4-->
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="Return_Date">Return Date</label>
                                        <input type="date" name="<?= esc('Return_Date') ?>" class="form-control mb-1" id="Return_Date">
                                    </div>
                                </div>
                                <!--SUBMIT BTN-->
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">UPDATE RECORD</button>

                                    </div>

                                </div>
                            </form>

                        <?php elseif ($action == 'delete') : ?>
                            <div class="row my-3">
                                <h3 class="text-center">DELETE PATIENT</h3>
                            </div>
                            <form method="POST" action="" enctype="multipart/form-data">
                                <!--#### START HIDDEN INPUTS  ####-->
                                <!--CSRF TOKEN-->
                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <!--USER DELETING RECORD-->
                                <input type="hidden" name="<?= esc('deleted_by') ?>" value="<?= user('firstname') . ' ' . user('surname') ?>">
                                <!--DATE DELETED-->
                                <input type="hidden" name="<?= esc('date_deleted') ?>" value="<?= date('Y-m-d H:i:s') ?>">
                                <!--#### END HIDDEN INPUTS  ####-->

                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger text-center col-lg-12">
                                        <?= implode('<br>', $errors);  ?>
                                    </div>
                                <?php endif; ?>


                                <!--ROW 1-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="Relevant_History">Relevant History</label>
                                        <div class="form-control mb-1"><?= $row->Relevant_History ? $row->Relevant_History : 'Empty Input' ?></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="Comobidities">Comobidities</label>
                                        <div class="form-control mb-1"><?= $row->Comobidities ? $row->Comobidities : 'Empty Input' ?></div>
                                    </div>
                                </div>
                                <!--ROW 2-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="Clinical_Examination">Clinical Examination</label>
                                        <div class="form-control mb-1"><?= $row->Clinical_Examination ? $row->Clinical_Examination : 'Empty Input' ?></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="Diagnosis">Diagnosis</label>
                                        <div class="form-control mb-1"><?= $row->Diagnosis ? $row->Diagnosis : 'Empty Input' ?></div>
                                    </div>
                                </div>
                                <!--ROW 3-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="Plan">Plan</label>
                                        <div class="form-control mb-1"><?= $row->Plan ? $row->Plan : 'Empty Input' ?></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="Note">Note</label>
                                        <div class="form-control mb-1"><?= $row->Note ? $row->Note : 'Empty Input' ?></div>
                                    </div>
                                </div>
                                <!--ROW 4-->
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="Return_Date">Return Date</label>
                                        <div class="form-control mb-1"><?= $row->Return_Date ? $row->Return_Date : 'Empty Input' ?></div>
                                    </div>
                                </div>
                                <!--SUBMIT BTN-->
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">UPDATE RECORD</button>
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
                                <div class="row">
                                    <?php
                                    if (!empty($rows)) :
                                        foreach ($rows as $row) :
                                          show($row);
                                        endforeach;
                                    endif;
                                    ?>
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