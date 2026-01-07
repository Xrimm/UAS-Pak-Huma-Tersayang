<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);

include "data/profile_data.php";
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Casholle</title>

    <link rel="stylesheet" href="css_assets/profile.css">
    <link rel="stylesheet" href="css_assets/footer.css">
  </head>
  <body>

    <div class="header">
      <div class="header-top">
        <img id="headerAvatar" class="avatar" 
            src="uploads/profile/<?= htmlspecialchars($profile['gambar_profile']); ?>" 
            alt="Avatar">

        <h3 id="headerUsername"><?= htmlspecialchars($profile['username']); ?></h3>
      </div>

      <div class="tabs">
        <?php $first=true; foreach($tabs as $key => $label): ?>
          <div class="tab <?= $first?'active':'' ?>" data-tab="<?= $key ?>">
            <?= $label ?>
          </div>
        <?php $first=false; endforeach; ?>
      </div>
    </div>

    <!-- ================= INFO ================= -->
    <div class="content active" id="info" style="display:flex;">

      <div class="profile-center">
        <label>
          <img id="preview" 
              src="uploads/profile/<?= htmlspecialchars($profile['gambar_profile']); ?>">
          <div class="camera-icon">📷</div>
        </label>
        <input type="file" id="photo" accept="image/*">
      </div>

      <h2>Informasi Akun</h2>

      <div class="form-group">
        <label>Username</label>
        <input type="text" id="username" value="<?= htmlspecialchars($profile['username']); ?>">
      </div>

      <div class="form-group">
        <label>Provinsi</label>
        <select id="provinsi">
          <option value="">Pilih Provinsi</option>
          <?php foreach($daftar_provinsi as $prov): ?>
            <option value="<?= $prov ?>" <?= ($prov==$profile['provinsi'])?'selected':'' ?>>
              <?= $prov ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <button class="save-btn" id="saveBtn">Simpan Perubahan</button>

      <button
          type="button"
          class="delete-btn"
          id="deleteAccountBtn">
          Hapus Akun
      </button>
    </div>

    <!-- ================= NOTIF ================= -->
    <div class="content" id="notif">
      <h2>Riwayat Notifikasi</h2>

      <?php if (empty($notifs)): ?>
        <div class="box">Tidak ada riwayat Notifikasi</div>
      <?php else: ?>
        <div class="notif-list">
          <?php foreach ($notifs as $n): ?>
            <div class="notif-item <?= $n['is_read'] ? 'read' : 'unread' ?>">
              <div><?= htmlspecialchars($n['message']) ?></div>
              <div class="timestamp">
                <?= date('d M Y H:i', strtotime($n['created_at'])) ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>

    <!-- ================= LOG ================= -->
    <div class="content" id="log">
      <h2>Riwayat Log Pembelian</h2>
      <button class="action-btn" id="simulasiBeli">Simulasi Beli Barang</button>
      <div class="box">
        <p id="emptyLogText">Tidak ada riwayat Log Pembelian</p>
        <ul id="logList" style="display:none;"></ul>
      </div>
    </div>

    <!-- ================= BARANG ================= -->
    <div class="content" id="barang">
      <h2>Riwayat Rak Penjual</h2>
      <button class="action-btn" id="tambahBarang">Tambah Barang Baru</button>
      <div class="box">
        <p id="emptyBarangText">Tidak ada riwayat Rak Penjual</p>
        <ul id="barangList" style="display:none;"></ul>
      </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="js/profile.js"></script>
  </body>
</html>