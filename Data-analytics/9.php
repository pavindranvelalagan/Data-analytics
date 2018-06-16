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
  <script src="jquery-3.3.1.min.js"></script>
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
  <a href="4.php">Area</a>
  <a href="5.php">Scatter</a>
  <a href="6.php">Pie</a>
  <a href="7.php">Doughnut</a>
  <a href="9.php" class="active">Parabola</a> 
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
 <center><h2>Parabola</h2></center>
</div>





<style type="text/css">
	@import url(https://fonts.googleapis.com/earlyaccess/droidarabickufi.css);
@import url(https://fonts.googleapis.com/css?family=Metrophobic);

.container{width:550px;margin:10px auto; border:1px solid #FFFFFF; padding:10px; border-radius:5px;}
.container2{width:600px;margin:10px auto; border:1px solid #FFFFFF; padding:10px; border-radius:5px;}

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

h3 {

  background:skyblue;
  padding:5px;
  position:relative;
  overflow:hidden;
  border-radius:5px;
  color:white;
  
}
h3:before{
  content: "";
  width:50px;
  height:250px;
  border-radius:125px;
  display:block;
  background: lightskyblue;
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
                     type: "spline",
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




      <div class="container2">
        <center>
          <h4>Enter the values in the form of 'y=ax<sup>2</sup>+bx+c'</h4>
        </center>
      </div>
      <form action="PayslipServlet" method="get">
       <center>
      <input type="number" autocomplete="off" placeholder="Enter the value a" class="form-control formBlock" id='first' required="" />
      <input type="number" autocomplete="off" placeholder="Enter the value b" class="form-control formBlock" id='second' required="" />
      <input type="number" autocomplete="off" placeholder="Enter the value c" class="form-control formBlock" id='third'required="" />
      <input type="number" autocomplete="off" placeholder="Enter the value x" class="form-control formBlock" id='fourth'required="" /><br/>
     </center>
      <br>
<font face="Adobe Garamond Pro Bold" color="deepskyblue" size="6">
<center>
Equation: </font>
<font face="Adobe Fangsong Std R" color="deepskyblue" size="5"><span id="equation"></span><br>
</center>
</font>

<script>
  $('input').keyup(function(){ 
    var firstValue  = Number($('#first').val());   
    var secondValue = Number($('#second').val()); 
    var thirdValue  = Number($('#third').val());
    var fourthValue = Number($('#fourth').val());
    var f1 = firstValue * fourthValue * fourthValue;
    var f2 = secondValue * fourthValue;

    $('#equation').html('y = ' + firstValue + '*' + fourthValue + '<sup>2</sup>+' +  secondValue + '*' + fourthValue +   '+' + thirdValue); 
    $('#y1').html((9 * firstValue) + (-3 * secondValue) + (thirdValue) ); 
    $('#y2').html((4 * firstValue) + (-2 * secondValue) + (thirdValue) ); 
    $('#y3').html((1 * firstValue) + (-1 * secondValue) + (thirdValue) ); 
    $('#y4').html((0 * firstValue) + ( 0 * secondValue) + (thirdValue) ); 
    $('#y5').html((1 * firstValue) + ( 1 * secondValue) + (thirdValue) ); 
    $('#y6').html((4 * firstValue) + ( 2 * secondValue) + (thirdValue) ); 
    $('#y7').html((9 * firstValue) + ( 3 * secondValue) + (thirdValue) ); 

});
</script>


<!--
      <input type="button" class="button" value="Gradient : " onClick="pr()">&nbsp;<mark>
        <span style="font-size: 20px; color: blue; padding-left: 4px; " id="result"></mark></span>

      <input type="button" class="button" value="Intercept : " onClick="pr2()">&nbsp;<mark>
        <span style="font-size: 20px; color: blue; padding-left: 4px; " id="Int"></mark></span>

      <input type="button" class="button" value="Equation : " onClick="pr3()">&nbsp;<mark>
        <span style="font-size: 20px; color: blue; padding-left: 4px; " id="Equ"></span></mark>

      </form>
    -->
      <!--<script>
         
           var a = document.getElementById("a").value;
           var b = document.getElementById("b").value;
           var c = document.getElementById("c").value;
           var x = document.getElementById("x").value;
           var f1 = a * x * x;
           var f2 = b * x;
           var yf = f1 + f2 + c;
          // document.getElementById("result").innerHTML = Resu;


      </script>



</form>
-->


<div class="w3-container">
  <center>
  <h2>x, y points table</h2>
  </center>


  <table class="w3-table-all w3-hoverable">
   
    <tr>
      <td><b>x</b></td>
      <td>-3</td>
      <td>-2</td>
      <td>-1</td>
      <td>0</td>
      <td>1</td>
      <td>2</td>
      <td>3</td>
    </tr>
    <tr>
      <td><b>y</b></td>

      <td>
        <span id="y1"></span>
      </td>

      <td>
       <span id="y2"></span>
      </td>

      <td>
       <span id="y3"></span>
      </td>

      <td>
       <span id="y4"></span>
      </td>

      <td>
        <span id="y5"></span>
      </td>

      <td>
       <span id="y6"></span>
      </td>

      <td>
       <span id="y7"></span>
      </td>
      
    </tr>
  </table>
</div>

<br>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>





<!-------------------------------------------------------------------------------------------------------
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 654px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
</style>
-->

<!--
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'chart')">-->
    <!--
<div class="w3-container" onclick="openCity(event, 'chart')">
  <center><h3>x, y co-ordinates table</h3></center>
    <!--</button>-->

 <!-- </div>
</div>

<div id="chart" class="tabcontent">

  <table class="w3-table-all w3-hoverable">
   
    <tr>
      <td><b>x</b></td>
      <td>-3</td>
      <td>-2</td>
      <td>-1</td>
      <td>0</td>
      <td>1</td>
      <td>2</td>
      <td>3</td>
    </tr>
    <tr>
      <td><b>y</b></td>
      <td>-3</td>
      <td>-2</td>
      <td>-1</td>
      <td>0</td>
      <td>1</td>
      <td>2</td>
      <td>3</td>
    </tr>
  </table>
</div>


<br></div>

<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
-->
     

<!------------------------------------------------------------------------------------------------------->





<!--

<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 185px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
</style>

<center>
  <h3>Select the equation type:</h3>
</center>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'tab1')">y=ax<sup>2</sup>+bx+c</button>
  <button class="tablinks" onclick="openCity(event, 'tab2')">y=&#x2213;(x&#x2213;a)</button>
  <button class="tablinks" onclick="openCity(event, 'tab3')">y=&#x2213;(x&#x2213;b)</button>
</div>

<div id="tab1" class="tabcontent">
  <h4>Enter the values a, b, c:</h4>
  <input type="number" name="a1" id="a1" autocomplete="off" placeholder="Enter the value 'a'">
  &nbsp;
  <input type="number" name="b1" id="b1" autocomplete="off" placeholder="Enter the value 'b'">
  &nbsp;
  <input type="number" name="c1" id="c1" autocomplete="off" placeholder="Enter the value 'c'">
  <br>




<div class="w3-container">
  <h2>x, y points table</h2>

  <table class="w3-table-all w3-hoverable">
   
    <tr>
      <td><b>x</b></td>
      <td>-3</td>
      <td>-2</td>
      <td>-1</td>
      <td>0</td>
      <td>1</td>
      <td>2</td>
      <td>3</td>
    </tr>
    <tr>
      <td><b>y</b></td>
      <td>-3</td>
      <td>-2</td>
      <td>-1</td>
      <td>0</td>
      <td>1</td>
      <td>2</td>
      <td>3</td>
    </tr>
  </table>
</div>






    <input type="button" class="button" value="Gradient : " onClick="pr()">&nbsp;<mark>
    <span style="font-size: 20px; color: blue; padding-left: 4px; " id="result"></mark></span>

    <input type="button" class="button" value="Intercept : " onClick="pr2()">&nbsp;<mark>
    <span style="font-size: 20px; color: blue; padding-left: 4px; " id="Int"></mark></span>

    <input type="button" class="button" value="Equation : " onClick="pr3()">&nbsp;<mark>
    <span style="font-size: 20px; color: blue; padding-left: 4px; " id="Equ"></span></mark>

</div>

<div id="tab2" class="tabcontent">
  <center>
  <h4>Enter the value 'a':</h4>
  <input type="number" name="a2" id="a2" autocomplete="off">
  </center>
</div>

<div id="tab3" class="tabcontent">
  <center>
  <h4>Enter the value 'b':</h4>
  <input type="number" name="b2" id="b2" autocomplete="off">
  </center>
</div>

<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>











<style>
#myDIV {
    width: 100%;
    padding: 50px 0;
    text-align: center;
    background-color: lightblue;
    margin-top: 20px;
}
</style>


<button onclick="myFunction()">Try it</button>

<div id="myDIV">
This is my DIV element.
</div>


<script>
function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>



-->










<style>
body {font-family: Arial, Helvetica, sans-serif;}


/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}


.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>







</body>
</html>