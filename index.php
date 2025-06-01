<?php

session_start();

if (isset($_SESSION['message'])) {
  
    $message = $_SESSION['message'];
    unset($_SESSION['message']); 

    echo "<script type='text/javascript'>alert('$message');</script>"; 
}

     $host="localhost";
     $user="root";
     $password="";
     $db="collageproject";

     $data=mysqli_connect($host,$user,$password,$db);

     $sql="SELECT * FROM teacher";

     $result=mysqli_query($data,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Management System</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <label class="logo">Study Compiler</label>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Admission</a></li>
            <li><a href="login.php" class="btn btn-success">Login</a></li>
        </ul>
    </nav>
    <div class="section1">
        <label class="img_text">We teach Students with care</label>
        <img class="image" src="collage.jpg">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="welcome_img" src="collage.jpg"> 
            </div>
            <div class="col-md-8">
                <h1>Welcome to Study Compiler</h1>
                <p>Where Coders Begin, Build, and Excel. At Study Compiler, we believe in turning passion into skill. Whether you're a complete beginner or an aspiring developer ready to level up, our institute offers expert-led programming courses designed to make complex concepts simple and practical. From Python and Java to full-stack development, data science, and beyond — we offer hands-on learning, real-world projects, and personalized mentorship to help you master the tech skills you need to succeed in today’s digital world. Join a community of learners, creators, and future tech leaders. Code your future — with Study Compiler.</p>
            </div>
        </div>
    </div>

    <center>
        <h1>Our Teachers</h1>
    </center>

    <div class="container">
        <div class="row">

            <?php

            while($info=$result->fetch_assoc())

           {

            ?>


            <div class="col-md-4">
                <img class="teacher" src="<?php echo "{$info['image']}"; ?>">
                <h3><?php echo "{$info['name']}" ?></h3>

                 <h5><?php echo "{$info['description']}" ?></h5>
            </div>
           
           <?php

       }

       ?>
        </div>
    </div>

    <center>
        <h1>Our Courses</h1>
    </center>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="teacher" src="web_development.png">
                <h3>Web Development</h3>
            </div>
            <div class="col-md-4">
                <img class="teacher" src="digital_marketing.png">
                <h3>Digital Marketing</h3>
            </div>
            <div class="col-md-4">
                <img class="teacher" src="graphic_design.png">
                <h3>Graphic Design</h3>
            </div>
        </div>
    </div>

    <center>
        <h1 class="adm">Admission Form</h1>
    </center>

    <div align="center" class="admission_form">
        <form action="data_check.php" method="POST">
            <div class="adm_int">
                <label class="label_text">Name</label>
                <input class="input_deg" type="text" name="name" required>
            </div>
            <div class="adm_int">
                <label class="label_text">Email</label>
                <input class="input_deg" type="email" name="email" required>
            </div>
            <div class="adm_int">
                <label class="label_text">Phone</label>
                <input class="input_deg" type="text" name="phone" required>
            </div>
            <div class="adm_int">
                <label class="label_text">Message</label>
                <textarea class="input_txt" name="message" required></textarea>
            </div>
            <div class="adm_int">
                <input class="btn btn-primary" id="submit" type="submit" value="Apply" name="apply">
            </div>
        </form>
    </div>

    <footer>
        <h3 class="footer_text">All @copyright reserved by Study Compiler</h3>
    </footer>
</body>
</html>

