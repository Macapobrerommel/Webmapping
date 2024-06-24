<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
    <link rel="stylesheet" href="style1.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
    rel="stylesheet"
  />

   </head>
<body>
<?php
    include "db_conn.php";
    $admin_exists = false;
    $check_admin_sql = "SELECT * FROM tb_register WHERE role='admin'";
    $check_admin_result = mysqli_query($conn, $check_admin_sql);
    if (mysqli_num_rows($check_admin_result) > 0) {
        $admin_exists = true;
    }
    ?>
  <div class="container">

    
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="images/frontImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Poverty Mapping System <br> for</span>
          <span class="text-2">Imus City Cavite</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="images/backImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
          <form action="log_script.php" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter your Username" required name="username">
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" required name="password">
              </div>
              <div class="text"><a href="#">Forgot password?</a></div>

              <div class="button input-box">
               
                <input type="submit"  value="Login" name="login_user">
              </div>


              <div class="text sign-up-text">Don't have an account? <label for="flip">Signup now</label></div>
            </div>
        </form>
      </div>
        <div class="signup-form">
          <div class="title">Signup</div>
        <form method="POST" action="register.php" >
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Enter your name" required name='username'>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter your email" required name='email'>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" required name='password'>
              </div>
              <label>Role</label>
              <select name="role">
              <option value="user">User</option>
              <?php if (!$admin_exists) { ?>
              <option value="admin">Admin</option>
              <?php } ?>
              </select><br>
              <div class="button input-box">
                <input type="submit" value="Sumbit" name="reg_user">
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
      </form>
    </div>
    </div>
    </div>
  </div>
</body>
</html>
