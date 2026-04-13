<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
  header("location: index.php");
  exit;
}

include '../_dbconnect.php';
if(isset($_POST['add'])){

    $course=$_POST['course'];
    $sql = "INSERT INTO `course` (`cname`) VALUES ('$course')";
    $query=mysqli_query($conn,$sql);
    $sql2="CREATE TABLE `$database`.`$course` ( `sno` INT(11) NOT NULL AUTO_INCREMENT ,  `subject` VARCHAR(255) NOT NULL,  `topic` VARCHAR(255) NOT NULL, `sem` VARCHAR(255) NOT NULL, `url` VARCHAR(255) NOT NULL DEFAULT '0',  `assignment` VARCHAR(255) NOT NULL DEFAULT '0',  `note` VARCHAR(255) NOT NULL DEFAULT '0',  `syllabus` VARCHAR(255) NOT NULL DEFAULT '0',  `question` VARCHAR(255) NOT NULL DEFAULT '0' , `staff` VARCHAR(255) NOT NULL, PRIMARY KEY  (`sno`)) ENGINE = InnoDB";
    $query2=mysqli_query($conn,$sql2);
    if($query){
    echo '<script type="text/javascript">alert("Course Added Successfully !")</script>'; 
    }
}
if(isset($_POST['delete'])){
    $sno=$_GET['id'];
    $course=$_GET['name'];
    $sql ="DELETE FROM `course` WHERE `course`.`sno` = $sno";
    $query=mysqli_query($conn,$sql);
    $sql2="DROP TABLE `$course`";
    $query2=mysqli_query($conn,$sql2);
    if($query){
    echo '<script type="text/javascript">alert("Course DELETED Successfully !")</script>'; 
    }
}
$sql2 = "SELECT * FROM `course` ";
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
    <title>College Management</title>
</head>
<body>
    <?php include '_sidebar.html';?>
    <div class="home-content">
        <?php include '_nav.html';?>
        <div class="head">Add Course</div>
        <form action="add-course.php" method="POST" enctype="multipart/form-data"> 
        <div class="add-item">
            <p>Course Name</p>
            <input type="text" name="course" placeholder="Course Name">
            <input type="submit"  name="add" value="Add">
        </div>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php while($result=mysqli_fetch_array($query2)){ ?>
                <tr>
                    <td><?php echo $result['cname'];?></td>
                    <td><form action="add-fee.php" method="POST"><input type="submit" name="edit"value="EDIT"></form></td>
                    <td><form action="add-course.php?id=<?php echo $result['sno'];?>&name=<?php echo $result['cname'];?>" method="POST"><input type="submit" name="delete"class="danger" value="DELETE"></form></td>
                    
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
  
    <script src="js/sidebar.js"></script>
</body>
</html>