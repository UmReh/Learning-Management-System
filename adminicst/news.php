<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
  header("location: index.php");
  exit;
}
include '../_dbconnect.php';
    $sql = "SELECT * FROM `notice` ";
    $query = mysqli_query($conn,$sql);
    $i=1;
    if(isset($_POST['delete'])){
        $sno=$_GET['id'];
        $sql ="DELETE FROM `notice` WHERE `notice`.`sno` = $sno";
        $query=mysqli_query($conn,$sql);
        if($query){
        echo '<script type="text/javascript">alert("Course DELETED Successfully !")</script>'; 
        header("location:news.php");
        }
    }
    if(isset($_POST['add'])){
        $notice=$_POST['notice'];
        $detail=$_POST['detail'];
        $link=$_POST['link'];
        $sql = "INSERT INTO `notice` (`notice`,`detail`,`link`) VALUES ('$notice','$detail','$link')";
        $query=mysqli_query($conn,$sql);
        if($query){
        echo '<script type="text/javascript">alert("Course Updated Successfully !")</script>'; 
        header("location:news.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?> ">
    <link href="../fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Important Notices - Admin</title>
</head>
<body>
    <?php include '_sidebar.html';?>
    <div class="home-content">
    <?php include '_nav.html';?>
        <div class="head">Important Notices</div>
        <form action="news.php" method="POST"> 
        <div class="add-item">
            <p>Notice</p>
            <input type="text" name="notice" placeholder="Enter Notice" required>
            <p>Detail</p>
            <input type="text" name="detail" placeholder="Details">
            <p>Link</p>
            <input type="text" name="link" placeholder="Paste link here">

            <input type="submit"  name="add" value="Add">
        </div>
        </form>
        <div class="table-content">
            <table>
                <thead>
                    <tr>
                        <th id="sno">#</th>
                        <th id="">Date</th>
                        <th id="">Notice</th>
                        <th id="">Detail</th>
                        <th id="">Link</th>
                        <th id="action">Delete</th>
                    </tr>
                </thead>
                <tbody>
                   <?php while($result=mysqli_fetch_array($query)){ ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $result['dt'];?></td>
                        <td><?php echo $result['notice'];?></td>
                        <td><?php echo $result['detail'];?></td>
                        <td><?php echo $result['link'];?></td>
                        <td><form action="news.php?id=<?php echo $result['sno'];?>" method="POST"><input type="submit" name="delete"class="danger" value="DELETE"></form></td>
                    </tr>
                    <?php $i++; }?>
                </tbody>
            </table>
        </div>






    </div>
    <script src="js/sidebar.js"></script>
</body>
</html>