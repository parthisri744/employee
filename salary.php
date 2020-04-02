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
            margin: 0px 0px 0px 0px;
        }
        #h1{
            margin-left:180px;
            margin-top:12px;
            color:red;
        }
        fieldset {
            margin: 0px 0px 5px 0px;
            padding-left:350px;
            border-color: green;
            padding-top:10px;
            border-width : 2px;
            background-image: url(image/currency.jpg);
            background-size: cover;
            background-repeat: no-repeat;

        }
        label {
            
              color: blue;
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
            margin-left: 5px;
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
  <a class="active"  href="salary.php">Salary</a>
  <a href="performance.php" >Performance</a>
  <a href="salaryIncrement.php" >salary Increment</a>
  <div class="topnav-right">
  <a href="manpasswordreset.php" >Reset Your Password</a>
 <a style="background-color:red" href="logout.php" >Sign Out</a>
  </div>
</div>
<div>
<fieldset>
<form method="post" action="">

    <h1 id="h1" style="margin-left:220px;"> SALARY<h1>
	<label> ID :</label>
	<input type="text" name="id" autocomplete="off" size="20">
	<label>No. of days of Work :</label>
	<input type="text" name="hours_work" autocomplete="off">
	<label>Bonus :</label>
	<input type="text" name="bonus" autocomplete="off">
     
  <label>Absences :</label>
	<input type="text" name="absences" >
    <input type="submit" name="submit" value="Compute Salary">
	<input type="submit" name="submit2" value="Clear">
</form>
<?php
  if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $work_days =  $_POST['hours_work'];
    $bonus =  $_POST['bonus'];
    $absent =  $_POST['absences'];

    $result = mysqli_query($link,"select * from new_record where id='$id'");
    $row = mysqli_fetch_assoc($result);
    $gross_pay = $row['salary'];
    $deduction = $absent*100;

    $net_pay = $gross_pay + $bonus - $deduction; 


    echo "
    <p> Employees Gross Pay : '$gross_pay'</p>
    <p> Bonus : '$bonus'</p>
    <p> Employees Total Deductions : '$deduction'</p>
  <p> Employees Net Pay : '$net_pay'<p>
  <p>
  <form method=\"POST\">
  
  <input type=\"hidden\" name=\"id\" value=' $id '>
  <input type=\"hidden\" name=\"net_pay\" value=' $net_pay '>
  <input type=\"submit\" name=\"save_records\" value=\"Save Record\">
  </form></p>
    ";
  }
  elseif (isset($_POST['save_records'])) {
    $id = $_POST['id'];
    $net_pay = $_POST['net_pay'];

    $result = mysqli_query($link,"update new_record set salary='$net_pay' where id='$id'");

    if ($result){
      echo "
    <p> Salary of employee id : '$id' is updated to : '$net_pay'</p>
  
    ";
    }
  }


?>
</div>
</fieldset>
</body>


</html>
