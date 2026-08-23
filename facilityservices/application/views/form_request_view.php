<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Request <?= isset($kategori) ? $kategori : '' ?> - GA Helpdesk</title>
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

        .priority-selector { display: flex; gap: 10px; }
        .priority-btn { flex: 1; background: #1a2638; border: 1px solid #24344d; color: #8e9bb0; padding: 12px; border-radius: 8px; text-align: center; font-size: 13px; cursor: pointer; }
        .priority-btn.active { background: linear-gradient(135deg, #e6c200 0%, #a37c00 100%); color: #000; font-weight: bold; border: none; }
        
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
    <?php 
        $kat = isset($kategori) ? $kategori : 'FUEL';
        $sub_kat = isset($sub) ? $sub : '';

        $back_url = site_url('request');
        if ($kat === 'FUEL') $back_url = site_url('request/fuel_options');
        if ($kat === 'CARPOOL') $back_url = site_url('request/carpool_options');
    ?>

    <div class="form-card">
        <div style="display: flex; align-items: center; margin-bottom: 15px;">
            <a href="<?= $back_url ?>" style="color: #fff; text-decoration: none; font-size: 20px; margin-right: 15px;">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h2 style="margin: 0; font-size: 18px;">Form Request <?= $kat ?></h2>
        </div>

        <div class="stepper-container">
            <div class="step-item active"><div class="step-number">1</div><div class="step-label">Informasi</div></div>
            <div class="step-item"><div class="step-number">2</div><div class="step-label">Detail</div></div>
            <div class="step-item"><div class="step-number">3</div><div class="step-label">Konfirmasi</div></div>
        </div>

        <?php if (!empty($pesan_sukses)): ?>
            <div style="background: rgba(40, 167, 69, 0.2); border: 1px solid #28a745; color: #28a745; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 13px;">
                <i class="fa-solid fa-circle-check"></i> <?= $pesan_sukses ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($pesan_gagal)): ?>
            <div style="background: rgba(220, 53, 69, 0.2); border: 1px solid #dc3545; color: #dc3545; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 13px;">
                <i class="fa-solid fa-triangle-exclamation"></i> <?= $pesan_gagal ?>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('request/proses_submit') ?>" method="POST" enctype="multipart/form-data">
            <?php if ($this->config->item('csrf_protection')): ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <?php endif; ?>

            <input type="hidden" name="tipe_tiket" value="REQUEST">
            <input type="hidden" name="kategori_utama" value="<?= $kat ?>">
            <input type="hidden" name="sub_kategori" value="<?= $sub_kat ?>">

            <div class="form-grid">
                <!-- Row 1: Nama & ID -->
                <div class="form-group"><label>NAMA *</label><input type="text" name="nama" class="form-control" required placeholder="Masukkan nama"></div>
                <div class="form-group"><label>ID *</label><input type="text" name="id_user" class="form-control" required placeholder="Masukkan ID"></div>

                <!-- Row 2: Departement & No HP -->
                <div class="form-group"><label>DEPARTEMENT *</label><input type="text" name="departement" class="form-control" required placeholder="Masukkan departemen"></div>
                <div class="form-group"><label>NO HP *</label><input type="tel" name="no_hp" class="form-control" required placeholder="Masukkan No HP"></div>

                <!-- Dropdown GIM -->
                <?php if (!empty($options) && $kat === 'GIM'): ?>
                <div class="form-group full-width">
                    <label>KATEGORI *</label>
                    <select name="sub_kategori_gim" required class="form-select">
                        <option value="" disabled selected>-- Pilih Kategori --</option>
                        <?php foreach ($options as $opt): ?>
                            <option value="<?= $opt ?>"><?= $opt ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php endif; ?>

                <!-- Field Spesifik per Kategori -->
                <?php if ($kat === 'GIM'): ?>
                    <div class="form-group"><label>LOCATION *</label><input type="text" name="location" class="form-control" required placeholder="Masukkan lokasi"></div>
                    <div class="form-group"><label>DETAIL LOKASI *</label><input type="text" name="detail_lokasi" class="form-control" required placeholder="Masukkan detail lokasi"></div>
                    <div class="form-group full-width"><label>DETAIL REQUEST *</label><textarea name="detail_request" class="form-control" rows="3" required placeholder="Tuliskan detail request..."></textarea></div>

                <?php elseif ($kat === 'CARPOOL'): ?>
                    <div class="form-group"><label>TUJUAN *</label><input type="text" name="tujuan" class="form-control" required placeholder="Masukkan Tujuan"></div>
                    <div class="form-group"><label>TITIK PENJEMPUTAN *</label><input type="text" name="titik_penjemputan" class="form-control" required placeholder="Masukkan Titik Penjemputan"></div>
                    <?php if ($sub_kat === 'booking'): ?>
                        <div class="form-group"><label>TANGGAL *</label><input type="date" name="tanggal" class="form-control" required></div>
                    <?php endif; ?>
                    <div class="form-group"><label>JAM *</label><input type="time" name="jam" class="form-control" required></div>
                    <div class="form-group full-width"><label>KEPERLUAN *</label><textarea name="keperluan" class="form-control" rows="3" required placeholder="Tulis Keperluan"></textarea></div>

                <?php else: ?>
                    <div class="form-group full-width"><label>DETAIL REQUEST *</label><textarea name="detail_request" class="form-control" rows="3" required placeholder="Tuliskan detail request..."></textarea></div>
                <?php endif; ?>

                <!-- Full Width Controls -->
                <div class="form-group full-width">
                    <label>PRIORITAS</label>
                    <div class="priority-selector">
                        <div class="priority-btn" onclick="selectPriority(this, 'Rendah')">Rendah</div>
                        <div class="priority-btn active" onclick="selectPriority(this, 'Sedang')">Sedang</div>
                        <div class="priority-btn" onclick="selectPriority(this, 'Tinggi')">Tinggi</div>
                    </div>
                    <input type="hidden" name="prioritas" id="prioritas_input" value="Sedang">
                </div>

                <div class="form-group full-width">
                    <label>LAMPIRAN FOTO *</label>
                    <div class="upload-dropzone" onclick="document.getElementById('foto').click()">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                        <div style="font-size: 13px;" id="file_label">Upload File</div>
                        <div style="font-size: 11px; color: #8e9bb0;">Maks. 1 File, ukuran 5MB</div>
                    </div>
                    <input type="file" id="foto" name="foto" accept="image/*" style="display: none;" required onchange="updateFileName(this)">
                </div>

                <div class="form-group full-width">
                    <button type="submit" class="btn-gold">SUBMIT</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function selectPriority(element, val) {
            document.querySelectorAll('.priority-btn').forEach(btn => btn.classList.remove('active'));
            element.classList.add('active');
            document.getElementById('prioritas_input').value = val;
        }

        function updateFileName(input) {
            if (input.files && input.files[0]) {
                document.getElementById('file_label').innerText = input.files[0].name;
            }
        }
    </script>
</body>
</html>