<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Carpool - GA Helpdesk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style_home.css') ?>">
</head>
<body>
    <a href="<?= site_url('request') ?>" class="back-btn-futuristic" title="Kembali">
        <i class="fa-solid fa-chevron-left"></i>
    </a>

    <div class="app-container">
        <header class="header">
            <h1>REQUEST CARPOOL</h1>
            <p>Pilih tipe pemesanan kendaraan</p>
        </header>

        <div class="menu-container">
            <div class="menu-row">
                <a href="<?= site_url('request/form/carpool/reguler') ?>" class="menu-btn"><span>REGULER</span></a>
                <a href="<?= site_url('request/form/carpool/booking') ?>" class="menu-btn"><span>BOOKING</span></a>
            </div>
        </div>
    </div>
</body>
</html>