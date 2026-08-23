<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facility Service Helpdesk - BSI</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style_home.css') ?>">
    <style>
        body { background-color: #0b1320; color: #fff; font-family: 'Inter', system-ui, sans-serif; margin: 0; padding: 20px; display: flex; align-items: center; justify-content: center; min-height: 100vh; box-sizing: border-box; }
        .main-container { max-width: 480px; width: 100%; text-align: center; }
        .logo-badge { 
            background: #ffffff; 
            padding: 18px 36px; /* Padding lebih luas */
            border-radius: 16px; 
            display: inline-flex;
            align-items: center;
                justify-content: center;
            margin-bottom: 28px; 
        /* Shadow lebih dalam + sentuhan list emas tipis */
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.5), 0 0 20px rgba(212, 175, 55, 0.2); 
            border: 1px solid rgba(212, 175, 55, 0.4);
            box-sizing: border-box;
            transition: transform 0.3s ease;
        }

        .logo-badge:hover {
            transform: translateY(-2px);
        }

        .logo-badge img { 
            height: 68px; /* Diperbesar signifikan dari 45px */
            max-height: 85px; 
                width: auto;
            display: block; 
            margin: 0 auto; 
        object-fit: contain;
        }
        .title { font-size: 22px; font-weight: 700; margin: 0 0 6px 0; color: #ffffff; letter-spacing: -0.3px; }
        .subtitle { font-size: 13px; color: #8e9bb0; margin: 0 0 32px 0; }
        
        .menu-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; margin-bottom: 16px; }
        .menu-card { background: #121c2d; border: 1px solid #24344d; border-radius: 16px; padding: 24px 16px; text-decoration: none; color: #fff; transition: all 0.3s ease; display: flex; flex-direction: column; align-items: center; justify-content: center; box-shadow: 0 8px 24px rgba(0,0,0,0.3); }
        .menu-card:hover { transform: translateY(-4px); border-color: #d4af37; box-shadow: 0 12px 28px rgba(212, 175, 55, 0.25); }
        
        .menu-card.gold-card { background: linear-gradient(135deg, #c59b27 0%, #8c6810 100%); border: 1px solid #e0b133; }
        .menu-card.gold-card:hover { box-shadow: 0 12px 28px rgba(224, 177, 51, 0.4); }
        
        .menu-card i { font-size: 32px; margin-bottom: 12px; }
        .menu-card.gold-card i { color: #ffffff; }
        .menu-card:not(.gold-card) i { color: #d4af37; }
        .menu-card span { font-size: 14px; font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase; }

        .menu-card-full { grid-column: span 2; background: #121c2d; border: 1px solid #24344d; border-radius: 16px; padding: 20px; text-decoration: none; color: #fff; display: flex; flex-direction: column; align-items: center; justify-content: center; transition: all 0.3s ease; box-shadow: 0 8px 24px rgba(0,0,0,0.3); }
        .menu-card-full:hover { transform: translateY(-4px); border-color: #25d366; box-shadow: 0 12px 28px rgba(37, 211, 102, 0.25); }
        .menu-card-full i { font-size: 28px; color: #25d366; margin-bottom: 8px; }
        .menu-card-full span { font-size: 14px; font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase; }
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Logo Header -->
        <div class="logo-badge">
            <img src="<?= base_url('assets/img/bsi-logo.png') ?>" 
            alt="Bumi Suksesindo Logo" 
            onerror="this.style.display='none'; document.getElementById('alt-logo-text').style.display='block';">
    
    <!-- Fallback Text jika gambar belum di-upload -->
            <div id="alt-logo-text" style="display: none; color: #0b1320; font-weight: 800; font-size: 16px; letter-spacing: 0.5px;">
                BUMI SUKSESINDO
            </div>
        </div>

        
        <!-- <div class="logo-badge">
            <img src="<?= base_url('assets/images/bsi-logo.png') ?>" alt="Bumi Suksesindo Logo" onerror="this.src='https://via.placeholder.com/180x45?text=BUMI+SUKSESINDO'">
        </div> -->

        <h1 class="title">Facility Service Helpdesk</h1>
        <p class="subtitle">Silakan pilih layanan yang Anda butuhkan</p>

        <!-- Menu Navigation Grid -->
        <div class="menu-grid">
            <a href="<?= site_url('keluhan') ?>" class="menu-card gold-card">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <span>KELUHAN</span>
            </a>

            <a href="<?= site_url('request') ?>" class="menu-card">
                <i class="fa-solid fa-clipboard-list"></i>
                <span>REQUEST</span>
            </a>

            <a href="https://wa.me/628123456789" target="_blank" class="menu-card-full">
                <i class="fa-brands fa-whatsapp"></i>
                <span>HUBUNGI CS</span>
            </a>
        </div>
    </div>
</body>
</html>