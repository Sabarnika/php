<?php
$success=0;
$user=0;
$invalid=0;
  if($_SERVER['REQUEST_METHOD']=='POST')
  {
    include 'connect.php';
    $name=$_POST['username'];
    $pass=$_POST['password'];
    $cpass=$_POST['cpassword'];
    // $sql="insert into `registration`(username,password) values('$name','$pass')";
    // $res=mysqli_query($con,$sql);
    // if($res)
    // echo "Successfully inserted";
    // else
    // die(mysqli_error($con));
    $sql="select * from`registration` where username='$name'";
    $res=mysqli_query($con,$sql);
    if($res)
    {
        $num=mysqli_num_rows($res);
        if($num>0)
        //echo "User Already Exists";
        $user=1;
      else{
        if($pass===$cpass){
        $sql="insert into `registration`(username,password) values('$name','$pass')";
        $res=mysqli_query($con,$sql);
        if($res)
        {
        $success=1;
         // echo "SignUp Successfull";
        header('location:login.php');
        }
    }
    else
    {
        $invalid=1;
    }
    }
    }
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <?php 
          if($user)
          {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Oh sorry User already exists</strong>
            </div>';
          }   
        ?>
         <?php 
          if($invalid)
          {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Password Mismatch</strong>
            </div>';
          }   
        ?>
         <?php 
          if($success)
          {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Account created Successfully</strong>
            </div>';
          }   
        ?>
        <h1 class="text-center ">SignUp Page</h1>
        <div class="container mt-5">
        <form action="signup.php" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" placeholder="Enter Name" name="username" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" placeholder="Enter Password" name="password" id="pass" class="form-control">
            </div>
            <div class="form-group">
                <label for="cpass">Password</label>
                <input type="password" placeholder="Enter Confirm Password" name="cpassword" id="cpass" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-primary w-100">Sign Up</button>
            </div>
        </form>
        </div>
    </body>
</html>