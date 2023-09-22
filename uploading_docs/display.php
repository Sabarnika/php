<?php
include 'connect.php';
if (isset($_POST['submitt'])) {
    $name = $_POST['username'];
    $mobile = $_POST['mobile'];
    $image = $_FILES['image'];
    echo $name;
    echo "<br>";
    echo $mobile;
    echo "<br>";
    print_r($image);
    $imagename = $image['name'];
    print_r($imagename);
    echo "<br>";
    $imagerror = $image['error'];
    print_r($imagerror);
    echo "<br>";
    $imagetemp = $image['tmp_name'];
    echo "<br>";
    $file_separator = explode('.', $imagename);
    print_r($file_separator);
    echo "<br>";
    $file_extension = strtolower($file_separator[1]);
    print_r($file_extension);
    echo "<br>";
    $file_extension1 = strtolower(end($file_separator));
    print_r($file_extension1);
    $allowed_extensions = array('jpg', 'png', 'jpeg', 'pdf', 'doc');

    if (in_array($file_extension, $allowed_extensions)) {
        $upload_image = 'images/' . $imagename;
        move_uploaded_file($imagetemp, $upload_image);
        $sql = "insert into `uploading`(username, mobile, image) values('$name', '$mobile', '$upload_image')";
        $res = mysqli_query($con, $sql);
        if ($res) {
            echo '<div class="alert alert-success" role="alert"><strong>Success</strong>Data inserted Successfully</div>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <style>
        img {
            width: 100px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
</head>

<body>
    <div class="text-center my-4">User Data</div>
    <div class="container mt-5 d-flex justify-content-center">
        <table class="table table-bordered w-50">
            <thead class="table-dark">
                <tr>
                    <th scope="col">SI No</th>
                    <th scope="col">UserName</th>
                    <th scope="col">Image/File</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "select * from `uploading`";
                $res = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $name = $row['username'];
                    $file = $row['image'];
                    $file_extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));

                    echo '<tr>';
                    echo '<td>' . $id . '</td>';
                    echo '<td>' . $name . '</td>';

                    // Check the file extension and generate links accordingly
                    if (in_array($file_extension, array('pdf', 'doc'))) {
                        echo '<td><a href="' . $file . '" target="_blank">' . $file . '</a></td>';
                    } else {
                        echo '<td><img src="' . $file . '"/></td>';
                    }

                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
