<?php
session_start();
$table=$_SESSION['course'];
$sem=$_SESSION['sem'];
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
  header("location: index.php");
  exit;
}
include '../_dbconnect.php';
    $sql4 = "SELECT * FROM `$table` ";
    $query4 = mysqli_query($conn,$sql4);
    $i=1;
?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?> ">
    <link href="../fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Lectures - Student</title>
</head>
<body>
    <?php include '_sidebar.html';?>
    <div class="home-content">
    <?php include '_nav.html';?>
        <div class="head">Video Lectures</div>
        <div class="grid-items">
        <?php while($result=mysqli_fetch_array($query4)){ if(($result['url']!="0")&&($result['sem']==$sem)){?>
            <div class="item vid">
            <div class="title"><?php echo $result['subject'];?> - <?php echo $result['topic'];?></div>
                <iframe src="https://www.youtube.com/embed/<?php echo $result['url'];?>" allowfullscreen="" frameborder="0"></iframe>
                   
            </div>
            <?php $i++;}; }?>
        </div>
    </div>
    <script src="js/sidebar.js"></script>
</body>
</html>