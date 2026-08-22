<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opsi Request - GA Helpdesk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style_home.css') ?>">
</head>
<body>
    <!-- Tombol Kembali Futuristik Melayang -->
    <a href="<?= site_url('home') ?>" class="back-btn-futuristic" title="Kembali ke Beranda">
        <i class="fa-solid fa-chevron-left"></i>
    </a>

    <div class="app-container">
        <header class="header">
            <h1>OPSI REQUEST</h1>
            <p>Pilih kategori permintaan Anda</p>
        </header>

        <div class="menu-container">
            <!-- Baris 1: FUEL & CARPOOL -->
            <div class="menu-row">
                <a href="<?= site_url('request/fuel_options') ?>" class="menu-btn">
                    <span>FUEL</span>
                </a>
                <a href="<?= site_url('request/carpool_options') ?>" class="menu-btn">
                    <span>CARPOOL</span>
                </a>
            </div>

            <!-- Baris 2: IT & GIM -->
            <div class="menu-row">
                <a href="<?= site_url('request/form/it') ?>" class="menu-btn">
                    <span>IT</span>
                </a>
                <a href="<?= site_url('request/form/gim') ?>" class="menu-btn">
                    <span>GIM</span>
                </a>
            </div>

            <!-- Baris 3: GA (Tengah) -->
            <div class="menu-row">
                <a href="<?= site_url('request/form/ga') ?>" class="menu-btn btn-single">
                    <span>GA</span>
                </a>
            </div>
        </div>
    </div>
</body>
</html>