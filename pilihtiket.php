<?php 
include "connect.php";
?>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
    // Function untuk validasi form
    function validateForm() {
        // Mendapatkan nilai input dengan id "Email" dari form dengan nama "pilihtiket.php"
        let a = document.forms["pilihtiket.php"]["Kode_Pemesanan"].value; 

        // Mendapatkan nilai input dengan id "Nama" dari form dengan nama "pilihtiket.php"
        let b = document.forms["pilihtiket.php"]["Nama"].value;
        
         // Mendapatkan nilai input dengan id "Alamat" dari form dengan nama "pilihtiket.php"
        let c = document.forms["pilihtiket.php"]["Alamat"].value;

         // Mendapatkan nilai input dengan id "Jenis_tiket" dari form dengan nama "pilihtiket.php"
        let d = document.forms["pilihtiket.php"]["Jenis_tiket"].value;

        // Mendapatkan nilai input dengan id "Jumlah" dari form dengan nama "pilihtiket.php"
        let e = document.forms["pilihtiket.php"]["Jumlah"].value; 

        // Mendapatkan nilai input dengan id "Akomodasi" dari form dengan nama "pilihtiket.php"
        let f = document.forms["pilihtiket.php"]["Akomodasi"].value; 
        
        if (a === "" || b === "" || c === "" || d === "" || e === "" || f === "") { // Memeriksa apakah salah satu nilai input kosong
            alert("All Data must be filled out"); // Menampilkan pesan peringatan jika ada nilai input yang kosong
            return false; // Mengembalikan nilai false untuk mencegah pengiriman form
        }
        return true; // Mengembalikan nilai true jika semua nilai input terisi
    }
</script>

    <title>Form Order Ticket</title>
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
            transition : .3s;
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
        .next{
            margin-left:85%;
            background-color:orange;
            padding: 10px 20px;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .next:hover {
            transition : .3s;
            background-color: #99DBF5;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
                <a class="nav-link" href="form_tiket.php">Home</a>
            </li>
            <li class="nav-item me-5">
                <a class="nav-link active" href="#">Tiket</a>
            </li>
            <li class="nav-item me-5">
              <a class="nav-link" href="logout.php">Log Out</a>
            </li>
            </ul>
        </div>
        </div>
    </nav>
    <br><br>
      <!--end navbar-->
    <h2>Pemesanan Tiket Konser</h2>
    
    <?php
    // Digunakan untuk menyimpan nilai dari inputan yang dikirim melalui metode POST.
    $kode_pemesanan ="";
    $nama = "";
    $alamat = "";
    $jenis_tiket = "";
    $jumlah = "";
    $akomodasi = "";

    // Memeriksa apakah request yang diterima adalah dengan metode POST. Jika iya, maka blok kode di dalamnya akan dieksekusi.
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        $kode_pemesanan["Kode_Pemesanan"];
        $nama = $_POST["Nama"]; // Mengambil nilai dari input dengan atribut name="Nama" dan menyimpannya dalam variabel $nama.
        $nama = $_POST["Nama"]; // Mengambil nilai dari input dengan atribut name="Nama" dan menyimpannya dalam variabel $nama.
        $alamat = $_POST["Alamat"]; // Mengambil nilai dari input dengan atribut name="Alamat" dan menyimpannya dalam variabel $alamat
        $jenis_tiket = $_POST["Jenis_tiket"]; // Mengambil nilai dari input dengan atribut name="Jenis_tiket" dan menyimpannya dalam variabel $jenis_tiket.
        $jumlah = $_POST["Jumlah"]; // Mengambil nilai dari input dengan atribut name="Jumlah" dan menyimpannya dalam variabel $jumlah
        $akomodasi = $_POST["Akomodasi"]; // Mengambil nilai dari input dengan atribut name="Akomodasi" dan menyimpannya dalam variabel $akomodasi.
    }
    ?>
    <!-- Membuat form dengan atribut action yang menunjukkan file pemrosesan form saat submit dan atribut method yang menunjukkan metode pengiriman data (dalam hal ini POST). -->
    <form name= pilihtiket.php action="pilihtiket-ac.php" onsubmit="return validateForm()" method="POST">
        <label for="kode_pemesanan">Kode Pemesanan:</label>
        <input type="text" id="Kode_Pemesanan" name="Kode_Pemesanan" value="<?php echo $kode_pemesanan; ?>"><br><br>

        <label for="nama">Nama:</label>
        <input type="text" id="Nama" name="Nama" value="<?php echo $nama; ?>"><br><br>

        <label for="alamat">Alamat:</label>
        <input type="text" id="Alamat" name="Alamat" value="<?php echo $alamat; ?>"><br><br>

        <label for="Jenis_tiket">Jenis Tiket:</label>
    <!-- Kode PHP di dalam <select> dan <option> digunakan untuk mengambil data dari database (tabel edit_tiket) dan menampilkannya sebagai opsi pada dropdown. Setiap opsi akan menampilkan nilai dari kolom nama_tiket dan harga_tiket, serta nilai dari kolom kode_tiket sebagai value. -->
        <select id="Jenis_tiket" name="Jenis_tiket">
        <option selected disabled value="">Pilih Jenis Tiket</option>
                <?php
                  $sql = "SELECT * FROM edit_tiket";
                  $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) { // digunakan untuk memeriksa apakah query menghasilkan setidaknya satu baris data.
                  while($row = mysqli_fetch_assoc($result)) { //digunakan untuk mengambil setiap baris data hasil query dan menyimpannya dalam variabel $row.
                    ?>
                <!-- Menampilkan setiap baris data sebagai opsi dalam dropdown. Nilai dari kolom kode_tiket digunakan sebagai value, sedangkan nilai dari kolom nama_tiket dan harga_tiket ditampilkan sebagai teks opsi. -->
                <option value="<?php echo $row['kode_tiket'] ?>"><?php echo $row['nama_tiket'] ?>  :  <?php echo $row['harga_tiket'] ?></option>
                <?php
                                        }
                                      ?>

                                      <?php
                                        }
                                      ?>
        </select><br><br>

        <label for="Jumlah">Jumlah:</label>
        <input type="text" id="Jumlah" name="Jumlah" value="<?php echo $jumlah; ?>"><br><br>

        <label for="Akomodasi">Akomodasi:</label>
        <input type="radio" id="akomodasi" name="Akomodasi" value="Hotel" <?php if ($akomodasi == "Hotel") echo "checked"; ?>>Hotel
        <input type="radio" id="akomodasi" name="Akomodasi" value="Pesawat Datang" <?php if ($akomodasi == "Pesawat Datang") echo "checked"; ?>>Pesawat Datang
        <input type="radio" id="akomodasi" name="Akomodasi" value="Penjemputan" <?php if ($akomodasi == "Penjemputan") echo "checked"; ?>>Penjemputan
        <input type="radio" id="akomodasi" name="Akomodasi" value="Pesawat Pulang" <?php if ($akomodasi == "Pesawat Pulang") echo "checked"; ?>>Pesawat Pulang<br><br>

        <a href="bukti_tiket.php"><input type="submit" value="Submit"></a>

    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </form>
</body>
</html>
