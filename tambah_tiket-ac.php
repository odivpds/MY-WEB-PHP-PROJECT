<?php
session_start(); // Memulai sesi PHP untuk menggunakan mekanisme session
include "connect.php";

// Memeriksa apakah permintaan yang dikirimkan ke halaman ini menggunakan metode POST. Jika iya, maka kode di dalam blok ini akan dieksekusi.
if ($_SERVER["REQUEST_METHOD"] === "POST") { 

    // Mengambil nilai yang dikirim melalui metode POST untuk kode_tiket dan menyimpannya ke dalam variabel $kode_tiket. Jika nilai tidak ada, maka nilai defaultnya adalah string kosong.
    $kode_tiket = isset($_POST["kode_tiket"]) ? $_POST["kode_tiket"] : "";

    // Mengambil nilai yang dikirim melalui metode POST untuk nama_tiket dan menyimpannya ke dalam variabel $nama_tiket. Jika nilai tidak ada, maka nilai defaultnya adalah string kosong.
    $nama_tiket = isset($_POST["nama_tiket"]) ? $_POST["nama_tiket"] : "";

    // Mengambil nilai yang dikirim melalui metode POST untuk harga_tiket dan menyimpannya ke dalam variabel $harga_tiket. Jika nilai tidak ada, maka nilai defaultnya adalah string kosong.
    $harga_tiket = isset($_POST["harga_tiket"]) ? $_POST["harga_tiket"] : "";

    //  Membuat query SQL untuk menyisipkan data ke tabel edit_tiket dengan menggunakan nilai dari variabel $kode_tiket, $nama_tiket, dan $harga_tiket.
    $query_sql = "INSERT INTO edit_tiket (kode_tiket, nama_tiket, harga_tiket) VALUES ('$kode_tiket', '$nama_tiket', '$harga_tiket')";

    // Menjalankan query SQL menggunakan fungsi mysqli_query(). Jika query berhasil dieksekusi, maka akan dilakukan pengalihan halaman ke "edit_tiket.php" menggunakan fungsi header(). Jika terjadi kesalahan, maka akan ditampilkan pesan error.
    if (mysqli_query($conn, $query_sql)) {
        header("Location: edit_tiket.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}

mysqli_close($conn); // Menutup koneksi
?>
