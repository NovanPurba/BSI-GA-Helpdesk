<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facillity Service Helpdesk - PT BSI</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style_home.css') ?>">
</head>
<body>
    <div class="app-container">
        <header class="header">
            <img src="<?= base_url('assets/img/bsi-logo.png') ?>" alt="Logo BSI" class="logo">
            <h1>Facillity Service Helpdesk</h1>
            <p>Silakan pilih layanan yang Anda butuhkan</p>
        </header>
        <div class="menu-container">
            <div class="menu-row">
                <a href="<?= site_url('keluhan') ?>" class="menu-btn">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <span>KELUHAN</span>
                </a>
                <!-- Ubah atribut href pada tombol REQUEST jadi seperti ini: -->
                <a href="<?= site_url('request') ?>" class="menu-btn">
                    <i class="fa-solid fa-clipboard-list"></i>
                    <span>REQUEST</span>
                </a>
            </div>
            <div class="menu-row">
                <a href="https://wa.me/6281234567890" target="_blank" class="menu-btn btn-cs"><i class="fa-brands fa-whatsapp"></i><span>HUBUNGI CS</span></a>
            </div>
        </div>
    </div>
</body>
</html>