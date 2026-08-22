<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opsi Keluhan <?= $kategori ?> - GA Helpdesk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style_home.css') ?>">
</head>
<body>
    <a href="<?= site_url('keluhan') ?>" class="back-btn-futuristic" title="Kembali">
        <i class="fa-solid fa-chevron-left"></i>
    </a>

    <div class="app-container form-container">
        <header class="header">
            <h1>OPSI KELUHAN <?= $kategori ?></h1>
        </header>

        <form action="<?= site_url('keluhan/submit') ?>" method="POST" enctype="multipart/form-data" class="keluhan-form">
            <input type="hidden" name="tipe_tiket" value="KELUHAN">
            <input type="hidden" name="kategori_utama" value="<?= $kategori ?>">

            <div class="form-group">
                <label for="nama">NAMA *</label>
                <input type="text" id="nama" name="nama" required placeholder="Masukkan nama">
            </div>

            <div class="form-group">
                <label for="id_user">ID *</label>
                <input type="text" id="id_user" name="id_user" required placeholder="Masukkan ID">
            </div>

            <div class="form-group">
                <label for="departement">DEPARTEMENT *</label>
                <input type="text" id="departement" name="departement" required placeholder="Masukkan departemen">
            </div>

            <!-- Field Dropdown Kategori (Tampil Jika Opsi Ada & BUKAN CARPOOL) -->
            <?php if (!empty($options) && $kategori !== 'CARPOOL'): ?>
            <div class="form-group">
                <label for="sub_kategori">KATEGORI *</label>
                <select id="sub_kategori" name="sub_kategori" required class="form-select">
                    <option value="" disabled selected>-- Pilih Kategori --</option>
                    <?php foreach ($options as $opt): ?>
                        <option value="<?= $opt ?>"><?= $opt ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="no_hp">NO HP *</label>
                <input type="tel" id="no_hp" name="no_hp" required placeholder="Masukkan No HP">
            </div>

            <!-- KHUSUS FORM GIM: Field Location & Detail Lokasi -->
            <?php if ($kategori === 'GIM'): ?>
            <div class="form-group">
                <label for="location">LOCATION *</label>
                <input type="text" id="location" name="location" required placeholder="Masukkan lokasi (misal: Site A / Gedung Utama)">
            </div>

            <div class="form-group">
                <label for="detail_lokasi">DETAIL LOKASI *</label>
                <input type="text" id="detail_lokasi" name="detail_lokasi" required placeholder="Masukkan detail lokasi (misal: Lantai 2, Ruang Meeting 3)">
            </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="keluhan">KELUHAN *</label>
                <textarea id="keluhan" name="keluhan" rows="4" required placeholder="Tulis keluhan..."></textarea>
            </div>

            <div class="form-group">
                <label for="foto">LAMPIRAN FOTO <span class="text-optional">(Opsional)</span></label>
                <input type="file" id="foto" name="foto" accept="image/*" class="file-input">
            </div>

            <button type="submit" class="submit-btn">
                <span>SUBMIT</span>
                <i class="fa-solid fa-paper-plane"></i>
            </button>
        </form>
    </div>
</body>
</html>