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
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header bg-<?= THEME_COLOR ?>" id="headingTwo">
                                            <button class="accordion-button collapsed bg-<?= THEME_COLOR ?> text-light my-2" type="button" data-bs-toggle="collapse" data-bs-target="#doctorNotes" aria-expanded="false" aria-controls="doctorNotes">
                                                Medicines dispensed for the past month
                                            </button>
                                        </h2>
                                        <div id="doctorNotes" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#patientMedicalRecords">
                                            <div class="accordion-body">
                                                <!-- Medicine Dispensed Table -->
                                                <table class="table table-striped table-sm table-responsive table-hover datatable" style="font-size: 10px;">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Patient</th>
                                                            <th scope="col">Consultation Date</th>
                                                            <th scope="col">Medication</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $userRows = 1;
                                                        if (!empty($medDispensePast30)) :
                                                            foreach ($medDispensePast30 as $row) :
                                                        ?>
                                                                <tr>
                                                                    <td><?= $userRows++ ?></td>
                                                                    <td><?= $row->Surname . ', ' . $row->First_Name ?></td>
                                                                    <td><?= $row->date ?></td>
                                                                    <td><?= $row->actual ?></td>
                                                                </tr>
                                                        <?php
                                                            endforeach;
                                                        endif;
                                                        ?>
                                                    </tbody>
                                                </table>
                                                <!-- End Medicine Dispensed Table -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="row">
                                    <div class="row my-3">
                                        <h5>ADD A REPORT ON A CLAIM <button type="button" class="btn btn-outline-danger float-end" onclick="window.history.back()" style="border-radius: 20px;"><i class="bi bi-arrow-left"></i>BACK</button></h5>
                                    </div>
                                    <form method="POST" action="">
                                        <!--CSRF TOKEN-->
                                        <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                        <!--USER REPORTING ON THE CLAIM-->
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
                                                <select name="<?= esc('patient') ?>" class="form-control mb-1" id="patient">
                                                    <option value="Select Patient">--Select Patient--</option>
                                                    <?php if ($patientList) : foreach ($patientList as $patRow) : ?>
                                                            <option value="<?= $patRow->id ?>"><?= $patRow->Surname . ' ' . $patRow->First_Name ?></option>
                                                    <?php endforeach;
                                                    endif; ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="consultation_date">Consultation Date</label>
                                                <input type="date" name="<?= esc('consultation_date') ?>" value="<?= old_value('consultation_date') ?>" class="form-control mb-1" id="consultation_date">
                                            </div>
                                        </div>
                                        <!--ROW 2-->
                                        <div class="row form-row">
                                            <div class="col-lg-6">
                                                <label for="claim_date">Claim Date</label>
                                                <input type="date" name="<?= esc('claim_date') ?>" value="<?= old_value('claim_date') ?>" class="form-control mb-1" id="claim_date">
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="note">Note</label>
                                                <textarea name="<?= esc('note') ?>" class="form-control mb-1" id="note" cols="30" rows="1"><?= old_value('note') ?></textarea>
                                            </div>
                                        </div>
                                        <hr class="my-3">
                                        <div class="form-row">
                                            <div class="d-grid gap-2 col-lg-12">
                                                <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">SAVE RECORD</button>
                                                <a href="<?= ROOT ?>/admin/claims" class="btn btn-danger">CANCEL</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php elseif ($action == 'edit') : ?>
                            <div class="row my-3">
                                <h4>EDIT CLAIM REPORT</h4>
                            </div>
                            <form method="POST" action="">
                                <!--CSRF TOKEN-->
                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <!--USER UPDATING THE CLAIM REPORT-->
                                <input type="hidden" name="<?= esc('updated_by') ?>" value="<?= user('firstname') . ' ' . user('surname') ?>">
                                <!--DATE CLAIM REPORT UPDATED-->
                                <input type="hidden" name="<?= esc('date_updated') ?>" value="<?= date('Y-m-d H:i:s') ?>">
                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger text-center col-lg-12">
                                        <?= implode('<br>', $errors);  ?>
                                    </div>
                                <?php endif; ?>
                                
                                <!--ROW 1-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="patient">Patient</label>
                                        <?php $patientSel = old_value('patient',$row->patient) ?>
                                        <select name="<?= esc('patient') ?>" class="form-control mb-1" id="patient">
                                            <option value="Select Patient">--Select Patient--</option>
                                            <?php if ($patientList) : foreach ($patientList as $patRow) : ?>
                                                    <option value="<?= $patRow->id ?>" <?= $patientSel == $patRow->id ? 'selected' : '' ?>><?= $patRow->Surname . ' ' . $patRow->First_Name ?></option>
                                            <?php endforeach;
                                            endif; ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="consultation_date ">Consultation Date</label>
                                        <input type="date" name="<?= esc('consultation_date ') ?>" value="<?= old_value('consultation_date',$row->consultation_date) ?>" class="form-control mb-1" id="consultation_date ">
                                    </div>
                                </div>
                                <!--ROW 2-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="claim_date">Claim Date</label>
                                        <input type="date" name="<?= esc('claim_date') ?>" value="<?= old_value('claim_date',$row->claim_date) ?>" class="form-control mb-1" id="claim_date">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="note">Note</label>
                                        <textarea name="<?= esc('note') ?>" class="form-control mb-1" id="note" cols="30" rows="1"><?= old_value('note',$row->note) ?></textarea>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">SAVE RECORD</button>
                                        <a href="<?= ROOT ?>/admin/claims" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>
                        <?php elseif ($action == 'delete') : ?>
                            <div class="row my-3">
                                <h3 class="text-center">DELETE </h3>
                            </div>
                            <form method="POST">
                                <!--CSRF TOKEN-->
                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <!--USER DELETING THE RECORD-->
                                <input type="hidden" name="<?= esc('deleted_by') ?>" value="<?= user('firstname') . ' ' . user('surname') ?>">
                                <!--DATE CLAIM REPORT DELETED-->
                                <input type="hidden" name="<?= esc('date_deleted') ?>" value="<?= date('Y-m-d H:i:s') ?>">
                                
                                <!--ROW 1-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="patient">Patient</label>
                                        <div class="form-control mb-1"><?= $row->patient ?></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="consultation_date">Consultation Date</label>
                                        <div class="form-control mb-1"><?= $row->consultation_date ?></div>
                                    </div>
                                </div>
                                <!--ROW 2-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="claim_date">Claim Date</label>
                                        <div class="form-control mb-1"><?= $row->claim_date ?></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="note">Note</label>
                                        <div class="form-control mb-1"><?= $row->note ? $row->note : 'Empty Input' ?></div>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">DELETE RECORD</button>
                                        <a href="<?= ROOT ?>/admin/claims" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>

                        <?php else : ?>
                            <?php if (user('user_role') == 'Admin' || user('user_role') == 'Manager') : ?>
                                <div class="row mt-3">
                                    <a href="<?= ROOT ?>/admin/claims/new" class="btn btn-outline-<?= THEME_COLOR ?>">ADD NEW CLAIM REPORT</a>
                                </div>
                                <hr>
                                <?= Util::displayFlash('claim_insert_success','success') ?>
                                <?= Util::displayFlash('claim_update_success','success') ?>
                                <?= Util::displayFlash('claim_delete_success','success') ?>
                            <?php endif; ?>
                            <div class="row">
                                <!-- Table with stripped rows -->
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Patient</th>
                                            <th>Consultation Date</th>
                                            <th>Claim Date</th>
                                            <th>Note</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $userRows = 1;
                                        if (!empty($claims)) :
                                            foreach ($claims as $row) :
                                        ?>
                                                <tr>
                                                    <th><?= $userRows++ ?></th>
                                                    <td><?= $row->Surname . ', ' . $row->First_Name ?></td>
                                                    <td><?= $row->consultation_date ?></td>
                                                    <td><?= $row->claim_date ?></td>
                                                    <td><?= $row->note ?></td>
                                                    <td>
                                                        <div class="text-center d-flex">
                                                            <a href="<?= ROOT ?>/admin/claims/edit/<?= $row->id ?>"><i class="bi bi-pencil-square m-2 text-primary"></i></a>
                                                            <a href="<?= ROOT ?>/admin/claims/delete/<?= $row->id ?>"><i class="bi bi-trash m-2 text-danger"></i></a>
                                                        </div>
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
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php $this->view('admin/inc/admin-footer') ?>