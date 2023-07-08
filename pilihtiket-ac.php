<?php
session_start(); // Memulai sesi PHP
include "connect.php"; // Mengimpor file koneksi database

if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    $kode_pemesanan = isset($_POST["Kode_Pemesanan"]) ? $_POST["Kode_Pemesanan"] : ""; // Mendapatkan nilai Email dari form atau mengosongkan variabel jika tidak ada
    $nama = isset($_POST["Nama"]) ? $_POST["Nama"] : ""; // Mendapatkan nilai Nama dari form atau mengosongkan variabel jika tidak ada
    $alamat = isset($_POST["Alamat"]) ? $_POST["Alamat"] : ""; // Mendapatkan nilai Alamat dari form atau mengosongkan variabel jika tidak ada
    $jenis_tiket = isset($_POST["Jenis_tiket"]) ? $_POST["Jenis_tiket"] : ""; // Mendapatkan nilai Jenis_tiket dari form atau mengosongkan variabel jika tidak ada
    $jumlah = isset($_POST["Jumlah"]) ? $_POST["Jumlah"] : ""; // Mendapatkan nilai Jumlah dari form atau mengosongkan variabel jika tidak ada
    $akomodasi = isset($_POST["Akomodasi"]) ? $_POST["Akomodasi"] : ""; // Mendapatkan nilai Akomodasi dari form atau mengosongkan variabel jika tidak ada

    $query_sql = "INSERT INTO tbtiket (Kode_Pemesanan, Nama, Alamat, Jenis_tiket, Jumlah, Akomodasi) VALUES ('$kode_pemesanan', '$nama', '$alamat', '$jenis_tiket', '$jumlah', '$akomodasi')"; // Membuat query SQL untuk memasukkan data ke dalam tabel tbtiket
    $result = mysqli_query($conn, $query_sql); // Menjalankan query SQL dengan menggunakan objek koneksi database $conn dan menyimpan hasilnya ke dalam variabel $result.

    // Memeriksa apakah query SQL berhasil dijalankan. Jika berhasil, maka akan berpindah ke halaman bukti_tiket.php. Jika tidak berhasil, maka menampilkan pesan "error"
    if ($result) { 
        header("Location: bukti_tiket.php"); // Berpindah ke halaman bukti_tiket.php
        exit(); // Menghentikan eksekusi script

    } else {
        echo "Error: " . mysqli_error($conn); // Menampilkan pesan error jika query SQL tidak berhasil
    }
} else {
    echo "Invalid request."; // Menampilkan pesan jika permintaan tidak valid
}

mysqli_close($conn); // Menutup koneksi ke database
?>

