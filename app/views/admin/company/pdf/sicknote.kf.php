<?php
$user = new User();
$patient = new Patient();
$sickcert = new SickCertificate();

$id = basename($_GET['url']);

$sick = $sickcert->specificPatientSickCert($id);
$users = $user->findAll();
?>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    .flex-container {
        display: flex;
        justify-content: space-between;
    }

    .align-right {
        margin-left: auto;
    }

    .header-info {
        display: inline-block;
    }

    #license {
        float: right;
        margin-top: -15px;
    }

    .qrcode-sec {
        float: right;
    }
</style>

<div class="main">
    <div class="row">
        <div style="text-align:center;">
            <span style="display:inline-block; font-size:20px;font-weight:bold"><?= strtoupper(DR_NAME) ?> </span> <br>
            <span style="display:inline-block;font-size:10px">MBChB(WSU),DOH(UCT),PGDLL(UJ),PDM,HlV(US),PGCERT Occ Med(Manchester) Cert Trav Med (Wits)</span> <br>
            <span style="display:inline-block;font-size:14px;font-weight:bold">Primary Health Medical Practitioner</span>
            <h3 style="font-size: 14px;">MEDICAL PRACTITIONER</h3>
        </div>
    </div>
    <div class="header-text">
        <div class="header-info">
            <p style="font-size:10px">
                Surgery: <br>
                Gqeberha, Eeastern Cape <br>
                South Africa, 6201 <br>
                Phone: <?= CONTACT_NUMBER ?> <br>
                Email Address: <?= EMAIL_ADDRESS ?>
            </p>
        </div>
        <div class="header-info" id="license">
            <p>
                Pr. No: <?= DR_PR_NO ?> <br>
                MP No: <?= MED_PR_NO ?>
            </p>
        </div>
    </div>
    <hr>
    <h3 style="font-weight: bold;font-size:18px;text-align:center">MEDICAL CERTIFICATE</h3>
    <div class="content" style="font-size: 12px;text-align:justify">
        <p>
            <strong><?= $sick->title_1 . ' ' . $sick->First_Name . ' ' . $sick->Surname ?></strong> with employment number<em>(if applicable)</em> <strong><?= $sick->employment_number ? $sick->employment_number : 'not applicable' ?></strong>, was examined by me on <strong><?= $sick->cons_date ?></strong> at <strong><?= $sick->cons_time ?></strong>. <br>
            He stated that he was unwell from <strong><?= $sick->sick_from_date ?></strong>.
        </p>

        <h3>Clinical Diagnosis:</h3>
        <p style="border:1px solid #ccc;padding:5px">
            <strong><?= $sick->clinical_diagnosis ?></strong>
        </p>
        <br>
        He will be fit for duty on <strong><?= $sick->fit_date ?></strong> <br>
        <h3>Remarks:</h3>
        <p style="border:1px solid #ccc;padding:5px">
            <strong><?= $sick->remarks ?></strong>
        </p>
    </div>
    <div style="text-align: right;margin-top:80px"> <br><br><br>
        ...................................................... <br> Doctor's Signature
    </div>
    <div class="footer">
        <div style="border:1px solid #ccc;width:200px;height:200px">
            <p style="color:#ccc;text-align:center;margin-top:85px">DOCTOR'S STAMP</p>
        </div>
        <div class="qrcode-sec">
            <span style="font-size: 10px;text-align:center;margin-right:90px">To verify this certificate, use your smart phone's QR/Bar code scanner to scan this QR Code</span>
            <img src="<?= ROOT . '/assets/img/sicknote-qr-code.png' ?>" width="100px" alt="">
        </div>
    </div>
</div>