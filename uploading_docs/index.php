<?php
require_once('operations.php');
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index file</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center my-3">Registeration Form</h1>
    <div class="container">
        <form action="display.php" class="w-50" method="post" enctype="multipart/form-data">
            <!-- <div class="form-group">
                <input type="text" name="username" placeholder="Enter Name" class="form-control" class="my-4">
            </div>
            <div class="form-group">
                <input type="number" name="mobile" placeholder="Enter Mobile" class="form-control" class="my-4">
            </div>
            <div class="form-group">
                <input type="text" name="username" placeholder="Enter Name" class="form-control">
            </div> -->
            <?php inputFields("Enter Username","username","","text")?>
            <?php inputFields("Enter Mobile","mobile","","number")?>
            <?php inputFields("","image","","file")?>
            <button type="submit" class="btn btn-dark" name="submitt">Submit</button>
        </form>
    </div>
</body>
</html>