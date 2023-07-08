<?php 
session_start();

// Menampilkan email dan hak akses pengguna yang disimpan dalam session
echo $_SESSION['email']." - ".$_SESSION['hak'];

// Memeriksa hak akses pengguna, jika bukan 'member' dan bukan 'admin' maka diarahkan kembali ke halaman loginpage.php
if ($_SESSION['hak'] != 'member' && $_SESSION['hak'] != 'admin') {
  $_SESSION["status"] = 'tidak boleh';
  header("Location: loginpage.php");
}

include "connect.php";
$sql = "SELECT * FROM `tbl_login` WHERE `email` = '".$_SESSION['email']."'";
$result = mysqli_query($conn, $sql); 
$data = mysqli_fetch_assoc($result);

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome! and Purchase Your Ticket!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
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
              <a class="nav-link active" href="#">Home</a>
            </li>
            <li class="nav-item me-5">
              <a class="nav-link" href="bukti_tiket.php">Daftar Pembelian Tiket</a>
            </li>
            <li class="nav-item me-5">
              <a class="nav-link" href="logout.php">Log Out</a>
            </li>
            <li class="nav-item me-5">
            <a href="#" class="nav-link"><p><?php echo $data['username']; ?></p></a>
            </li>
            </ul>
        </div>
        </div>
    </nav>
      <!--end navbar-->
    <br><br>  
    <div class="container-fluid_tiket bg-dark">
        <div id="carouselExampleControls" class="carousel carousel-dark slide text-center"  data-bs-ride="carousel">
            <div class="carousel-inner">
              <br>
                <div class="carousel-item active">
                  <img src="assets/coldplay-catalog.jpg" class="ratio ratio-16x9 d-block w-75 rounded mx-auto d-block img-thumbnail" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="assets/concert1.jpg" class="ratio ratio-16x9 d-block w-75 rounded mx-auto d-block img-thumbnail" alt="...">
                  <div class="carousel-caption d-none d-md-inline text-end">
                    <h2>Coldplay Performance at 
                        <br>Wembley Stadium England</h2>
                    <p>What a Magical Moment.</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="assets/concert2.jpg" class="ratio ratio-16x9 d-block w-75 rounded mx-auto d-block img-thumbnail" alt="...">

                  
                  <div class="carousel-caption d-none d-md-inline text-end">
                    <h2>Coldplay Performance at 
                        <br>San Siro Italia</h2>
                    <p>What a Magical Moment.</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="assets/concert3.jpg" class="ratio ratio-16x9 d-block w-75 rounded mx-auto d-block img-thumbnail" alt="...">
                  <div class="carousel-caption d-none d-md-inline text-end">
                    <h2>Coldplay Performance at 
                        <br>Sao Paulo Brazil</h2>
                    <p>What a Magical Moment.</p>
                  </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="tiket">
            <div class="card bg-dark"style="width: 23rem;">
                <div class="card-body">
                  <h4 class="card-title text-light mb-4">Queue To Waiting Room</h4>
                  <a href="pilihtiket.php" class="btn click btn-dark">Get Ticket</a>
                </div>
            </div>
        </div>
        
    </div>
      <script type="text/javascript" src="js/popper.min.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
