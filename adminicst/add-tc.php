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
    $tc=$_GET['tc'];
    $sql ="UPDATE `students` SET `tc` = '0' WHERE `students`.`sno` = '$sno'";
    $query=mysqli_query($conn,$sql);
    if($query){
        unlink("../tc/".$tc);
        echo '<script type="text/javascript">alert("DELETED Successfully !")</script>'; 
        header("location:add-tc.php");
    }
}

if(isset($_POST['add'])){
    $eno=$_POST['eno'];
    $file=$_FILES['tc'];
    $filename=$file['name'];
    $filepath=$file['tmp_name'];
    $fileerror=$file['error'];
    if($fileerror==0){
        $temp=explode(".",$filename);
        $tc= round(microtime(true)).'.'.end($temp);
        $sql ="UPDATE `students` SET `tc` = '$tc' WHERE `students`.`eno` = '$eno'";
        $query=mysqli_query($conn,$sql);
        if($query){
            move_uploaded_file($filepath,"../tc/".$tc);
            echo '<script type="text/javascript">alert("TC Added Successfully !")</script>'; 
            header("location:add-tc.php");
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TC - Admin</title>
</head>
<body>
    <?php include '_sidebar.html';?>
    <div class="home-content">
        <?php include '_nav.html';?>
        <div class="head">Upload TC</div>
        <form action="add-tc.php" method="POST" enctype="multipart/form-data"> 
        <div class="add-item">
            <p>Enrolment Number</p>
            <input type="text" name="eno" placeholder="Enter En. No." required>
            <input type="file" name="tc" required>
            <input type="submit"  name="add" value="Add">
        </div>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Enrollment</th>
                    <th>TC</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php while($result=mysqli_fetch_array($query2)){ if($result['tc'] != "0"){ ?>
                <tr>
                    <td><?php echo $result['name'];?></td>
                    <td><?php echo $result['cname'];?></td>
                    <td><?php echo $result['eno'];?></td>
                    <td><a href="../tc/<?php echo $result['tc'];?>" target="blank">Click Here</a></td>
                    <td><form action="add-tc.php?id=<?php echo $result['sno'];?>&tc=<?php echo $result['tc'];?>" method="POST"><input type="submit" name="delete"class="danger" value="DELETE TC"></form></td>
                </tr>
                <?php }}?>
            </tbody>
        </table>
    </div>
    <script src="js/sidebar.js"></script>
</body>
</html>