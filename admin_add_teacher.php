<?php 
session_start();
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}
elseif($_SESSION['usertype'] == 'student')
{
    header("location:login.php");
}

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'collageproject';
$data = mysqli_connect($host, $user, $password, $db);

if(isset($_POST['add_teacher']))
{
    $t_name = $_POST['name'];
    $t_description = $_POST['description'];
    $file = $_FILES['image']['name'];

    $dst = "./image/".$file;

    $dst_db = "image/".$file;

    move_uploaded_file($_FILES['image']['tmp_name'],$dst);

    $sql = "INSERT INTO teacher (name, description, image)
    VALUES ('$t_name', '$t_description', '$dst_db')";

    $result = mysqli_query($data, $sql);

    if($result)
    {
        header('location:admin_add_teacher.php');
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>

    <?php 
        include 'admin_css.php';
    ?>

    <style type="text/css">
        .div_deg
        {
            background-color: skyblue;
            width: 500px;
            padding-top: 70px;
            padding-bottom: 70px;


        }
    </style>

</head>
<body>

    <?php
    include 'admin_sidebar.php';
    ?>


    <div class="content">
        
        <center>
            <h1>Add Teacher</h1>
            <br><br>
            <div class="div_deg">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div>
                        <div>
                            <label>Teacher Name:</label>
                            <input type="text" name="name">
                        </div>
                        <br>
                        <div>
                            <label>Description:</label>
                            <textarea name="description"></textarea>
                        </div>
                        <br>
                        <div>
                            <label>Teacher Image:</label>
                            <input type="file" name="image">
                        </div>
                        <div>
                            <br>
                            <input type="submit" name="add_teacher" value="Add Teacher" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </center>

    </div>

</body>
</html>