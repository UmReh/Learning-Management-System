<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
  header("location: index.php");
  exit;
}
include '../_dbconnect.php';
$sql1 = "SELECT * FROM `gallery` ";
$query1 = mysqli_query($conn,$sql1);
$i=1;
if(isset($_POST['delete'])){
    $sno=$_GET['id'];
    $img=$_GET['img'];
    $sql ="DELETE FROM `gallery` WHERE `gallery`.`sno` = $sno";
    $query=mysqli_query($conn,$sql);
    if($query){
        unlink("../gal-img/".$img);
        echo '<script type="text/javascript">alert("DELETED Successfully !")</script>'; 
        header("location:add-image.php");
    }
}
if(isset($_POST['submit'])){
    $file=$_FILES['image'];
    $filename=$file['name'];
    $filepath=$file['tmp_name'];
    $fileerror=$file['error'];
    $rows=mysqli_num_rows($query1);
    if($rows <= 50){
        if(($fileerror==0)&&(($file['type']=="image/png")||($file['type']=="image/jpg")||($file['type']=="image/jpeg"))){
            $temp=explode(".",$filename);
            $img= round(microtime(true)).'.'.end($temp);
            move_uploaded_file($filepath,"../gal-img/".$img);
            $sql="INSERT INTO `gallery` (`img`) VALUES ('$img')";
            $query=mysqli_query($conn,$sql);
            if($query){
            echo '<script type="text/javascript">alert("Image Added SUCCESSFULLY !")</script>';
            header("location:add-image.php");
            }
        }
        else{
            echo '<script type="text/javascript">alert("Unable to add image. Please add image in png/jpg/jpeg Format !")</script>';
        }
    }
    else{
        echo '<script type="text/javascript">alert("Limit Exceed ! Already 50 images exists")</script>';
    }    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?> ">
    <link href="../fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet">
    <script src="../ckeditor/ckeditor.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Admin</title>
</head>
<body>
    <?php include '_sidebar.html';?>
    <div class="home-content">
        <?php include '_nav.html';?>
        <div class="head">Add Gallery Image</div>
        <form action="add-image.php" method="POST" enctype="multipart/form-data"> 
        <div class="add-item">
            <input type="file" name="image" />
            <p class="alert">Best Size <br>10cm X 10cm OR 200px X 200px</p>
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
                    <td><img src="../gal-img/<?php echo $result2['img'];?>" alt=""></td>
                    <td><form action="add-image.php?id=<?php echo $result2['sno'];?>&img=<?php echo $result2['img'];?>" method="POST"><input type="submit" name="delete"class="danger" value="DELETE"></form></td>
                    
                </tr>
                <?php $i++; }?>
            </tbody>
        </table>
    </div>

    <script src="js/sidebar.js"></script>
</body>
</html>