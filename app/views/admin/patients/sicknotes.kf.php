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
                                <h4>ADD PATIENT SICK NOTE</h4>
                            </div>

                            <form method="POST" style="font-size:12px" enctype="multipart/form-data">
                                <!--CSRF TOKEN-->
                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <!--QR CODE LABEL-->
                                <input type="hidden" name="<?= esc('label') ?>" value="<?= APP_NAME_SHORT . rand(0,999999) ?>">
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
                                        <label for="title_1">Title 1</label>
                                        <?php $selTitle1 =  old_value('title_1') ?>
                                        <select name="<?= esc('title_1') ?>" class="form-control mb-1" id="title_1">
                                            <option value="Mr">Mr</option>
                                            <option value="Mrs">Mrs</option>
                                            <option value="Miss">Miss</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="patient">Patient</label>
                                        <select name="<?= esc('patient') ?>" class="form-control mb-1 selPatient" id="patient">
                                            <option value="Select Patient">--Select Patient--</option>
                                            <?php if ($patientList) : foreach ($patientList as $patRow) : ?>
                                                    <option value="<?= $patRow->id ?>"><?= $patRow->Surname . ' ' . $patRow->First_Name ?></option>
                                            <?php endforeach;
                                            endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <!--ROW 2-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="employment_number">Employment Number</label>
                                        <input type="text" name="<?= esc('employment_number') ?>" value="<?= old_value('employment_number') ?>" class="form-control mb-1" id="employment_number">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="cons_date">Consultation Date</label>
                                        <input type="date" name="<?= esc('cons_date') ?>" value="<?= old_value('cons_date', date('Y-m-d')) ?>" class="form-control mb-1" id="cons_date">
                                    </div>
                                </div>
                                <!--ROW 3-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="cons_time">Consultation Time</label>
                                        <input type="time" name="<?= esc('cons_time') ?>" value="<?= old_value('cons_time', date('H:i')) ?>" class="form-control mb-1" id="cons_time">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="title_2">Title 2</label>
                                        <?php $selTitle2 =  old_value('title_2') ?>
                                        <select name="<?= esc('title_2') ?>" class="form-control mb-1" id="title_2">
                                            <option value="He">He</option>
                                            <option value="She">She</option>
                                        </select>
                                    </div>
                                </div>
                                <!--ROW 4-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="title_3">Title 3</label>
                                        <?php $selTitle3 =  old_value('title_3') ?>
                                        <select name="<?= esc('title_3') ?>" class="form-control mb-1" id="title_3">
                                            <option value="He">He</option>
                                            <option value="She">She</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="sick_from_date">Date Sick From</label>
                                        <input type="date" name="<?= esc('sick_from_date') ?>" value="<?= old_value('sick_from_date') ?>" class="form-control mb-1" id="sick_from_date">
                                    </div>
                                </div>
                                <!--ROW 5-->
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="clinical_diagnosis">Clinical Diagnosis</label>
                                        <textarea name="<?= esc('clinical_diagnosis') ?>" class="form-control mb-1" id="clinical_diagnosis" cols="30" rows="4"><?= old_value('clinical_diagnosis') ?></textarea>
                                    </div>
                                </div>
                                <!--ROW 6-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="title_4">Title 4</label>
                                        <?php $selTitle4 =  old_value('title_4') ?>
                                        <select name="<?= esc('title_4') ?>" class="form-control mb-1" id="title_4">
                                            <option value="He">He</option>
                                            <option value="She">She</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="fit_date">Fitness Date</label>
                                        <input type="date" name="<?= esc('fit_date') ?>" value="<?= old_value('fit_date') ?>" class="form-control mb-1" id="fit_date">
                                    </div>
                                </div>
                                <!--ROW 7-->
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="remarks">Remarks</label>
                                        <textarea name="<?= esc('remarks') ?>" class="form-control mb-1" id="remarks" cols="30" rows="4"><?= old_value('remarks') ?></textarea>
                                    </div>
                                </div>
                                <!--ROW 8-->
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="date_of_issue">Date Of Issue</label>
                                        <input type="date" name="<?= esc('date_of_issue') ?>" value="<?= old_value('date_of_issue', date('Y-m-d')) ?>" class="form-control mb-1" id="date_of_issue">
                                    </div>
                                </div>
                                
                                <!--SUBMIT BTN-->
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">REGISTER SICK NOTE</button>
                                        <a href="<?= ROOT ?>/admin/sicknotes" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>
                        <?php elseif ($action == 'edit') : ?>
                            <div class="row my-3">
                                <h4>EDIT SICK NOTE</h4>
                            </div>
                            <form method="POST" style="font-size:12px" enctype="multipart/form-data">
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
                                    <div class="col-lg-6">
                                        <label for="title_1">Title 1</label>
                                        <?php $selTitle1 =  old_value('title_1', $row->title_1) ?>
                                        <select name="<?= esc('title_1') ?>" class="form-control mb-1" id="title_1">
                                            <option value="Mr" <?= $selTitle1 == 'Mr' ? 'selected' : '' ?>>Mr</option>
                                            <option value="Mrs" <?= $selTitle1 == 'Mrs' ? 'selected' : '' ?>>Mrs</option>
                                            <option value="Miss" <?= $selTitle1 == 'Miss' ? 'selected' : '' ?>>Miss</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="patient">Patient</label>
                                        <?php $selPat4SickNote =  old_value('patient', $row->patient) ?>
                                        <select name="<?= esc('patient') ?>" class="form-control mb-1" id="patient">
                                            <option value="Select Patient">--Select Patient--</option>
                                            <?php if ($patientList) : foreach ($patientList as $patRow) : ?>
                                                    <option value="<?= $patRow->id ?>" <?= $selPat4SickNote == $patRow->id ? 'selected' : '' ?>><?= $patRow->Surname . ' ' . $patRow->First_Name ?></option>
                                            <?php endforeach;
                                            endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <!--ROW 2-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="employment_number">Employment Number</label>
                                        <input type="text" name="<?= esc('employment_number') ?>" value="<?= old_value('employment_number', $row->employment_number) ?>" class="form-control mb-1" id="employment_number">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="cons_date">Consultation Date</label>
                                        <input type="date" name="<?= esc('cons_date') ?>" value="<?= old_value('cons_date', $row->cons_date) ?>" class="form-control mb-1" id="cons_date">
                                    </div>
                                </div>
                                <!--ROW 3-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="cons_time">Consultation Time</label>
                                        <input type="time" name="<?= esc('cons_time') ?>" value="<?= old_value('cons_time', $row->cons_time) ?>" class="form-control mb-1" id="cons_time">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="title_2">Title 2</label>
                                        <?php $selTitle2 =  old_value('title_2', $row->title_2) ?>
                                        <select name="<?= esc('title_2') ?>" class="form-control mb-1" id="title_2">
                                            <option value="Mr" <?= $selTitle2 == 'Mr' ? 'selected' : '' ?>>Mr</option>
                                            <option value="Mrs" <?= $selTitle2 == 'Mrs' ? 'selected' : '' ?>>Mrs</option>
                                            <option value="Miss" <?= $selTitle2 == 'Miss' ? 'selected' : '' ?>>Miss</option>
                                        </select>
                                    </div>
                                </div>
                                <!--ROW 4-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="title_3">Title 3</label>
                                        <?php $selTitle3 =  old_value('title_3', $row->title_3) ?>
                                        <select name="<?= esc('title_3') ?>" class="form-control mb-1" id="title_3">
                                            <option value="Mr" <?= $selTitle3 == 'Mr' ? 'selected' : '' ?>>Mr</option>
                                            <option value="Mrs" <?= $selTitle3 == 'Mrs' ? 'selected' : '' ?>>Mrs</option>
                                            <option value="Miss" <?= $selTitle3 == 'Miss' ? 'selected' : '' ?>>Miss</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="sick_from_date">Date Sick From</label>
                                        <input type="date" name="<?= esc('sick_from_date') ?>" value="<?= old_value('sick_from_date', $row->sick_from_date) ?>" class="form-control mb-1" id="sick_from_date">
                                    </div>
                                </div>
                                <!--ROW 5-->
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="clinical_diagnosis">Clinical Diagnosis</label>
                                        <textarea name="<?= esc('clinical_diagnosis') ?>" class="form-control mb-1" id="clinical_diagnosis" cols="30" rows="4"><?= old_value('clinical_diagnosis', $row->clinical_diagnosis) ?></textarea>
                                    </div>
                                </div>
                                <!--ROW 6-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="title_4">Title 4</label>
                                        <?php $selTitle4 =  old_value('title_4', $row->title_4) ?>
                                        <select name="<?= esc('title_4') ?>" class="form-control mb-1" id="title_4">
                                            <option value="Mr" <?= $selTitle4 == 'Mr' ? 'selected' : '' ?>>Mr</option>
                                            <option value="Mrs" <?= $selTitle4 == 'Mrs' ? 'selected' : '' ?>>Mrs</option>
                                            <option value="Miss" <?= $selTitle4 == 'Miss' ? 'selected' : '' ?>>Miss</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="fit_date">Fitness Date</label>
                                        <input type="date" name="<?= esc('fit_date') ?>" value="<?= old_value('fit_date', $row->fit_date) ?>" class="form-control mb-1" id="fit_date">
                                    </div>
                                </div>
                                <!--ROW 7-->
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="remarks">Remarks</label>
                                        <textarea name="<?= esc('remarks') ?>" class="form-control mb-1" id="remarks" cols="30" rows="4"><?= old_value('remarks', $row->remarks) ?></textarea>
                                    </div>
                                </div>
                                <!--ROW 8-->
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="date_of_issue">Date Of Issue</label>
                                        <input type="date" name="<?= esc('date_of_issue') ?>" value="<?= old_value('date_of_issue', $row->date_of_issue) ?>" class="form-control mb-1" id="date_of_issue">
                                    </div>
                                </div>

                                <!--SUBMIT BTN-->
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">UPDATE SICK NOTE</button>
                                        <a href="<?= ROOT ?>/admin/sicknotes" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>
                        <?php elseif ($action == 'delete') : ?>
                            <div class="row my-3">
                                <h3 class="text-center">DELETE SICKNOTE</h3>
                            </div>
                            <form method="POST" style="font-size:12px" enctype="multipart/form-data">
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
                                    <div class="col-lg-6">
                                        <label for="title_1">Title 1</label>
                                        <div class="form-control mb-1"><?= $row->title_1 ?></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="patient">Patient</label>
                                        <div class="form-control mb-1"><?= $row->patient ?></div>
                                    </div>
                                </div>
                                <!--ROW 2-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="employment_number">Employment Number</label>
                                        <div class="form-control mb-1"><?= $row->employment_number ?></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="cons_date">Consultation Date</label>
                                        <div class="form-control mb-1"><?= $row->cons_date ?></div>
                                    </div>
                                </div>
                                <!--ROW 3-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="cons_time">Consultation Time</label>
                                        <div class="form-control mb-1"><?= $row->cons_time ?></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="title_2">Title 2</label>
                                        <div class="form-control mb-1"><?= $row->title_2 ?></div>
                                    </div>
                                </div>
                                <!--ROW 4-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="title_3">Title 3</label>
                                        <div class="form-control mb-1"><?= $row->title_3 ?></div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="sick_from_date">Date Sick From</label>
                                        <div class="form-control mb-1"><?= $row->sick_from_date ?></div>
                                    </div>
                                </div>
                                <!--ROW 5-->
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="clinical_diagnosis">Clinical Diagnosis</label>
                                        <div class="form-control mb-1"><?= $row->clinical_diagnosis ?></div>
                                    </div>
                                </div>
                                <!--ROW 6-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="title_4">Title 4</label>
                                        <div class="form-control mb-1"><?= $row->title_4 ?></div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="fit_date">Fitness Date</label>
                                        <div class="form-control mb-1"><?= $row->fit_date ?></div>
                                    </div>
                                </div>
                                <!--ROW 7-->
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="remarks">Remarks</label>
                                        <div class="form-control mb-1"><?= $row->remarks ?></div>
                                    </div>
                                </div>
                                <!--ROW 8-->
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="date_of_issue">Date Of Issue</label>
                                        <div class="form-control mb-1"><?= $row->date_of_issue ?></div>
                                    </div>
                                </div>

                                <!--SUBMIT BTN-->
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">DELETE SICK NOTE</button>
                                        <a href="<?= ROOT ?>/admin/sicknotes" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>

                        <?php else : ?>
                            <div class="row mt-3">
                                <a href="<?= ROOT ?>/admin/sicknotes/new" class="btn btn-outline-<?= THEME_COLOR ?>">ADD SICK NOTE</a>
                            </div>
                            <hr>
                            <?= Util::displayFlash('sicknote_insert_success', 'success') ?>
                            <?= Util::displayFlash('sicknote_update_success', 'success') ?>
                            <?= Util::displayFlash('sicknote_delete_success', 'success') ?>
                            <div class="row">
                                <!-- Table with stripped rows -->
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Patient</th>
                                            <th>Consultation Date</th>
                                            <th>Sick From</th>
                                            <th>Date Fit</th>
                                            <th>Issue Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $userRows = 1;
                                        if (!empty($sicknotes)) :
                                            foreach ($sicknotes as $row) :
                                        ?>
                                                <tr>
                                                    <th><?= $userRows++ ?></th>
                                                    <td><?= $row->Surname . ', ' . $row->First_Name ?></td>
                                                    <td><?= $row->cons_date ?></td>
                                                    <td><?= $row->sick_from_date ?></td>
                                                    <td><?= $row->fit_date ?></td>
                                                    <td><?= $row->date_of_issue  ?></td>
                                                    <td>
                                                        <div class="text-center d-flex">
                                                            <a href="<?= ROOT ?>/admin/sicknotes/view/<?= $row->patient ?>"><i class="bi bi-eye m-2 text-success"></i></a>
                                                            <a href="<?= ROOT ?>/admin/sicknotes/edit/<?= $row->id ?>"><i class="bi bi-pencil-square m-2 text-primary"></i></a>
                                                            <a href="<?= ROOT ?>/admin/sicknotes/delete/<?= $row->id ?>" onclick="alert('Are you sure you want to delete this record? This action cannot be reversed. Click \'OK\' to proceed OR \'JUST REFRESH THE PAGE\' to cancel the action!')"><i class="bi bi-trash m-2 text-danger "></i></a>
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
<script>
    $(document).ready(function() {
        $('.selPatient').select2({
            theme: 'bootstrap-5'
        });
    });
</script>

