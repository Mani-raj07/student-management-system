<?php

session_start();

// Database connection details
$host = "localhost";
$user = "root";
$password = "";
$db = "collageproject";

// Establishing connection to the database
$data = mysqli_connect($host, $user, $password, $db);

// Check connection
if ($data === false) {
    die("Connection error: " . mysqli_connect_error());
}

// Check if the form is submitted
if (isset($_POST['apply'])) {
    // Retrieve form data and sanitize it
    $data_name = mysqli_real_escape_string($data, $_POST['name']);
    $data_email = mysqli_real_escape_string($data, $_POST['email']);
    $data_phone = mysqli_real_escape_string($data, $_POST['phone']);
    $data_message = mysqli_real_escape_string($data, $_POST['message']);

    // SQL query to insert data
    $sql = "INSERT INTO admission (name, email, phone, message) VALUES ('$data_name', '$data_email', '$data_phone', '$data_message')";

    // Execute the query
    $result = mysqli_query($data, $sql);

    // Check if the data was inserted successfully
    if ($result) {
        $_SESSION['message'] = "Your application has been sent successfully.";
        header("Location: index.php");
        exit(); // Ensure no further code is executed after redirection
    } else {
        echo "Application failed: " . mysqli_error($data);
    }
}

// Close the database connection
mysqli_close($data);
?>