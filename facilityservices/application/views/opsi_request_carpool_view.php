<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Carpool - GA Helpdesk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style_home.css') ?>">
    <style>
        body { background-color: #0b1320; color: #fff; font-family: 'Inter', system-ui, sans-serif; margin: 0; padding: 20px; display: flex; align-items: center; justify-content: center; min-height: 100vh; box-sizing: border-box; }
        .main-container { max-width: 480px; width: 100%; text-align: center; position: relative; }
        .back-btn { position: absolute; left: 0; top: -5px; color: #fff; text-decoration: none; font-size: 20px; width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; border-radius: 50%; background: #121c2d; border: 1px solid #24344d; }
        
        .title { font-size: 22px; font-weight: 700; margin: 0 0 6px 0; color: #ffffff; letter-spacing: 0.5px; text-transform: uppercase; }
        .subtitle { font-size: 13px; color: #8e9bb0; margin: 0 0 28px 0; }

        .category-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; }
        .category-btn { background: #121c2d; border: 1px solid #24344d; border-radius: 14px; padding: 22px 12px; text-decoration: none; color: #fff; font-size: 14px; font-weight: 700; letter-spacing: 0.5px; transition: all 0.3s ease; display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 20px rgba(0,0,0,0.3); text-transform: uppercase; }
        .category-btn:hover { transform: translateY(-3px); border-color: #d4af37; background: linear-gradient(135deg, #18263d 0%, #121c2d 100%); box-shadow: 0 10px 24px rgba(212, 175, 55, 0.2); }
    </style>
</head>
<body>
    <div class="main-container">
        <a href="<?= site_url('request') ?>" class="back-btn" title="Kembali">
            <i class="fa-solid fa-arrow-left"></i>
        </a>

        <h1 class="title">REQUEST CARPOOL</h1>
        <p class="subtitle">Pilih tipe pemesanan kendaraan</p>

        <div class="category-grid">
            <a href="<?= site_url('request/form/carpool/reguler') ?>" class="category-btn">REGULER</a>
            <a href="<?= site_url('request/form/carpool/booking') ?>" class="category-btn">BOOKING</a>
        </div>
    </div>
</body>
</html>