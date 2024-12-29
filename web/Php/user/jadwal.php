<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jadwal</title>
  <link rel="stylesheet" href="../../Css/user/jadwal.css" />
  <link rel="stylesheet" href="../../Css/navbar.css">
  <link rel="icon" type="image/webp" href="/assets/image/logo gundar.png" />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet" />
</head>

<body>
  <?php
  include '../koneksi.php'; // Mengimpor koneksi ke database

  // Query untuk mengambil data jadwal
  $query = "SELECT jadwall.hari, jadwall.waktu, jadwall.ruang, dosen.nama AS dosen, dosen.matakuliah AS matakuliah, jadwall.jenis 
            FROM jadwall 
            INNER JOIN dosen ON jadwall.id_dosen = dosen.id_dosen 
            ORDER BY FIELD(jadwall.hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'), jadwall.waktu ASC";
  $result = mysqli_query($koneksi, $query);

  if (!$result) {
      die("Query gagal: " . mysqli_error($koneksi));
  }

  $current_day = "";
  ?>

  <!-- navbar-->
  <div class="header" id="header">
    <img src="../../assets/image/gundar.png" alt="logo gunadarma" id="logo-gunadarma-header" />
    <div class="menu-header">
      <a class="menu-header" id="menu-header-beranda" href="home.php">Home</a>
      <a class="menu-header" href="mahasiswa.php">Mahasiswa</a>
      <a class="menu-header" href="dosen.php">Dosen</a>
      <a class="menu-header" id="menu-header-jadwal" href="jadwal.php">Jadwal</a>
      <a class="menu-header" id="menu-header-materi" href="materi.php">Materi</a>
      <a class="menu-header" id="tombol-login-header" href="../login.php">Login as Admin</a>
    </div>
  </div>

  <!-- banner -->
  <div class="banner">
    <h1 class="teks-banner">CHECK WHAT'S NEXT</h1>
    <h4 class="teks-banner">To help you see the schedule more easily</h4>
    <div class="jadwal-banner-container">
      <div class="jadwal-banner">Jadwal Kuliah</div>
      <div class="jadwal-banner">Jadwal LabTI</div>
      <div class="jadwal-banner">Jadwal LEPKOM</div>
    </div>
  </div>

  <!-- tabel jadwal -->
  <div class="table-container">
    <table>
      <tr>
        <th>Hari</th>
        <th>Mata Kuliah</th>
        <th>Waktu</th>
        <th>Ruang</th>
        <th>Dosen</th>
        <th>Jenis</th>
      </tr>
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <?php if ($current_day != $row['hari']) { ?>
         
          <?php $current_day = $row['hari']; ?>
        <?php } ?>
        <tr class="ganjil">
          <td><?php echo $row['hari']; ?></td>
          <td class="matkul"><?php echo $row['matakuliah']; ?></td>
          <td><?php echo $row['waktu']; ?></td>
          <td><?php echo $row['ruang']; ?></td>
          <td class="dosen"><?php echo $row['dosen']; ?></td>
          <td><?php echo $row['jenis']; ?></td>
        </tr>
      <?php } ?>
    </table>
  </div>

  <!-- nb -->
  <div id="notabene-container">
    <img class="notabene" id="icon-notabene" src="../../assets/svg/wirte 1.svg" alt="icon" />
    <p class="notabene" id="text-notabene">
      Mata kuliah yang diberikan satu bintang(*) dimasukkan dalam Ujian Utama,
      sedangkan mata kuliah dua bintang(**) melakukan praktikum
    </p>
  </div>

  <!-- cc -->
  <p id="copyrights">
    © 2024 Copyright by 3IA18 Kelompok Pemrograman Website. All rights
    reserved.
  </p>
</body>

</html>
