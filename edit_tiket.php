<?php
session_start(); // Memulai sesi dan memungkinkan Anda menyimpan dan mengambil variabel sesi.

if (!isset($_SESSION['hak']) || $_SESSION['hak'] !== 'admin') {
    header("Location: loginpage.php");
    exit;
}

// Periksa apakah pengguna memiliki akses admin
echo $_SESSION['email']." - ".$_SESSION['hak']; // Menampilkan nilai dari $_SESSION['email'] dan $_SESSION['hak'].

// Memeriksa apakah pengguna tidak memiliki akses admin. Jika iya, mengatur $_SESSION["status"] menjadi "tidak boleh" dan mengarahkan pengguna ke "pilihtiket.php".
if ($_SESSION['hak'] != 'admin') { 
  $_SESSION["status"] = 'tidak boleh';
  header("Location: pilihtiket.php");
}



include "connect.php";

// Fungsi untuk menghapus data dari database
//Mendefinisikan fungsi bernama deleteData() untuk menghapus data dari database berdasarkan $kode_tiket yang diberikan.
function deleteData($kode_tiket) { 
    global $conn;
    $sql = "DELETE FROM edit_tiket WHERE kode_tiket = '$kode_tiket'";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

// Periksa apakah parameter 'kode_tiket' terdefinisi dalam URL
if (isset($_GET['kode_tiket'])) { //Memeriksa apakah parameter "kode_tiket" terdefinisi dalam URL.
    $tiketToDelete = $_GET['kode_tiket']; //Mendefinisikan nilai parameter "kode_tiket" adalah variabel $tiketToDelete.
    // Panggil fungsi deleteData untuk menghapus data dengan 'kode_tiket' yang ditentukan

    //Memanggil fungsi deleteData() untuk menghapus data dengan nilai $tiketToDelete yang ditentukan. Jika berhasil, menampilkan pesan sukses dan mengalihkan ke "edit_tiket.php". Jika gagal, menampilkan pesan kesalahan.
    if (deleteData($tiketToDelete)) {
        echo "<script>alert('Data berhasil dihapus.'); window.location.href = 'edit_tiket.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data.');</script>";
    }
}
?>


<!DOCTYPE html>
<html>
<head>  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Daftar Tiket</title>
    <style>
        /* CSS styling */
        body {
            background-image: url('https://i.pinimg.com/originals/83/32/05/8332053bac555fd8d4ef43331eef215d.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            color: black;
            text-align:center;
            font-family: Arial, sans-serif; 
            margin: 0;
            padding: 20px;
        }
        a{
            text-decoration:none;
            color:black;
        }
        a:hover{
            color:red;
            transition: .3s;
        }

        h1 {
            color: #ffff;
            text-shadow: 2px 2px black ;
            text-align: center;
            margin-top: 0;
            padding-top: 30px;
        }

        table {
            margin-left:10%;
            width: 80%;
            border-collapse: collapse;
            margin-top: 30px;
            background-color: white;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        table th, table td {
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        table th {
            border:1px solid black;
            background-color: red;
            color: #fff;
        }


        table tr:hover {
            background-color: #ddd;
        }

      
    </style>
</head>
<body>


    <!--navbar-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark main-color">
        <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <a class="navbar-brand me-auto" href="#">TicketTic</a>
            <ul class="navbar-nav">
            <li class="nav-item me-5">
                <a class="nav-link active" href="tambah_tiket.php">Tambah Tiket</a>
            </li>
            <li class="nav-item me-5">
                <a class="nav-link active" href="logout.php">Log Out</a>
            </li>
            </ul>
        </div>
        </div>
    </nav><br><br>
      <!--end navbar-->

      
    <h1>Daftar Tiket</h1>

    <?php
    $query = "SELECT * FROM edit_tiket";
    $result = mysqli_query($conn, $query);

    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    if ($result && mysqli_num_rows($result) > 0) {
        echo '<table>';
        echo '<tr>';
        echo '<th>Kode Tiket</th>';
        echo '<th>Nama Tiket</th>';
        echo '<th>Harga Tiket</th>';
        echo '<th>Aksi</th>';
        echo '</tr>';

        while ($row = mysqli_fetch_assoc($result)) {
            $kode_tiket = $row["kode_tiket"];
            $nama_tiket = $row["nama_tiket"];
            $harga_tiket = $row["harga_tiket"];

            echo '<tr>';
            echo '<td>' . $kode_tiket . '</td>';
            echo '<td>' . $nama_tiket . '</td>';
            echo '<td>' . $harga_tiket . '</td>';
            echo '<td>';
            echo '<a href="update_tiket.php?kode_tiket=' . $kode_tiket . '">Ubah</a>'; // Tautan untuk mengarahkan ke halaman edit.php dengan parameter kode_tiket
            echo ' | ';
            echo '<a href="#" onclick="deleteData(\'' . $kode_tiket . '\')">Hapus</a>'; // Memanggil fungsi konfirmasi delete menggunakan JavaScript
            echo '</td>';

            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'Tidak ada data pembelian tiket.';
    }
    ?><br><br>
    
    <script>
        function deleteData(kode_tiket) {
            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                window.location.href = "edit_tiket.php?kode_tiket=" + kode_tiket;
            }
        }
    </script>
</body>
</html>
