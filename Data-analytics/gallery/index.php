<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Gallery - Upload your visualizations here...</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/jquery.fancybox.min.css" rel="stylesheet" type="text/css"/>
		    <link rel="stylesheet" href="w3.css">
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>





<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 14px;
}

.topnav a:hover {
  background-color: #4db8ff;
  color: black;
}

.active {
  background-color: #ff0000;
  color: white;
}

.topnav .icon {
  display: none;
}

.dropdown {
    float: left;
    overflow: hidden;
}

.dropdown .dropbtn {
    font-size: 16px;    
    border: none;
    outline: none;
    color: white;
    padding: 14px 16px;
    background-color: inherit;
    font-family: inherit;
    margin: 0;
}

.dropdown:hover .dropbtn {
    background-color: lightblue;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {
    background-color: #4db8ff;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.topnav-right {
  float: right;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}


@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}


</style>


<div class="topnav" id="myTopnav">
  <a href="http://localhost/youtube/register/index.php">Home</a>
  <a href="http://localhost/youtube/register/1.php">Line</a>
  <a href="http://localhost/youtube/register/2.php">Column</a>
  <a href="http://localhost/youtube/register/3.php">Bar</a>
  <a href="http://localhost/youtube/register/4.php">Area</a>
  <a href="http://localhost/youtube/register/5.php">Scatter</a>
  <a href="http://localhost/youtube/register/6.php">Pie</a>
  <a href="http://localhost/youtube/register/7.php">Doughnut</a>
  <a href="http://localhost/youtube/register/9.php">Parabola</a> 
  <a href="http://localhost/youtube/register/databasefront.php">Connect CSV</a>
  <a href="index.php" class="active">Gallery</a>

  <div class="topnav-right">
     <div class="search-container">
    <form action="/action_page.php">
      <input type="text" placeholder="Search.." name="search" autocomplete="off">
    </form>
  </div>
  </div>
  


  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>


<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>















<br>
<link rel="stylesheet" type="text/css" href="http://localhost/youtube/register/w3.css">

<div class="w3-container" align="right">
  <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Upload content</button>

  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-blue"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <center><h1>Upload here...</h1></center>
        
      </header>
      <div class="w3-container">
        


<center>
   <form method="post" action="index.php" enctype="multipart/form-data">
    <input type="hidden" name="size" value="1000000">
    <br>

    <div>
      <input type="file" name="image" accept="image/*" />
      
    
     	<button class="button button2" name="upload" type="submit">Upload image</button>
       <!--<input type="submit" name="upload" value="Upload image">-->
       <br>
       <br>

     </div>
   </form>
</center>
      </div>
      
    </div>
  </div>
</div>
 






        <div class="container"> 
        <?php  if (isset($_SESSION['username'])) : ?>
        		<center>
     				 <font size="6"><p><strong><?php echo $_SESSION['username']; ?> Gallery</strong></p></font>
      			</center>
        <?php endif ?>

            <?php $dir = glob('images/{*.jpg,*.png}', GLOB_BRACE); ?>
            <?php foreach ($dir as $key => $value): ?>

                <div class="thumb">
                    <a href="<?php echo $value; ?>" data-fancybox="images" data-caption="<?php echo $value; ?>">
                        <img src="<?php echo $value; ?>" alt="" />
                    </a>
                   
                </div>
            <?php endforeach; ?>
        </div>

        <script src="http://localhost/youtube/register/jquery-3.3.1.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="js/jquery.fancybox.min.js" type="text/javascript"></script>







<style type="text/css">
  @import url('https://fonts.googleapis.com/css?family=Poppins');

/* BASIC */

html {
  background-color: #56baed;
}

body {
  font-family: "Poppins", sans-serif;
  height: 100vh;
}

a {
  color: #92badd;
  display:inline-block;
  text-decoration: none;
  font-weight: 400;
}

h2 {
  text-align: center;
  font-size: 16px;
  font-weight: 600;
  text-transform: uppercase;
  display:inline-block;
  margin: 40px 8px 10px 8px; 
  color: #cccccc;
}



/* STRUCTURE */

.wrapper {
  display: flex;
  align-items: center;
  flex-direction: column; 
  justify-content: center;
  width: 100%;
  min-height: 100%;
  padding: 20px;
}

#formContent {
  -webkit-border-radius: 10px 10px 10px 10px;
  border-radius: 10px 10px 10px 10px;
  background: #fff;
  padding: 30px;
  width: 90%;
  max-width: 450px;
  position: relative;
  padding: 0px;
  -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  text-align: center;
}

#formFooter {
  background-color: #f6f6f6;
  border-top: 1px solid #dce8f1;
  padding: 25px;
  text-align: center;
  -webkit-border-radius: 0 0 10px 10px;
  border-radius: 0 0 10px 10px;
}



/* TABS */

h2.inactive {
  color: #cccccc;
}

h2.active {
  color: #0d0d0d;
  border-bottom: 2px solid #5fbae9;
}



/* FORM TYPOGRAPHY*/


input[type=text] {
  background-color: #f6f6f6;
  border: none;
  color: #0d0d0d;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px;
  width: 85%;
  border: 2px solid #f6f6f6;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}

input[type=text]:focus {
  background-color: #fff;
  border-bottom: 2px solid #5fbae9;
}

input[type=text]:placeholder {
  color: #cccccc;
}

</style>











<?php
   $msg = "";
   //if upload button is pressed
   if (isset($_POST['upload'])) {
    //the path to store the uloaded images
    $target = "C:\\xampp\\htdocs\\youtube\\register\\gallery\\images\\".basename($_FILES['image']['name']);

    //connect to the database
    $db = mysqli_connect("localhost","root","","gallery");

    //get all the submitted data from the form
    $image = $_FILES['image']['name'];

    $sql = "INSERT INTO images (image) VALUES ('$image')";
    mysqli_query($db, $sql); //stores the submitted data into the database table image

    //now lets move tot he uploaded image into th folder images
    if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
      $msg = "img upload success";
    }else{
      $msg = "sorry something went wrong...try again";
    }
    }
    
   





?>









    </body>
</html>
