<?php
session_start();

// Check if the user is logged in and is not a student
if (!isset($_SESSION['username']) || $_SESSION['usertype'] == 'student') {
    header("location:login.php");
    exit(); // Always use exit after header redirection
}

$host = "localhost";
$user = "root";
$password = "";
$db = "collageproject";

// Connect to the database
$data = mysqli_connect($host, $user, $password, $db);

// Check connection
if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the student ID from the URL
$id = $_GET['student_id'];

// Fetch the student data
$sql = "SELECT * FROM user WHERE id='$id'";
$result = mysqli_query($data, $sql);

// Check if the student exists
if (mysqli_num_rows($result) == 0) {
    die("Student not found.");
}

$info = $result->fetch_assoc();

// Check if the form is submitted
if (isset($_POST['Update'])) {
    // Get the input values
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Update the student data
    $query = "UPDATE user SET username='$name', email='$email', phone='$phone', password='$password' WHERE id='$id'";
    $result2 = mysqli_query($data, $query);

    // Check if the update was successful
    if ($result2) {
        header("location:view_student.php");
        exit(); // Always use exit after header redirection
    } else {
        echo "Error updating record: " . mysqli_error($data);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    
    <?php include 'admin_css.php'; ?>

    <style type="text/css">
        label {
            display: inline-block;
            width: 100px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .div_deg {
            background-color: skyblue;
            width: 400px;
            padding-bottom: 70px;
            padding-top: 70px;
            margin: auto; /* Center the div */
        }
    </style>
</head>
<body>

    <?php include 'admin_sidebar.php'; ?>

    <div class="content">
        <center>
            <h1>Update Student</h1>

            <div class="div_deg">
                <form action="#" method="POST">
                    <div>
                        <label>Username</label>
                        <input type="text" name="name" value="<?php echo htmlspecialchars($info['username']); ?>">
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="email" name="email" value="<?php echo htmlspecialchars($info['email']); ?>">
                    </div>
                    <div>
                        <label>Phone</label>
                        <input type="number" name="phone" value="<?php echo htmlspecialchars($info['phone']); ?>">
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="text" name="password" value="<?php echo htmlspecialchars($info['password']); ?>">
                    </div>
                    <div>
                        <input class="btn btn-success" type="submit" name="Update" value="Update">
                    </div>
                </form>
            </div>
        </center>
    </div>

</body>
</html>