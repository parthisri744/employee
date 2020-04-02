<?php

?>
<html>
    <head>
        <style>
            body {
                background-image: url(image/home.jpg);
                background-repeat: no-repeat;
                background-size: cover;
            }
            h1 {
                color: aliceblue;
                text-align: center;
                font-size: 1cm;
                margin-top: 2cm;
                text-shadow: 2px 3px red ;
            }

            .container {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
}

            .container img {vertical-align: middle;}

            .container .content {
            position:relative;
            bottom: 0;
            background: rgb(0, 0, 0); 
            background: rgba(0, 0, 0, 0.5); 
            color: #f1f1f1;
            width: 100%;
            height: 50%;
            padding: 20px;
}
            h2{
                margin-left: 400px;
                margin-top: -300px;
                font-size: xx-large;
            }
            button{
                padding: 40px 50px 12px 120px;   
                background-image: url(image/images.jpeg);
                background-size: cover;
                margin-left: 420px;
                border: none;
                border-radius: 18px;
            }
            button:hover{
                border-radius: 15px;
            }
            #h2 {
                margin-left: 400px;
                margin-top: 30px;
                font-size: xx-large;
            }

        </style>
    </head>
    <body>
        <h1>Employee Payroll Management  System</h1>
        <div class="container">
            <div class="content">
       <img   src="image/login-images-png-transparent-3.png" alt="login " width="300px" height="auto">
             <span ><h2>Employee Login</h2></span>
            <a href="employeelogin.php"> <button></button></a>  
            <span> <h2 id="h2">Admin Login</h2></span>
            <a href="login.php"><button></button></a>

        </div>
        </div>
    </body>

</html