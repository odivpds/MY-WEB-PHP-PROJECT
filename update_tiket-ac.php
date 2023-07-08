<?php
include "connect.php";

//  Mengambil nilai kode tiket yang dikirim melalui metode POST dan menyimpannya ke dalam variabel $kode_tiket.
$kode_tiket = $_POST["kode_tiket"];

// Mengambil nilai nama tiket yang dikirim melalui metode POST dan menyimpannya ke dalam variabel $nama_tiket.
$nama_tiket = $_POST["nama_tiket"];

// Mengambil nilai harga tiket yang dikirim melalui metode POST dan menyimpannya ke dalam variabel $harga_tiket.
$harga_tiket = $_POST["harga_tiket"]; 

// Membentuk query SQL untuk melakukan pembaruan data pada tabel edit_tiket dengan mengubah nilai kolom nama_tiket dan harga_tiket berdasarkan kode tiket.
$sql = "UPDATE `edit_tiket` SET nama_tiket='$nama_tiket', harga_tiket='$harga_tiket' WHERE kode_tiket='$kode_tiket';";
echo $sql; // Menampilkan query SQL yang dibentuk, berguna untuk keperluan debugging.
$result = mysqli_query($conn, $sql); // Menjalankan query SQL dengan menggunakan objek koneksi database $conn dan menyimpan hasilnya ke dalam variabel $result.


 // Memeriksa apakah query SQL berhasil dijalankan. Jika berhasil, maka akan berpindah ke halaman edit_tiket.php. Jika tidak berhasil, maka menampilkan pesan "error"
if($result){
    header("Location: edit_tiket.php");
    exit();
}else{
    echo "error";
}
mysqli_close($conn); 
?>