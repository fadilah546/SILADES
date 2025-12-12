<?php
session_start();
require_once 'config.php';
$pesan = '';
if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user where username = '$username' AND password = md5('$password')";
          $hasil = $koneksi->query($sql);
          $ada = $hasil -> num_rows;
          $data = $hasil->fetch_assoc();
          if ($ada > 0 ){
            $_SESSION['id_user']=$data['id_user'];
            $_SESSION['username']=$username;
            $_SESSION['role']= $data['role'];
            if($_SESSION['role'] == 'user'){
              header("Location: Warga");
            }elseif($_SESSION['role'] == 'admin'){
              header("Location: Admin/");
            }else{
              $pesan = "Akun tidak ditemukan";
            }
}else{
 $pesan = "Akun tidak ditemukan";   
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SILADES/Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: #dfe3ee;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        width: 750px;
        display: flex;
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    .left {
        flex: 1;
        padding: 40px;
        text-align: center;
    }

    .right {
        flex: 1;
        position: relative;
        background: #6a8bff;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        padding: 40px;
        border-top-left-radius: 140px;
        border-bottom-left-radius: 140px;
    }

    h2 {
        margin-bottom: 25px;
       
    }


    .input-group {
        position: relative;
        width: 300px; 
        margin-bottom: 10px; 
        
    }
    
    .input-group input {
        width: 100%;
        padding: 12px 15px; 
        padding-right: 30px; 
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 15px;
    
        overflow: hidden; 
        box-sizing: border-box; 
    }
    
    .input-group .icon {
        position: absolute;
        right: 8px; 
        top: 50%;
        transform: translateY(-50%);
        font-size: 18px;
        color: black;
        pointer-events: none;
    }

    button {
        width: 75%;
        padding: 14px;
        background: #6a8bff;
        color: #fff;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        cursor: pointer;
        margin-top: 10px;
    }

    .social {
        margin-top: 15px;
        display: flex;
        justify-content: center;
        gap: 12px;
    }

    .social button {
        width: 42px;
        height: 42px;
        padding: 0;
        background: #fff;
        border: 1px solid #ddd;
        color: #333;
        border-radius: 10px;
        font-size: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .right h2 {
    margin: 0;          
    margin-bottom: 8px; 
    }
    
    .right p {
        margin: 0;         
        margin-bottom: 10px; 
    }
    
    .right button {
        width: 120px;
        height: 35px;
        padding: 5px 25px;
        background: transparent;
        border: 2px solid #fff;
        border-radius: 12px;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        margin-top: 8px; 
    }


    .reg-title {
        margin-bottom: 20px;    
    }

    .or {
        margin-top: 8px;
        color: black;
    }

    .submit {
        width: 100%;
        padding: 10px;
        border-radius: 8px;
        font-size: 16px;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <div class="container">
    <div class="left">
        <h2 class="reg-title">Login</h2>

        <form action="" method="POST">

            <div class="input-group">
                <input type="text" placeholder="Username" name="username">
                <span class="icon">
                    <i class="fas fa-user"></i>
                </span>
            </div>

            <div class="input-group">
                <input type="password" placeholder="Password" name="password">
                <span class="icon">
                    <i class="fas fa-lock"></i>
                </span>
            </div>

            <div class="input-group">
                 <button type="submit" class="submit" name="submit">Login</button>
            </div>


        </form>

        <p class="or">or Login with social platforms</p>

        <div class="social">
            <button><i class="bi bi-google"></i></button>
            <button><i class="bi bi-facebook"></i></button>
            <button><i class="bi bi-github"></i></button>
            <button><i class="bi bi-linkedin"></i></button>
        </div>
    </div>

    <div class="right">
        <h2>Selamat Datang!</h2>
        <p>Belum punya akun?</p>
        <button onclick="window.location.href='route.php?p=daftar'">Daftar</button>
    </div>

</div>
</body>

</html>