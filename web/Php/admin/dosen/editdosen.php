<?php
include "../../koneksi.php"; // Menghubungkan ke database

$id = isset($_GET['id']) ? $_GET['id'] : '';

// Mengecek apakah ID dosen ada

if ($id) {
    $query = "SELECT * FROM dosen WHERE id_dosen = '$id'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);
}

// Menangani submit form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_dosen = $_POST['nama'];
    $mata_kuliah = $_POST['matakuliah'];
    $no_telp = $_POST['no_telp'];

    $update_query = "UPDATE dosen SET nama = '$nama_dosen', matakuliah = '$mata_kuliah', no_telp = '$no_telp' WHERE id_dosen = '$id'";

    if (mysqli_query($koneksi, $update_query)) {
        echo "<script>alert('Data berhasil diperbarui'); window.location.href = 'dosen.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
                <h1 class="tambahheading">Edit Data Dosen</h1>

                

                <!-- Form Edit Data -->
                <form action="" method="post">
                    <label for="nama">Nama Dosen:</label>
            <input type="text" name="nama" id="nama" value="<?php echo isset($data['nama']) ? $data['nama'] : ''; ?>" required>


                   <label for="matakuliah">Mata Kuliah:</label>
            <input type="text" name="matakuliah" id="matakuliah" value="<?php echo isset($data['matakuliah']) ? $data['matakuliah'] : ''; ?>" required>

            <label for="no_telp">No Telp:</label>
            <input type="text" name="no_telp" id="no_telp" value="<?php echo isset($data['no_telp']) ? $data['no_telp'] : ''; ?>" required>

                    <button type="submit">Update Data</button>
                </form>
            </div>
        </main>
    </div>
</body>

</html>
