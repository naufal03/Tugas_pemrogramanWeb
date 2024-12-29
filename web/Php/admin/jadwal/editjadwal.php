<?php
include '../../koneksi.php'; // Mengimpor file koneksi

// Mendapatkan ID jadwal dari parameter URL
$id_jadwal = isset($_GET['id']) ? $_GET['id'] : '';

if (!$id_jadwal) {
    die("ID jadwal tidak ditemukan.");
}

// Mengambil data jadwal berdasarkan ID
$query_jadwal = "SELECT * FROM jadwall WHERE id_jadwal = '$id_jadwal'";
$result_jadwal = mysqli_query($koneksi, $query_jadwal);

if (!$result_jadwal || mysqli_num_rows($result_jadwal) === 0) {
    die("Data jadwal tidak ditemukan.");
}

$data_jadwal = mysqli_fetch_assoc($result_jadwal);

// Mengambil data dosen untuk dropdown
$query_dosen = "SELECT id_dosen, nama, matakuliah FROM dosen";
$result_dosen = mysqli_query($koneksi, $query_dosen);

if (!$result_dosen) {
    die("Query gagal: " . mysqli_error($koneksi));
}

// Menangani pengiriman form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_dosen = $_POST['id_dosen'];
    $hari = $_POST['hari'];
    $waktu = $_POST['waktu'];
    $ruang = $_POST['ruang'];
    $jenis = $_POST['jenis'];

    // Validasi input
    if ($id_dosen && $hari && $waktu && $ruang && $jenis) {
        $query_update = "UPDATE jadwall SET 
                            id_dosen = '$id_dosen', 
                            hari = '$hari', 
                            waktu = '$waktu', 
                            ruang = '$ruang', 
                            jenis = '$jenis' 
                         WHERE id_jadwal = '$id_jadwal'";
        $update_result = mysqli_query($koneksi, $query_update);

        if ($update_result) {
            echo "<script>
                    alert('Data berhasil diperbarui');
                    window.location.href = 'jadwal.php';
                  </script>";
        } else {
            echo "<script>alert('Gagal memperbarui data: " . mysqli_error($koneksi) . "');</script>";
        }
    } else {
        echo "<script>alert('Harap isi semua data');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jadwal</title>
    <link rel="icon" type="image/webp" href="../../../assets/image/gundar.png">
    <link rel="stylesheet" href="../../../Css/admin/doseninput.css">
    <link rel="stylesheet" href="../../../Css/sidebar.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="side">
        <aside class="sidebar">
            <h1 class="side-head">DASHBOARD</h1>
            <div class="side-items">
                <a href="../dosen/dosen.php" class="side-link">Dosen</a>
                <a href="jadwal.php" class="side-link">Jadwal</a>
            </div>
        </aside>
        <main class="jarakmain">
            <div>
                <h1 class="tambahheading">Edit Data Jadwal</h1>
                <form action="" method="post">
                    <!-- Dropdown untuk dosen -->
                    <label for="id_dosen">Dosen</label>
                    <select id="id_dosen" name="id_dosen" required>
                        <?php while ($row = mysqli_fetch_assoc($result_dosen)) { ?>
                            <option value="<?php echo $row['id_dosen']; ?>" <?php echo ($data_jadwal['id_dosen'] == $row['id_dosen']) ? 'selected' : ''; ?>>
                                <?php echo $row['nama'] . " - " . $row['matakuliah']; ?>
                            </option>
                        <?php } ?>
                </select>

                    <!-- Input hari -->
                   <label for="hari">Hari</label>
                    <select id="hari" name="hari" required>
                        <option value="Senin" <?php echo ($data_jadwal['hari'] == 'Senin') ? 'selected' : ''; ?>>Senin</option>
                        <option value="Selasa" <?php echo ($data_jadwal['hari'] == 'Selasa') ? 'selected' : ''; ?>>Selasa</option>
                        <option value="Rabu" <?php echo ($data_jadwal['hari'] == 'Rabu') ? 'selected' : ''; ?>>Rabu</option>
                        <option value="Kamis" <?php echo ($data_jadwal['hari'] == 'Kamis') ? 'selected' : ''; ?>>Kamis</option>
                        <option value="Jumat" <?php echo ($data_jadwal['hari'] == 'Jumat') ? 'selected' : ''; ?>>Jumat</option>
                        <option value="Sabtu" <?php echo ($data_jadwal['hari'] == 'Sabtu') ? 'selected' : ''; ?>>Sabtu</option>
                        <option value="Minggu" <?php echo ($data_jadwal['hari'] == 'Minggu') ? 'selected' : ''; ?>>Minggu</option>
                    </select>

                    <!-- Input waktu -->
                    <label for="waktu">Waktu</label>
                    <input type="text" id="waktu" name="waktu" value="<?php echo $data_jadwal['waktu']; ?>" required>

                    <!-- Input ruang -->
                    <label for="ruang">Ruang</label>
                    <input type="text" id="ruang" name="ruang" value="<?php echo $data_jadwal['ruang']; ?>" required>

                    <!-- Dropdown jenis -->
                    <label for="jenis">Jenis</label>
                    <select id="jenis" name="jenis" required>
                        <option value="Reguler" <?php echo ($data_jadwal['jenis'] == 'Reguler') ? 'selected' : ''; ?>>Reguler</option>
                        <option value="LabTI" <?php echo ($data_jadwal['jenis'] == 'LabTI') ? 'selected' : ''; ?>>Praktikum</option>
                        <option value="Lepkom" <?php echo ($data_jadwal['jenis'] == 'Lepkom') ? 'selected' : ''; ?>>Lepkom</option>
                    </select>

                    <!-- Tombol submit -->
                    <button type="submit">Update Jadwal</button>
                </form>
            </div>
        </main>
    </div>
</body>

</html>
