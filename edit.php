<?php
require('config.php');
session_start();
if(!isset($_SESSION["loggedin"])){
header("Location: login.php");
exit(); }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
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
       
        #h1{
            margin-left:650px;
            margin-top:12px;
            color:red;
        }
            table {
                margin: 0px 0px 20px 0px;  
            }
            th {
                background-color:lightgreen;
                color:blue;
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
<body>
<div id="div">
        <h1>EMPLOYEE PAYROLL</h1>
    </div>  
<div class="topnav">
  <a  href="welcome.php">Home</a>
  <a  href="employee.php">Employee</a>
  <a href="salary.php">Salary</a>
  <a href="performance.php"> performance</a>
  <a href="salaryIncrement">Salary Increment</a>
  <div class="topnav-right">
  <a href="passwordreset.php" >Reset Your Password</a>
 <a style="background-color:red" href="logout.php" >Sign Out</a>
  </div>
</div>
<div class="form">
<h2 id="h1">View Records</h2>
<center>
<table width="60%" border="1" style="border-collapse:collapse;">
<thead>
<tbody>
<tr><th><strong>S.No</strong></th><th><strong>Name</strong></th><th><strong>Address</strong></th><th><strong>City</strong></th><th><strong>Pincode</strong></th><th><strong>Mobileno</strong></th><th><strong>Gender</strong></th><th><strong>Employee Type</strong></th><th><strong>Division</strong></th><th><strong>Salary</strong></th><th><strong>Email</strong></th><th><strong>password</strong></th><th><strong>Edit</strong></th></tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from users ORDER BY id desc;";
$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td><td align="center"><?php echo $row["name"]; ?></td><td align="center"><?php echo $row["address"]; ?></td><td align="center"><?php echo $row["city"]; ?></td><td align="center"><?php echo $row["pincode"]; ?></td><td align="center"><?php echo $row["mobileno"]; ?></td><td align="center"><?php echo $row["gender"]; ?></td><td align="center"><?php echo $row["emp_type"]; ?></td><td align="center"><?php echo $row["division"]; ?></td><td align="center"><?php echo $row["salary"]; ?></td><td align="center"><?php echo $row["email"]; ?></td><td align="center"><?php echo $row["password"]; ?></td><td align="center"><a href="editemployee.php?id=<?php echo $row["id"]; ?>">Edit</a></td></tr>
<?php $count++; } ?>
</tbody>
</table>
</center>
</div>
</body>

</html>
