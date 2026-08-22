<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Keluhan <?= $kategori ?> - GA Helpdesk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style_home.css') ?>">
</head>
<body>
    <!-- Tombol Kembali Futuristik Melayang -->
    <a href="<?= site_url('keluhan') ?>" class="back-btn-futuristic" title="Kembali ke Opsi Keluhan">
        <i class="fa-solid fa-chevron-left"></i>
    </a>

    <div class="app-container form-container">
        <header class="header">
            <h1>OPSI KELUHAN <?= $kategori ?></h1>
            <p>Silakan lengkapi form keluhan di bawah ini</p>
        </header>

        <form action="#" method="POST" class="keluhan-form">
            <!-- Hidden input untuk penanda tipe & kategori -->
            <input type="hidden" name="tipe_tiket" value="KELUHAN">
            <input type="hidden" name="kategori" value="<?= $kategori ?>">

            <div class="form-group">
                <label for="nama">NAMA</label>
                <input type="text" id="nama" name="nama" required placeholder="Masukkan nama lengkap">
            </div>

            <div class="form-group">
                <label for="id_user">ID</label>
                <input type="text" id="id_user" name="id_user" required placeholder="Masukkan ID / NIP">
            </div>

            <div class="form-group">
                <label for="departement">DEPARTEMENT</label>
                <input type="text" id="departement" name="departement" required placeholder="Masukkan departemen">
            </div>

            <div class="form-group">
                <label for="no_hp">NO HP</label>
                <input type="tel" id="no_hp" name="no_hp" required placeholder="Masukkan nomor WhatsApp">
            </div>

            <div class="form-group">
                <label for="display_kategori">KATEGORI</label>
                <input type="text" id="display_kategori" value="<?= $kategori ?>" readonly class="input-disabled">
            </div>

            <div class="form-group">
                <label for="keluhan">KELUHAN</label>
                <textarea id="keluhan" name="keluhan" rows="5" required placeholder="Tuliskan keluhan Anda secara detail..."></textarea>
            </div>

            <button type="submit" class="submit-btn">
                <span>SUBMIT</span>
                <i class="fa-solid fa-paper-plane"></i>
            </button>
        </form>
    </div>
</body>
</html>