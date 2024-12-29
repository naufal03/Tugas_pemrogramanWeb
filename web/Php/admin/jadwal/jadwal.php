<?php
include '../../koneksi.php'; // Mengimpor file koneksi

// Query untuk mengambil data jadwal dengan menggabungkan tabel dosen
$query = "SELECT jadwall.id_jadwal, jadwall.hari, jadwall.waktu, jadwall.ruang, jadwall.jenis, 
                 dosen.id_dosen, dosen.nama AS dosen, dosen.matakuliah 
          FROM jadwall
          INNER JOIN dosen ON jadwall.id_dosen = dosen.id_dosen";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}

// logout
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
    <title>Jadwal Dashboard</title>
    <link rel="icon" type="image/webp" href="../../../assets/image/logo gundar.png" />
    <link rel="stylesheet" href="../../../Css/admin/jadwal.css" />
    <link rel="stylesheet" href="../../../Css/sidebar.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
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
            <div class="headline">
                <h1 class="dosenheding">Jadwal Dashboard</h1>
               <div class="logout">
                    <h1>Selamat datang, <?php echo $_SESSION['username']; ?>!</h1>
                    <a href="../../logout.php" class="logout">Log Out</a>
                </div>
            </div>
            <a href="inputjadwal.php" class="tambahdosen">Tambah Jadwal</a>
            <div class="jarak-bawah">
                <table class="lebartabel">
                    <thead>
                        <tr class="rowtable1">
                            <th class="headtable1">No</th>
                            <th class="headtable2">Hari</th>
                            <th class="headtable3">Mata Kuliah</th>
                            <th class="headtable4">Waktu</th>
                            <th class="headtable5">Ruang</th>
                            <th class="headtable6">Dosen</th>
                            <th class="headtable7">Jenis</th>
                            <th class="headtable8">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id_jadwal = $row['id_jadwal'];
                            $hari = $row['hari'];
                            $matakuliah = $row['matakuliah'];
                            $waktu = $row['waktu'];
                            $ruang = $row['ruang'];
                            $dosen = $row['dosen'];
                            $jenis = $row['jenis'];
                            ?>

                            <tr class="rowtabel2">
                                <td class="tabledata1"><?php echo $no++; ?></td>
                                <td class="tabledata3"><?php echo $hari; ?></td>
                                <td class="tabledata4"><?php echo $matakuliah; ?></td>
                                <td class="tabledata5"><?php echo $waktu; ?></td>
                                <td class="tabledata6"><?php echo $ruang; ?></td>
                                <td class="tabledata7"><?php echo $dosen; ?></td>
                                <td class="tabledata8"><?php echo $jenis; ?></td>
                                <td class="tabledata9">
                                    <!-- Tombol Hapus -->
                                    <a href="deletejadwal.php?id=<?php echo $id_jadwal; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        <button class="background-button" type="button">
                                            <img src="../../../assets/svg/Delete.png" alt="Delete">
                                        </button>
                                    </a>
                                    <!-- Tombol Edit -->
                                    <a href="editjadwal.php?id=<?php echo $id_jadwal; ?>">
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
