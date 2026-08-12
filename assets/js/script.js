// ==========================================
// KAMUS TRANSLASI 3 BAHASA
// ==========================================
const translations = {
    id: {
        app_title: "GA HELPDESK",
        menu_lapor: "Lapor Keluhan",
        menu_kamar: "Aturan Kamar",
        menu_olahraga: "Jadwal Olahraga",
        contact_ga: "Contact GA CS",
        btn_kembali: "Kembali",
        form_title: "LAPOR KELUHAN GA",
        lbl_nama: "NAMA",
        ph_nama: "Masukkan Nama Lengkap",
        lbl_id: "ID KARYAWAN",
        ph_id: "Masukkan ID Karyawan",
        lbl_nohp: "NOMOR HP (WHATSAPP)",
        ph_nohp: "Contoh: 081234567890",
        lbl_dept: "DEPARTEMENT",
        opt_dept: "Pilih Departement",
        lbl_loc: "LOCATION",
        ph_loc: "Lokasi Mess / Area",
        lbl_cat: "CATEGORY",
        opt_cat: "Pilih Kategori Keluhan",
        cat_1: "Fasilitas Kamar",
        cat_2: "Kebersihan",
        cat_3: "Makan/Catering",
        cat_4: "Lainnya",
        lbl_comp: "COMPLAINT",
        ph_comp: "Jelaskan detail keluhan Anda...",
        btn_submit: "SUBMIT",
        modal_title: "DATA BERHASIL DISUBMIT",
        modal_desc: "Keluhan Anda telah masuk ke sistem kami dengan ID Tiket:",
        modal_note: "Silakan simpan ID ini untuk melacak status keluhan Anda.",
        btn_modal_back: "Kembali ke Menu Utama",
        msg_sending: "MENGIRIM..."
    },
    en: {
        app_title: "GA HELPDESK",
        menu_lapor: "Submit Complaint",
        menu_kamar: "Room Rules",
        menu_olahraga: "Sports Schedule",
        contact_ga: "Contact GA CS",
        btn_kembali: "Back",
        form_title: "GA COMPLAINT FORM",
        lbl_nama: "NAME",
        ph_nama: "Enter Full Name",
        lbl_id: "EMPLOYEE ID",
        ph_id: "Enter Employee ID",
        lbl_nohp: "PHONE NUMBER (WHATSAPP)",
        ph_nohp: "Example: 081234567890",
        lbl_dept: "DEPARTMENT",
        opt_dept: "Select Department",
        lbl_loc: "LOCATION",
        ph_loc: "Camp / Area Location",
        lbl_cat: "CATEGORY",
        opt_cat: "Select Complaint Category",
        cat_1: "Room Facilities",
        cat_2: "Cleanliness",
        cat_3: "Food/Catering",
        cat_4: "Others",
        lbl_comp: "COMPLAINT",
        ph_comp: "Explain your complaint in detail...",
        btn_submit: "SUBMIT",
        modal_title: "DATA SUBMITTED SUCCESSFULLY",
        modal_desc: "Your complaint has been registered with Ticket ID:",
        modal_note: "Please save this ID to track your complaint status.",
        btn_modal_back: "Back to Main Menu",
        msg_sending: "SENDING..."
    },
    zh: {
        app_title: "GA 帮助台",
        menu_lapor: "提交投诉",
        menu_kamar: "房间规定",
        menu_olahraga: "体育日程",
        contact_ga: "联系 GA 客服",
        btn_kembali: "返回",
        form_title: "GA 投诉表",
        lbl_nama: "姓名",
        ph_nama: "输入全名",
        lbl_id: "员工 ID",
        ph_id: "输入员工 ID",
        lbl_nohp: "手机号码 (WHATSAPP)",
        ph_nohp: "例如: 081234567890",
        lbl_dept: "部门",
        opt_dept: "选择部门",
        lbl_loc: "地点",
        ph_loc: "宿舍 / 区域位置",
        lbl_cat: "类别",
        opt_cat: "选择投诉类别",
        cat_1: "房间设施",
        cat_2: "清洁度",
        cat_3: "餐饮",
        cat_4: "其他",
        lbl_comp: "投诉内容",
        ph_comp: "详细说明您的投诉...",
        btn_submit: "提交",
        modal_title: "数据提交成功",
        modal_desc: "您的投诉已进入我们的系统，票号为：",
        modal_note: "请保存此 ID 以跟踪您的投诉状态。",
        btn_modal_back: "返回主菜单",
        msg_sending: "发送中..."
    }
};

let currentLang = 'id'; // Default Bahasa Indonesia

// Fungsi Ganti Bahasa
function changeLanguage(lang) {
    currentLang = lang;
    
    // Ubah status tombol aktif
    document.querySelectorAll('.lang-btn').forEach(btn => btn.classList.remove('active'));
    document.getElementById(`btn-${lang}`).classList.add('active');

    // Ubah semua teks (innerHTML)
    document.querySelectorAll('[data-i18n]').forEach(element => {
        const key = element.getAttribute('data-i18n');
        if (translations[lang][key]) {
            element.innerText = translations[lang][key];
        }
    });

    // Ubah semua Placeholder input
    document.querySelectorAll('[data-i18n-ph]').forEach(element => {
        const key = element.getAttribute('data-i18n-ph');
        if (translations[lang][key]) {
            element.placeholder = translations[lang][key];
        }
    });
}

// ==========================================
// LOGIKA FORM
// ==========================================

function showPage(pageId) {
    document.querySelectorAll('.page-section').forEach(section => {
        section.classList.remove('active');
    });
    document.getElementById(pageId).classList.add('active');
}

function generateTicketID() {
    const randomStr = Math.random().toString(36).substring(2, 7).toUpperCase();
    return "GA-" + randomStr;
}

function closeModalAndReturn() {
    document.getElementById('successModal').style.display = 'none';
    document.getElementById('keluhanForm').reset();
    showPage('mainMenu');
}

document.getElementById('keluhanForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const submitBtn = document.getElementById('submitBtn');
    submitBtn.innerText = translations[currentLang].msg_sending;
    submitBtn.disabled = true;

    const newTicketID = generateTicketID();
    document.getElementById('ticket_id').value = newTicketID;

    const formData = new FormData(this);

    // PASTE URL ASLI ANDA DI BAWAH INI
    const scriptURL = 'https://script.google.com/macros/s/AKfycbyWc7E--Q7w09XQKgeVUbxEHczoHeq7dJHyyOF1ROWa7a4KtNkNZoj4-NSPPxL4oBFJ_g/exec'; 

    fetch(scriptURL, { method: 'POST', body: formData})
        .then(response => {
            document.getElementById('displayTicketID').innerText = newTicketID;
            document.getElementById('successModal').style.display = 'flex';
            
            submitBtn.innerText = translations[currentLang].btn_submit;
            submitBtn.disabled = false;
        })
        .catch(error => {
            console.error('Error Pengiriman!', error.message);
            alert('Gagal mengirim data. Silakan cek koneksi atau URL Apps Script Anda.');
            
            submitBtn.innerText = translations[currentLang].btn_submit;
            submitBtn.disabled = false;
        });
});