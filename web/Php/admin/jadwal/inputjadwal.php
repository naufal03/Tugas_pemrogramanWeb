<?php
include '../../koneksi.php'; // Mengimpor file koneksi

// Ambil data dosen untuk dropdown
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
        $query_insert = "INSERT INTO jadwall (id_dosen, hari, waktu, ruang, jenis) 
                         VALUES ('$id_dosen', '$hari', '$waktu', '$ruang', '$jenis')";
        $insert_result = mysqli_query($koneksi, $query_insert);

        if ($insert_result) {
            echo "<script>
                    alert('Data berhasil ditambahkan');
                    window.location.href = 'jadwal.php';
                  </script>";
        } else {
            echo "<script>alert('Gagal menambahkan data: " . mysqli_error($koneksi) . "');</script>";
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
    <title>Tambah Jadwal</title>
    <link rel="icon" type="image/webp" href="../../../assets/image/logo gundar.png">
    <link rel="stylesheet" href="../../../Css/sidebar.css">
    <link rel="stylesheet" href="../../../Css/admin/doseninput.css">
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
                <h1 class="tambahheading">Tambah Data Jadwal</h1>
                <form action="" method="post">
                    <!-- Dropdown untuk dosen -->
                    <label for="id_dosen">Dosen</label>
                    <select id="id_dosen" name="id_dosen" required>
                        <option value="">Pilih Dosen</option>
                        <?php while ($row = mysqli_fetch_assoc($result_dosen)) { ?>
                            <option value="<?php echo $row['id_dosen']; ?>">
                                <?php echo $row['nama'] . " - " . $row['matakuliah']; ?>
                            </option>
                        <?php } ?>
                    </select>

                    <!-- Dropdown hari -->
                    <label for="hari">Hari</label>
                    <select id="hari" name="hari" required>
                        <option value="">Pilih Hari</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                    </select>

                    <!-- Input waktu -->
                    <label for="waktu">Waktu</label>
                    <input type="text" id="waktu" name="waktu" placeholder="07.30 - 09.30" required >

                    <!-- Input ruang -->
                    <label for="ruang">Ruang</label>
                    <input type="text" id="ruang" name="ruang" placeholder="" required>

                    <!-- Dropdown jenis -->
                    <label for="jenis">Jenis</label>
                    <select id="jenis" name="jenis" required>
                        <option value="">Pilih Jenis</option>
                        <option value="Reguler">Reguler</option>
                        <option value="LabTI">LabTI</option>
                        <option value="Lepkom">Lepkom</option>
                    </select>

                    <!-- Tombol submit -->
                    <button type="submit">Tambah Jadwal</button>
                </form>
            </div>
        </main>
    </div>
</body>

</html>
