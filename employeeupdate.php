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
          input[type=text], input[type=email] , input[type=password], input[type=number] {
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
<div class="form">
<h1 id="h1">Update Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$trn_date = date("Y-m-d H:i:s");
$name =$_REQUEST['name'];
$address = $_REQUEST['address'];
$city = $_REQUEST['city'];
$pincode = $_REQUEST['pincode'];
$mobileno = $_REQUEST['mobileno'];
$gender = $_REQUEST['gender'];
$emp_type = $_REQUEST['emp_type'];
$division = $_REQUEST['division'];
$email = $_REQUEST['email'];
$submittedby = $_SESSION["loggedin"];
$update="update users set trn_date='".$trn_date."', name='".$name."', address='".$address."',city='".$city."', pincode='".$pincode."', mobileno='".$mobileno."', gender='".$gender."', emp_type='".$emp_type."', division='".$division."', email='".$email."', submittedby='".$submittedby."' where id='".$id."'";
mysqli_query($link, $update) or die(mysqli_error());
$status = "Record Updated Successfully.";
#header("Location: employeedetails.php");
}else {
}
?>
<div>
<form name="form" method="post" action=""> 
<p id="p" style="color:#FF0000;"><?php echo $status; ?></p>

<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<label>Employee Name :</label>  
<input type="hidden"  name="new" value="1" />
<p><input type="text" name="name" autocomplete="off" placeholder="Enter Name" required value="<?php echo $row['name'];?>" /></p>
<label>Address :</label> 
<p><input type="text" autocomplete="off" name="address" placeholder="Enter Address" required value="<?php echo $row['address'];?>" /></p>
<label>City :</label> 
<p><input type="text" autocomplete="off" name="city" placeholder="Enter city" required value="<?php echo $row['city'];?>" /></p>
<label>Pincode :</label> 
<p><input type="number" autocomplete="off" name="pincode" placeholder="Enter pincode" required value="<?php echo $row['pincode'];?>" /></p>
<label>Mobile No :</label> 
<p><input type="number" autocomplete="off" name="mobileno" pattern="^\d{10}$" placeholder="Enter mobileno" required value="<?php echo $row['mobileno'];?>" /></p>
<label >Gender :</label>
 <select name="gender"  placeholder="Gender" required value="<?php echo $row['gender'];?>">
     <option value="">Gender</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
</select>
<label>Employee Type :</label>  
 <select name="emp_type"  placeholder="Employee Type" required value="<?php echo $row['emp_type'];?>"  >
        <option value="">Employee Type</option>
        <option value="Job Order">Job Order</option>
        <option value="Regular">Regular</option>
       <option value="Casual">Casual</option>
</select>
 <label>Division :</label>
<select name="division"  placeholder="Division" required value="<?php echo $row['division'];?>" >
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
<label>Email :</label>
<p><input type="email"   name="email"  value="<?php echo $row['email'];?>"  required></p>
<p><input name="submit" type="submit" value="Update" ></p>

</form>
</div>
</div>
</body>
</html>
