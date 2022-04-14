<?php
session_start();
if(isset($_POST['submit'])==true){
    session_destroy();
    header('location:LoginPdo.php');
    die();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>Trang Chủ</title>
</head>
<body>
    <form action="" method="post"style="width:500px" class= "m-auto p2"; >
        <div><H1>Wellcome </H1> <?php print_r($_SESSION['login_name']);?></div>
        
        <button type="submit" class="btn btn-primary" name="submit">Logout</button>
    </form>
</body>
</html>