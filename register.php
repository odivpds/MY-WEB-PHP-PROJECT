<?php 
// untuk connect ke database
include "connect.php"; 
?>

<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page Coldplay Ticket Order</title>
    <script>
    // Function untuk validasi form
    function validateForm() {
        // Mendapatkan nilai input dengan id "fullname" dari form dengan nama "register.php"
        let a = document.forms["register.php"]["fullname"].value; 

        // Mendapatkan nilai input dengan id "username" dari form dengan nama "register.php"
        let b = document.forms["register.php"]["username"].value; 

        // Mendapatkan nilai input dengan id "email" dari form dengan nama "register.php"
        let c = document.forms["register.php"]["email"].value; 

        // Mendapatkan nilai input dengan id "password" dari form dengan nama "register.php"
        let d = document.forms["register.php"]["password"].value; 
        
        // Mendapatkan nilai input dengan id "hak" dari form dengan nama "register.php"
        let e = document.forms["register.php"]["hak"].value; 
        
        if (a === "" || b === "" || c === "" || d === "" || e === "") { // Memeriksa apakah salah satu nilai input kosong
            alert("All Data must be filled out"); // Menampilkan pesan peringatan jika ada nilai input yang kosong
            return false; // Mengembalikan nilai false untuk mencegah pengiriman form
        }
        return true; // Mengembalikan nilai true jika semua nilai input terisi
    }
</script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container-fluid2"></div>
  <div class="wrapper1">
    <h1>REGISTER</h1><br>
    <form name="register.php"action="register-ac.php" method="POST" onsubmit="return validateForm()">
      <div class="form-floating form-edit mb-4">
        <input type="text" class="form-control control-edit" id="floatingInput" placeholder="name@example.com" id="fullname" name="fullname">
        <label for="floatingInput">Full Name</label>
      </div>
      <div class="form-floating form-edit mb-4">
          <input type="text" class="form-control control-edit" id="floatingInput" placeholder="name@example.com" id="username" name="username">
          <label for="floatingInput">Username</label>
      </div>
      <div class="form-floating form-edit mb-4">
        <input type="email" class="form-control control-edit" id="floatingInput" placeholder="name@example.com" id="email" name="email">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating form-edit ">
        <input type="password" class="form-control control-edit" id="floatingPassword" placeholder="Password" name="password">
        <label for="floatingPassword">Password</label>
      </div> <br>
      <div class=" d-flex justify-content-center">
      <select name="hak" id="hak" class="form-select w-50 bg-secondary text-light " aria-label="Default select example">
        <option selected disabled value>Register As</option>
        <option value="admin">Admin</option>
        <option value="member">Member</option>
      </select>
      </div><br>
      <div><button type="submit" class="btn btn-primary w-25">Sign up</button></div><br>
        <span class="text-light">
          Already have an account?
          <a class="text-decoration-none" href="loginpage.php">Login page</a>
        </span>
    </form>
</div>
<!-- content out -->

    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>