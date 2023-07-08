<?php
include "connect.php";

// Menghapus semua data dari tabel tbtiket
$sql = "DELETE FROM tbtiket";
if (mysqli_query($conn, $sql)) {
    echo "Data pada tabel tbtiket berhasil dihapus.";
    header("Location: loginpage.php");
} else {
    echo "Gagal menghapus data pada tabel tbtiket: " . mysqli_error($conn);
}

// Melakukan logout atau tindakan lain yang sesuai
// ...
?>
