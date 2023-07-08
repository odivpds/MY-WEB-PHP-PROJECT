<?php 
include "connect.php";

$fullname = $_POST["fullname"]; // Mengambil nilai yang dikirim melalui metode POST untuk fullname dan menyimpannya ke dalam variabel $fullname.
$username = $_POST["username"]; // Mengambil nilai yang dikirim melalui metode POST untuk username dan menyimpannya ke dalam variabel $username.
$email = $_POST["email"]; // Mengambil nilai yang dikirim melalui metode POST untuk email dan menyimpannya ke dalam variabel $email.
$password = $_POST["password"]; // Mengambil nilai yang dikirim melalui metode POST untuk password dan menyimpannya ke dalam variabel $password.
$hak = $_POST["hak"]; // Mengambil nilai yang dikirim melalui metode POST untuk hak dan menyimpannya ke dalam variabel $hak.

//Membuat query SQL untuk menyisipkan data ke tabel tbl_login dengan menggunakan nilai dari variabel $fullname, $username, $email, $password, dan $hak.
$querry_sql = "INSERT INTO tbl_login (fullname, username, email, password, hak) VALUES('$fullname', '$username', '$email', '$password','$hak')";


// Menjalankan query SQL menggunakan fungsi mysqli_query(). Jika query berhasil dieksekusi, maka akan dilakukan pengalihan halaman ke "loginpage.php" menggunakan fungsi header(). Jika terjadi kesalahan, maka akan ditampilkan pesan error.
if(mysqli_query($conn, $querry_sql)){
    // Jika query berhasil dijalankan, redirect ke halaman loginpage.php
    header("Location: loginpage.php");
}else{
    // Jika query gagal dijalankan, tampilkan pesan error
    echo "pendaftaran Gagal : ". mysqli_query($conn);
}

?>
