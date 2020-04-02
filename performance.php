<?php
require('config.php');
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
    <link rel="stylesheet" href="manwelcome.css">
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
            margin: 0px 0px 0px 0px;
        }
        #h1{
            margin-left:180px;
            margin-top:12px;
            color:blue;
        }
        fieldset {
            margin: 0px 0px 5px 0px;
            padding-left:350px;
            border-color: green;
            padding-top:50px;
            border-width : 2px;
            background-image: url(image/karthikapay.jpg);
            background-size: cover;
            background-repeat: no-repeat;

        }
        label {
            
              color: green;
              font-size: x-large;
          } 
          input[type=text], input[type=email] , input[type=number] {
            margin: -30px 0px 20px 300px;
            width: 400px;
             padding: 12px 2px;
              display:block;
             border: 2px solid #ccc;
              border-radius: 4px;
              box-sizing:unset;
            }
            input[type=submit] {
              width: 20%;
              background-color:black;
              color: white;
              padding: 14px 20px;
              margin-left: 400px;
              margin-top: 12px; 
              border: none;
              border-radius: 4px;
              cursor: pointer;
              font-size: large;
              
            }
            input[type=submit]:hover {
                  background-color: white;
                  color: black;
                
              }
            #p {
                margin-left:500px;
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
<body>
    <div id="div">
        <h1>EMPLOYEE PAYROLL</h1>
    </div>  
<div class="topnav">
  <a  href="manwelcome.php">Home</a>
  <a href="employee.php">Employee</a>
  <a  href="salary.php">Salary</a>
  <a class="active" href="performance.php" >Performance</a>
  <a  href="salaryIncrement.php">Salary Increment</a>
  <div class="topnav-right">
  <a href="manpasswordreset.php" >Reset Your Password</a>
 <a style="background-color:red" href="logout.php" >Sign Out</a>
  </div>
</div>
<div>
<fieldset>
<form method="post" action="">

    <h1 id="h1" style="margin-left:220px;"> PERFORMANCE<h1>
	<label> ID :</label>
	<input type="text" name="id" autocomplete="off" size="20">
    <label>PERFORMANCE</label>
  <input type="number" id="performance" name="performance" min="1" max="5">
</form>
	
	<centre><input type="submit" name="submit_id" ></centre>
</form>
<?php
if(isset($_POST['submit_id'])){
    $trn_date = date("Y-m-d H:i:s");
  $id = $_POST['id'];
  $performance =  $_POST['performance'];
$ins_query= "INSERT INTO performance1 (date1,id,performance) values ('$trn_date','$id','$performance')";
$result = mysqli_query($link,$ins_query) or die(mysqli_error($link));
if($result){
  echo "Value inserted successfully";
}
else{
  echo "Failed to insert value, try again!";
}
}
?>
