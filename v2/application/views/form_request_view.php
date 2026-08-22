<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Request <?= $kategori ?> - GA Helpdesk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style_home.css') ?>">
</head>
<body>
    <?php 
        // Routing Tombol Back
        $back_url = site_url('request');
        if ($kategori === 'FUEL') $back_url = site_url('request/fuel_options');
        if ($kategori === 'CARPOOL') $back_url = site_url('request/carpool_options');
    ?>
    <a href="<?= $back_url ?>" class="back-btn-futuristic" title="Kembali">
        <i class="fa-solid fa-chevron-left"></i>
    </a>

    <div class="app-container form-container">
        <header class="header">
            <h1>FORM REQUEST <?= $kategori ?> <?= $sub ? '('.strtoupper(str_replace('_', ' ', $sub)).')' : '' ?></h1>
        </header>

        <form action="<?= site_url('request/submit') ?>" method="POST" enctype="multipart/form-data" class="keluhan-form">
            <input type="hidden" name="tipe_tiket" value="REQUEST">
            <input type="hidden" name="kategori_utama" value="<?= $kategori ?>">
            <input type="hidden" name="sub_kategori" value="<?= $sub ?>">

            <!-- Field Standar Atas -->
            <div class="form-group"><label>NAMA *</label><input type="text" name="nama" required placeholder="Masukkan Nama"></div>
            <div class="form-group"><label>ID *</label><input type="text" name="id_user" required placeholder="Masukkan ID"></div>
            <div class="form-group"><label>DEPARTEMENT *</label><input type="text" name="departement" required placeholder="Masukkan Departement"></div>

            <!-- KHUSUS FORM GIM (Sesuai Mockup image_3e9481) -->
            <?php if ($kategori === 'GIM'): ?>
                <div class="form-group"><label>KATEGORI *</label><input type="text" name="kategori_utama_gim" required placeholder="Pilih/Masukkan Kategori Utama"></div>
                <div class="form-group"><label>NO HP *</label><input type="tel" name="no_hp" required placeholder="Masukkan No HP"></div>
                <div class="form-group"><label>KATEGORI *</label><input type="text" name="sub_kategori_gim" placeholder="Detail Sub-Kategori"></div>
                <div class="form-group"><label>LOKASI *</label><input type="text" name="location" required placeholder="Masukkan Lokasi"></div>
                <div class="form-group"><label>DETAIL LOKASI *</label><input type="text" name="detail_lokasi" required placeholder="Masukkan Detail Lokasi"></div>
                <div class="form-group"><label>DETAIL REQUESTH *</label><textarea name="detail_request" rows="4" required placeholder="Tuliskan Detail Request..."></textarea></div>

            <!-- KHUSUS CARPOOL -->
            <?php elseif ($kategori === 'CARPOOL'): ?>
                <div class="form-group"><label>NO HP *</label><input type="tel" name="no_hp" required placeholder="Masukkan No HP"></div>
                <div class="form-group"><label>TUJUAN *</label><input type="text" name="tujuan" required placeholder="Masukkan Tujuan"></div>
                <div class="form-group"><label>TITIK PENJEMPUTAN *</label><input type="text" name="titik_penjemputan" required placeholder="Masukkan Titik Penjemputan"></div>
                
                <?php if ($sub === 'booking'): ?>
                <div class="form-group"><label>TANGGAL *</label><input type="date" name="tanggal" required></div>
                <?php endif; ?>

                <div class="form-group"><label>JAM *</label><input type="time" name="jam" required></div>
                <div class="form-group"><label>KEPERLUAN *</label><textarea name="keperluan" rows="3" required placeholder="Tulis Keperluan"></textarea></div>
                <div class="form-group">
                    <label>STATUS *</label>
                    <input type="text" name="status_wait" value="Max 15 menit untuk wait" readonly class="input-disabled">
                </div>

            <!-- DEFAULT UNTUK LAINNYA (FUEL / IT / GA) -->
            <?php else: ?>
                <div class="form-group"><label>NO HP *</label><input type="tel" name="no_hp" required placeholder="Masukkan No HP"></div>
                <div class="form-group"><label>DETAIL REQUEST *</label><textarea name="detail_request" rows="4" required placeholder="Tuliskan Detail Request..."></textarea></div>
            <?php endif; ?>

            <!-- File Upload Lampiran -->
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