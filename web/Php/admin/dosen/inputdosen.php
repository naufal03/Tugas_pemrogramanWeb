<?php
include '../../koneksi.php'; // Pastikan koneksi ke database benar

// Inisialisasi variabel
$nama   = "";
$matkul = "";
$telp   = "";
$sukses = "";
$eror   = "";

if (isset($_POST['tambah'])) {
    $nama   = $_POST['nama'];
    $matkul = $_POST['matkul'];
    $telp   = $_POST['telp'];

    // Validasi input
    if ($nama && $matkul && $telp) {
        // Periksa apakah kolom sesuai dengan struktur database
        $sql1 = "INSERT INTO dosen (nama, matakuliah, no_telp) VALUES ('$nama', '$matkul', '$telp')"; // Pastikan nama kolom benar
        $q1   = mysqli_query($koneksi, $sql1);

        // Cek apakah query berhasil
        if ($q1) {
            // Redirect ke halaman tujuan setelah berhasil menambahkan data
            header("Location: dosen.php"); // Ganti 'daftardosen.php' dengan halaman tujuan
            exit(); // Pastikan script berhenti setelah redirect
        } else {
            $eror = "Gagal menambahkan data: " . mysqli_error($koneksi);
        }
    } else {
        $eror = "Harap isi semua data.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Data Dosen</title>
     <title>Edit Data Dosen</title>
      <link rel="icon" type="image/webp" href="../../../assets/image/gundar.png" />
      <link rel="stylesheet" href="../../../Css/admin/doseninput.css">
    <link rel="stylesheet" href="../../../Css/admin/dosen.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="side">
        <aside class="sidebar">
            <h1 class="side-head">DASHBOARD</h1>
            <div class="side-items">
                <a href="dosen.php" class="side-link">Dosen</a>
                <a href="../jadwal/jadwal.php" class="side-link">Jadwal</a>
            </div>
        </aside>
        <main class="jarakmain">
            <div>
                <h1 class="tambahheading">Tambah Data Dosen</h1>
                <!-- Menampilkan pesan sukses atau error -->
                <?php if ($sukses) { ?>
                    <div class="alert-success"><?php echo $sukses; ?></div>
                <?php } ?>
                <?php if ($eror) { ?>
                    <div class="alert-error"><?php echo $eror; ?></div>
                <?php } ?>

                <!-- Form input data -->
                <form action="#" method="post">
                    <label for="nama">Nama Dosen</label>
                    <input type="text" id="nama" name="nama" placeholder="Nama Dosen" value="<?php echo $nama; ?>" required>

                    <label for="matkul">Mata Kuliah</label>
                    <input type="text" id="matkul" name="matkul" placeholder="Mata Kuliah" value="<?php echo $matkul; ?>" required>

                    <label for="telp">No Telp</label>
                    <input type="tel" id="telp" name="telp" placeholder="No Telp" value="<?php echo $telp; ?>" required>

                    <button type="submit" name="tambah">Tambah Data</button>
                </form>
            </div>
        </main>
    </div>
</body>

</html>
