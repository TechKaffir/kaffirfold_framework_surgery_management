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
                        <?php if ($action == 'new') : ?>
                            <div class="row my-3">
                                <h4 class="text-center">REGISTER PATIENT FOR CONSULTATION</h4>
                            </div>

                            <form method="POST" action="" enctype="multipart/form-data">
                                <!--CSRF TOKEN-->
                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <!--USER CREATING RECORD-->
                                <input type="hidden" name="<?= esc('created_by') ?>" value="<?= user('firstname') . ' ' . user('surname') ?>">
                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger text-center col-lg-12">
                                        <?= implode('<br>', $errors);  ?>
                                    </div>
                                <?php endif; ?>
                                <!--ROW 1-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="patient">Patient</label>
                                        <select name="<?= esc('patient') ?>" class="form-control mb-1 selPatient" id="patConsBooking">
                                            <option value="Select Patient">--Select Patient--</option>
                                            <?php if ($patientList) : foreach ($patientList as $patRow) : ?>
                                                    <option value="<?= $patRow->id ?>"><?= $patRow->Surname . ' ' . $patRow->First_Name ?></option>
                                            <?php endforeach;
                                            endif; ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="cash_or_medical">Cash or Medical</label>
                                        <select name="<?= esc('cash_or_medical') ?>" class="form-control mb-1" id="cash_or_medical">
                                            <option value="Medical">Medical</option>
                                            <option value="Cash">Cash</option>
                                        </select>
                                    </div>
                                </div>
                                <!--ROW 2-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="funds_status">Funds Status</label>
                                        <select name="<?= esc('funds_status') ?>" class="form-control mb-1" id="funds_status">
                                            <option value="Adequate">Adequate</option>
                                            <option value="Minimal">Minimal</option>
                                            <option value="No Funds">No Funds</option>
                                            <option value="N/A: Cash">N/A: Cash</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="status">Booking Status</label>
                                        <select name="<?= esc('status') ?>" class="form-control mb-1" id="status">
                                            <option value="Queuing: Reception Area">Queuing: Reception Area</option>
                                            <option value="Vitals captured: Nurse">Vitals captured: Nurse</option>
                                            <option value="Examined by Doctor">Examined by Doctor</option>
                                            <option value="Medication: Dispensed">Medication: Dispensed</option>
                                            <option value="Claim: Processed">Claim: Processed</option>
                                        </select>
                                    </div>
                                </div>


                                <!--ROW 5-->
                                <div class="col-lg-12">
                                    <label for="Notes">Notes</label>
                                    <textarea name="<?= esc('Notes') ?>" class="form-control mb-1" id="Notes" cols="30" rows="3"><?= old_value('Notes') ?></textarea>
                                </div>

                                <!--SUBMIT BTN-->
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">BOOK PATIENT</button>
                                        <a href="<?= ROOT ?>/admin/consultation" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>
                        <?php elseif ($action == 'edit') : ?>
                            <div class="row my-3">
                                <h4 class="text-center">UPDATE CONSULTATION BOOKING</h4>
                            </div>

                            <form method="POST" action="" enctype="multipart/form-data">
                                <!--CSRF TOKEN-->
                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <!--USER UPDATING RECORD-->
                                <input type="hidden" name="<?= esc('updated_by') ?>" value="<?= user('firstname') . ' ' . user('surname') ?>">
                                <!--DATE RECORD UPDATED-->
                                <input type="hidden" name="<?= esc('date_updated') ?>" value="<?= date('Y-m-d H:i:s') ?>">
                                <!--PATIENT RELATED TO THE BOOKING-->
                                <input type="hidden" name="<?= esc('patient') ?>" value="<?= $row->patient ?>">
                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger text-center col-lg-12">
                                        <?= implode('<br>', $errors);  ?>
                                    </div>
                                <?php endif; ?>
                                <!--ROW 1-->

                                <div class="row form-row">

                                    <div class="col-lg-6">
                                        <?php $selPayment = $row->cash_or_medical ?>
                                        <label for="cash_or_medical">Cash or Medical</label>
                                        <select name="<?= esc('cash_or_medical') ?>" class="form-control mb-1" id="cash_or_medical">
                                            <option value="Select Payment">--Select Payment--</option>
                                            <option value="Medical" <?= $selPayment == 'Medical' ? 'selected' : '' ?>>Medical</option>
                                            <option value="Cash" <?= $selPayment == 'Cash' ? 'selected' : '' ?>>Cash</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="funds_status">Funds Status</label>
                                        <?php $selFundsStatus = $row->funds_status ?>
                                        <select name="<?= esc('funds_status') ?>" class="form-control mb-1" id="funds_status">
                                            <option value="Select Funds Status">--Select Funds Status--</option>
                                            <option value="Adequate" <?= $selFundsStatus == 'Adequate' ? 'selected' : '' ?>>Adequate</option>
                                            <option value="Limited" <?= $selFundsStatus == 'Limited' ? 'selected' : '' ?>>Limited</option>
                                            <option value="No Funds" <?= $selFundsStatus == 'No Funds' ? 'selected' : '' ?>>No Funds</option>
                                            <option value="N/A: Cash" <?= $selFundsStatus == 'N/A: Cash' ? 'selected' : '' ?>>N/A: Cash</option>
                                        </select>
                                    </div>
                                </div>
                                <!--ROW 2-->
                                <div class="row form-row">

                                    <div class="col-lg-6">
                                        <label for="status">Booking Status</label>
                                        <?php $selStatus = $row->status ?>
                                        <select name="<?= esc('status') ?>" class="form-control mb-1" id="status">
                                            <option value="Queuing: Reception Area" <?= $selStatus == 'Queuing: Reception Area' ? 'selected' : '' ?>>Queuing: Reception Area</option>
                                            <option value="Vitals captured: Nurse" <?= $selStatus == 'Vitals captured: Nurse' ? 'selected' : '' ?>>Vitals captured: Nurse</option>
                                            <option value="Examined by Doctor" <?= $selStatus == 'Examined by Doctor' ? 'selected' : '' ?>>Examined by Doctor</option>
                                            <option value="Medication: Dispensed" <?= $selStatus == 'Medication: Dispensed' ? 'selected' : '' ?>>Medication: Dispensed</option>
                                            <option value="Claim: Processed" <?= $selStatus == 'Claim: Processed' ? 'selected' : '' ?>>Claim: Processed</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="Notes">Notes</label>
                                        <textarea name="<?= esc('Notes') ?>" class="form-control mb-1" id="Notes" cols="30" rows="1"><?= old_value('Notes', $row->Notes) ?></textarea>
                                    </div>

                                </div>

                                <!--SUBMIT BTN-->
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">UPDATE CONSULTATION BOOKING</button>
                                        <a href="<?= ROOT ?>/admin/consultation" class="btn btn-danger">CANCEL</a>
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
                                        <label for="Notes">Notes</label>
                                        <div class="form-control mb-1"><?= $row->Notes ? $row->Notes : 'Empty input: no notes added' ?></div>
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
                        <?php elseif ($action == 'view') : ?>
                            <!--Single Consultation View-->

                            <section class="section profile mt-5">
                                <div class="row my-3">
                                    <h6 class="text-center">VIEW THIS PATIENT BOOKING NOTES</h6>
                                </div>

                                <form>
                                    <div class="row form-row">
                                        <div class="col-lg-12">
                                            <label for="Notes">Notes</label>
                                            <div class="form-control mb-1"><?= $singleBooking->Notes ? $singleBooking->Notes : 'Empty Input (No note added)' ?></div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <button type="button" class="btn btn-danger" onclick="window.history.back()"><i class="bi bi-arrow-left"></i>BACK</button>
                                    </div>
                                </form>
                            </section>

                        <?php else : ?>

                            <div class="row mt-3">
                                <a href="<?= ROOT ?>/admin/consultation/new" class="btn btn-outline-<?= THEME_COLOR ?>">BOOK PATIENT FOR CONSULTATION</a>
                            </div>
                            <hr>

                            <?= Util::displayFlash('cons_book_insert_success', 'success') ?>
                            <?= Util::displayFlash('cons_book_update_success', 'success') ?>
                            <?= Util::displayFlash('cons_book_delete_success', 'success') ?>

                            <div class="row">
                                <!-- Table -->
                                <table class="table datatable" style="font-size: 12px;">
                                    <thead class="bg-success text-light">
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

                                                    <td>
                                                        <a href="<?= ROOT ?>/admin/patients/view/<?= $row->patient ?>">
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
                                                                <span class="td-btn-secondary">Queuing: Reception Area</span>
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
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main><!-- End #main -->


<!-- ======= Footer ======= -->
<?php $this->view('admin/inc/admin-footer') ?>
<script>
    $(document).ready(function() {
        $('.selPatient').select2({
            theme: 'bootstrap-5'
        });
    });
</script>