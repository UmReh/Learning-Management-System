<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
  header("location: index.php");
  exit;
}

include '../_dbconnect.php';

if(isset($_POST['delete'])){
    $sno=$_GET['id'];
    $docs=$_GET['docs'];
    $sql ="DELETE FROM `docs` WHERE `sno` = '$sno'";
    $query=mysqli_query($conn,$sql);
    if($query){
        unlink("../docs/".$docs);
        echo '<script type="text/javascript">alert("DELETED Successfully !")</script>'; 
        header("location:add-docs.php");
    }
}

if(isset($_POST['add'])){
    $name=$_POST['name'];
    $file=$_FILES['docs'];
    $filename=$file['name'];
    $filepath=$file['tmp_name'];
    $fileerror=$file['error'];
    if($fileerror==0){
        $temp=explode(".",$filename);
        $docs= round(microtime(true)).'.'.end($temp);
        $sql ="INSERT INTO `docs` (`name`,`docs`) VALUES ('$name','$docs')";
        $query=mysqli_query($conn,$sql);
        if($query){
            move_uploaded_file($filepath,"../docs/".$docs);
            echo '<script type="text/javascript">alert("Document Added Successfully !")</script>'; 
            header("location:add-docs.php");
        }
   
    }
}
$sql2 = "SELECT * FROM `docs` ";
$query2 = mysqli_query($conn,$sql2);
$i=1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?> ">
    <link href="../fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet">
    <script src="../ckeditor/ckeditor.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Documents - Admin</title>
</head>
<body>
    <?php include '_sidebar.html';?>
    <div class="home-content">
        <?php include '_nav.html';?>
        <div class="head">Add Document</div>
        <form action="add-docs.php" method="POST" enctype="multipart/form-data"> 
        <div class="add-item">
            <p>Name of Document</p>
            <input type="text" name="name" placeholder="Name of Document" required>
            <input type="file" name="docs" required>
            <input type="submit"  name="add" value="Add">
        </div>
        </form>
        <table>
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Name of Document</th>
                    <th>Document</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php while($result=mysqli_fetch_array($query2)){?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $result['name'];?></td>
                    <td><a href="../docs/<?php echo $result['docs'];?>" target="blank">Click Here</a></td>
                    <td><form action="add-docs.php?id=<?php echo $result['sno'];?>&docs=<?php echo $result['docs'];?>" method="POST"><input type="submit" name="delete"class="danger" value="DELETE"></form></td>
                </tr>
                <?php $i++; }?>
            </tbody>
        </table>
    </div>
    <script src="js/sidebar.js"></script>
</body>
</html>