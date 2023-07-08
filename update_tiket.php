<?php
include "connect.php";

// Mengambil nilai kode tiket dari parameter GET dan menyimpannya dalam variabel $kode_tiket.
$kode_tiket = $_GET["kode_tiket"];

// Membentuk query SQL untuk mengambil data tiket dari tabel edit_tiket berdasarkan kode tiket yang diterima.
$sql = "SELECT * FROM edit_tiket WHERE kode_tiket ='$kode_tiket'";

// Menjalankan query SQL untuk mengambil hasil query dari database dan menyimpannya dalam variabel $result.
$result = mysqli_query($conn, $sql);

//  Mengambil baris pertama hasil query dan menyimpannya dalam variabel $row sebagai array asosiatif. Setiap kolom dalam tabel edit_tiket akan menjadi kunci (key) dalam array, sehingga nilai-nilai kolom dapat diakses menggunakan kunci tersebut.
$row = mysqli_fetch_assoc($result);

// Memeriksa apakah metode permintaan adalah POST. Jika benar, maka blok kode di dalamnya akan dieksekusi.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai nama tiket dan harga tiket yang dikirim melalui metode POST.
    $nama_tiket = $_POST["nama_tiket"];
    $harga_tiket = $_POST["harga_tiket"]; 

    // Membentuk query SQL untuk memperbarui data tiket berdasarkan kode tiket yang diterima.
    $updateSql = "UPDATE edit_tiket SET nama_tiket='$nama_tiket', harga_tiket='$harga_tiket' WHERE kode_tiket='$kode_tiket'";

    // Menjalankan query SQL update
    if (mysqli_query($conn, $updateSql)) {
        echo "Data updated successfully.";
    } else {
        echo "Error updating data: " . mysqli_error($conn);
    }
}

mysqli_close($conn); // Menutup koneksi database setelah selesai menggunakan database.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Ubah Tiket</title>
    <style>
        body {
            font-family: 'Prettywise', sans-serif;
            background-image: url('https://images.unsplash.com/photo-1461696114087-397271a7aedc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80');
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #E1AEFF;
            text-align: center;
            font-family: 'Prettywise';
            font-size: 36px;
            margin-top: 0;
            padding-top: 30px;
        }

        form {
            background-color: rgba(255, 255, 255, 0.7);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            margin-top: 30px;
            opacity: 0.9; /* Menambahkan transparansi pada tabel */
        }

        label {
            display: inline-block;
            width: 100px;
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        select {
            width: 200px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #99DBF5;
        }
        
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #007bff;
            color: #fff;
        }
        
        td {
            background-color: rgba(255, 255, 255, 0.7);
        }
    </style>
</head>
<body><br><br>
    <h2>Ubah Tiket</h2>
    
    <form action="update_tiket-ac.php" method="POST"> <!-- // Membentuk form dengan atribut action yang menunjuk ke file update_tiket-ac.php dan metode POST untuk mengirim data ke server. -->

        <label for="kode_tiket">Code :</label>
        <!-- // Membentuk input teks dengan ID "kode_tiket" dan nama "kode_tiket". Nilai input diisi dengan nilai dari variabel $row['kode_tiket'] jika tersedia, atau dikosongkan jika tidak. -->
        <input type="text" id="kode_tiket" name="kode_tiket" value="<?php echo isset($row['kode_tiket']) ? $row['kode_tiket'] : ''; ?>"><br><br>

        <label for="Nama">Nama Tiket :</label>
        <!-- // Membentuk input teks dengan ID "nama_tiket" dan nama "nama_tiket". Nilai input diisi dengan nilai dari variabel $row['nama_tiket'] jika tersedia, atau dikosongkan jika tidak. -->
        <input type="text" id="nama_tiket" name="nama_tiket" value="<?php echo isset($row['nama_tiket']) ? $row['nama_tiket'] : ''; ?>"><br><br>

        <label for="Nama">Harga Tiket:</label>
        <!-- // Membentuk input teks dengan ID "harga_tiket" dan nama "harga_tiket". Nilai input diisi dengan nilai dari variabel $row['harga_tiket'] jika tersedia, atau dikosongkan jika tidak. -->
        <input type="text" id="harga_tiket" name="harga_tiket" value="<?php echo isset($row['harga_tiket']) ? $row['harga_tiket'] : ''; ?>"><br><br>

        <!-- // Membentuk tombol submit untuk mengirimkan form ke server. -->
        <input type="submit" value="Submit">
    </form>
   
</body>
</html>
