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
    $migration=$_GET['migration'];
    $sql ="UPDATE `students` SET `migration` = '0' WHERE `students`.`sno` = '$sno'";
    $query=mysqli_query($conn,$sql);
    if($query){
        unlink("../migration/".$migration);
        echo '<script type="text/javascript">alert("DELETED Successfully !")</script>'; 
        header("location:add-migration.php");
    }
}

if(isset($_POST['add'])){
    $eno=$_POST['eno'];
    $file=$_FILES['migration'];
    $filename=$file['name'];
    $filepath=$file['tmp_name'];
    $fileerror=$file['error'];
    if($fileerror==0){
        $temp=explode(".",$filename);
        $migration= round(microtime(true)).'.'.end($temp);
        $sql ="UPDATE `students` SET `migration` = '$migration' WHERE `students`.`eno` = '$eno'";
        $query=mysqli_query($conn,$sql);
        if($query){
            move_uploaded_file($filepath,"../migration/".$migration);
            echo '<script type="text/javascript">alert("Migration Added Successfully !")</script>'; 
            header("location:add-migration.php");
        }
   
    }
}
$sql2 = "SELECT * FROM `students` ";
$query2 = mysqli_query($conn,$sql2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?> ">
    <link href="../fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet">
    <script src="../ckeditor/ckeditor.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Migration - Admin</title>
</head>
<body>
    <?php include '_sidebar.html';?>
    <div class="home-content">
        <?php include '_nav.html';?>
        <div class="head">Upload Migration</div>
        <form action="add-migration.php" method="POST" enctype="multipart/form-data"> 
        <div class="add-item">
            <p>Enrolment Number</p>
            <input type="text" name="eno" placeholder="Enter En. No." required>
            <input type="file" name="migration" required>
            <input type="submit"  name="add" value="Add">
        </div>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Enrollment</th>
                    <th>Migration</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php while($result=mysqli_fetch_array($query2)){ if($result['migration'] != "0"){ ?>
                <tr>
                    <td><?php echo $result['name'];?></td>
                    <td><?php echo $result['cname'];?></td>
                    <td><?php echo $result['eno'];?></td>
                    <td><a href="../migration/<?php echo $result['migration'];?>" target="blank">Click Here</a></td>
                    <td><form action="add-migration.php?id=<?php echo $result['sno'];?>&migration=<?php echo $result['migration'];?>" method="POST"><input type="submit" name="delete"class="danger" value="DELETE Migration"></form></td>
                </tr>
                <?php }}?>
            </tbody>
        </table>
    </div>
    <script src="js/sidebar.js"></script>
</body>
</html>