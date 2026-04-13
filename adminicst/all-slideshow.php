<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
  header("location: index.php");
  exit;
}
include '../_dbconnect.php';
    $sql = "SELECT * FROM `slideshow` ";
    $query = mysqli_query($conn,$sql);
    $i=1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?> ">
    <link href="../fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slide Show - Admin</title>
</head>
<body>
    <?php include '_sidebar.html';?>
    <div class="home-content">
    <?php include '_nav.html';?>
        <div class="head">Home Slideshow </div>
        <div class="table-content">
            <table>
                <thead>
                    <tr>
                        <th id="sno">#</th>
                        <th id="">Image</th>
                        <th id="action">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($result=mysqli_fetch_array($query)){ ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><img src="../slideshow/<?php echo $result['img'];?>" alt="Error Loading Image"></td>
                        <td>
                            <a href="slideshow.php?id=<?php echo $result['sno'];?>&i=<?php echo $i;?>">Change</a>
                        </td>
                    </tr>
                    <?php $i++;
                 } ?>

                    
                </tbody>
            </table>
        </div>






    </div>
    <script src="js/sidebar.js"></script>
</body>
</html>