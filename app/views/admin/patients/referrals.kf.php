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
                                <h4 class="text-center">CREATE NEW REFERRAL</h4>
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
                                    <div class="col-lg-12">
                                        <label for="Patient">Patient</label>
                                        <?php $selPatForReferral = old_value('Patient') ?>
                                        <select name="<?= esc('Patient') ?>" class="form-control mb-1 selPatient" id="Patient">
                                            <option value="Select Patient">--Select Patient--</option>
                                            <?php if ($patients) : foreach ($patients as $patRow) : ?>
                                                    <option value="<?= $patRow->id ?>"><?= $patRow->Surname . ' ' . $patRow->First_Name ?></option>
                                            <?php endforeach;
                                            endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <!--ROW 2-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="Med_Centre">Medical Centre</label>
                                        <input type="text" name="<?= esc('Med_Centre') ?>" value="<?= old_value('Med_Centre') ?>" class="form-control mb-1" id="Med_Centre">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="Type_of_treatment">type of treatment</label>
                                        <input type="text" name="<?= esc('Type_of_treatment') ?>" value="<?= old_value('Type_of_treatment') ?>" class="form-control mb-1" id="Type_of_treatment">
                                    </div>
                                </div>
                                <!--ROW 3-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="Status">Status</label>
                                        <?php $selRefStatus  = old_value('Status') ?>
                                        <select name="<?= esc('Status') ?>" class="form-control mb-1" id="Status">
                                            <option value="Referred">Referred</option>
                                            <option value="Results In">Results In</option>
                                            <option value="Results Interpreted">Results Interpreted</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="Message">Message</label>
                                        <textarea name="<?= esc('Message') ?>" class="form-control mb-1" id="Message" cols="30" rows="1"><?= old_value('Message') ?></textarea>
                                    </div>
                                </div>

                                <hr class="my-3">
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">SAVE REFERRAL</button>
                                        <a href="<?= ROOT ?>/admin/referrals" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>
                        <?php elseif ($action == 'edit') : ?>
                            <div class="row my-3">
                                <h4 class="text-center">EDIT REFERRAL</h4>
                            </div>
                            <form method="POST" action="" enctype="multipart/form-data">
                                <!--CSRF TOKEN-->
                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <!--USER UPDATING RECORD-->
                                <input type="hidden" name="<?= esc('updated_by') ?>" value="<?= user('firstname') . ' ' . user('surname') ?>">
                                <!--DATE RECORD UPDATED-->
                                <input type="hidden" name="<?= esc('date_updated') ?>" value="<?= date('Y-m-d H:i:s') ?>">

                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger text-center col-lg-12">
                                        <?= implode('<br>', $errors);  ?>
                                    </div>
                                <?php endif; ?>
                                <!--ROW 1-->
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="Patient">Patient</label>
                                        <?php $selPatForReferral = old_value('Patient', $row->Patient) ?>
                                        <select name="<?= esc('Patient') ?>" class="form-control mb-1" id="Patient">
                                            <option value="Select Patient">--Select Patient--</option>
                                            <?php if ($patients) : foreach ($patients as $patRow) : ?>
                                                    <option value="<?= $patRow->id ?>" <?= $selPatForReferral == $patRow->id ? 'selected' : '' ?>><?= $patRow->Surname . ' ' . $patRow->First_Name ?></option>
                                            <?php endforeach;
                                            endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <!--ROW 2-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="Med_Centre">Medical Centre</label>
                                        <input type="text" name="<?= esc('Med_Centre') ?>" value="<?= old_value('Med_Centre', $row->Med_Centre) ?>" class="form-control mb-1" id="Med_Centre">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="Type_of_treatment">type of treatment</label>
                                        <input type="text" name="<?= esc('Type_of_treatment') ?>" value="<?= old_value('Type_of_treatment', $row->Type_of_treatment) ?>" class="form-control mb-1" id="Type_of_treatment">
                                    </div>
                                </div>
                                <!--ROW 3-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="Status">Status</label>
                                        <?php $selRefStatus  = old_value('Status', $row->Status) ?>
                                        <select name="<?= esc('Status') ?>" class="form-control mb-1" id="Status">
                                            <option value="Referred" <?= $selRefStatus == 'Referred' ? 'selected' : '' ?>>Referred</option>
                                            <option value="Results In" <?= $selRefStatus == 'Results In' ? 'selected' : '' ?>>Results In</option>
                                            <option value="Results Interpreted" <?= $selRefStatus == 'Results Interpreted' ? 'selected' : '' ?>>Results Interpreted</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="Message">Message</label>
                                        <textarea name="<?= esc('Message') ?>" class="form-control mb-1" id="Message" cols="30" rows="1"><?= old_value('Message', $row->Message) ?></textarea>
                                    </div>
                                </div>

                                <hr class="my-3">
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">UPDATE REFERRAL</button>
                                        <a href="<?= ROOT ?>/admin/referrals" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>
                        <?php elseif ($action == 'delete') : ?>
                            <div class="row my-3">
                                <h3 class="text-center">DELETE REFERRAL</h3>
                            </div>
                            <form method="POST" action="" enctype="multipart/form-data">
                                <!--CSRF TOKEN-->
                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <!--USER DELETING RECORD-->
                                <input type="hidden" name="<?= esc('deleted_by') ?>" value="<?= user('firstname') . ' ' . user('surname') ?>">
                                <!--DATE RECORD DELETED-->
                                <input type="hidden" name="<?= esc('date_deleted') ?>" value="<?= date('Y-m-d H:i:s') ?>">

                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger text-center col-lg-12">
                                        <?= implode('<br>', $errors);  ?>
                                    </div>
                                <?php endif; ?>
                                <!--ROW 1-->
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="Patient">Patient</label>
                                        <div class="form-control mb-1"><?= $row->Patient ?></div>
                                    </div>
                                </div>
                                <!--ROW 2-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="Med_Centre">Medical Centre</label>
                                        <div class="form-control mb-1"><?= $row->Med_Centre ?></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="Type_of_treatment">type of treatment</label>
                                        <div class="form-control mb-1"><?= $row->Type_of_treatment ?></div>
                                    </div>
                                </div>
                                <!--ROW 3-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="Status">Status</label>
                                        <div class="form-control mb-1"><?= $row->Status ?></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="Message">Message</label>
                                        <div class="form-control mb-1"><?= $row->Message ?></div>
                                    </div>
                                </div>

                                <hr class="my-3">
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">DELETE REFERRAL</button>
                                        <a href="<?= ROOT ?>/admin/referrals" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>

                        <?php else : ?>

                            <div class="row mt-3">
                                <a href="<?= ROOT ?>/admin/referrals/new" class="btn btn-outline-<?= THEME_COLOR ?>">MAKE NEW REFERRAL</a>
                            </div>
                            <hr>
                            <div class="row">
                                <?= Util::displayFlash('referral_insert_success','success') ?>
                                <?= Util::displayFlash('referral_update_success','success') ?>
                                <?= Util::displayFlash('referral_delete_success','success') ?>
                                <div class="col-lg-12 table-responsive">
                                    <!-- Table with stripped rows -->
                                    <table class="table datatable table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Referral Date</th>
                                                <th scope="col">Patient</th>
                                                <th scope="col">Med_Centre</th>
                                                <th scope="col">Type_of_treatment</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Message</th>
                                                <th scope="col">Capturer</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $userRows = 1;
                                            if (!empty($referrals)) :
                                                foreach ($referrals as $row) :
                                            ?>
                                                    <tr>
                                                        <th scope="row"><?= $userRows++ ?></th>

                                                        <td><?= $row->Date ?></td>
                                                        <td><?= $row->Patient ?></td>
                                                        <td><?= $row->Med_Centre ?></td>
                                                        <td><?= $row->Type_of_treatment ?></td>
                                                        <td><?= $row->Status ?></td>
                                                        <td><?= $row->Message ?></td>
                                                        <td><?= $row->created_by ?></td>
                                                        <td>
                                                            <div class="text-center d-flex">
                                                                <a href="<?= ROOT ?>/admin/referrals/edit/<?= $row->id ?>"><i class="bi bi-pencil-square m-2"></i></a>
                                                                <a href="<?= ROOT ?>/admin/referrals/delete/<?= $row->id ?>" onclick="alert('Are you sure you want to delete this record? This action cannot be reversed. Click \'OK\' to proceed OR \'JUST REFRESH THE PAGE\' to cancel the action!')"><i class="bi bi-trash m-2 text-danger "></i></a>
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