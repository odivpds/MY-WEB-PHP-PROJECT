<?php
session_start();
include "connect.php";

$email = $_POST["email"]; // Mendapatkan nilai dari input dengan name "email" pada form sebelumnya dan menyimpannya dalam variabel $email
$password = $_POST["password"]; // Mendapatkan nilai dari input dengan name "password" pada form sebelumnya dan menyimpannya dalam variabel $password
$hak = $_POST["hak"]; // Mendapatkan nilai dari input dengan name "hak" pada form sebelumnya dan menyimpannya dalam variabel $hak

$query_sql = "SELECT * FROM tbl_login WHERE email = '$email' AND password = '$password' AND hak = '$hak'"; // Query SQL untuk mencari data berdasarkan email, password, dan hak akses

$result = mysqli_query($conn, $query_sql); // Menjalankan query SQL dengan menggunakan objek koneksi database $conn dan menyimpan hasilnya ke dalam variabel $result

$row = mysqli_fetch_assoc($result); // Mengambil baris hasil query dan menyimpannya dalam variabel $row

if (isset($row['hak'])) {
    // Jika data ditemukan, set session status menjadi "ok" dan simpan email dan hak akses dalam session
    $_SESSION["status"] = "ok";
    $_SESSION["email"] = $row['email'];
    $_SESSION["hak"] = $row['hak'];
    if($_SESSION['hak']=="member"){
        header("Location: form_tiket.php");  
    }else{
        header("Location: edit_tiket.php");
    } // Redirect ke halaman form_tiket.php
} else {
    // Jika data tidak ditemukan, set session status menjadi "error" dan redirect kembali ke halaman loginpage.php
    $_SESSION["status"] = 'error';
    header("Location: loginpage.php");
}
?>

