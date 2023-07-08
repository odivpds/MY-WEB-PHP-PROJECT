<?php 
include "connect.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Mengecek apakah pilihan dropdown adalah "admin"
  if ($_POST['hak'] === 'admin') {
      $_SESSION['hak'] = 'admin';
      header("Location: edit_tiket.php");
      exit;
  }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page Coldplay Ticket Order</title>
    <?php
    // Mengecek apakah terdapat status dalam session
    if(isset($_SESSION['status'])){
        // Jika status adalah 'error', menampilkan pesan gagal login
        if($_SESSION['status']=='error'){
            echo "gagal login, email atau password salah";      
        } 
        // Jika status adalah 'tidak boleh', menampilkan pesan tidak boleh masuk ke halaman ini
        elseif($_SESSION['status']=='tidak boleh'){
            echo"tidak boleh masuk ke halaman ini";
        }
        // Menghancurkan session setelah digunakan
        session_destroy();
    }
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
      span{
        color:white;
        text-decoration: None ;
        margin-left:30px;
        text-align:end;
      }
      .signup{
        text-decoration:none;
        color:blue;
      }
      
      
    </style>
</head>
<body>
<!-- content in -->
<div class="container-fluid2"></div>
  <div class="wrapper">
    <h1>LOGIN</h1><br>
    <form action="loginpage-ac.php" method="POST">
      <div class="form-floating mb-4">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" id="email" name="email">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control " id="floatingPassword" placeholder="Password" id="password" name="password">
        <label for="floatingPassword">Password</label>
      </div> <br>
      <div class=" d-flex justify-content-center">
      <select name="hak" id="hak" class="form-select w-50 bg-secondary text-light " aria-label="Default select example">
        <option selected disabled value>Login As</option>
        <option value="admin">Admin</option>
        <option value="member">Member</option>
      </select>
      </div><br>
      <div><button type="submit" class="btn btn-primary w-25">Login</button></div><br><br>
        <span>
          Need an account?
          <a class="signup" href="register.php">Sign up</a>
        </span>
      
    </form>
  </div>    
<!-- content out -->

    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
