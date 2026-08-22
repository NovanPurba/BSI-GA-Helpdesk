<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opsi Keluhan - GA Helpdesk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style_home.css') ?>">
</head>
<body>
    <!-- Tombol Kembali Futuristik Melayang di Kiri Atas -->
    <a href="<?= site_url('home') ?>" class="back-btn-futuristic" title="Kembali ke Beranda">
        <i class="fa-solid fa-chevron-left"></i>
    </a>

    <div class="app-container">
        <header class="header">
            <h1>OPSI KELUHAN</h1>
            <p>Pilih kategori keluhan Anda</p>
        </header>

        <div class="menu-container">
            <!-- Baris 1: FUEL & CARPOOL -->
            <div class="menu-row">
                <a href="<?= site_url('keluhan/form/fuel') ?>" class="menu-btn">
                    <span>FUEL</span>
                </a>
                <a href="<?= site_url('keluhan/form/carpool') ?>" class="menu-btn">
                    <span>CARPOOL</span>
                </a>
            </div>

            <!-- Baris 2: IT & GIM -->
            <div class="menu-row">
                <a href="<?= site_url('keluhan/form/it') ?>" class="menu-btn">
                    <span>IT</span>
                </a>
                <a href="<?= site_url('keluhan/form/gim') ?>" class="menu-btn">
                    <span>GIM</span>
                </a>
            </div>

            <!-- Baris 3: GA (Tengah) -->
            <div class="menu-row">
                <a href="<?= site_url('keluhan/form/ga') ?>" class="menu-btn btn-single">
                    <span>GA</span>
                </a>
            </div>
        </div>
    </div>
</body>
</html>