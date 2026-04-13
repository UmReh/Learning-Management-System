<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
  header("location: index.php");
  exit;
}

include '../_dbconnect.php';
if(isset($_POST['add'])){
    $sno=$_POST['c-id'];
    $subjects=$_POST['subjects'];
    $fee=$_POST['fee'];
    $pfee=$_POST['pfee'];
    $sql =  $sql="UPDATE `course` SET `subjects` = '$subjects',`fee`='$fee',`pfee`='$pfee' WHERE `course`.`sno` = '$sno'";
    $query=mysqli_query($conn,$sql);
    if($query){
    echo '<script type="text/javascript">alert("Course Updated Successfully !")</script>'; 
    }
}
$sql2 = "SELECT * FROM `course` ";
$query2 = mysqli_query($conn,$sql2);
$sql3 = "SELECT * FROM `course` ";
$query3 = mysqli_query($conn,$sql3);

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
        <div class="head">Add Fees</div>
        <form action="add-fee.php" method="POST" enctype="multipart/form-data"> 
        <div class="add-item">
            <p>Course Name</p>
            <select name="c-id" id="">
                <option value="None">Select Course</option>
                <?php while($result=mysqli_fetch_array($query2)){ ?>
                    <option value="<?php echo $result['sno'];?>"><?php echo $result['cname'];?></option>
                <?php }?>
            </select>
            <p>Subjects</p>
            <input type="text" name="subjects" placeholder="Enter Subjects">
            <p>Fees</p>
            <input type="text" name="fee" placeholder="Fee">
            <p>Practical Fees</p>
            <input type="text" name="pfee" placeholder="Practical Fee">

            <input type="submit"  name="add" value="Add">
        </div>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Subjects</th>
                    <th>Fees</th>
                    <th>Practical Fees</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php while($result2=mysqli_fetch_array($query3)){ ?>
                <tr>
                    <td><?php echo $result2['cname'];?></td>
                    <td><?php echo $result2['subjects'];?></td>
                    <td><?php echo $result2['fee'];?></td>
                    <td><?php echo $result2['pfee'];?></td>
                   
                    <td><form action="add-course.php?id=<?php echo $result2['sno'];?>&name=<?php echo $result2['cname'];?>" method="POST"><input type="submit" name="delete"class="danger" value="DELETE"></form></td>
                    
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>

    <script src="js/sidebar.js"></script>
</body>
</html>