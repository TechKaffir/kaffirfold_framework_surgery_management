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
                                <h4 class="text-center">UPDATE MEDS DISPENSED</h4>
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
                                    <div class="col-lg-12">
                                        <label for="actual">Actual Meds dispensed</label>
                                        <textarea name="<?= esc('actual') ?>" class="form-control mb-1" id="actual" cols="30" rows="3"><?= old_value('actual', $row->actual) ?></textarea>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="notes">Notes</label>
                                        <textarea name="<?= esc('notes') ?>" class="form-control mb-1" id="notes" cols="30" rows="3"><?= old_value('notes', $row->notes) ?></textarea>
                                    </div>
                                </div>

                                <!--SUBMIT BTN-->
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">UPDATE RECORD</button>
                                        <a href="<?= ROOT ?>/admin/pharmacy" class="btn btn-danger">CANCEL</a>
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
                                <!--DATE RECORD DELETED-->
                                <input type="hidden" name="<?= esc('date_deleted') ?>" value="<?= date('Y-m-d H:i:s') ?>">
                                <!--#### END HIDDEN INPUTS  ####-->

                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger text-center col-lg-12">
                                        <?= implode('<br>', $errors);  ?>
                                    </div>
                                <?php endif; ?>

                                <!--ROW 1-->
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="actual">Actual Meds dispensed</label>
                                        <div name="<?= esc('actual') ?>" class="form-control mb-1"><?= $row->actual ?></div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="notes">Notes</label>
                                        <div name="<?= esc('notes') ?>" class="form-control mb-1"><?= $row->notes ? $row->notes : 'Empty Input' ?></div>
                                    </div>
                                </div>

                                <!--SUBMIT BTN-->
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">DELETE RECORD</button>
                                        <a href="<?= ROOT ?>/admin/pharmacy" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>
                        <?php else : ?>
                            <?= Util::displayFlash('meds_dispense_update_success','success') ?>
                            <?= Util::displayFlash('meds_dispense_delete_success','success') ?>
                            <!-- Medicine Dispensed Table -->
                            <table class="table table-striped table-sm table-responsive table-hover datatable" style="font-size: 10px;">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Patient</th>
                                        <th scope="col">Consultation Date</th>
                                        <th scope="col">Plan(Dispensed)</th>
                                        <th scope="col">Notes</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $userRows = 1;
                                    if (!empty($rows)) :
                                        foreach ($rows as $row) :
                                    ?>
                                            <tr>
                                                <td><?= $userRows++ ?></td>
                                                <td><?= $row->Surname . ', ' . $row->First_Name ?></td>
                                                <td><?= $row->date ?></td>
                                                <td><?= $row->actual ?></td>
                                                <td><?= $row->notes ?></td>
                                                <td>
                                                    <div class="text-center d-flex">
                                                        <a href="<?= ROOT ?>/admin/pharmacy/edit/<?= $row->id ?>"><i class="bi bi-pencil-square m-2 text-primary"></i></a>
                                                        <a href="<?= ROOT ?>/admin/pharmacy/delete/<?= $row->id ?>"><i class="bi bi-trash m-2 text-danger"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                    <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </tbody>
                            </table>
                            <!-- End Medicine Dispensed Table -->
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main><!-- End #main -->


<!-- ======= Footer ======= -->
<?php $this->view('admin/inc/admin-footer') ?>