<?php
include 'connect.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <button type="submit" class="btn btn-primary my-5 "><a href="user.php" class="text-light">Add User</a></button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">SI No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Password</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                   $sql="select * from crud";
                   $res=mysqli_query($con,$sql);
                   if($res)
                   {
                    // $row=mysqli_fetch_assoc($res);
                    // echo $row['username'];
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id=$row['id'];
                        $name=$row['username'];
                        $email=$row['email'];
                        $mob=$row['mobile'];
                        $pass=$row['password'];
                        echo '
                        <tr>
                        <th scope="row">'.$id.'</th>
                        <td>'.$name.'</td>
                        <td>'.$email.'</td>
                        <td>'.$mob.'</td>
                        <td>'.$pass.'</td>
                        <td><button type="submit" class="btn btn-primary"><a href="update.php?updateid='.$id.'" class="text-light">Update</a></button>
                        <button type="submit" class="btn btn-danger"><a href="delete.php?deleteid='.$id.'" class="text-light">Delete</a></button></td>        
                        </tr>';
                    }
                   }
                ?>
                </tbody>
        </table>
    </div>
</body>
</html>