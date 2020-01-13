
<?php
    include 'includes/header.php';
    include 'class/db.php';
    include 'class/controller.php';
    include 'class/view.php';
    include 'class/auth.php';
    $type = new View;
    $object = new Auth;
    if(isset($_SESSION['username'])){
        header('location:index.php');
        //kapag wala pang naka insert na session redirect to
    }
    if(isset($_POST['submit'])){
        $username = $_POST['user'];
        $password = $_POST['pass'];
        if($object->authentication($username,$password)){
            if($type->viewLogin($username,$password)){
                if($_SESSION['user_type']=='admin'){
                    header("location:CRM/index.php"); 
                    echo 'Login Success!';
                }elseif($_SESSION['user_type']=='staff'){
                    header("location:CRM/index.php"); 
                    echo 'Login Success!';
                }
                
            }
           

       
        }else{
            echo "Login Failed";
        }
    }

    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        session_destroy();
    }
?>






<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="style/css/bootstrap.css"/>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <a class="navbar-brand">CUSTOMER RELATIONSHIP MANAGEMENT</a>
    </div>
</nav>
<div class="col-md-3"></div>
<div class="col-md-6 well">
    <h3 class="text-primary">CRM NOTIFICATION TEST</h3>
    <hr style="border-top:1px dotted #ccc;"/>
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <form method="POST" action="index.php">
            <div class="form-group">
                <label>Username:</label>
                <input type="text" class="form-control" name="user" required="required"/>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" name="pass" required="required"/>
            </div>
            <center><button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-envelope"></span> Send</button></center>
        </form>
        <br />
    </div>
</div>
</body>
</html>