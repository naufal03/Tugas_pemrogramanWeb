<?php
// logout.php
session_start();

// Periksa apakah user sedang login
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']; // Ambil username dari session
    session_destroy(); // Hapus semua session
    echo "<script>
        alert('Anda berhasil logout, $username!');
        window.location.href = 'user/home.php';
    </script>";
} else {
    // Jika user tidak login, langsung arahkan ke halaman login
    echo "<script>
        alert('Anda belum login!');
        window.location.href = 'login.php';
    </script>";
}
?>
