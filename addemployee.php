<?php
require('config.php');
session_start();
if(!isset($_SESSION["loggedin"])){
header("Location: login.php");
exit(); }
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$trn_date = date("Y-m-d H:i:s");
$name =$_REQUEST['name'];
$address = $_REQUEST['address'];
$city = $_REQUEST['city'];
$pincode = $_REQUEST['pincode'];
$mobileno = $_REQUEST['mobileno'];
$gender = $_REQUEST['gender'];
$emp_type = $_REQUEST['emp_type'];
$division = $_REQUEST['division'];
$salary =  $_REQUEST['salary'];
$email = $_REQUEST['email'];
$hashPassword = $_REQUEST['password'];
$password = password_hash($hashPassword, PASSWORD_DEFAULT);
$submittedby = $_SESSION["loggedin"];
$q=mysqli_query($link,"select * from users where email='$email'");
	$r=mysqli_num_rows($q);	
	if($r)
	{
	$err="<font color='red'>This email already exists choose diff email.</font>";
	}
else {
$ins_query=  "insert into users (`trn_date`,`name`,`address`,`city`,`pincode`,`mobileno`,`gender`,`emp_type`,`division`,`salary`,`email`,`password`,`submittedby`) values('$trn_date','$name','$address','$city','$pincode','$mobileno','$gender','$emp_type','$division','$salary','$email','$password','$submittedby')";
mysqli_query($link,$ins_query) or die(mysqli_error($link));
$status = "New Record Inserted Successfully.";
}
$ins_query=  "select max(id) from users";
$result = mysqli_query($link,$ins_query) or die(mysqli_error($link));
$val = mysqli_fetch_assoc($result);
$id =  $val['max(id)'];
$date = date("Y-m-d H:i:s");
$result = mysqli_query($link,"insert into salary_record (id,salary,date) values ('$id','$salary','$date')");

}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Record</title>
<link rel="stylesheet" href="welcome.css">
<style>
  body{
      background-image:url(https://files.123freevectors.com/wp-content/original/112575-plain-white-blurred-background-vector.jpg);
      background-size: cover;
      background-repeat: no-repeat;
  }
        #div {
            background-color: lightblue;
            color: white;
            text-shadow: 2px 2px red;
            text-align:center;
            font-size:0.5cm;
            padding:5px;
        }
        form {
            margin: 0px 0px 0px 380px;
        }
        #h1{
            margin-left:500px;
            margin-top:12px;
            color:red;
        }
        label {
              color: blue;
              font-size: x-large;
          } 
          input[type=text], input[type=email] , input[type=number], input[type=password] {
            margin: -40px 0px 12px 200px;
            width: 400px;
             padding: 12px 2px;
              display:block;
             border: 2px solid #ccc;
              border-radius: 4px;
              box-sizing:unset;
}
select{
           margin: -20px 0px 20px 200px;
            width: 400px;
             padding: 12px 2px;
              display:block;
             border: 2px solid #ccc;
              border-radius: 4px;
              box-sizing:unset;
              background-color:lightblue;
}
				option {
					margin: -40px 0px 20px 200px;
					background-color: white;
				}
				input[type=submit] {
				width: 20%;
				background-color:black;
				color: white;
				padding: 14px 20px;
				margin-left: 4cm;
				margin-top: 12px; 
				border: none;
				border-radius: 4px;
				cursor: pointer;
				font-size: large;
				}
				#p {
					margin-left:100px;
					font-size:20px;
				}
				th {
					background-color:lightgreen;
					color:blue;
				}
				.div{
				width: 94%;
				height: auto;  
				padding: 30px;
				border: 6px solid  lightblue;
				margin: 12px 0px 12px 0px;
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
<body >
<div id="div">
        <h1>EMPLOYEE PAYROLL</h1>
    </div>  
<div class="topnav">
  <a  href="manwelcome.php">Home</a>
  <a  href="employee.php">Employee</a>
  <a href="salary.php">Salary</a>
  <a href="performance.php">Performance</a>
  <a href="salaryIncrement.php">Salary Increment</a>
  <div class="topnav-right">
  <a href="cuspasswordreset.php" >Reset Your Password</a>
 <a style="background-color:red" href="logout.php" >Sign Out</a>
  </div>
</div>
<div class="div">
<div class="form">
<div >
<h1 id="h1">Add New Record</h1>
<form name="form" method="post" action=""> 
<p id="p" style="color:#FF0000;"><?php echo $status; ?></p>
<p><label><?php echo @$err;?></label></p>
<label>Employee Name :</label>  
<input type="hidden"  name="new" value="1" />
<p><input type="text" name="name" autocomplete="off" placeholder="Enter Name" required ></p>
<label>Address :</label> 
<p><input type="text" autocomplete="off" name="address" placeholder="Enter Address" required ></p>
<label>City :</label> 
<p><input type="text" autocomplete="off" name="city" placeholder="Enter city" required ></p>
<label>Pincode :</label> 
<p><input type="number" autocomplete="off" name="pincode" placeholder="Enter pincode" required ></p>
<label>Mobile No :</label> 
<p><input type="number" autocomplete="off" name="mobileno" pattern="^\d{10}$" placeholder="Enter mobileno" required ></p>
<label >Gender :</label>
 <select name="gender"  placeholder="Gender" required>
     <option value="">Gender</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
</select>
<label>Employee Type :</label>  
 <select name="emp_type"  placeholder="Employee Type" required>
        <option value="">Employee Type</option>
        <option value="Job Order">Job Order</option>
        <option value="Regular">Regular</option>
       <option value="Casual">Casual</option>
</select>
 <label>Division :</label>
<select name="division"  placeholder="Division" required>
        <option value="">Division</option>
         <option value="Admin">Admin</option>
        <option value="Human Resource">Human Resource</option>
        <option value="Accounting">Accounting</option>
        <option value="Engineering">Engineering</option>
        <option value="MIS">MIS</option>
         <option value="Supply">Supply</option>
         <option value="Maintenance">Maintenance</option>
         <option value="Control">Control</option>
</select>
<label>Salary:</label>
<p><input type="number"  name="salary" > </p> 
<label>Email :</label>
<p><input type="email"   name="email"   required></p>
<label>Password :</label>
<p><input type="password"  name="password"  required></p>
<input name="submit" type="submit" value="Submit" />
</form>
</div>
</div>

</div>
</body>
</html>


