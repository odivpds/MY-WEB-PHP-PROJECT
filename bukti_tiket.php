<?php
include "connect.php";


// menghapus data dari database
function deleteData($kode_pemesanan) {
    global $conn;
    $sql = "DELETE FROM tbtiket WHERE Kode_Pemesanan = '$kode_pemesanan'";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

// Mengecek apakah parameter email terdefinisi pada URL
if (isset($_GET['Kode_Pemesanan'])) {
    $kodepesananToDelete = $_GET['Kode_Pemesanan'];
    // Memanggil fungsi deleteData untuk menghapus data dengan nim yang dihapus
    if (deleteData($kodepesananToDelete)) {
        echo "<script>alert('Data berhasil dihapus.');
              window.location.href = 'bukti_tiket.php';</script>"; 
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
    <title>Daftar Bukti Pembelian Tiket</title>
    <style>
        /* CSS styling */
        body {
            background-image: url('https://i.pinimg.com/originals/83/32/05/8332053bac555fd8d4ef43331eef215d.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            color: black;
            text-align:center;
            font-family: Arial, sans-serif; /* Mengganti font dengan Arial atau font yang tersedia */
            margin: 0;
            padding: 20px;
        }
        .actions{
            text-decoration:none;
            color:black;
            cursor:pointer;
        }
        .actions:hover{
            color:red;
            transition: .3s;
        }

        h1 {
            color: #ffff;
            text-shadow: 2px 2px black ;
            text-align: center;
            margin-top: 0;
            padding-top: 75px;
        }

        table {
            width: 100%;
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
            background-color: darkblue;
            color: #fff;
        }

        table tr:hover {
            background-color: #ddd;
        }
    </style>
    
    <script>
        function deleteData(kode_pemesanan) {
            if (confirm('Apakah Anda yakin ingin menghapus data?')) {
                window.location.href = 'bukti_tiket.php?Kode_Pemesanan=' + kode_pemesanan;
            }
        }
    </script>
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
                <a class="nav-link " aria-current="page" href="form_tiket.php">Home</a>
            </li>
            <li class="nav-item me-5">
                <a class="nav-link active" href="pilihtiket.php">Tambah Pemesanan</a>
            </li>
            <li class="nav-item me-5">
              <a class="nav-link actions" href="logout.php">Log Out</a>
            </li>
            </ul>
        </div>
        </div>
    </nav>
      <!--end navbar-->
    <h1>Daftar Pembelian Tiket</h1>

    <?php
    $query = "SELECT * FROM tbtiket";
    $result = mysqli_query($conn, $query);

    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    if ($result && mysqli_num_rows($result) > 0) {
        echo '<table>';
        echo '<tr>';
        echo '<th>Kode Pemesanan</th>';
        echo '<th>Nama</th>';
        echo '<th>Alamat</th>';
        echo '<th>Jenis Tiket</th>';
        echo '<th>Harga Tiket</th>';
        echo '<th>Jumlah</th>';
        echo '<th>Akomodasi</th>';
        echo '<th>Total Harga Tiket</th>';
        echo '<th>Aksi</th>';
        echo '</tr>';}
        
    ?>

<?php
$sql = "SELECT t.*, edit_tiket.nama_tiket AS nama_tiket, edit_tiket.harga_tiket AS harga_tiket
FROM `tbtiket` t
INNER JOIN edit_tiket ON t.Jenis_tiket = edit_tiket.kode_tiket";
$result = mysqli_query($conn, $sql);
$total_tiket = 0;

// Memeriksa apakah hasil query mengembalikan baris data
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Menghitung total harga tiket
        $total = floatval($row['harga_tiket']) * intval($row['Jumlah']);
        $total_tiket += $total;
        ?>
        <tr>
            <td><?php echo $row['Kode_Pemesanan']?></td> <!-- Menampilkan nilai Email -->
            <td><?php echo $row['Nama']?></td> <!-- Menampilkan nilai Nama -->
            <td><?php echo $row['Alamat']; ?></td> <!-- Menampilkan nilai Alamat -->
            <td><?php echo $row['nama_tiket']?></td> <!-- Menampilkan nilai Nama Tiket -->
            <td>Rp. <?php echo $row['harga_tiket']?></td> <!-- Menampilkan nilai Harga Tiket -->
            <td><?php echo $row['Jumlah']?></td> <!-- Menampilkan nilai Jumlah -->
            <td><?php echo $row['Akomodasi']?></td> <!-- Menampilkan nilai Akomodasi -->
            <td>Rp. <?php echo $total ?></td> <!-- Menampilkan nilai Total Harga Tiket -->
            <td>
                <a class="actions" onclick="deleteData('<?php echo $row['Kode_Pemesanan']; ?>')">Hapus</a>  /// 
                <a class="actions" href="update.php?Kode_Pemesanan=<?php echo $row['Kode_Pemesanan']?>">Update</a>
            </td>
        </tr>
        
        <?php
    }
}
?>
<?php

?>

    <script>
        function deleteData(kode_pemesanan) {
            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                window.location.href = "bukti_tiket.php?Kode_Pemesanan=" + kode_pemesanan;
            }
        }
    </script>
    
</body>
</html>
