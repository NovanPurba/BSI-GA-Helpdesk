<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form <?= ucfirst(strtolower($jenis_default)) ?> - Facility Service Helpdesk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- FLATPICKR UNTUK FIX 24 JAM -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/dark.css">

    <style>
        :root {
            --bg-dark: #0b1320;
            --card-dark: #121c2d;
            --input-dark: #1a2638;
            --border-dark: #24344d;
            --gold-main: #d4af37;
            --gold-gradient: linear-gradient(135deg, #e6c200 0%, #a37c00 100%);
            --text-white: #ffffff;
            --text-muted: #8e9bb0;
        }

        body {
            background-color: var(--bg-dark);
            color: var(--text-white);
            font-family: 'Inter', system-ui, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .form-card {
            background: var(--card-dark);
            border: 1px solid var(--border-dark);
            border-radius: 16px;
            padding: 32px;
            max-width: 850px;
            width: 100%;
            margin: 20px auto;
            box-shadow: 0 12px 36px rgba(0,0,0,0.5);
            box-sizing: border-box;
        }

        .header-nav { display: flex; align-items: center; margin-bottom: 24px; }
        .header-nav a { color: var(--text-white); font-size: 20px; margin-right: 15px; text-decoration: none; }
        .header-nav h2 { margin: 0; font-size: 20px; font-weight: bold; }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px 20px;
        }

        .form-group.full-width {
            grid-column: span 2;
        }

        @media (max-width: 640px) {
            .form-card { padding: 20px; }
            .form-grid { grid-template-columns: 1fr; }
            .form-group.full-width { grid-column: span 1; }
        }

        .stepper-container {
            display: flex !important;
            flex-direction: row !important;
            justify-content: space-between !important;
            align-items: center !important;
            position: relative;
            margin: 20px 0 30px 0;
        }

        .stepper-container::before {
            content: '';
            position: absolute;
            top: 15px;
            left: 10%;
            right: 10%;
            height: 2px;
            background: var(--border-dark);
            z-index: 1;
        }

        .step-item {
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            z-index: 2;
            flex: 1;
        }

        .step-number {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--card-dark);
            border: 2px solid var(--border-dark);
            color: var(--text-muted);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 13px;
            margin-bottom: 6px;
        }

        .step-item.active .step-number {
            background: var(--gold-main);
            border-color: var(--gold-main);
            color: #000;
        }

        .step-label { font-size: 11px; color: var(--text-muted); }
        .step-item.active .step-label { color: var(--gold-main); font-weight: 600; }

        .form-group { margin-bottom: 18px; }
        .form-group label {
            display: block; font-size: 12px; font-weight: 600;
            color: var(--text-muted); margin-bottom: 6px;
            text-transform: uppercase; letter-spacing: 0.5px;
        }

        .form-control, .form-select {
            width: 100%; padding: 12px; background: var(--input-dark);
            border: 1px solid var(--border-dark); border-radius: 8px;
            color: #fff; font-size: 13px; box-sizing: border-box;
        }

        .form-control:focus, .form-select:focus { outline: none; border-color: var(--gold-main); }
        
        textarea.form-control { resize: vertical; min-height: 100px; }

        .upload-dropzone {
            position: relative;
            border: 2px dashed var(--border-dark);
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            background: var(--input-dark);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .upload-dropzone:hover { border-color: var(--gold-main); }
        .upload-dropzone i { font-size: 24px; color: var(--gold-main); margin-bottom: 6px; }
        .upload-dropzone input[type="file"] {
            position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0; cursor: pointer;
        }

        .btn-gold {
            width: 100%; padding: 14px; background: var(--gold-gradient);
            border: none; border-radius: 8px; color: #000;
            font-weight: bold; font-size: 14px; cursor: pointer; margin-top: 10px;
            transition: opacity 0.3s ease;
        }
        .btn-gold:hover { opacity: 0.9; }

        .alert-success {
            background-color: rgba(37, 211, 102, 0.1); border: 1px solid #25d366;
            color: #25d366; padding: 15px; border-radius: 8px; margin-bottom: 25px;
            font-weight: 600; text-align: center; font-size: 14px;
        }

        /* Adjust Flatpickr Dark Theme */
        .flatpickr-calendar { background: var(--card-dark) !important; border-color: var(--border-dark) !important; }
    </style>
</head>
<body>

<div class="form-card">
    
    <div class="header-nav">
        <a href="<?= base_url() ?>"><i class="fa-solid fa-arrow-left"></i></a>
        <h2>Form <?= ucfirst(strtolower($jenis_default)) ?></h2>
    </div>

    <div class="stepper-container">
        <div class="step-item active">
            <div class="step-number">1</div>
            <div class="step-label">Informasi</div>
        </div>
        <div class="step-item">
            <div class="step-number">2</div>
            <div class="step-label">Detail</div>
        </div>
        <div class="step-item">
            <div class="step-number">3</div>
            <div class="step-label">Konfirmasi</div>
        </div>
    </div>

    <?php if($this->session->flashdata('pesan_sukses')): ?>
        <div class="alert-success">
            <i class="fas fa-check-circle"></i> <?= $this->session->flashdata('pesan_sukses') ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('ticket/submit') ?>" method="POST" enctype="multipart/form-data">
        
        <input type="hidden" name="jenis_tiket" value="<?= $jenis_default ?>">

        <div class="form-grid">
            <div class="form-group">
                <label>NAMA *</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama" required>
            </div>
            
            <div class="form-group">
                <label>ID *</label>
                <input type="text" name="id_user" class="form-control" placeholder="Masukkan ID" required>
            </div>
            
            <div class="form-group">
                <label>DEPARTEMENT *</label>
                <input type="text" name="departement" class="form-control" placeholder="Masukkan departemen" required>
            </div>
            
            <div class="form-group">
                <label>NO HP *</label>
                <input type="text" name="no_hp" class="form-control" placeholder="Masukkan No HP" required>
            </div>

            <div class="form-group">
                <label>DEPARTEMEN TUJUAN *</label>
                <select name="kategori_utama" id="departemen_tujuan" class="form-select" required>
                    <option value="">-- Pilih Departemen --</option>
                    <option value="IT">IT</option>
                    <option value="GIM">GIM</option>
                    <option value="FUEL">FUEL</option>
                    <option value="General Affairs">General Affairs</option>
                    <option value="CARPOOL">CARPOOL</option>
                </select>
            </div>

            <div class="form-group" id="wadah_sub_kategori" style="display: none;">
                <label id="label_sub">SUB KATEGORI *</label>
                <select name="sub_kategori" id="sub_kategori" class="form-select">
                </select>
            </div>

            <!-- FORM KHUSUS CARPOOL REQUEST -->
            <div id="wadah_carpool" style="display: none;" class="form-group full-width">
                <div style="background: var(--input-dark); border: 1px solid var(--border-dark); padding: 20px; border-radius: 8px;">
                    <h4 style="color: var(--gold-main); font-size: 13px; margin-top: 0; margin-bottom: 16px; text-transform: uppercase; border-bottom: 1px solid var(--border-dark); padding-bottom: 10px;">
                        Detail Layanan Carpool
                    </h4>
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <label>TITIK JEMPUT *</label>
                            <input type="text" name="carpool_titik" id="carpool_titik" class="form-control" placeholder="Masukkan Titik Penjemputan">
                        </div>
                        <div class="form-group">
                            <label>TITIK TUJUAN *</label>
                            <input type="text" name="carpool_tujuan" id="carpool_tujuan" class="form-control" placeholder="Masukkan Titik Tujuan">
                        </div>
                        <div class="form-group" id="wadah_tanggal_booking" style="display: none;">
                            <label>TANGGAL *</label>
                            <input type="date" name="carpool_tanggal" id="carpool_tanggal" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>JAM *</label>
                            <!-- MURNI 24 JAM MENGGUNAKAN FLATPICKR -->
                            <input type="text" name="carpool_jam" id="carpool_jam" class="form-control" placeholder="HH:MM">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group full-width">
                <label><?= ucfirst(strtolower($jenis_default)) ?> *</label>
                <textarea name="detail_tiket" class="form-control" placeholder="Tuliskan <?= strtolower($jenis_default) ?>..." required></textarea>
            </div>

            <div class="form-group full-width">
                <label>LAMPIRAN FOTO (OPSIONAL)</label>
                <div class="upload-dropzone">
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                    <p id="file-name-display" style="margin: 0; font-size: 14px; font-weight: bold; color: var(--text-white);">Upload File</p>
                    <span style="font-size: 11px; color: var(--text-muted);">Maks. 1 File, ukuran 5MB</span>
                    <input type="file" name="foto" id="foto_upload" accept="image/jpeg, image/png, image/jpg">
                </div>
            </div>
        </div>

        <button type="submit" class="btn-gold">SUBMIT</button>

    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- FLATPICKR SCRIPT -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
$(document).ready(function() {
    // Inisialisasi Picker Jam 24 Jam
    flatpickr("#carpool_jam", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true
    });

    const dataSubKategori = {
        'IT': ['OT', 'SUPPORT', 'INFRA'],
        'GIM': ['AC', 'Carpenter', 'Electric', 'Plumping'],
        'FUEL': ['SMU/Ring Tag', 'Fuel', 'Charging'],
        'General Affairs': ['ATK / Perlengkapan', 'Renovasi / Maintenance', 'Ticket'],
        'CARPOOL': {
            'KELUHAN': ['Kerusakan Unit', 'Kebersihan Mobil', 'Layanan Driver'],
            'REQUEST': ['Reguler', 'Booking']
        }
    };

    $('#departemen_tujuan').change(function() {
        let departemen = $(this).val();
        let jenisTiket = $('input[name="jenis_tiket"]').val().toUpperCase();
        let dropdownSub = $('#sub_kategori'); 
        
        dropdownSub.empty(); 
        $('#wadah_carpool').hide();
        $('#carpool_tujuan, #carpool_titik, #carpool_jam, #carpool_tanggal').prop('required', false).val('');
        $('#wadah_tanggal_booking').hide();

        if (departemen) {
            let subData = [];
            
            if (departemen === 'CARPOOL') {
                subData = dataSubKategori['CARPOOL'][jenisTiket];
                if (jenisTiket === 'REQUEST') {
                    $('#label_sub').text('JENIS LAYANAN *');
                } else {
                    $('#label_sub').text('SUB KATEGORI *');
                }
            } else {
                subData = dataSubKategori[departemen];
                $('#label_sub').text('SUB KATEGORI *');
            }

            if (subData) {
                dropdownSub.append('<option value="">-- Pilih --</option>');
                $.each(subData, function(index, value) {
                    dropdownSub.append('<option value="' + value + '">' + value + '</option>');
                });
                $('#wadah_sub_kategori').show(); 
                dropdownSub.prop('required', true); 
            }
        } else {
            $('#wadah_sub_kategori').hide();
            dropdownSub.prop('required', false);
        }
    });

    $('#sub_kategori').change(function() {
        let departemen = $('#departemen_tujuan').val();
        let jenisTiket = $('input[name="jenis_tiket"]').val().toUpperCase();
        let jenisLayanan = $(this).val();

        if (departemen === 'CARPOOL' && jenisTiket === 'REQUEST') {
            if (jenisLayanan === 'Reguler' || jenisLayanan === 'Booking') {
                $('#wadah_carpool').fadeIn(300);
                $('#carpool_titik, #carpool_tujuan, #carpool_jam').prop('required', true);
                
                if (jenisLayanan === 'Booking') {
                    $('#wadah_tanggal_booking').show();
                    $('#carpool_tanggal').prop('required', true);
                } else {
                    $('#wadah_tanggal_booking').hide();
                    $('#carpool_tanggal').prop('required', false).val('');
                }
            } else {
                $('#wadah_carpool').hide();
                $('#carpool_titik, #carpool_tujuan, #carpool_jam, #carpool_tanggal').prop('required', false);
            }
        }
    });

    $('#foto_upload').change(function() {
        let fileName = $(this).val().split('\\').pop();
        if(fileName) {
            $('#file-name-display').text(fileName).css('color', 'var(--gold-main)');
        } else {
            $('#file-name-display').text('Upload File').css('color', 'var(--text-white)');
        }
    });
});
</script>
</body>
</html>