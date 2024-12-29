<?php
include '../koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>3IA18</title>
  <link rel="icon" type="image/webp" href="../../assets/image/gundar.png" />
  <link rel="stylesheet" href="../../Css/user/home.css" />
  <link rel="stylesheet" href="../../Css/navbar.css">
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet" />
</head>

<body>
  <!-- ini buat header-->
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
  <div id="container-deskripsi">
    <!-- ini buat teks-teks di "Frame 3" di landing page user. -->
    <div class="frame3-landing-page-user">
      <!-- ini tulisan welcome-->
      <h1>Welcome</h1>
      <br />
      <h1>3IA18,</h1>
      <hr />
      <p name="description-text">
        <!-- ini dan bawahnya buat paragraf deskripsi-->
        Aplikasi ini dapat menyediakan fitur untuk
        <em>
          mengakses jadwal kuliah, jadwal praktikum, materi kuliah, dan tugas
          dalam satu platform yang terpusat.</em>
      </p>
      <p name="description-text">
        Dengan demikian, mahasiswa dapat dengan mudah mengakses informasi yang
        mereka butuhkan kapan saja dan di mana saja, serta dapat mengurangi
        risiko tertinggal informasi penting yang berdampak pada akademik
      </p>
      <div id="more-info"><a href="">More information >></a></div>
    </div>

    <!-- ini buat foto kelas -->
    <img class="foto-kelas" src="../..//assets/image/foto kelas 3ia18.jpg" alt="foto kelas 3ia18" />
  </div>
  <!--ini buat 3 link/card/tombol/apalah namanya di bawah-->
  <div id="link-container">
    <div class="link-card">
      <a href="https://v-class.gunadarma.ac.id/" target="_blank">Vclass Gunadarma</a>
    </div>
    <div class="link-card">
      <a href="https://studentsite.gunadarma.ac.id/" target="_blank">Studentsite Gunadarma</a>
    </div>
    <div class="link-card">
      <a href="http://baak.gunadarma.ac.id/" target="_blank">BAAK Gunadarma</a>
    </div>
  </div>

  <!-- teks legal -->
  <p id="copyrights">
    © 2024 Copyright by 3IA18 Kelompok Pemrograman Website. All rights
    reserved.
  </p>
</body>

</html>