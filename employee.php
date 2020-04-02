<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
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
            background-color: lightblue;
            color: white;
            text-shadow: 2px 2px red;
            text-align:center;
            font-size:0.5cm;
            padding:5px;
        }
          .div{
            width: 94%;
            height: auto;  
            padding: 30px;
            border: 6px solid  lightblue;
            margin: 12px 0px 12px 0px;
          }
          .btn {
            width: 40%;
            border: 2px solid black;
            border-radius: 2px;
            background-color: white;
            padding: 14px 28px;
            font-size: 20px;
            cursor: pointer;
            margin: 2px -30px 12px 100px;
          }
          .info {
            border-color: #2196F3;
            color: dodgerblue;
            
          }

          .info:hover {
            background: #2196F3;
            color: white;
          }
          img {
            
              margin: -50px 0px 0px 450px;
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
  <a  href="welcome.php">Home</a>
  <a class="active" href="employee.php">Employee</a>
  <a href="salary.php">Salary</a>
  <a href="performance.php">Performance</a>
  <a href="salaryIncrement.php">Salary Increment</a>
  <div class="topnav-right">
  <a href="passwordreset.php" >Reset Your Password</a>
 <a style="background-color:red" href="logout.php" >Sign Out</a>
  </div>
</div>
<div  class="div">
<img src="image/employee-clipart-hotel-employee-13.png" alt="human_image"  wight="500px" height="280px">
  <a href="addemployee.php" ><button class="btn info">Add Employee</button></a>
  <a href="viewemployee.php"><button class="btn info">View Employee</button></a>
  <a href="edit.php"><button class="btn info">Update Employee</button></a>
  <a href="deleteemployee.php"><button class="btn info">Delete Employee</button></a>
        </div>
</body>

</html>

