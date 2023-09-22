<?php
session_start();
if(!isset($_session['username']))
{
    header('location:login.php');
}
  ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center mt-5">Home Page</h1>
    <?php echo $_SESSION['username'];?>
    <div class="container"><a href="logout.php" class="btn btn-primary">Logout</a></div>
</body>