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
?><!DOCTYPE html>
<html>
<head>
	<title>1</title>
  <meta name="google" content="notranslate">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 	<link rel="stylesheet" href="w3.css">
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
  background-color: #FF0000;
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
  <a href="4.php" class="active">Area</a>
  <a href="5.php">Scatter</a>
  <a href="6.php">Pie</a>
  <a href="7.php">Doughnut</a>
  <a href="9.php">Parabola</a> 
  <a href="databasefront.php">Connect CSV</a>
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







      <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
      <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
      <a class="a2a_button_facebook"></a>
      <a class="a2a_button_twitter"></a>
      <a class="a2a_button_google_plus"></a>
      <form action="quiz.php">
      <div align="right">
      <button class="button2" >Quiz</button>
      </div>
      </form>
      </div>
      <script async src="https://static.addtoany.com/menu/page.js"></script>




<div class="container">
 <center><h2>Area chart</h2></center>
</div>





<style type="text/css">
	@import url(https://fonts.googleapis.com/earlyaccess/droidarabickufi.css);
@import url(https://fonts.googleapis.com/css?family=Metrophobic);

.container{width:550px;margin:10px auto; border:1px solid #FFFFFF; padding:10px; border-radius:5px;}

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


      .button {
      display: inline-block;
      border-radius: 4px;
      background-color: #f4511e;
      border: none;
      color: #FFFFFF;
      text-align: center;
      font-size: 28px;
      padding: 20px;
      width: 200px;
      transition: all 0.5s;
      cursor: pointer;
      margin: 5px;
      }

      .button2 {
      display: inline-block;
      border-radius: 4px;
      background-color: deepskyblue;
      border: none;
      color: #FFFFFF;
      text-align: center;
      font-size: 17px;
      padding: 14px;
      width: 100px;
      height: 55px;
      transition: all 0.5s;
      cursor: pointer;
      margin: 5px;
      }
      .button2:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
	  }


</style>



 <script type="text/javascript">
         window.onload = function() {
             var dps = []; //dataPoints. 
         
             var chart = new CanvasJS.Chart("chartContainer", {
                
                 data: [{
                     type: "area",
                     dataPoints: dps
                 }]
             });
         
             function addDataPointsAndRender() {
                 xValue = Number(document.getElementById("xValue").value);
                 yValue = Number(document.getElementById("yValue").value);
                 dps.push({
                     x: xValue,
                     y: yValue
                 });
                 chart.render();
             }
         
             var renderButton = document.getElementById("renderButton");
             renderButton.addEventListener("click", addDataPointsAndRender);
         }
      </script>
      <script type="text/javascript" src="source.js"></script>
      </head>
    
      <body>
      X Value:
      <input id="xValue" type="number" step="any" placeholder="Enter X-Value">
      Y Value:
      <input id="yValue" type="number" step="any" placeholder="Enter Y-Value">
      <button class="pure-button pure-button-primary" id="renderButton">+</button>
      <div id="chartContainer" style="height: 270px; width: 100%;">
      </div>
      
      <center>
      <input class="button" type="button" style="vertical-align:middle" value="Print" button onclick="button()">
      <script>
         function button() {
             window.print();
         }
      </script>
      <a href="graph().png" download>
      <input class="button" type="button" align="center" style="vertical-align:middle" value="Download"> </a>
  		</center>
      <hr>
      <form action="PayslipServlet" method="get">
      <p>  &nbsp;&nbsp;Enter first co-ordinates (x1,y1):    </p>
      &nbsp;&nbsp;<input type="number" autocomplete="off" name="x1" id="x1">
      <input type="number" autocomplete="off" name="y1" id="y1"><br/><br/>
      <p>   &nbsp;&nbsp;Enter second co-ordinates (x2,y2):  </p>  </form>
      &nbsp;&nbsp;<input type="number" autocomplete="off" name="x2" id ="x2">
      <input type="number" autocomplete="off" name="y2" id="y2"><br/>
      <br>

      <input type="button" class="button" value="Gradient : " onClick="pr()">&nbsp;<mark>
      	<span style="font-size: 20px; color: blue; padding-left: 4px; " id="result"></mark></span>

      <input type="button" class="button" value="Intercept : " onClick="pr2()">&nbsp;<mark>
      	<span style="font-size: 20px; color: blue; padding-left: 4px; " id="Int"></mark></span>

      <input type="button" class="button" value="Equation : " onClick="pr3()">&nbsp;<mark>
      	<span style="font-size: 20px; color: blue; padding-left: 4px; " id="Equ"></span></mark>

      </form>
      <script>
         function pr() {
           var x1 = document.getElementById("x1").value;
           var x2 = document.getElementById("x2").value;
           var y1 = document.getElementById("y1").value;
           var y2 = document.getElementById("y2").value;
           var Res1 = x2 - x1;
           var Res2 = y2 - y1;
           var Resu = Res1 / Res2;
           document.getElementById("result").innerHTML = Resu;
         }
         function pr2() {
           var x1 = document.getElementById("x1").value;
           var x2 = document.getElementById("x2").value;
           var y1 = document.getElementById("y1").value;
           var y2 = document.getElementById("y2").value;
           var Res1 = x2 - x1;
           var Res2 = y2 - y1;
           var Resu = Res1 / Res2;
           var Int = y1 - (Resu * x1);
           document.getElementById("Int").innerHTML = Int;
         }
         function pr3() {
           var x1 = document.getElementById("x1").value;
           var x2 = document.getElementById("x2").value;
           var y1 = document.getElementById("y1").value;
           var y2 = document.getElementById("y2").value;
           var Res1 = x2 - x1;
           var Res2 = y2 - y1;
           var Resu = Res1 / Res2;
           var Int = y1 - (Resu * x1);
         
           document.getElementById("Equ").innerHTML = 'y = ' + Resu +' x '+ Int
         }
      </script>




</body>
</html>