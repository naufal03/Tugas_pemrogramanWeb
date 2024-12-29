<?php
include '../koneksi.php';  // Include the database connection

// Query to fetch data from dosen table
$query = "SELECT * FROM dosen";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dosen</title>
  <link rel="stylesheet" href="../../Css/user/dosen.css" />
  <link rel="stylesheet" href="../../Css/navbar.css">
  <link rel="icon" type="image/webp" href="../../assets/image/gundar.png" />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet" />
</head>

<body>
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
  <main class="relative">
    <section>
      <h1 class="header-title">Profile Dosen</h1>
    </section>
    <section class="profile-section">
      <div class="profile-container">
        <?php
        // Loop through each dosen and display their info
        while ($row = mysqli_fetch_assoc($result)) {
            $nama = $row['nama'];
            $matakuliah = $row['matakuliah'];
            $kontak = $row['no_telp'];
        ?>
        <div class="profile-card">
          <h1 class="profile-name"><?php echo $nama; ?></h1>
          <div class="profile-info">
            <table>
              <tbody>
                <tr>
                  <td class="info-label1">Mata Kuliah</td>
                  <td class="info-label2">:</td>
                  <td class="info-label2"><?php echo $matakuliah; ?></td>
                </tr>
                <tr>
                  <td class="info-label1">Kontak</td>
                  <td class="info-label2">:</td>
                  <td class="info-label2"><?php echo $kontak; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <?php
        }
        ?>
      </div>
    </section>
    <p id="copyrights">
      © 2024 Copyright by 3IA18 Kelompok Pemrograman Website. All rights
      reserved.
    </p>
    <section>
      <img src="/assets/svg/pink.png" alt="" class="image-pink" />
      <img src="/assets/svg/kuning.png" alt="" class="image-kuning" />
      <img src="/assets/svg/ungu.png" alt="" class="image-ungu" />
      <img src="/assets/svg/ungu-1.png" alt="" class="image-ungu-1" />
    </section>
  </main>
</body>

</html>
