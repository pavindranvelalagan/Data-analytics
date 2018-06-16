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
	<title>Visualizations with csv files</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="w3.css">
  <script src="chartbundle.js"></script>
  <script src="util.js"></script>





<?php
   $msg = "";
   //if upload button is pressed
   if (isset($_POST['upload'])) {
    //the path to store the uloaded images
    $target = "C:\\Users\\VEl-Laptop\\Desktop\\django projects\\test csv\\".basename($_FILES['image']['name']);
    //C:\Users\VEl-Laptop\Desktop\django projects\test csv
    //C:\\myhttpdfolder\\fileadmin\\

    //connect to the database
    $db = mysqli_connect("localhost","root","","photos");

    //get all the submitted data from the form
    $image = $_FILES['image']['name'];
    $text = $_POST['text'];

    $sql = "INSERT INTO images (image, text) VALUES ('$image', '$text')";
    mysqli_query($db, $sql); //stores the submitted data into the database table image

    //now lets move tot he uploaded image into th folder images
    if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
      $msg = "img upload success";
    }else{
      $msg = "sorry something went wrong...try again";
    }
    }
    
   





?>



  <style>
  canvas {
    -moz-user-select: none;
    -webkit-user-select: none;
    -ms-user-select: none;
  }
  .chart-container {
    width: 500px;
    margin-left: 40px;
    margin-right: 40px;
    margin-bottom: 40px;
  }
  .container {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
  }
  </style>
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
  background-color: #000000;
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




input[type=button], input[type=submit], input[type=reset]  {
  background-color: #56baed;
  border: none;
  color: white;
  padding: 15px 80px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  text-transform: uppercase;
  font-size: 13px;
  -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
  margin: 5px 20px 40px 20px;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}

input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover  {
  background-color: #39ace7;
}

input[type=button]:active, input[type=submit]:active, input[type=reset]:active  {
  -moz-transform: scale(0.95);
  -webkit-transform: scale(0.95);
  -o-transform: scale(0.95);
  -ms-transform: scale(0.95);
  transform: scale(0.95);
}

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


<div class="topnav" id="myTopnav">
  <a href="index.php">Home</a>
  <a href="1.php">Line</a>
  <a href="2.php">Column</a>
  <a href="3.php">Bar</a>
  <a href="4.php">Area</a>
  <a href="5.php">Scatter</a>
  <a href="6.php">Pie</a>
  <a href="7.php">Doughnut</a>
  <a href="9.php">Parabola</a> 
  <a href="databasefront.php" class="active"s>Connect CSV</a>
  <a href="gallery/index.php">Gallery</a>

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






      <div class="a2a_kit a2a_kit_size_32 a2a_default_style" >
      <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
      <a class="a2a_button_facebook"></a>
      <a class="a2a_button_twitter"></a>
      <a class="a2a_button_google_plus"></a>
      </div>
      <script async src="https://static.addtoany.com/menu/page.js"></script>

 
  <style type="text/css">
   
    #content{
  width: 80%;
  margin: 40px auto;
  border: 4px solid #cbcbcb;
}
form{
  width: 90%;
  margin: 1px;
}
form div{
  margin-top: 10px;
}
#img_div{
  width:80%;
  padding:5px;
  margin:15px auto;
  border:3px solid #cbcbcb;
}
#img_div:after{
  content:"";
  display:block;
  clear:both;

}
img{
  float:left;
  margin:8px;
  width:500px;
  height:340px;
}
textarea{
  width:100%;
}



input[type=submit] {
     background-color: #0693cd;
  border: 0;
  border-radius: 5px;
  cursor: pointer;
  color: #fff;
  font-size:16px;
  font-weight: bold;
  line-height: 1.4;
  padding: 10px;
  width: 180px
}



textarea {
    width: 100%;
    height: 150px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    resize: none;
}


  </style>




<center>



<style type="text/css">
  
<style type="text/css">
  @import url(https://fonts.googleapis.com/earlyaccess/droidarabickufi.css);
@import url(https://fonts.googleapis.com/css?family=Metrophobic);

.container{width:950px;margin:10px auto; border:1px solid #FFFFFF; padding:10px; border-radius:5px;}

h2 {

  background:skyblue;
  padding:5px;
  position:relative;
  overflow:hidden;
  border-radius:5px;
  color:white;
  
}
h2:before{
  content: "";
  width:180px;
  height:250px;
  border-radius:125px;
  display:block;
  background: deepskyblue;
  position:absolute;
  top:-30px; right:0px;
  
}

</style>


    <h1 id='demo'> </h1>
    <script>
      var name=prompt('Give a name to the chart :')
      document.getElementById("demo").innerHTML='<h2>'+name+'</h2>'
    </script>




<div style="width: 75%" align="center" class="container">
    <canvas id="canvas"></canvas>
  </div>
  <!--<div align="center">
  <button id="randomizeData">Update chart</button>
  </div>-->
  <script>
    var color = Chart.helpers.color;
    var barChartData = {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [{
        type: 'bar',
        label: 'Dataset 1',
        backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),
        borderColor: window.chartColors.red,
        data: [
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor()
        ]
      }, {
        type: 'line',
        label: 'Dataset 2',
        backgroundColor: color(window.chartColors.blue).alpha(0.2).rgbString(),
        borderColor: window.chartColors.blue,
        data: [
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor()
        ]
      }, {
        type: 'bar',
        label: 'Dataset 3',
        backgroundColor: color(window.chartColors.green).alpha(0.2).rgbString(),
        borderColor: window.chartColors.green,
        data: [
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor()
        ]
      }]
    };

    // Define a plugin to provide data labels
    Chart.plugins.register({
      afterDatasetsDraw: function(chart) {
        var ctx = chart.ctx;

        chart.data.datasets.forEach(function(dataset, i) {
          var meta = chart.getDatasetMeta(i);
          if (!meta.hidden) {
            meta.data.forEach(function(element, index) {
              // Draw the text in black, with the specified font
              ctx.fillStyle = 'rgb(0, 0, 0)';

              var fontSize = 16;
              var fontStyle = 'normal';
              var fontFamily = 'Helvetica Neue';
              ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);

              // Just naively convert to string for now
              var dataString = dataset.data[index].toString();

              // Make sure alignment settings are correct
              ctx.textAlign = 'center';
              ctx.textBaseline = 'middle';

              var padding = 5;
              var position = element.tooltipPosition();
              ctx.fillText(dataString, position.x, position.y - (fontSize / 2) - padding);
            });
          }
        });
      }
    });

    window.onload = function() {
      var ctx = document.getElementById('canvas').getContext('2d');
      window.myBar = new Chart(ctx, {
        type: 'bar',
        data: barChartData,
        options: {
          responsive: true,
          title: {
            display: true,
          },
        }
      });
    };

    document.getElementById('randomizeData').addEventListener('click', function() {
      barChartData.datasets.forEach(function(dataset) {
        dataset.data = dataset.data.map(function() {
          return randomScalingFactor();
        });
      });
      window.myBar.update();
    });
  </script>
</center>
</body>
</html>