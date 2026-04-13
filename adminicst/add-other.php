<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
  header("location: index.php");
  exit;
}
include '../_dbconnect.php';
$id=$_GET['name'];
if(isset($_POST['popular'])){
    $id1=$_GET['name'];
    $file=$_FILES['image'];
    $filename=$file['name'];
    $filepath=$file['tmp_name'];
    $fileerror=$file['error'];
    $sql1 = "SELECT * FROM `images` ";
    $query1 = mysqli_query($conn,$sql1);
    $rows=mysqli_num_rows($query1);
    if($rows <= 20){
        if(($fileerror==0)&&(($file['type']=="image/png")||($file['type']=="image/jpg")||($file['type']=="image/jpeg"))){
            $destfile = $filename;
            move_uploaded_file($filepath,"../others/".$destfile);
            $sql="UPDATE `images` SET `$id1` = '$destfile'WHERE `images`.`sno` = 1";
            $query=mysqli_query($conn,$sql);
            if($query){
            echo '<script type="text/javascript">alert("Product Added SUCCESSFULLY !")</script>';
            }
        }
        else{
            echo '<script type="text/javascript">alert("Unable to add product. Please add image in png/jpg/jpeg Format !")</script>';
        }
    }
    else{
        echo '<script type="text/javascript">alert("Limit Exceed ! Already 20 items exists")</script>';
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
    <title>Add Staff Images - Admin</title>
</head>
<body>
    <?php include '_sidebar.html';?>
    <div class="home-content">
        <?php include '_nav.html';?>
        <div class="head">Add Staff Image</div>
        <form action="add-other.php?name=<?php echo $id;?>" method="POST" enctype="multipart/form-data"> 
        <div class="add-item">
            <input type="file" name="image" />
            <p class="alert">Image should be of same size <br> Example : 10cm X 10cm OR 200px X 200px</p>
            <input type="submit"  name="popular" value="Upload">
        </div>
        </form>
    </div>
    <script src="js/sidebar.js"></script>
</body>
</html>