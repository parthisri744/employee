<?php
require('config.php');
session_start();
if(!isset($_SESSION["loggedin"])){
header("Location: login.php");
exit(); }
$id = $_SESSION["id"];
$query = "SELECT * from users where id='".$id."'"; 
$result = mysqli_query($link, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
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
        form {
            margin: 50px 0px 0px 50px;
        }   
        label {
              color: blue;
              font-size: x-large;
              margin-left:200px;
          }   
          p {
                color:red;
                font-size:x-large;
                margin-left: 30cm;
                margin-top:-25px;
              }
        img {
            weight:300px;
            height:500px;
            float:left;
        

        }
</style>
</head>
<body>
<div id="div">
        <h1>EMPLOYEE PAYROLL</h1>
    </div>  
<div class="topnav">
  <a  href="employeewelcome.php">Home</a>
  <a href="employeedetails.php">Employee View Details </a>
  <a href="employeeupdate.php">Update Profile </a>
  <div class="topnav-right">
  <a href="employeepasswordreset.php" >Reset Your Password</a>
 <a style="background-color:red" href="employeelogout.php" >Sign Out</a>
  </div>
</div>
<?php
$sel_query="Select * from users  where id='".$id."'";
$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result))  { ?>
<div>
<form name="form" method="post" action=""> 
<img src="image/hai.png" alt="human"  weight="auto" height="auto">
<h1 style="margin-left:800px";>EMPLOYEE  DETAILS</h1>
<label>Employee Name :</label><p><?php echo $row['name']; ?></p>
<label>Address :</label> <p><?php echo $row['address']; ?></p>
<label>City :</label> <p><?php echo $row['city']; ?> </p>
<label>Pincode :</label> <p><?php echo $row['pincode']; ?> </p>
<label>Mobile No :</label> <p><?php echo $row['mobileno']; ?></p>
<label >Gender :</label><p><?php echo $row['gender']; ?></p>
</select>
<label>Employee Type :</label><p><?php echo $row['emp_type']; ?></p>
 <label>Division :</label><p><?php echo $row['division']; ?></p>
<label>Email :</label><p><?php echo $row['email']; ?></p>
<?php $count; } ?>
</form>
</div>
</div>
</body>
</html>
