<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false){
    header("location: index.php");
    exit;
}
require_once "config.php";
$email = $password = "";
$email_err = $password_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["email"]))){
        $email_err = "* Please enter email.";
    } else{
        $email = trim($_POST["email"]);
    }
    if(empty(trim($_POST["password"]))){
        $password_err = " * Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    if(empty($email_err) && empty($password_err)){
        $sql = "SELECT id, email, password FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            $param_email = $email;
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){ 
                    $_SESSION['loggedin']=$email;                   
                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;                            
                            header("location:employeewelcome.php");
                        } else{
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    $email_err = "No account found with that email.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
<link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="wrapper">
        <h2>employee Login</h2>
        <p> * Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>>
                <label>Email</label>
                <input type="text" name="email" autocomplete="on" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>    
            <div <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>>
                <label>Password</label>
                <input type="password" name="password">
                <span class="help-block"><?php echo $password_err; ?></span>
                <input type="submit"  value="Login">

        </form>
    </div>    
</body>
</html>
