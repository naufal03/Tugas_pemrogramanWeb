<?php
// login.php
session_start();
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepared Statement untuk menghindari SQL Injection
    $query = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['username'] = $username;
            echo "<script>alert('Anda berhasil login!'); window.location.href='admin/dosen/dosen.php';</script>";
        } else {
            echo "<script>alert('Username atau password salah!'); window.location.href='login.php';</script>";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Welcome 31A18</title>
  <link rel="stylesheet" href="../Css/user/login.css" />
  <link rel="icon" type="image/webp" href="../../assets/image/gundar.png" />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet" />
</head>

<body>
  <!-- Bagian Gambar -->
  <div class="image-section">
    <img src="../assets/image/login.png" alt="Privacy Image" style="width: 100%; height: 100%" />
  </div>
  <div class="container">
    <div class="sub-container">
      <!-- Bagian Form -->
      <div class="form-section">
        <h1>Welcome Back!</h1>
        <p>
          Hello, Admin! <br />Please login to this website for explore more
        </p>
      </div>
      <div class="input">
        <form method="POST" action="login.php">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" placeholder="Username" />

          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Password" />
          <button type="submit">Login</button>

        </form>
      </div>
    </div>
  </div>
</body>

</html>