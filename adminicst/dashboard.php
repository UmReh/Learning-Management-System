<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
  header("location: index.php");
  exit;
}?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?> ">
    <link href="../fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Management System</title>
</head>
<body>
    <?php include '_sidebar.html';?>
    <div class="home-content">
        <?php include '_nav.html';?>
        <div class="head">Dashboard</div>
        <div class="grid-items">
            <div class="item g1">
                <div class="count">50</div>
                <div class="title">Gallery Images</div>
                <a href="add-image.php">View  <i class="fas fa-arrow-circle-right" ></i></a>
            </div>
            <div class="item g2">
                <div class="count">9</div>
                <div class="title">Banner Slideshow</div>
                <a href="add-slideshow.php">View  <i class="fas fa-arrow-circle-right" ></i></a>
            </div>
            <div class="item g3">
                <div class="count">Studetns</div>
                <div class="title"></div>
                <a href="students.php">View  <i class="fas fa-arrow-circle-right" ></i></a>
            </div>
            <div class="item g1">
                <div class="count">Staff</div>
                <div class="title"></div>
                <a href="staff.php">View  <i class="fas fa-arrow-circle-right" ></i></a>
            </div>
        </div>
    </div>
    <script src="js/sidebar.js"></script>
</body>
</html>