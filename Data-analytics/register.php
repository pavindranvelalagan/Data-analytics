<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


<video poster="bg.jpg" id="bgvid" playsinline autoplay muted loop>
 
</video>


<style type="text/css">
  
video { 
    position: fixed;
    top: 50%;
    left: 50%;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    z-index: -100;
    transform: translateX(-50%) translateY(-50%);
 background: url('bg.jpg') no-repeat;
  background-size: cover;
  transition: 1s opacity;
}
.stopfade { 
   opacity: .5;
}


</style>


<br>


  <div class="header">
    <h2>Register</h2>
  </div>
  
  <form method="post" action="register.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Username</label>
      <input type="text" autocomplete="off" name="username" value="<?php echo $username; ?>">
    </div>
    <div class="input-group">
      <label>Email</label>
      <input type="email" autocomplete="off" name="email" value="<?php echo $email; ?>">
    </div>




    <div class="input-group">
      <label>Password</label>
      <input type="password" autocomplete="off" name="password_1" id="myInput">
    </div>

    
  






    <div class="input-group">
      <label>Confirm password</label>
      <input type="password" autocomplete="off" name="password_2" id="myInput">
    </div>
   



    <div class="input-group">
      <button type="submit" class="btn" name="reg_user">Register</button>
    </div>
    <p>
      Already a member? <a href="login.php">Sign in</a>
    </p>
  </form>
</body>











</html>