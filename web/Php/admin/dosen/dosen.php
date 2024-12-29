<?php
include '../../koneksi.php'; // Mengimpor file koneksi

// Query untuk mengambil data dosen dari database
$query = "SELECT * FROM dosen";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}

// loagout
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('Silakan login terlebih dahulu!'); window.location.href='../../login.php';</script>";
    exit;
}
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dosen Dashboard</title>
    <link rel="icon" type="image/webp" href="../../../assets/image/gundar.png" />
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
            <div class="headline">
                <h1 class="dosenheding">Dosen Dashboard</h1>
                <div class="logout">
                    <h1>Selamat datang, <?php echo $_SESSION['username']; ?>!</h1>
                    <a href="../../logout.php" class="logout">Log Out</a>
                </div>
            </div>
            <a href="inputdosen.php" class="tambahdosen">Tambah Dosen</a>
            <div class="jarak-bawah">
                <table class="lebartabel">
                    <thead>
                        <tr class="rowtable1">
                            <th class="headtable1">No</th>
                            <th class="headtable2">Nama Dosen</th>
                            <th class="headtable3">Mata Kuliah</th>
                            <th class="headtable4">No Telp</th>
                            <th class="headtable5">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = isset($row['id_dosen']) ? $row['id_dosen'] : '';
                            $nama_dosen = isset($row['nama']) ? $row['nama'] : '';
                            $mata_kuliah = isset($row['matakuliah']) ? $row['matakuliah'] : '';
                            $no_telp = isset($row['no_telp']) ? $row['no_telp'] : '';
                            ?>

                        <!-- * delete  -->
                            
                            <tr class="rowtabel2">
                                <td class="tabledata1"><?php echo $no++; ?></td>
                                <td class="tabledata2"><?php echo $nama_dosen; ?></td>
                                <td class="tabledata3"><?php echo $mata_kuliah; ?></td>
                                <td class="tabledata4"><?php echo $no_telp; ?></td>
                                <td class="tabledata5">
                                    <!-- Tombol Hapus -->
                                    <a href="deletedosen.php?id=<?php echo $id; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        <button class="background-button"type="button">
                                            <img src="../../../assets/svg/Delete.png" alt="Delete">
                                        </button>
                                    </a>
                                    <!-- Tombol Edit -->
                                    <a href="editdosen.php?id=<?php echo $id; ?>">
                                        <button class="background-button" type="button">
                                            <img src="../../../assets/svg/Edit.png" alt="Edit">
                                        </button>
                                    </a>
                                </td>
                            </tr>

                            
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>

</html>
