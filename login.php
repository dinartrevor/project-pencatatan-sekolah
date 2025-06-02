<?php
require 'function.php';
session_start();

if(isset($_POST['login'])){
    $email= $_POST['email'];
    $password = $_POST['password'];

    $cekdatabase = mysqli_query($conn, "SELECT * FROM login where email ='$email' and password ='$password'");
    $hitung = mysqli_num_rows($cekdatabase);
    $data = mysqli_fetch_assoc($cekdatabase);
    if($hitung > 0){
        $_SESSION['log'] = true;
        $_SESSION['role'] = $data['role'];
        $_SESSION['name'] = $data['name'];
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
    <title>Login - Al-Azhar Cairo</title>
    <style>
       * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            background-image: url('assets/img/background-sekolah.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            overflow: hidden;
        }

        /* Background overlay for better readability */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.1);
            z-index: 1;
        }

        /* Clouds */
        .cloud {
            position: absolute;
            background: white;
            border-radius: 50px;
            opacity: 0.8;
        }

        .cloud1 {
            top: 20%;
            left: 15%;
            width: 80px;
            height: 40px;
            animation: float 6s ease-in-out infinite;
        }

        .cloud1::before {
            content: '';
            position: absolute;
            top: -20px;
            left: 10px;
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 50%;
        }

        .cloud2 {
            top: 15%;
            right: 20%;
            width: 60px;
            height: 30px;
            animation: float 8s ease-in-out infinite reverse;
        }

        .cloud2::before {
            content: '';
            position: absolute;
            top: -15px;
            left: 15px;
            width: 40px;
            height: 40px;
            background: white;
            border-radius: 50%;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        /* Login container */
        .login-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            padding: 40px;
            width: 400px;
            text-align: center;
        }

        .logo {
            width: 100px;
            height: 100px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        h2 {
            color: #333;
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 15px;
            border: 2px solid #e1e5e9;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #4e73df;
            background: white;
            box-shadow: 0 0 0 3px rgba(78, 115, 223, 0.1);
        }

        .login-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-card {
                width: 90%;
                margin: 0 20px;
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Background buildings -->
 
    <div class="cloud cloud2"></div>

    <!-- Login form -->
    <div class="login-container">
        <div class="login-card">
            <div class="logo">
                <img src="assets/img/logoalazca.png" alt="Al-Azhar Cairo Baturaja">
            </div>
            
            <h2>Login</h2>
            
            <form method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukan Email" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukan Password" required>
                </div>
                
                <button type="submit" name="login" class="login-btn">Login</button>
            </form>
        </div>
    </div>
</body>
</html>