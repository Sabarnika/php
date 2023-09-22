<?php
include 'connect.php';
$id=$_GET['updateid'];
$sql="select * from `crud` where id=$id";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);
$name=$row['username'];
$email=$row['email'];
$password=$row['password'];
$mobile=$row['mobile'];
if(isset($_POST['submitt']))
{
   $name=$_POST['username'];
   $email=$_POST['email'];
   $mob=$_POST['mobile'];
   $pass=$_POST['password'];
   $sql="update `crud` set id=$id,username='$name',email='$email',mobile='$mob',password='$pass' where id=$id";
   $res=mysqli_query($con,$sql);
   if($res)
   {
   }
}
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>CRUD operations</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container" class="my-5">
        <form action="user.php" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="username" id="name" placeholder="Enter Name" class="form-control" value=<?php echo $name?>>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter Email" class="form-control" value=<?php echo $email?>>
            </div>
            <div class="form-group">
                <label for="ph">Mobile</label>
                <input type="number" name="mobile" id="ph" placeholder="Enter Mobile" class="form-control" value=<?php echo $mobile?>>
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" name="password" id="pass" placeholder="Enter Password" class="form-control" value=<?php echo $password?>>
            </div>
            <button type="submit" name="submitt" class="btn btn-primary">Update</button>
        </form>
        </div>
    </body>
</html>