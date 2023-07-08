<?php
include "connect.php";

$kode_pemesanan = $_POST["Kode Pemesanan"]; // Mengambil nilai Email dari form
$nama = $_POST["Nama"]; // Mengambil nilai Nama dari form
$alamat = $_POST["Alamat"]; // Mengambil nilai Alamat dari form
$jenis_tiket = $_POST["Jenis_tiket"]; // Mengambil nilai Jenis_tiket dari form
$jumlah = $_POST["Jumlah"]; // Mengambil nilai Jumlah dari form
$akomodasi = $_POST["Akomodasi"]; // Mengambil nilai Akomodasi dari form


$sql = "UPDATE `tbtiket` SET Nama='$nama', Alamat='$alamat', Jenis_tiket='$jenis_tiket', Jumlah='$jumlah',Akomodasi='$akomodasi' WHERE Kode Pemesanan='$kode_pemesanan';"; // Query SQL untuk melakukan update data di tabel 'tbtiket'
echo $sql; // Menampilkan query SQL (hanya untuk keperluan debug)

$result = mysqli_query($conn, $sql); // Menjalankan query SQL dengan menggunakan objek koneksi database $conn dan menyimpan hasilnya ke dalam variabel $result.

if($result){
    header("Location: bukti_tiket.php");
    exit();
}else{
    echo "gagal"; // Jika update gagal, tampilkan pesan "gagal"
}
mysqli_close($conn); 
?>
