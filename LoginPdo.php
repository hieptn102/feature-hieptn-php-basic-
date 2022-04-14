<?php

session_start();
//print_r($_POST);
$error=[];
if(isset($_POST['submit'])==true){
    $email=$_POST['mail_address'];
    $password=$_POST['password'];
    if(empty($email)||strlen($email)>255){
        $error['mail_address'] = 'Email không hợp lệ';
    }elseif(empty($password)|| strlen($password) < 6 || strlen($password) > 100){
        $error['password']= 'Mật khẩu không hợp lệ';
    }
    else{
        $conn= new PDO("mysql:host=localhost;dbname=hieptn;charset=utf8","root","");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="SELECT * FROM users WHERE mail=? AND password=?";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$email,$password]);
        if($stmt->rowCount()==1){
            $user=$stmt->fetch();
            $_SESSION['login_id']= $user['id'];
            $_SESSION['login_email']= $user['mail'];
            $_SESSION['login_name']= $user['name'];
            header("location:LoginSuccessPdo.php");

        }else{

            echo("Tài khoản hoặc mật khẩu không chính xác");
        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Login</title>
</head>
<body>
    <form method="POST" style="width:500px" class= "m-auto p2";>
        <div class="m-auto p2">
            <h1>Login</h1>
        </div>
        <div class="mb-3">
            <label for="mail_address" class="form-label">Email address</label>
            <input type="email" name="mail_address" class="form-control" id="mail_address" placeholder="Nhập email của bạn">
            <span><?php echo(isset($error['mail_address']))?$error['mail_address']:'' ?></span>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Nhập mật khẩu(ít nhất 6 ký tự)">
            <span><?php echo(isset($error['password']))?$error['password']:'' ?></span>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Login</button>
    </form>
</body>
</html>