<?php
// Koneksi ke database
include '../../koneksi.php'; // Sesuaikan dengan file koneksi database Anda

// Mengecek apakah parameter ID tersedia
if (isset($_GET['id'])) {
    $id_dosen = $_GET['id'];

    // Query untuk menghapus data dosen berdasarkan id
    $query = "DELETE FROM dosen WHERE id_dosen = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id_dosen);

    // Eksekusi query
    if ($stmt->execute()) {
        echo "<script>
            alert('Data berhasil dihapus.');
            window.location.href = '../dosen/dosen.php'; // Redirect ke halaman daftar dosen
        </script>";
    } else {
        echo "<script>
            alert('Data gagal dihapus.');
            window.location.href = '../dosen/dosen.php'; // Redirect ke halaman daftar dosen
        </script>";
    }

    // Menutup statement dan koneksi
    $stmt->close();
    $koneksi->close();
} else {
    echo "<script>
        alert('ID dosen tidak ditemukan.');
        window.location.href = '../dosen/dosen.php'; // Redirect ke halaman daftar dosen
    </script>";
}
?>
