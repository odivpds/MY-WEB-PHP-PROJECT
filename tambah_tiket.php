<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script>
    // Function untuk validasi form
    function validateForm() {
        // Mendapatkan nilai input dengan id "kode_tiket" dari form dengan nama "tambah_tiket.php"
        let a = document.forms["tambah_tiket.php"]["kode_tiket"].value; 

        // Mendapatkan nilai input dengan id "nama_tiket" dari form dengan nama "tambah_tiket.php"
        let b = document.forms["tambah_tiket.php"]["nama_tiket"].value;

        // Mendapatkan nilai input dengan id "harga_tiket" dari form dengan nama "tambah_tiket.php"
        let c = document.forms["tambah_tiket.php"]["harga_tiket"].value; 
        
        if (a === "" || b === "" || c === "") { // Memeriksa apakah salah satu nilai input kosong
            alert("All Data must be filled out"); // Menampilkan pesan peringatan jika ada nilai input yang kosong
            return false; // Mengembalikan nilai false untuk mencegah pengiriman form
        }
        return true; // Mengembalikan nilai true jika semua nilai input terisi
    }
</script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tiket</title>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body><br><br>
    <h2>Tambah Tiket</h2>
    
    <?php
    // Mengecek apakah permintaan yang dikirimkan ke halaman ini menggunakan metode POST. Jika iya, maka kode di dalam blok ini akan dieksekusi.
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        // Mengambil nilai yang dikirim melalui metode POST untuk kode_tiket, nama_tiket, dan harga_tiket, dan menyimpannya ke dalam variabel masing-masing.
        $kode_tiket = $_POST["kode_tiket"];
        $nama_tiket = $_POST["nama_tiket"];
        $harga_tiket = $_POST["harga_tiket"];
    }
    ?>
    <!--Membuat elemen form yang mengarahkan ke halaman "tambah_tiket-ac.php" dan menggunakan metode POST untuk mengirimkan data. -->
    <form name="tambah_tiket.php" action="tambah_tiket-ac.php" onsubmit="return validateForm()" method="POST">
    <label for="kode_tiket">Code :</label>
    <!-- Membuat input teks untuk kode_tiket dengan nilai awal yang diambil dari $row['kode_tiket'] jika ada, atau kosong jika tidak ada. -->
        <input type="text" id="kode_tiket" name="kode_tiket" value="<?php echo isset($row['kode_tiket']) ? $row['kode_tiket'] : ''; ?>"><br><br>

        <label for="Nama">Nama Tiket :</label>
    <!-- Membuat input teks untuk nama_tiket dengan nilai awal yang diambil dari $row['nama_tiket'] jika ada, atau kosong jika tidak ada. -->
        <input type="text" id="nama_tiket" name="nama_tiket" value="<?php echo isset($row['nama_tiket']) ? $row['nama_tiket'] : ''; ?>"><br><br>

        <label for="Nama">Harga Tiket:</label>
    <!-- Membuat input teks untuk harga_tiket dengan nilai awal yang diambil dari $row['harga_tiket'] jika ada, atau kosong jika tidak ada. -->
        <input type="text" id="harga_tiket" name="harga_tiket" value="<?php echo isset($row['harga_tiket']) ? $row['harga_tiket'] : ''; ?>"><br><br>
        
    <!-- Membuat tautan (link) "edit_tiket.php" dengan tombol submit di dalamnya. Ketika tombol submit ditekan, data yang diisi dalam form akan dikirim ke "edit_tiket.php". -->
        <a href="edit_tiket.php"><input type="submit" value="Submit"></a>
    </form>
</body>
</html>
