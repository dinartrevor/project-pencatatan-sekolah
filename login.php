<?php
require 'function.php';
session_start();

if(isset($_POST['login'])){
    $email= $_POST['email'];
    $password = $_POST['password'];

    $cekdatabase = mysqli_query($conn, "SELECT * FROM login where email ='$email' and password ='$password'");
    $hitung = mysqli_num_rows($cekdatabase);

    if($hitung > 0){
        $_SESSION['log'] = true;
        header('location: index.php');
    } else {
        header('location: login.php');
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Alazca</title>
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #4e73df, #224abe);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-wrapper {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            padding: 40px;
            max-width: 400px;
            width: 100%;
        }

        .login-header {
            text-align: center;
            margin-bottom: 25px;
        }

        .login-header img {
            width: 80px;
            margin-bottom: 10px;
        }

        .login-header h3 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 14px;
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .btn-primary {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: none;
            background-color: #4e73df;
            color: white;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #375ac2;
        }

        .extra-links {
            margin-top: 15px;
            text-align: center;
            font-size: 13px;
        }

        .extra-links a {
            color: #4e73df;
            text-decoration: none;
        }

        .extra-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-wrapper">
    <!-- LOGO + TULISAN -->
    <div class="login-header">
        <img src="assets/img/logoalazca.png" alt="Alacabta">
        <h3>Login</h3>
    </div>

    <!-- FORM -->
    <form method="post">
        <div class="form-group">
            <label for="inputEmailAddress">Email</label>
            <input class="form-control" type="email" name="email" id="inputEmailAddress" placeholder="Enter email address">
        </div>
        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input class="form-control" type="password" name="password" id="inputPassword" placeholder="Enter password">
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" id="inputRememberPassword" type="checkbox" />
            <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
        </div>
        <button class="btn btn-primary" name="login">Login</button>
    </form>

    <!-- LINK -->
    <div class="extra-links">
        <a href="password.php">Forgot Password?</a><br>
        <a href="register.php">Need an account? Sign up!</a>
    </div>
</div>

</body>
</html>
