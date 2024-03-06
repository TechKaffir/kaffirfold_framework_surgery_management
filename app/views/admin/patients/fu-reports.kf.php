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
                                <h4 class="text-center">UPDATE REPORT</h4>
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

                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger text-center col-lg-12">
                                        <?= implode('<br>', $errors);  ?>
                                    </div>
                                <?php endif; ?>

                                <!--ROW 1-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="modus">Modus <em><small>(How the patient was contacted)</small></em></label>
                                        <?php $selModus = old_value('modus', $row->modus) ?>
                                        <select name="<?= esc('modus') ?>" class="form-control mb-1" id="modus">
                                            <option value="Select Modus">--Select Modus--</option>
                                            <option value="Phone Call" <?= $selModus == 'Phone Call' ? 'selected' : '' ?>>Phone Call</option>
                                            <option value="WhatsUp" <?= $selModus == 'WhatsUp' ? 'selected' : '' ?>>WhatsUp</option>
                                            <option value="SMS" <?= $selModus == 'SMS' ? 'selected' : '' ?>>SMS</option>
                                            <option value="Email" <?= $selModus == 'Email' ? 'selected' : '' ?>>Email</option>
                                            <option value="Personal Visit" <?= $selModus == 'Personal Visit' ? 'selected' : '' ?>>Personal Visit</option>
                                            <option value="Other" <?= $selModus == 'Other' ? 'selected' : '' ?>>Other</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="intention">Intention</label>
                                        <input type="text" name="<?= esc('intention') ?>" value="<?= old_value('intention', $row->intention) ?>" class="form-control mb-1" id="intention">
                                    </div>
                                </div>
                                <!--ROW 1-->
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="report">Report <em><small>(Outcome of intention)</small></em></label>
                                        <textarea name="<?= esc('report') ?>" class="form-control mb-1" id="report" cols="30" rows="4"><?= old_value('report', $row->report) ?></textarea>
                                    </div>
                                </div>
                                <!--SUBMIT BTN-->
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">UPDATE REPORT</button>
                                       
                                        <a href="<?= ROOT ?>/admin/returndates" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>

                        <?php elseif ($action == 'delete') : ?>
                            <div class="row my-3">
                                <h6 class="text-center">DELETE BOOKING [Booked on: Date: <?= $row->reg_date ?> Time: <?= $row->reg_time ?>]</h6>
                            </div>
                            <form method="POST" action="" enctype="multipart/form-data">
                                <!--CSRF TOKEN-->
                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <!--USER DELETING RECORD-->
                                <input type="hidden" name="<?= esc('deleted_by') ?>" value="<?= user('firstname') . ' ' . user('surname') ?>">
                                <!--DATE RECORD DELETED-->
                                <input type="hidden" name="<?= esc('date_deleted') ?>" value="<?= date('Y-m-d H:i:s') ?>">
                                <!--PATIENT RELATED TO THE BOOKING-->
                                <input type="hidden" name="<?= esc('patient') ?>" value="<?= $row->patient ?>">

                                <!--ROW 1-->

                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="cash_or_medical">Cash or Medical</label>
                                        <div class="form-control mb-1"><?= $row->cash_or_medical ?></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="funds_status">Funds Status</label>
                                        <div class="form-control mb-1"><?= $row->funds_status ?></div>
                                    </div>
                                </div>
                                <!--ROW 2-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="status">Booking Status</label>
                                        <div class="form-control mb-1"><?= $row->status ?></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="Seen_by_Nurse">Seen by Nurse?</label>
                                        <div class="form-control mb-1"><?= $row->Seen_by_Nurse ?></div>
                                    </div>
                                </div>
                                <!--ROW 3-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="Seen_by_Doctor">Seen by Doctor?</label>
                                        <div class="form-control mb-1"><?= $row->Seen_by_Doctor ?></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="Got_Medication">Got Medication?</label>
                                        <div class="form-control mb-1"><?= $row->Got_Medication ?></div>
                                    </div>
                                </div>
                                <!--ROW 4-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="Claim_processed">Claims Processed?</label>
                                        <div class="form-control mb-1"><?= $row->Claim_processed ?></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="Notes">Notes</label>
                                        <div class="form-control mb-1"><?= $row->Notes ?></div>
                                    </div>
                                </div>

                                <!--SUBMIT BTN-->
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">DELETE CONSULTATION BOOKING</button>
                                        <a href="<?= ROOT ?>/admin/consultation" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main><!-- End #main -->


<!-- ======= Footer ======= -->
<?php $this->view('admin/inc/admin-footer') ?>