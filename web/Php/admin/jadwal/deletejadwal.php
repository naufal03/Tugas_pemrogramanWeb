<?php
include '../../koneksi.php'; // Include your database connection

// Check if the 'id' is set in the URL
if (isset($_GET['id'])) {
    $id_jadwal = $_GET['id'];

    // SQL query to delete the record from the jadwall table
    $query = "DELETE FROM jadwall WHERE id_jadwal = '$id_jadwal'";

    // Execute the query
    if (mysqli_query($koneksi, $query)) {
        // If the query is successful, redirect to the jadwal page
        header('Location: jadwal.php');
        exit();
    } else {
        // If the query fails, display an error message
        echo "Error deleting record: " . mysqli_error($koneksi);
    }
} else {
    // If no 'id' is set in the URL, redirect to jadwal page
    header('Location: jadwal.php');
    exit();
}
?>
