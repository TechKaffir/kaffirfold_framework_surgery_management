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
                                <h3 class="text-center">ADD NEW PATIENT</h3>
                            </div>

                            <form method="POST" style="font-size:12px" enctype="multipart/form-data">
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
                                    <div class="col-lg-4">
                                        <label for="Surname">Surname</label>
                                        <input type="text" name="<?= esc('Surname') ?>" value="<?= old_value('Surname') ?>" class="form-control mb-1" id="Surname">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="First_Name">First Name</label>
                                        <input type="text" name="<?= esc('First_Name') ?>" value="<?= old_value('First_Name') ?>" class="form-control mb-1" id="First_Name">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="identity_number">Identity Number</label>
                                        <input type="text" name="<?= esc('identity_number') ?>" value="<?= old_value('identity_number') ?>" class="form-control mb-1" id="identity_number">
                                    </div>
                                </div>
                                <!--ROW 2-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="File_Number">File Number</label>
                                        <input type="text" name="<?= esc('File_Number') ?>" value="<?= old_value('File_Number') ?>" class="form-control mb-1" id="File_Number">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="occupation">Occupation</label>
                                        <input type="text" name="<?= esc('occupation') ?>" value="<?= old_value('occupation') ?>" class="form-control mb-1" id="occupation">
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="date_of_birth">Date of birth</label>
                                        <input type="date" name="<?= esc('date_of_birth') ?>" value="<?= old_value('date_of_birth') ?>" class="form-control mb-1" id="date_of_birth" onchange="calculateAge()">
                                    </div>
                                </div>
                                <!--ROW 3-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="Age">Age</label>
                                        <input type="text" name="<?= esc('Age') ?>" value="<?= old_value('Age') ?>" class="form-control mb-1" id="Age" readonly>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="home_language">Home Language</label>
                                        <input type="text" name="<?= esc('home_language') ?>" value="<?= old_value('home_language') ?>" class="form-control mb-1" id="home_language">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="marital_status">Marital Status</label>
                                        <select name="<?= esc('marital_status') ?>" class="form-control mb-1" id="marital_status">
                                            <option value="Select Marital Status">--Select Marital Status--</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Divorced">Divorced</option>
                                        </select>
                                    </div>
                                </div>
                                <!--ROW 4-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="contact_number">Patient Phone</label>
                                        <input type="text" name="<?= esc('contact_number') ?>" value="<?= old_value('contact_number') ?>" class="form-control mb-1" id="contact_number">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="patient_email">Patient Email</label>
                                        <input type="text" name="<?= esc('patient_email') ?>" value="<?= old_value('patient_email') ?>" class="form-control mb-1" id="patient_email">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="responsible_surname">Surname - Person Responsible for Account</label>
                                        <input type="text" name="<?= esc('responsible_surname') ?>" value="<?= old_value('responsible_surname') ?>" class="form-control mb-1" id="responsible_surname">
                                    </div>
                                </div>
                                <!--ROW 5-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="responsible_firstName">First Name - Person Responsible for
                                            Account</label>
                                        <input type="text" name="<?= esc('responsible_firstName') ?>" value="<?= old_value('responsible_firstName') ?>" class="form-control mb-1" id="responsible_firstName">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="responsible_IdNumber">ID Number - Person Responsible for Account</label>
                                        <input type="text" name="<?= esc('responsible_IdNumber') ?>" value="<?= old_value('responsible_IdNumber') ?>" class="form-control mb-1" id="responsible_IdNumber">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="home_address">Home Address</label>
                                        <input type="text" name="<?= esc('home_address') ?>" value="<?= old_value('home_address') ?>" class="form-control mb-1" id="home_address">
                                    </div>
                                </div>
                                <!--ROW 6-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="Employer">Employer</label>
                                        <input type="text" name="<?= esc('Employer') ?>" value="<?= old_value('Employer') ?>" class="form-control mb-1" id="Employer">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="work_contact_number">Work Contact Number</label>
                                        <input type="text" name="<?= esc('work_contact_number') ?>" value="<?= old_value('work_contact_number') ?>" class="form-control mb-1" id="work_contact_number">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="medical_aid_scheme">Medical Aid Scheme</label>
                                        <input type="text" name="<?= esc('medical_aid_scheme') ?>" value="<?= old_value('medical_aid_scheme') ?>" class="form-control mb-1" id="medical_aid_scheme">
                                    </div>
                                </div>
                                <!--ROW 7-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="med_aid_number">Medical Aid Number</label>
                                        <input type="text" name="<?= esc('med_aid_number') ?>" value="<?= old_value('med_aid_number') ?>" class="form-control mb-1" id="med_aid_number">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="next_of_kin">Next of kin</label>
                                        <input type="text" name="<?= esc('next_of_kin') ?>" value="<?= old_value('next_of_kin') ?>" class="form-control mb-1" id="next_of_kin">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="contact_no">Phone - Next of kin</label>
                                        <input type="text" name="<?= esc('contact_no') ?>" value="<?= old_value('contact_no') ?>" class="form-control mb-1" id="contact_no">
                                    </div>
                                </div>

                                <!--SUBMIT BTN-->
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">REGISTER NEW
                                            PATIENT</button>
                                        <button type="button" class="btn btn-danger" onclick="window.history.back()">CANCEL</button>
                                    </div>
                                </div>
                            </form>
                        <?php elseif ($action == 'edit') : ?>
                            <div class="row my-3">
                                <h3 class="text-center">EDIT PATIENT</h3>
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
                                    <div class="col-lg-4">
                                        <label for="Surname">Surname</label>
                                        <input type="text" name="<?= esc('Surname') ?>" value="<?= old_value('Surname',$row->Surname) ?>" class="form-control mb-1" id="Surname">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="First_Name">First Name</label>
                                        <input type="text" name="<?= esc('First_Name') ?>" value="<?= old_value('First_Name',$row->First_Name) ?>" class="form-control mb-1" id="First_Name">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="identity_number">Identity Number</label>
                                        <input type="text" name="<?= esc('identity_number') ?>" value="<?= old_value('identity_number',$row->identity_number) ?>" class="form-control mb-1" id="identity_number">
                                    </div>
                                </div>
                                <!--ROW 2-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="File_Number">File Number</label>
                                        <input type="text" name="<?= esc('File_Number') ?>" value="<?= old_value('File_Number',$row->File_Number) ?>" class="form-control mb-1" id="File_Number">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="occupation">Occupation</label>
                                        <input type="text" name="<?= esc('occupation') ?>" value="<?= old_value('occupation',$row->occupation) ?>" class="form-control mb-1" id="occupation">
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="date_of_birth">Date of birth</label>
                                        <input type="date" name="<?= esc('date_of_birth') ?>" value="<?= old_value('date_of_birth',$row->date_of_birth) ?>" class="form-control mb-1" id="date_of_birth" onchange="calculateAge()">
                                    </div>
                                </div>
                                <!--ROW 3-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="Age">Age</label>
                                        <input type="text" name="<?= esc('Age') ?>" value="<?= $row->Age ?>" class="form-control mb-1" id="Age" readonly>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="home_language">Home Language</label>
                                        <input type="text" name="<?= esc('home_language') ?>" value="<?= old_value('home_language',$row->home_language) ?>" class="form-control mb-1" id="home_language">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="marital_status">Marital Status</label>
                                        <?php $selMarStatus = old_value('marital_status',$row->marital_status) ?>
                                        <select name="<?= esc('marital_status') ?>" class="form-control mb-1" id="marital_status">
                                            <option value="Select Marital Status">--Select Marital Status--</option>
                                            <option value="Single" <?= $selMarStatus == 'Single' ? 'selected' : '' ?>>Single</option>
                                            <option value="Married" <?= $selMarStatus == 'Married' ? 'selected' : '' ?>>Married</option>
                                            <option value="Divorced" <?= $selMarStatus == 'Divorced' ? 'selected' : '' ?>>Divorced</option>
                                        </select>
                                    </div>
                                </div>
                                <!--ROW 4-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="contact_number">Patient Phone</label>
                                        <input type="text" name="<?= esc('contact_number') ?>" value="<?= old_value('contact_number',$row->contact_number) ?>" class="form-control mb-1" id="contact_number">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="patient_email">Patient Email</label>
                                        <input type="text" name="<?= esc('patient_email') ?>" value="<?= old_value('patient_email',$row->patient_email) ?>" class="form-control mb-1" id="patient_email">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="responsible_surname">Surname - Person Responsible for Account</label>
                                        <input type="text" name="<?= esc('responsible_surname') ?>" value="<?= old_value('responsible_surname',$row->responsible_surname) ?>" class="form-control mb-1" id="responsible_surname">
                                    </div>
                                </div>
                                <!--ROW 5-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="responsible_firstName">First Name - Person Responsible for
                                            Account</label>
                                        <input type="text" name="<?= esc('responsible_firstName') ?>" value="<?= old_value('responsible_firstName',$row->responsible_firstName) ?>" class="form-control mb-1" id="responsible_firstName">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="responsible_IdNumber">ID Number - Person Responsible for Account</label>
                                        <input type="text" name="<?= esc('responsible_IdNumber') ?>" value="<?= old_value('responsible_IdNumber',$row->responsible_IdNumber) ?>" class="form-control mb-1" id="responsible_IdNumber">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="home_address">Home Address</label>
                                        <input type="text" name="<?= esc('home_address') ?>" value="<?= old_value('home_address',$row->home_address) ?>" class="form-control mb-1" id="home_address">
                                    </div>
                                </div>
                                <!--ROW 6-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="Employer">Employer</label>
                                        <input type="text" name="<?= esc('Employer') ?>" value="<?= old_value('Employer',$row->Employer) ?>" class="form-control mb-1" id="Employer">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="work_contact_number">Work Contact Number</label>
                                        <input type="text" name="<?= esc('work_contact_number') ?>" value="<?= old_value('work_contact_number',$row->work_contact_number) ?>" class="form-control mb-1" id="work_contact_number">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="medical_aid_scheme">Medical Aid Scheme</label>
                                        <input type="text" name="<?= esc('medical_aid_scheme') ?>" value="<?= old_value('medical_aid_scheme',$row->medical_aid_scheme) ?>" class="form-control mb-1" id="medical_aid_scheme">
                                    </div>
                                </div>
                                <!--ROW 7-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="med_aid_number">Medical Aid Number</label>
                                        <input type="text" name="<?= esc('med_aid_number') ?>" value="<?= old_value('med_aid_number',$row->med_aid_number) ?>" class="form-control mb-1" id="med_aid_number">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="next_of_kin">Next of kin</label>
                                        <input type="text" name="<?= esc('next_of_kin') ?>" value="<?= old_value('next_of_kin',$row->next_of_kin) ?>" class="form-control mb-1" id="next_of_kin">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="contact_no">Phone - Next of kin</label>
                                        <input type="text" name="<?= esc('contact_no') ?>" value="<?= old_value('contact_no',$row->contact_no) ?>" class="form-control mb-1" id="contact_no">
                                    </div>
                                </div>

                                <!--SUBMIT BTN-->
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">UPDATE PATIENT
                                            DETAILS</button>
                                        <button type="button" class="btn btn-danger" onclick="window.history.back()">BACK TO
                                            PATIENT RECORDS</button>
                                    </div>
                                </div>
                            </form>

                        <?php elseif ($action == 'delete') : ?>
                            <div class="row my-3">
                                <h3 class="text-center">DELETE PATIENT</h3>
                            </div>
                            <form method="POST" action="" enctype="multipart/form-data">
                                <!--CSRF TOKEN-->
                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <!--USER DELETING RECORD-->
                                <input type="hidden" name="<?= esc('deleted_by') ?>" value="<?= user('firstname') . ' ' . user('surname') ?>">
                                <!--DATE RECORD DELETED-->
                                <input type="hidden" name="<?= esc('date_deleted') ?>" value="<?= date('Y-m-d H:i:s') ?>">

                                <!--ROW 1-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="File_Number">File Number</label>
                                        <div class="form-control mb-1">
                                            <?= $row->File_Number ? $row->File_Number : 'Empty Input' ?></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="Surname">Surname</label>
                                        <div class="form-control mb-1"><?= $row->Surname ? $row->Surname : 'Empty Input' ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="First_Name">First Name</label>
                                        <div class="form-control mb-1">
                                            <?= $row->First_Name ? $row->First_Name : 'Empty Input' ?></div>
                                    </div>
                                </div>
                                <!--ROW 2-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="identity_number">Identity Number</label>
                                        <div class="form-control mb-1">
                                            <?= $row->identity_number ? $row->identity_number : 'Empty Input' ?></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="Clan_Name">Clan Name</label>
                                        <div class="form-control mb-1">
                                            <?= $row->Clan_Name ? $row->Clan_Name : 'Empty Input' ?></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="occupation">Occupation</label>
                                        <div class="form-control mb-1">
                                            <?= $row->occupation ? $row->occupation : 'Empty Input' ?></div>
                                    </div>
                                </div>
                                <!--ROW 3-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="date_of_birth">Date of birth</label>
                                        <div class="form-control mb-1">
                                            <?= $row->date_of_birth ? $row->date_of_birth : 'Empty Input' ?></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="Age">Age</label>
                                        <div class="form-control mb-1"><?= $row->Age ? $row->Age : 'Empty Input' ?></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="home_language">Home Language</label>
                                        <div class="form-control mb-1">
                                            <?= $row->home_language ? $row->home_language : 'Empty Input' ?></div>
                                    </div>
                                </div>
                                <!--ROW 4-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="marital_status">Marital Status</label>
                                        <div class="form-control mb-1">
                                            <?= $row->marital_status ? $row->marital_status : 'Empty Input' ?></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="contact_number">Contact Number</label>
                                        <div class="form-control mb-1">
                                            <?= $row->contact_number ? $row->contact_number : 'Empty Input' ?></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="patient_email">Patient Email</label>
                                        <div class="form-control mb-1">
                                            <?= $row->patient_email ? $row->patient_email : 'Empty Input' ?></div>
                                    </div>
                                </div>
                                <!--ROW 5-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="responsible_surname">Surname - Person Responsible for Account</label>
                                        <div class="form-control mb-1">
                                            <?= $row->responsible_surname ? $row->responsible_surname : 'Empty Input' ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="responsible_firstName">First Name - Person Responsible for
                                            Account</label>
                                        <div class="form-control mb-1">
                                            <?= $row->responsible_firstName ? $row->responsible_firstName : 'Empty Input' ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="responsible_IdNumber">ID Number - Person Responsible for Account</label>
                                        <div class="form-control mb-1">
                                            <?= $row->responsible_IdNumber ? $row->responsible_IdNumber : 'Empty Input' ?>
                                        </div>
                                    </div>
                                </div>
                                <!--ROW 6-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="home_address">Home Address</label>
                                        <div class="form-control mb-1">
                                            <?= $row->home_address ? $row->home_address : 'Empty Input' ?></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="Employer">Employer</label>
                                        <div class="form-control mb-1">
                                            <?= $row->Employer ? $row->Employer : 'Empty Input' ?></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="work_contact_number">Work Contact Number</label>
                                        <div class="form-control mb-1">
                                            <?= $row->work_contact_number ? $row->work_contact_number : 'Empty Input' ?>
                                        </div>
                                    </div>
                                </div>
                                <!--ROW 7-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="medical_aid_scheme">Medical Aid Scheme</label>
                                        <div class="form-control mb-1">
                                            <?= $row->medical_aid_scheme ? $row->medical_aid_scheme : 'Empty Input' ?></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="med_aid_number">Medical Aid Number</label>
                                        <div class="form-control mb-1">
                                            <?= $row->med_aid_number ? $row->med_aid_number : 'Empty Input' ?></div>
                                    </div>
                                </div>
                                <!--ROW 8-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="next_of_kin">Next of kin</label>
                                        <div class="form-control mb-1">
                                            <?= $row->next_of_kin ? $row->next_of_kin : 'Empty Input' ?></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="contact_no">Phone - Next of kin</label>
                                        <div class="form-control mb-1">
                                            <?= $row->contact_no ? $row->contact_no : 'Empty Input' ?></div>
                                    </div>
                                </div>

                                <!--SUBMIT BTN-->
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">DELETE
                                            PATIENT</button>
                                            <button type="button" class="btn btn-danger" onclick="window.history.back()">BACK TO
                                            PATIENT RECORDS</button>
                                    </div>
                                </div>
                            </form>
                        <?php elseif ($action == 'view') : ?>
                            <!--Display Patient-->
                            <section class="section profile mt-5">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <a class="mb-3 btn btn-outline-<?= THEME_COLOR ?>" href="<?= ROOT ?>/admin/consultation" style="border-radius:20px"><i class="bi bi-arrow-left"></i> BACK TO BOOKING LIST</a>
                                    </div>
                                    <div class="col-lg-6">
                                        <a class="mb-3 btn btn-outline-<?= THEME_COLOR ?>" href="<?= ROOT ?>/admin/patients/edit/<?= $singlePatient->id ?>" style="border-radius:20px"><i class="bi bi-edit"></i> EDIT PATIENT</a>
                                        <a class="mb-3 btn btn-outline-<?= THEME_COLOR ?> float-end" href="<?= ROOT ?>/admin/patients/delete/<?= $singlePatient->id ?>" style="border-radius:20px"><i class="bi bi-trash"></i></a>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div class="card">
                                            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                                                <h3 class="text-center">
                                                    <strong><?= $singlePatient->Surname . ', ' . $singlePatient->First_Name  ?></strong>
                                                </h3>
                                                <h3 class="text-<?= THEME_COLOR ?>" style="font-size: 14px;">Clan Name:
                                                    <span><?= $singlePatient->Clan_Name ? $singlePatient->Clan_Name : 'Not Mentioned' ?></span>
                                                </h3>
                                                <h3>File Number:
                                                    <span><?= $singlePatient->File_Number ? $singlePatient->File_Number : 'Not Mentioned' ?></span>
                                                </h3>
                                                <div class="row">
                                                    <?php if ($_SESSION['userRole'] == 'Admin' || $_SESSION['userRole'] == 'Doctor' || $_SESSION['userRole'] == 'Sister') : ?>
                                                        <div class="col-lg-4">
                                                            <a style="font-size: 12px;" href="<?= ROOT ?>/admin/patients/vitals/<?= $singlePatient->id ?>" class="btn btn-warning btn-sm">VITALS</a>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if ($_SESSION['userRole'] == 'Admin' || $_SESSION['userRole'] == 'Doctor') : ?>
                                                        <div class="col-lg-4">
                                                            <a style="font-size: 12px;" href="<?= ROOT ?>/admin/patients/examine/<?= $singlePatient->id ?>" class="btn btn-danger btn-sm">EXAMINE</a>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if ($_SESSION['userRole'] == 'Admin' || $_SESSION['userRole'] == 'Doctor' || $_SESSION['userRole'] == 'Pharmacy Clerk' || $_SESSION['userRole'] == 'Sister') : ?>
                                                        <div class="col-lg-4">
                                                            <a style="font-size: 12px;" href="<?= ROOT ?>/admin/patients/pharmacy/<?= $singlePatient->id ?>" class="btn btn-secondary btn-sm">DISPENSE</a>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body profile-card pt-4 d-flex flex-column shadow">
                                                <h3 class="text-center"><strong><u>MEDICAL AID SCHEME</u></strong></h3>
                                                <h3 style="font-size: 14px;">Scheme Name: <span class="text-<?= THEME_COLOR ?>"><?= $singlePatient->medical_aid_scheme ? $singlePatient->medical_aid_scheme : 'N/A' ?></span>
                                                </h3>
                                                <h3 style="font-size: 14px;">Med Aid Number: <span class="text-<?= THEME_COLOR ?>"><?= $singlePatient->med_aid_number ? $singlePatient->med_aid_number : 'Not Mentioned' ?></span>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-8">
                                        <div class="card">
                                            <div class="card-body pt-3">
                                                <!-- Bordered Tabs -->
                                                <ul class="nav nav-tabs nav-tabs-bordered">

                                                    <li class="nav-item">
                                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#account">Account</button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#work">Employment</button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nextOfkin">Next Of Kin</button>
                                                    </li>
                                                </ul>
                                                <div class="tab-content pt-2">
                                                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                                        <h5 class="card-title">Patient Details</h5>

                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-4 label">Date of birth</div>
                                                            <div class="col-lg-9 col-md-8">
                                                                <?= $singlePatient->date_of_birth ?></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-4 label">ID Number</div>
                                                            <div class="col-lg-9 col-md-8">
                                                                <?= $singlePatient->identity_number ?></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-4 label">Phone</div>
                                                            <div class="col-lg-9 col-md-8">
                                                                <?= $singlePatient->contact_number ? $singlePatient->contact_number : 'Not Mentioned' ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-4 label">Email</div>
                                                            <div class="col-lg-9 col-md-8">
                                                                <?= $singlePatient->patient_email ? $singlePatient->patient_email : 'Not Mentioned' ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-4 label">Home Language</div>
                                                            <div class="col-lg-9 col-md-8">
                                                                <?= $singlePatient->home_language ? $singlePatient->home_language : 'Not Mentioned' ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-4 label">Marital Status</div>
                                                            <div class="col-lg-9 col-md-8">
                                                                <?= $singlePatient->marital_status ? $singlePatient->marital_status : 'Not Mentioned' ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-4 label">Home Address</div>
                                                            <div class="col-lg-9 col-md-8">
                                                                <?= $singlePatient->home_address ? $singlePatient->home_address : 'Not Mentioned' ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade show profile-overview" id="account">
                                                        <h5 class="card-title">Account Responsibility</h5>

                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-4 label">Surname</div>
                                                            <div class="col-lg-9 col-md-8">
                                                                <?= $singlePatient->responsible_surname ? $singlePatient->responsible_surname : 'Not Mentioned' ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-4 label">First Name(s)</div>
                                                            <div class="col-lg-9 col-md-8">
                                                                <?= $singlePatient->responsible_firstName ? $singlePatient->responsible_firstName : 'Not Mentioned' ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-4 label">ID number</div>
                                                            <div class="col-lg-9 col-md-8">
                                                                <?= $singlePatient->responsible_IdNumber ? $singlePatient->responsible_IdNumber : 'Not Mentioned' ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade show profile-overview" id="work">
                                                        <h5 class="card-title">Employment Details</h5>

                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-4 label">Employer</div>
                                                            <div class="col-lg-9 col-md-8">
                                                                <?= $singlePatient->Employer ? $singlePatient->Employer : 'Not Mentioned' ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-4 label">Work Phone</div>
                                                            <div class="col-lg-9 col-md-8">
                                                                <?= $singlePatient->work_contact_number ? $singlePatient->work_contact_number : 'Not Mentioned' ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-4 label">Occupation</div>
                                                            <div class="col-lg-9 col-md-8">
                                                                <?= $singlePatient->occupation ? $singlePatient->occupation : 'Not Mentioned' ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade show profile-overview" id="nextOfkin">
                                                        <h5 class="card-title">Next Of Kin</h5>

                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-4 label">Name</div>
                                                            <div class="col-lg-9 col-md-8">
                                                                <?= $singlePatient->next_of_kin ? $singlePatient->next_of_kin : 'Not Mentioned' ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-4 label">Phone</div>
                                                            <div class="col-lg-9 col-md-8">
                                                                <?= $singlePatient->contact_no ? $singlePatient->contact_no : 'Not Mentioned' ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- End Bordered Tabs -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body pt-3">
                                                <!-- Bordered Tabs -->
                                                <ul class="nav nav-tabs nav-pills nav-justified nav-tabs-bordered p-2 bg-<?= THEME_COLOR ?>" style="border-radius:5px">

                                                    <li class="nav-item">
                                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#consultation-bookings">Consultations</button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#documents">Documents</button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#sickcerts">Sick Certs</button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#claims">Claims</button>
                                                    </li>

                                                </ul>
                                                <div class="tab-content pt-2">
                                                    <div class="tab-pane fade show active profile-overview" id="consultation-bookings">
                                                        <h5 class="card-title">Patient Consultation Bookings</h5>
                                                        <div class="row">
                                                            <!-- Table -->
                                                            <table class="table datatable" style="font-size: 12px;">
                                                                <thead class="bg-<?= THEME_COLOR ?> text-light">
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">Date</th>
                                                                        <th scope="col">Time</th>
                                                                        <th scope="col">Med Aid/Cash</th>
                                                                        <th scope="col">Notes</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $userRows = 1;
                                                                    if (!empty($allTimeBookingsPerPatient)) :
                                                                        foreach ($allTimeBookingsPerPatient as $row) :
                                                                    ?>
                                                                            <tr>
                                                                                <th scope="row"><?= $userRows++ ?></th>
                                                                                <td><?= $row->reg_date ?></td>
                                                                                <td><?= $row->reg_time ?></td>
                                                                                <td><?= $row->cash_or_medical ?></td>
                                                                                <td><?= $row->Notes ?></td>

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
                                                    <div class="tab-pane fade show profile-overview" id="documents">
                                                        <h5 class="card-title">Documents</h5>
                                                        <div class="row">
                                                            <!-- Table with stripped rows -->
                                                            <table class="table datatable">

                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">Date</th>
                                                                        <th scope="col">Time</th>
                                                                        <th scope="col">Document</th>
                                                                        <th scope="col">Document Name</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $userRows = 1;
                                                                    if (!empty($patient_docs)) :
                                                                        foreach ($patient_docs as $row) :
                                                                    ?>
                                                                            <tr>
                                                                                <th scope="row"><?= $userRows++ ?></th>

                                                                                <td><?= $row->date ?></td>
                                                                                <td><?= $row->Time ?></td>
                                                                                <td>
                                                                                    <a href="<?= get_doc($row->document) ?>"><?= $row->document ?></a>
                                                                                </td>
                                                                                <td><?= $row->document_name ?></td>
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
                                                    <div class="tab-pane fade show profile-overview" id="sickcerts">
                                                        <h5 class="card-title">Sick Certs</h5>
                                                        <div class="row">
                                                            <!-- Table with stripped rows -->
                                                            <table class="table datatable">

                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">Cons Date</th>
                                                                        <th scope="col">Time</th>
                                                                        <th scope="col">Sick Date</th>
                                                                        <th scope="col">Fit Date</th>
                                                                        <th scope="col">Serial No.</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $userRows = 1;
                                                                    if (!empty($sick_certs)) :
                                                                        foreach ($sick_certs as $row) :
                                                                    ?>
                                                                            <tr>
                                                                                <th scope="row"><?= $userRows++ ?></th>

                                                                                <td><?= $row->cons_date ?></td>
                                                                                <td><?= $row->cons_time ?></td>
                                                                                <td><?= $row->sick_from_date  ?></td>
                                                                                <td><?= $row->fit_date ?></td>
                                                                                <td><?= $row->label ?></td>

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
                                                    <div class="tab-pane fade show profile-overview" id="claims">
                                                        <h5 class="card-title">Claims</h5>
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
                                                </div><!-- End Bordered Tabs -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        <?php elseif ($action == 'examine') : ?>
                            <div class="container-fluid">
                                <div class="row mt-4">
                                    <?php if ($_SESSION['userRole'] != 'Doctor' && $_SESSION['userRole'] != 'Admin') : ?>
                                        <div class="col-lg-12 text-center">
                                            <h3>OOPS NO ENTRY!!</h3>
                                            <p>You are not privileged to access the contents of this page</p>
                                            <img src="<?= ROOT ?>/assets/img/exclamation-sign.jpg" width="200px" alt="Exclamation Mark">
                                        </div>

                                    <?php else : ?>
                                        <div class="col-lg-12">
                                            <div class="accordion" id="patientMedicalRecords" style="width: 100%;">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingOne">
                                                        <button class="accordion-button bg-<?= THEME_COLOR ?> text-light" type="button" data-bs-toggle="collapse" data-bs-target="#vitals" aria-expanded="true" aria-controls="vitals">
                                                            Vital Signs - &nbsp;
                                                            <strong><u><?= $singlePatient->Surname . ', ' . $singlePatient->First_Name ?></u></strong>
                                                        </button>
                                                    </h2>
                                                    <div id="vitals" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#patientMedicalRecords">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-lg 12 table-responsive">
                                                                    <!-- Vital Signs Table -->
                                                                    <table class="table table-striped table-sm table-hover datatable" style="font-size: 10px;">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">#</th>
                                                                                <th scope="col">Date</th>
                                                                                <th scope="col">Sugar</th>
                                                                                <th scope="col">Pressure</th>
                                                                                <th scope="col">Pulse</th>
                                                                                <th scope="col">Urinalysis</th>
                                                                                <th scope="col">Pregnancy</th>
                                                                                <th scope="col">ECG</th>
                                                                                <th scope="col">Oxygen</th>
                                                                                <th scope="col">Weight</th>
                                                                                <th scope="col">Height</th>
                                                                                <th scope="col">Temp</th>
                                                                                <th scope="col">BMI</th>
                                                                                <th scope="col">Comments</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $userRows = 1;
                                                                            if (!empty($vitals)) :
                                                                                foreach ($vitals as $row) :
                                                                            ?>
                                                                                    <tr>
                                                                                        <td><?= $userRows++ ?></td>
                                                                                        <td><?= $row->date ?></td>
                                                                                        <td><?= $row->blood_sugar ?></td>
                                                                                        <td><?= $row->blood_pressure ?></td>
                                                                                        <td><?= $row->pulse_rate ?></td>
                                                                                        <td><?= $row->urinalysis ?></td>
                                                                                        <td><?= $row->pregnancy_test ?></td>
                                                                                        <td><?= $row->resting_ecg ?></td>
                                                                                        <td><?= $row->oxygen_saturation ?></td>
                                                                                        <td><?= $row->weight ?></td>
                                                                                        <td><?= $row->height ?></td>
                                                                                        <td><?= $row->temperature ?></td>
                                                                                        <td><?= $row->BMI ?></td>
                                                                                        <td><?= $row->comments ?></td>
                                                                                    </tr>
                                                                            <?php
                                                                                endforeach;
                                                                            endif;
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                    <!-- End Vital Signs Table -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item">
                                                    <h2 class="accordion-header bg-<?= THEME_COLOR ?>" id="headingTwo">
                                                        <button class="accordion-button collapsed bg-<?= THEME_COLOR ?> text-light" type="button" data-bs-toggle="collapse" data-bs-target="#doctorNotes" aria-expanded="false" aria-controls="doctorNotes">
                                                            Doctor's Notes - &nbsp;
                                                            <strong><u><?= $singlePatient->Surname . ', ' . $singlePatient->First_Name ?></u></strong>
                                                        </button>
                                                    </h2>
                                                    <div id="doctorNotes" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#patientMedicalRecords">
                                                        <div class="accordion-body">
                                                            <!-- Doctor's Notes Table -->
                                                            <table class="table table-striped table-sm table-responsive table-hover datatable" style="font-size: 10px;">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">Date</th>
                                                                        <th scope="col">History</th>
                                                                        <th scope="col">Comobidities</th>
                                                                        <th scope="col">Clinical Examination</th>
                                                                        <th scope="col">Diagnosis</th>
                                                                        <th scope="col">Plan</th>
                                                                        <th scope="col">Return_Date</th>
                                                                        <th scope="col">Notes</th>
                                                                        <th scope="col">Action</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $userRows = 1;
                                                                    if (!empty($doctorsnotes)) :
                                                                        foreach ($doctorsnotes as $row) :
                                                                    ?>
                                                                            <tr>
                                                                                <td><?= $userRows++ ?></td>
                                                                                <td><?= $row->date ?></td>
                                                                                <td><?= $row->Relevant_History ?></td>
                                                                                <td><?= $row->Comobidities ?></td>
                                                                                <td><?= $row->Clinical_Examination ?></td>
                                                                                <td><?= $row->Diagnosis ?></td>
                                                                                <td><?= $row->Plan ?></td>
                                                                                <td><?= $row->Return_Date ?></td>
                                                                                <td><?= $row->Note ?></td>
                                                                                <td>
                                                                                    <a href="<?= ROOT ?>/admin/doctorsnotes/edit/<?= $row->note_ID ?>"><i class="bi bi-pencil-square m-2 text-primary"></i></a>

                                                                                </td>
                                                                            </tr>
                                                                    <?php
                                                                        endforeach;
                                                                    endif;
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                            <!-- End Doctor's Notes Table -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="row my-3">
                                                <h5 class="text-center">TODAY'S EXAMINATION/CONSULTATION</h5>
                                            </div>

                                            <form method="POST" action="" enctype="multipart/form-data">
                                                <!--#### START HIDDEN INPUTS  ####-->
                                                <!--CSRF TOKEN-->
                                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                                <!--USER CREATING RECORD-->
                                                <input type="hidden" name="<?= esc('created_by') ?>" value="<?= user('firstname') . ' ' . user('surname') ?>">
                                                <!--DOCTOR NOTE DATE-->
                                                <input type="hidden" name="<?= esc('date') ?>" value="<?= date('Y-m-d') ?>">
                                                <!--DOCTOR NOTE TIME-->
                                                <input type="hidden" name="<?= esc('Time') ?>" value="<?= date('H:i:s') ?>">
                                                <!--PATIENT-->
                                                <input type="hidden" name="<?= esc('patient') ?>" value="<?= $singlePatient->id ?>">
                                                <!--#### END HIDDEN INPUTS  ####-->

                                                <?php if (!empty($dnerrors)) : ?>
                                                    <div class="alert alert-danger text-center col-lg-12">
                                                        <?= implode('<br>', $dnerrors);  ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?= Util::displayFlash('DrNote_insert_success', 'success') ?>
                                                <?= Util::displayFlash('drnotes_update_success', 'success') ?>
                                                <?= Util::displayFlash('drnotes_delete_success', 'success') ?>

                                                <!--ROW 1-->
                                                <div class="row form-row">
                                                    <div class="col-lg-6">
                                                        <label for="Relevant_History">Relevant History</label>
                                                        <textarea name="<?= esc('Relevant_History') ?>" class="form-control mb-1" id="Relevant_History" cols="30" rows="4"></textarea>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="Comobidities">Comobidities</label>
                                                        <textarea name="<?= esc('Comobidities') ?>" class="form-control mb-1" id="Comobidities" cols="30" rows="4"></textarea>
                                                    </div>
                                                </div>
                                                <!--ROW 2-->
                                                <div class="row form-row">
                                                    <div class="col-lg-6">
                                                        <label for="Clinical_Examination">Clinical Examination</label>
                                                        <textarea name="<?= esc('Clinical_Examination') ?>" class="form-control mb-1" id="Clinical_Examination" cols="30" rows="4"></textarea>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="Diagnosis">Diagnosis</label>
                                                        <textarea name="<?= esc('Diagnosis') ?>" class="form-control mb-1" id="Diagnosis" cols="30" rows="4"></textarea>
                                                    </div>
                                                </div>
                                                <!--ROW 3-->
                                                <div class="row form-row">
                                                    <div class="col-lg-6">
                                                        <label for="Plan">Plan</label>
                                                        <textarea name="<?= esc('Plan') ?>" class="form-control mb-1" id="Plan" cols="30" rows="4"></textarea>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="Notes">Notes</label>
                                                        <textarea name="<?= esc('Notes') ?>" class="form-control mb-1" id="Notes" cols="30" rows="4"></textarea>
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
                                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">SAVE
                                                            RECORD</button>

                                                        <a href="<?= ROOT ?>/admin/patients/view/<?= $singlePatient->id ?>" class="btn btn-danger">CANCEL</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        <?php elseif ($action == 'vitals') : ?>
                            <div class="container-fluid">
                                <div class="row mt-4">
                                    <?php if ($_SESSION['userRole'] != 'Sister' && $_SESSION['userRole'] != 'Doctor' && $_SESSION['userRole'] != 'Admin' && $_SESSION['userRole'] != 'Nurse') : ?>
                                        <div class="col-lg-12 text-center">
                                            <h3>OOPS NO ENTRY!!</h3>
                                            <p>You are not privileged to access the contents of this page</p>
                                            <img src="<?= ROOT ?>/assets/img/exclamation-sign.jpg" width="200px" alt="Exclamation Mark">
                                        </div>
                                    <?php else : ?>
                                        <div class="col-lg-12">
                                            <div class="accordion" id="patientMedicalRecords" style="width: 100%;">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingOne">
                                                        <button class="accordion-button bg-<?= THEME_COLOR ?> text-light" type="button" data-bs-toggle="collapse" data-bs-target="#vitals" aria-expanded="true" aria-controls="vitals">
                                                            Vital Signs - &nbsp;
                                                            <strong><u><?= $singlePatient->Surname . ', ' . $singlePatient->First_Name ?></u></strong>
                                                        </button>
                                                    </h2>
                                                    <div id="vitals" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#patientMedicalRecords">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-lg-12 table-responsive ">
                                                                    <!-- Vital Signs Table -->
                                                                    <table class="table table-striped table-sm table-hover datatable" style="font-size: 10px;">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">#</th>
                                                                                <th scope="col">Date</th>
                                                                                <th scope="col">Sugar</th>
                                                                                <th scope="col">Pressure</th>
                                                                                <th scope="col">Pulse</th>
                                                                                <th scope="col">Urinalysis</th>
                                                                                <th scope="col">Pregnancy</th>
                                                                                <th scope="col">ECG</th>
                                                                                <th scope="col">Oxygen</th>
                                                                                <th scope="col">Weight</th>
                                                                                <th scope="col">Height</th>
                                                                                <th scope="col">Temp</th>
                                                                                <th scope="col">BMI</th>
                                                                                <th scope="col">Comments</th>
                                                                                <th scope="col">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $userRows = 1;
                                                                            if (!empty($vitals)) :
                                                                                foreach ($vitals as $row) :
                                                                            ?>
                                                                                    <tr>
                                                                                        <td><?= $userRows++ ?></td>
                                                                                        <td><?= $row->date ?></td>
                                                                                        <td><?= $row->blood_sugar ?></td>
                                                                                        <td><?= $row->blood_pressure ?></td>
                                                                                        <td><?= $row->pulse_rate ?></td>
                                                                                        <td><?= $row->urinalysis ?></td>
                                                                                        <td><?= $row->pregnancy_test ?></td>
                                                                                        <td><?= $row->resting_ecg ?></td>
                                                                                        <td><?= $row->oxygen_saturation ?></td>
                                                                                        <td><?= $row->weight ?></td>
                                                                                        <td><?= $row->height ?></td>
                                                                                        <td><?= $row->temperature ?></td>
                                                                                        <td><?= $row->BMI ?></td>
                                                                                        <td><?= $row->comments ?></td>
                                                                                        <td>
                                                                                            <a href="<?= ROOT ?>/admin/vitals/edit/<?= $row->sign_ID ?>"><i class="bi bi-pencil-square m-2 text-primary"></i></a>
                                                                                        </td>
                                                                                    </tr>
                                                                            <?php
                                                                                endforeach;
                                                                            endif;
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                    <!-- End Vital Signs Table -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="row my-3">
                                                <h5 class="text-center">ADD PATIENT VITAL SIGNS</h5>
                                            </div>

                                            <?= Util::displayFlash('vital_create_success', 'success') ?>

                                            <form method="POST" action="" enctype="multipart/form-data">
                                                <!--#### START HIDDEN INPUTS  ####-->
                                                <!--CSRF TOKEN-->
                                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                                <!--USER CREATING RECORD-->
                                                <input type="hidden" name="<?= esc('created_by') ?>" value="<?= user('firstname') . ' ' . user('surname') ?>">
                                                <!--DOCTOR NOTE DATE-->
                                                <input type="hidden" name="<?= esc('date') ?>" value="<?= date('Y-m-d') ?>">
                                                <!--DATE RECORD CREATED-->
                                                <input type="hidden" name="<?= esc('date_created') ?>" value="<?= date('Y-m-d H:i:s') ?>">
                                                <!--PATIENT-->
                                                <input type="hidden" name="<?= esc('patient') ?>" value="<?= $singlePatient->id ?>">
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
                                                        <input type="text" name="<?= esc('blood_sugar') ?>" value="<?= old_value('blood_sugar') ?>" class="form-control mb-1" id="blood_sugar">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label for="blood_pressure">Blood Pressure</label>
                                                        <input type="text" name="<?= esc('blood_pressure') ?>" value="<?= old_value('blood_pressure') ?>" class="form-control mb-1" id="blood_pressure">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label for="pulse_rate">Pulse Rate</label>
                                                        <input type="text" name="<?= esc('pulse_rate') ?>" value="<?= old_value('pulse_rate') ?>" class="form-control mb-1" id="pulse_rate">
                                                    </div>

                                                </div>
                                                <!--ROW 2-->
                                                <div class="row form-row">
                                                    <div class="col-lg-4">
                                                        <label for="urinalysis">Urinalysis</label>
                                                        <input type="text" name="<?= esc('urinalysis') ?>" value="<?= old_value('urinalysis') ?>" class="form-control mb-1" id="urinalysis">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label for="pregnancy_test">Pregnancy Test</label>
                                                        <input type="text" name="<?= esc('pregnancy_test') ?>" value="<?= old_value('pregnancy_test') ?>" class="form-control mb-1" id="pregnancy_test">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label for="resting_ecg">Resting ECG</label>
                                                        <input type="text" name="<?= esc('resting_ecg') ?>" value="<?= old_value('resting_ecg') ?>" class="form-control mb-1" id="resting_ecg">
                                                    </div>
                                                </div>
                                                <!--ROW 3-->
                                                <div class="row form-row">
                                                    <div class="col-lg-4">
                                                        <label for="oxygen_saturation">Oxygen Saturation</label>
                                                        <input type="text" name="<?= esc('oxygen_saturation') ?>" value="<?= old_value('oxygen_saturation') ?>" class="form-control mb-1" id="oxygen_saturation">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label for="weight">Weight</label>
                                                        <input type="text" name="<?= esc('weight') ?>" value="<?= old_value('weight') ?>" class="form-control mb-1" id="weight">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label for="height">Height</label>
                                                        <input type="text" name="<?= esc('height') ?>" value="<?= old_value('height') ?>" class="form-control mb-1" id="height">
                                                    </div>
                                                </div>
                                                <!--ROW 4-->
                                                <div class="row form-row">
                                                    <div class="col-lg-4">
                                                        <label for="temperature">Temperature</label>
                                                        <input type="text" name="<?= esc('temperature') ?>" value="<?= old_value('temperature') ?>" class="form-control mb-1" id="temperature">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label for="BMI">BMI</label>
                                                        <input type="text" name="<?= esc('BMI') ?>" value="<?= old_value('BMI') ?>" class="form-control mb-1" id="BMI">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label for="comments">Comments</label>
                                                        <textarea name="<?= esc('comments') ?>" class="form-control mb-1" id="comments" cols="30" rows="1"><?= old_value('comments') ?></textarea>
                                                    </div>
                                                </div>
                                                <!--SUBMIT BTN-->
                                                <div class="form-row">
                                                    <div class="d-grid gap-2 col-lg-12">
                                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">ADD VITAL
                                                            SIGNS</button>
                                                        <a href="<?= ROOT ?>/admin/patients/view/<?= $singlePatient->id ?>" class="btn btn-danger">CANCEL</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        <?php elseif ($action == 'pharmacy') : ?>
                            <div class="container-fluid">
                                <div class="row mt-4">
                                    <?php if ($_SESSION['userRole'] != 'Sister' && $_SESSION['userRole'] != 'Doctor' && $_SESSION['userRole'] != 'Admin' && $_SESSION['userRole'] != 'Pharmacy Clerk') : ?>
                                        <div class="col-lg-12 text-center">
                                            <h3>OOPS NO ENTRY!!</h3>
                                            <p>You are not privileged to access the contents of this page</p>
                                            <img src="<?= ROOT ?>/assets/img/exclamation-sign.jpg" width="200px" alt="Exclamation Mark">
                                        </div>
                                    <?php else : ?>
                                        <div class="col-lg-12">
                                            <div class="accordion" id="patientMedicalRecords" style="width: 100%;">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingOne">
                                                        <button class="accordion-button bg-<?= THEME_COLOR ?> text-light" type="button" data-bs-toggle="collapse" data-bs-target="#vitals" aria-expanded="true" aria-controls="vitals">
                                                            Doctor's directive for all patients, today - &nbsp;
                                                            <strong><?= date('Y-m-d') ?></strong> - &nbsp;
                                                            <strong><u><?= $singlePatient->Surname . ', ' . $singlePatient->First_Name ?></u></strong>
                                                        </button>
                                                    </h2>
                                                    <div id="vitals" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#patientMedicalRecords">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-lg-12 table-responsive ">
                                                                    <!-- Vital Signs Table -->
                                                                    <table class="table table-striped table-sm table-hover datatable" style="font-size: 10px;">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">#</th>
                                                                                <th scope="col">Date</th>
                                                                                <th scope="col">Plan/Medication</th>
                                                                                <th scope="col">Note</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $userRows = 1;
                                                                            if (!empty($meds)) :
                                                                                foreach ($meds as $row) :
                                                                            ?>
                                                                                    <tr>
                                                                                        <td><?= $userRows++ ?></td>
                                                                                        <td><?= $row->date_created ?></td>
                                                                                        <td><?= $row->Plan ?></td>
                                                                                        <td><?= $row->Note ?></td>
                                                                                    </tr>
                                                                            <?php
                                                                                endforeach;
                                                                            endif;
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                    <!-- End Vital Signs Table -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="row my-3">
                                                <h5 class="text-center">DISPENSE MEDICATION <br> <small><em>"based on the Doctor's
                                                            Plan, supra"</em> <i class="bi bi-arrow-up-square-fill"></i></small>
                                                </h5>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <form method="POST" action="" enctype="multipart/form-data">
                                                <!--#### START HIDDEN INPUTS  ####-->
                                                <!--CSRF TOKEN-->
                                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                                <!--USER CREATING RECORD-->
                                                <input type="hidden" name="<?= esc('created_by') ?>" value="<?= user('firstname') . ' ' . user('surname') ?>">
                                                <!-- PATIENT-->
                                                <input type="hidden" name="<?= esc('patient') ?>" value="<?= $singlePatient->id ?>">
                                                <!--#### END HIDDEN INPUTS  ####-->

                                                <?php if (!empty($perrors)) : ?>
                                                    <div class="alert alert-danger text-center col-lg-12">
                                                        <?= implode('<br>', $perrors);  ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?= Util::displayFlash('meds_dispense_insert_success', 'success') ?>
                                                <!--ROW 1-->
                                                <div class="row form-row">
                                                    <div class="col-lg-12">
                                                        <label for="actual">Actual Meds dispensed</label>
                                                        <textarea name="<?= esc('actual') ?>" class="form-control mb-1" id="actual" cols="30" rows="3"></textarea>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label for="notes">Notes</label>
                                                        <textarea name="<?= esc('notes') ?>" class="form-control mb-1" id="notes" cols="30" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <!--SUBMIT BTN-->
                                                <div class="form-row">
                                                    <div class="d-grid gap-2 col-lg-12">
                                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">DISPENSE
                                                            MEDICATION</button>
                                                        <a href="<?= ROOT ?>/admin/patients/view/<?= $singlePatient->id ?>" class="btn btn-danger">CANCEL</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <hr class="mt-3">
                                        <div class="row">
                                            <h5 class="text-center"><a class="btn btn-<?= THEME_COLOR ?>" href="<?= ROOT . '/admin/pharmacy' ?>">ALL MEDICINES DISPENSED</a></h5>
                                        </div>
                                        <hr class="mt-2">

                                    <?php endif ?>
                                </div>

                            </div>
                        <?php elseif ($action == 'followup') : ?>
                            <div class="container-fluid">
                                <div class="row mt-4">
                                    <?php if ($_SESSION['userRole'] != 'Sister' && $_SESSION['userRole'] != 'Doctor' && $_SESSION['userRole'] != 'Admin' && $_SESSION['userRole'] != 'Admin Clerk') : ?>
                                        <div class="col-lg-12 text-center">
                                            <h3>OOPS NO ENTRY!!</h3>
                                            <p>You are not privileged to access the contents of this page</p>
                                            <img src="<?= ROOT ?>/assets/img/exclamation-sign.jpg" width="200px" alt="Exclamation Mark">
                                        </div>
                                    <?php else : ?>
                                        <div class="row">
                                            <div class="row my-3">
                                                <h5 class="text-center">FOLLOW UP LOG - PATIENT: <?= strtoupper($singlePatient->Surname . ', ' . $singlePatient->First_Name) ?></h5>
                                            </div>

                                            <form method="POST" action="" enctype="multipart/form-data">
                                                <!--#### START HIDDEN INPUTS  ####-->
                                                <!--CSRF TOKEN-->
                                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                                <!--USER CREATING RECORD-->
                                                <input type="hidden" name="<?= esc('created_by') ?>" value="<?= user('firstname') . ' ' . user('surname') ?>">
                                                <!-- PATIENT-->
                                                <input type="hidden" name="<?= esc('patient') ?>" value="<?= $singlePatient->id ?>">
                                                <!--#### END HIDDEN INPUTS  ####-->

                                                <?php if (!empty($fuerrors)) : ?>
                                                    <div class="alert alert-danger text-center col-lg-12">
                                                        <?= implode('<br>', $fuerrors);  ?>
                                                    </div>
                                                <?php endif; ?>

                                                <!--ROW 1-->
                                                <div class="row form-row">
                                                    <div class="col-lg-6">
                                                        <label for="modus">Modus <em><small>(How the patient was contacted)</small></em></label>
                                                        <?php $selModus = old_value('modus') ?>
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
                                                        <input type="text" name="<?= esc('intention') ?>" class="form-control mb-1" id="intention">
                                                    </div>
                                                </div>
                                                <!--ROW 1-->
                                                <div class="row form-row">
                                                    <div class="col-lg-12">
                                                        <label for="report">Report <em><small>(Outcome of intention)</small></em></label>
                                                        <textarea name="<?= esc('report') ?>" class="form-control mb-1" id="report" cols="30" rows="4"></textarea>
                                                    </div>
                                                </div>
                                                <!--SUBMIT BTN-->
                                                <div class="form-row">
                                                    <div class="d-grid gap-2 col-lg-12">
                                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">LOG REPORT</button>
                                                        <a href="<?= ROOT ?>/admin/admin/returndates" class="btn btn-danger">CANCEL</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>

                        <?php else : ?>

                            <div class="row mt-3">
                                <a href="<?= ROOT ?>/admin/patients/new" class="btn btn-outline-<?= THEME_COLOR ?>">ADD NEW
                                    PATIENT</a>
                            </div>
                            <hr>
                            <?= Util::displayFlash('patient_delete_success', 'success') ?>
                            <div class="row">
                                <!--Below I am saving computing resourses by returning a rwa data of some of the keys in the table 'patients' given the fact that, during the operations, there is rarely a need to have all the patients listed, as we work around a single client everytime we query the database-->
                                <div class="alert alert-success text-center">
                                    If you wish to search for a record, press "Ctrl" + "f", then key in the search string on the popup!! <br> For example: the <em>"surname</em> of the patient"
                                </div>
                                <?php
                                $userRows = 1;
                                if (!empty($rows)) :
                                    foreach ($rows as $row) :
                                        show($row);
                                    endforeach;
                                endif;
                                ?>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main><!-- End #main -->
<script>
    /**
     * Send Data
     * @param {*} obj  
     * */
    function send_data(obj) {
        var kfForm = new FormData();
        for (key in obj) {
            kfForm.append(key, obj[key]);
        }
        var ajax = new XMLHttpRequest();
        // Add event listener
        ajax.addEventListener('readystatechange', (e) => {
            if (ajax.readyState == 4 && ajax.status == 200) {
                handle_result(ajax.responseText);
            }
        });

        ajax.open('post', '<?= ROOT ?>/ajax', true);
        ajax.send(kfForm);

        /**
         * Handle result
         * @param {*} result  
         * */
        function handle_result(result) {
            alert(result);
            console.log(result);
        }
    }
</script>

<!-- ======= Footer ======= -->
<?php $this->view('admin/inc/admin-footer') ?>