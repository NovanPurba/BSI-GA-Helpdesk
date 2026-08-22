<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Fuel - GA Helpdesk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style_home.css') ?>">
</head>
<body>
    <a href="<?= site_url('request') ?>" class="back-btn-futuristic" title="Kembali">
        <i class="fa-solid fa-chevron-left"></i>
    </a>

    <div class="app-container">
        <header class="header">
            <h1>REQUEST FUEL</h1>
            <p>Pilih jenis layanan Fuel yang dibutuhkan</p>
        </header>

        <div class="menu-container">
            <div class="menu-row">
                <a href="<?= site_url('request/form/fuel/isi_fuel') ?>" class="menu-btn"><span>ISI FUEL</span></a>
                <a href="<?= site_url('request/form/fuel/charging') ?>" class="menu-btn"><span>CHARGING</span></a>
            </div>
            <div class="menu-row">
                <a href="<?= site_url('request/form/fuel/pemasangan_rfid') ?>" class="menu-btn"><span>PEMASANGAN RFID</span></a>
                <a href="<?= site_url('request/form/fuel/pelepasan_rfid') ?>" class="menu-btn"><span>PELEPASAN RFID</span></a>
            </div>
            <div class="menu-row">
                <a href="<?= site_url('request/form/fuel/pemindahan_rfid') ?>" class="menu-btn btn-single"><span>PEMINDAHAN RFID</span></a>
            </div>
        </div>
    </div>
</body>
</html>