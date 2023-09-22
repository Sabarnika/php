<?php
$login=0;
$invalid=0;
  if($_SERVER['REQUEST_METHOD']=='POST')
  {
    include 'connect.php';
    $name=$_POST['username'];
    $pass=$_POST['password'];
    $sql="select * from `registration` where username='$name' and password='$pass'";
    $res=mysqli_query($con,$sql);
    if($res)
    {
        $num=mysqli_num_rows($res);
        if($num>0)
       {
      //  echo "Login successfull";
        $login=1;
        session_start();
        $_SESSION['username']=$name;
        header('location:home.php');

       }
      else{
        //echo "Invalid Data";
        $invalid=1;
      }
    }
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
    <?php 
          if($invalid)
          {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Invalid Credentials</strong>
            </div>';
          }   
        ?>
         <?php 
          if($login)
          {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Login Successfully</strong>
            </div>';
          }  
          ?>
        <h1 class="text-center ">Login Page</h1>
        <div class="container mt-5">
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" placeholder="Enter Name" name="username" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" placeholder="Enter Password" name="password" id="pass" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-primary w-100">Login</button>
            </div>
        </form>
        </div>
    </body>
</html>