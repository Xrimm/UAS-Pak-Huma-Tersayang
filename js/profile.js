/* =========================
   PROFILE PAGE SCRIPT
   Casholle
========================= */

// ---------- ELEMENT ----------
const preview = document.getElementById('preview');
const headerAvatar = document.getElementById('headerAvatar');
const usernameInput = document.getElementById('username');
const provinsiSelect = document.getElementById('provinsi');
const headerUsername = document.getElementById('headerUsername');
const saveBtn = document.getElementById('saveBtn');
const photoInput = document.getElementById('photo');

const tabs = document.querySelectorAll('.tab');
const contents = document.querySelectorAll('.content');

// ---------- PREVIEW FOTO ----------
if (photoInput) {
    photoInput.addEventListener('change', e => {
        const file = e.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = () => {
            preview.src = reader.result;
            headerAvatar.src = reader.result;
        };
        reader.readAsDataURL(file);
    });
}

// ---------- SIMPAN PROFILE (UPDATE SQL) ----------
if (saveBtn) {
    saveBtn.addEventListener('click', () => {
        const username = usernameInput.value.trim();
        const provinsi = provinsiSelect.value;

        if (!username) {
            alert('Username tidak boleh kosong');
            return;
        }

        if (!provinsi) {
            alert('Provinsi wajib dipilih');
            return;
        }

        const formData = new FormData();
        formData.append('username', username);
        formData.append('provinsi', provinsi);

        if (photoInput.files[0]) {
            formData.append('photo', photoInput.files[0]);
        }

        fetch('profile_update.php', {
            method: 'POST',
            body: formData
        })
        .then(res => res.text())
        .then(res => {
            if (res === 'success') {
                alert('Profil berhasil diperbarui');
                location.reload();
            } else {
                alert(res);
            }
        })
        .catch(() => alert('Terjadi kesalahan server'));
    });
}

//hapus akun
const deleteAccountBtn = document.getElementById('deleteAccountBtn');

if (deleteAccountBtn) {
    deleteAccountBtn.addEventListener('click', () => {
        const confirmDelete = confirm(
            "AKUN AKAN DIHAPUS PERMANEN!\nData tidak bisa dikembalikan.\n\nLanjutkan?"
        );

        if (!confirmDelete) return;

        fetch('profile_delete.php', {
            method: 'POST'
        })
        .then(res => res.text())
        .then(res => {
            if (res === 'success') {
                alert('Akun berhasil dihapus');
                window.location.href = 'index.php';
            } else {
                alert(res);
            }
        });
    });
}

// ---------- TAB SYSTEM ----------
tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        tabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');

        contents.forEach(c => c.style.display = 'none');

        const target = document.getElementById(tab.dataset.tab);
        if (target) target.style.display = 'flex';
    });
});