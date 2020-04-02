<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="welcome.css">
    <style>
        #div {
            weight:auto;
            background-color: lightblue;
            color: white;
            text-shadow: 2px 2px red;
            text-align:center;
            font-size:0.5cm;
            padding:5px;
        }
        .grid-container {
  display: grid;
  grid-template-columns: 100%;
  grid-template-rows: auto;
  background-color: #2d3246;
  padding: 5px;
}
.grid-item {
  background-color: lightblue;
  padding: 0px;
  font-size: 20px;
  text-align: center;
}  
    </style>
</head>
<body>
    <div id="div">
        <h1>EMPLOYEE PAYROLL</h1>
    </div>  
<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="employee.php">Employee</a>
  <a href="salary.php">Salary</a>
  <a href="performance.php">Performance</a>
  <a href="salaryIncrement.php">Salary Increment</a>
  <div class="topnav-right">
  <a href="passwordreset.php" >Reset Your Password</a>
 <a style="background-color:red" href="logout.php" >Sign Out</a>
  </div>
</div>
<img src="image/payroll.jpg" alt="payroll" width="100%" height="500px">    
</body>
</html>
