<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Keluhan <?= isset($kategori) ? $kategori : '' ?> - GA Helpdesk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style_home.css') ?>">
    <style>
        body { background-color: #0b1320; color: #fff; font-family: 'Inter', sans-serif; margin: 0; padding: 20px 15px; }
        .form-card { background: #121c2d; border: 1px solid #24344d; border-radius: 16px; padding: 32px; max-width: 850px; width: 100%; margin: 10px auto; box-shadow: 0 12px 36px rgba(0,0,0,0.5); box-sizing: border-box; }
        
        .form-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px 20px; }
        .form-group.full-width { grid-column: span 2; }

        .stepper-container { display: flex !important; flex-direction: row !important; justify-content: space-between !important; align-items: center !important; position: relative; margin: 25px 0 30px 0; }
        .stepper-container::before { content: ''; position: absolute; top: 16px; left: 10%; right: 10%; height: 2px; background: #24344d; z-index: 1; }
        .step-item { display: flex !important; flex-direction: column !important; align-items: center !important; z-index: 2; flex: 1; }
        .step-number { width: 34px; height: 34px; border-radius: 50%; background: #121c2d; border: 2px solid #24344d; color: #8e9bb0; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 14px; margin-bottom: 6px; }
        .step-item.active .step-number { background: #d4af37; border-color: #d4af37; color: #000; }
        .step-label { font-size: 12px; color: #8e9bb0; }
        .step-item.active .step-label { color: #d4af37; font-weight: 600; }

        .form-group { margin-bottom: 0; }
        .form-group label { display: block; font-size: 11px; font-weight: 600; color: #8e9bb0; margin-bottom: 6px; text-transform: uppercase; }
        .form-control, .form-select { width: 100%; padding: 12px; background: #1a2638; border: 1px solid #24344d; border-radius: 8px; color: #fff; font-size: 13px; box-sizing: border-box; }
        .form-control:focus, .form-select:focus { outline: none; border-color: #d4af37; }

        .upload-dropzone { border: 2px dashed #24344d; border-radius: 8px; padding: 24px; text-align: center; background: #1a2638; cursor: pointer; }
        .upload-dropzone i { font-size: 26px; color: #d4af37; margin-bottom: 8px; }
        
        .btn-gold { width: 100%; padding: 15px; background: linear-gradient(135deg, #e6c200 0%, #a37c00 100%); border: none; border-radius: 8px; color: #000; font-weight: bold; font-size: 15px; cursor: pointer; margin-top: 10px; }

        @media (max-width: 640px) {
            .form-card { padding: 20px; }
            .form-grid { grid-template-columns: 1fr; }
            .form-group.full-width { grid-column: span 1; }
        }
    </style>
</head>
<body>
    <div class="form-card">
        <div style="display: flex; align-items: center; margin-bottom: 15px;">
            <a href="<?= site_url('keluhan') ?>" style="color: #fff; text-decoration: none; font-size: 20px; margin-right: 15px;">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h2 style="margin: 0; font-size: 18px;">Form Keluhan <?= isset($kategori) ? $kategori : '' ?></h2>
        </div>

        <div class="stepper-container">
            <div class="step-item active"><div class="step-number">1</div><div class="step-label">Informasi</div></div>
            <div class="step-item"><div class="step-number">2</div><div class="step-label">Detail</div></div>
            <div class="step-item"><div class="step-number">3</div><div class="step-label">Konfirmasi</div></div>
        </div>

        <form action="<?= site_url('keluhan/submit') ?>" method="POST" enctype="multipart/form-data">
            <?php if ($this->config->item('csrf_protection')): ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <?php endif; ?>

            <input type="hidden" name="tipe_tiket" value="KELUHAN">
            <input type="hidden" name="kategori_utama" value="<?= isset($kategori) ? $kategori : '' ?>">

            <div class="form-grid">
                <!-- Row 1: Nama & ID -->
                <div class="form-group"><label>NAMA *</label><input type="text" name="nama" class="form-control" required placeholder="Masukkan nama"></div>
                <div class="form-group"><label>ID *</label><input type="text" name="id_user" class="form-control" required placeholder="Masukkan ID"></div>

                <!-- Row 2: Departement & No HP -->
                <div class="form-group"><label>DEPARTEMENT *</label><input type="text" name="departement" class="form-control" required placeholder="Masukkan departemen"></div>
                <div class="form-group"><label>NO HP *</label><input type="tel" name="no_hp" class="form-control" required placeholder="Masukkan No HP"></div>

                <!-- Dropdown Kategori (Jika Ada) -->
                <?php if (!empty($options) && $kategori !== 'CARPOOL'): ?>
                <div class="form-group full-width">
                    <label>KATEGORI *</label>
                    <select name="sub_kategori" required class="form-select">
                        <option value="" disabled selected>-- Pilih Kategori --</option>
                        <?php foreach ($options as $opt): ?>
                            <option value="<?= $opt ?>"><?= $opt ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php endif; ?>

                <!-- Khusus GIM: Location & Detail Lokasi -->
                <?php if (isset($kategori) && $kategori === 'GIM'): ?>
                    <div class="form-group"><label>LOCATION *</label><input type="text" name="location" class="form-control" required placeholder="Masukkan lokasi"></div>
                    <div class="form-group"><label>DETAIL LOKASI *</label><input type="text" name="detail_lokasi" class="form-control" required placeholder="Masukkan detail lokasi"></div>
                <?php endif; ?>

                <!-- Textarea Keluhan Full Width -->
                <div class="form-group full-width">
                    <label>KELUHAN *</label>
                    <textarea name="keluhan" class="form-control" rows="3" required placeholder="Tuliskan keluhan..."></textarea>
                </div>

                <!-- Upload Foto Full Width -->
                <div class="form-group full-width">
                    <label>LAMPIRAN FOTO <span style="color: #8e9bb0; font-size: 10px;">(Opsional)</span></label>
                    <div class="upload-dropzone" onclick="document.getElementById('foto_keluhan').click()">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                        <div style="font-size: 13px;" id="file_label_keluhan">Upload File</div>
                        <div style="font-size: 11px; color: #8e9bb0;">Maks. 1 File, ukuran 5MB</div>
                    </div>
                    <input type="file" id="foto_keluhan" name="foto" accept="image/*" style="display: none;" onchange="updateFileNameKeluhan(this)">
                </div>

                <div class="form-group full-width">
                    <button type="submit" class="btn-gold">SUBMIT</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function updateFileNameKeluhan(input) {
            if (input.files && input.files[0]) {
                document.getElementById('file_label_keluhan').innerText = input.files[0].name;
            }
        }
    </script>
</body>
</html>