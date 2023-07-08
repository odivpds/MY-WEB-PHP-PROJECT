<?php
include "connect.php";
// Mengambil data tiket berdasarkan alamat email yang diterima melalui parameter GET
$sql = "SELECT * FROM `tbtiket` WHERE Kode_Pemesanan = '" . $_GET['Kode_Pemesanan'] . "'"; // Membentuk sebuah query SQL untuk mengambil data tiket dari tabel tbtiket berdasarkan alamat email yang diterima melalui parameter GET ($_GET['Email']). Parameter GET adalah cara untuk mengirim data melalui URL.

$result = mysqli_query($conn, $sql); // Menjalankan query SQL menggunakan fungsi mysqli_query() untuk mengambil hasil query dari database. Variabel $result akan berisi hasil dari query.

$data = mysqli_fetch_assoc($result); // Mengambil baris pertama dari hasil query dan menyimpannya dalam variabel $data sebagai array asosiatif. Setiap kolom dalam tabel tbtiket akan menjadi kunci (key) dalam array, sehingga dapat mengakses nilai-nilai kolom dengan menggunakan kunci tersebut.
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Form Edit Order</title>
    <style>
        body {
            font-family: 'Prettywise', sans-serif;
            background-image: url('https://images.unsplash.com/photo-1461696114087-397271a7aedc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80');
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            padding: 20px;
        }

        h3 {
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
            opacity: 0.9;
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

        th,
        td {
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

<body>
    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Update Pemesanan Tiket Konser</h3>
                        <form class="requires-validation" action="update-ac.php" method="post">
                            <div>
                                <!-- Input field untuk Kode Pemesanan-->
                                <label>Kode Pemesanan:</label >
                                <input value="<?php echo $data['Kode_Pemesanan'] ?>" type="text" name="Kode_Pemesanan" placeholder="Kode_Pemesanan" required readonly>
                            </div>
                            <br>
                            <div>
                                <!-- Input field untuk Nama -->
                                <label>Nama:</label>
                                <input value="<?php echo $data['Nama'] ?>" type="text" name="Nama" placeholder="Masukan Nama" required>
                            </div>
                            <br>
                            <div>
                                <!-- Input field untuk Alamat -->
                                <label>Alamat:</label>
                                <input value="<?php echo $data['Alamat'] ?>" type="text" name="Alamat" placeholder="Masukan Alamat" required>
                            </div>
                            <br>
                            <div>
                                <!-- Input field untuk Jenis Tiket (Kode Tiket) -->
                                <label>Kode Tiket:</label>
                                <input value="<?php echo $data['Jenis_tiket'] ?>" type="text" name="Jenis_tiket" placeholder="Jenis Tiket" required readonly>
                            </div>
                            <br>
                            <div>
                                <!-- Input field untuk Jumlah -->
                                <label>Jumlah:</label>
                                <input value="<?php echo $data['Jumlah'] ?>" type="text" name="Jumlah" placeholder="Masukan Jumlah" required>
                            </div>
                            <br>
                            <div>
                                <label for="Akomodasi">Akomodasi:</label>
                                <!-- Radio button untuk memilih Akomodasi -->
                                <input type="radio" id="akomodasi" name="Akomodasi" value="Hotel" <?php if ($data['Akomodasi'] == "Hotel") echo "checked"; ?>> Hotel ...
                                <input type="radio" id="akomodasi" name="Akomodasi" value="Pesawat Datang" <?php if ($data['Akomodasi'] == "Pesawat Datang") echo "checked"; ?>> Pesawat Datang ...
                                <input type="radio" id="akomodasi" name="Akomodasi" value="Penjemputan" <?php if ($data['Akomodasi'] == "Penjemputan") echo "checked"; ?>> Penjemputan ...
                                <input type="radio" id="akomodasi" name="Akomodasi" value="Pesawat Pulang" <?php if ($data['Akomodasi'] == "Pesawat Pulang") echo "checked"; ?>> Pesawat Pulang ...<br>
                            </div>
                            <br>
                            <div>
                                <label>Pilih Tiket:</label>
                                <!-- Dropdown untuk memilih Tiket -->
                                <select name="Jenis_tiket" required>
                                    <option selected disabled value="">Pilih Tiket</option>
                                    <?php
                                    $sql = "SELECT * FROM edit_tiket";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) { 
                                        while ($row = mysqli_fetch_assoc($result)) { //Memulai perulangan yang mengeksekusi kode di dalamnya jika terdapat hasil dari query yang mengambil data tiket.
                                    ?>
                                        <!-- Opsi dalam dropdown untuk setiap tiket -->
                                        <option value="<?php echo $row['kode_tiket'] ?>"><?php echo $row['nama_tiket'] ?> : <?php echo $row['harga_tiket'] ?></option>
                                        <!-- Mengambil nilai 'kode_tiket' sebagai nilai opsi dan menampilkan 'nama_tiket' dan 'harga_tiket' sebagai teks opsi -->
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>

                            </div>
                            <br>
                            <div class="form-button mt-3">
                                <!-- Tombol Submit -->
                                <button id="submit" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


</html>
