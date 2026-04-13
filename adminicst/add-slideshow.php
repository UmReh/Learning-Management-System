<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
  header("location: index.php");
  exit;
}
include '../_dbconnect.php';
$sql1 = "SELECT * FROM `slideshow` ";
$query1 = mysqli_query($conn,$sql1);
$i=1;
if(isset($_POST['delete'])){
    $sno=$_GET['id'];
    $img=$_GET['img'];
    $sql ="DELETE FROM `slideshow` WHERE `slideshow`.`sno` = $sno";
    $query=mysqli_query($conn,$sql);
    if($query){
        unlink("../slideshow/".$img);
        echo '<script type="text/javascript">alert("DELETED Successfully !")</script>'; 
        header("location:add-slideshow.php");
    }
}
if(isset($_POST['submit'])){
    $file=$_FILES['image'];
    $filename=$file['name'];
    $filepath=$file['tmp_name'];
    $fileerror=$file['error'];
    $rows=mysqli_num_rows($query1);
    if($rows <= 20){
        if(($fileerror==0)&&(($file['type']=="image/png")||($file['type']=="image/jpg")||($file['type']=="image/jpeg"))){
            $temp=explode(".",$filename);
            $img= round(microtime(true)).'.'.end($temp);
            move_uploaded_file($filepath,"../slideshow/".$img);
            $sql="INSERT INTO `slideshow` (`img`) VALUES ('$img')";
            $query=mysqli_query($conn,$sql);
            if($query){
            echo '<script type="text/javascript">alert("Image Added SUCCESSFULLY !")</script>';
            header("location:add-slideshow.php");
            }
        }
        else{
            echo '<script type="text/javascript">alert("Unable to add image. Please add image in png/jpg/jpeg Format !")</script>';
        }
    }
    else{
        echo '<script type="text/javascript">alert("Limit Exceed ! Already 20 images exists")</script>';
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
    <title>Slideshow - Admin</title>
</head>
<body>
    <?php include '_sidebar.html';?>
    <div class="home-content">
        <?php include '_nav.html';?>
        <div class="head">Add Slideshow Image</div>
        <form action="add-slideshow.php" method="POST" enctype="multipart/form-data"> 
        <div class="add-item">
            <input type="file" name="image"/>
            <p class="alert">Best Size <br>1200px X 600px</p>
            <input type="submit"  name="submit" value="Upload">
        </div>
        </form>
        <table>
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Image</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php while($result2=mysqli_fetch_array($query1)){ ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><img src="../slideshow/<?php echo $result2['img'];?>" alt=""></td>
                    <td><form action="add-slideshow.php?id=<?php echo $result2['sno'];?>&img=<?php echo $result2['img'];?>" method="POST"><input type="submit" name="delete"class="danger" value="DELETE"></form></td>
                    
                </tr>
                <?php $i++; }?>
            </tbody>
        </table>
    </div>

    <script src="js/sidebar.js"></script>
</body>
</html>