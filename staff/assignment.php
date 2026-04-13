<?php
session_start();
$table=$_SESSION['username'];
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
  header("location: index.php");
  exit;
}
include '../_dbconnect.php';
    $sql4 = "SELECT * FROM `$table` ";
    $query4 = mysqli_query($conn,$sql4);
    $i=1;
    if(isset($_POST['delete'])){
        $sno=$_GET['id'];
        $course=$_GET['cname'];
        $assignment=$_GET['assignment'];
        // $sql ="DELETE FROM `$table` WHERE `$table`.`sno` = $sno";
        // $query=mysqli_query($conn,$sql);
        $sql2 ="DELETE FROM `$course` WHERE `$course`.`sno` = '$sno'";
        $query2=mysqli_query($conn,$sql2);
        if($query2){
            unlink("../assignments/".$assignment);
            echo '<script type="text/javascript">alert("DELETED Successfully !")</script>'; 
            header("location:assignment.php");
        }
    }
    if(isset($_POST['add'])){
        $subject=$_POST['subject'];
        $topic=$_POST['topic'];

        $file=$_FILES['assignment'];
        $filename=$file['name'];
        $filepath=$file['tmp_name'];
        $fileerror=$file['error'];
        if($fileerror==0){
            $temp=explode(".",$filename);
            $assignment= round(microtime(true)).'.'.end($temp);
            move_uploaded_file($filepath,"../assignments/".$assignment);
        }

        $course=$_POST['course'];
        $sem=$_POST['sem'];
        // $sql = "INSERT INTO `$table` (`subject`,`topic`,`course`,`sem`,`assignment`) VALUES ('$subject','$topic','$course','$sem','$assignment')";
        // $query=mysqli_query($conn,$sql);
        $sql2 = "INSERT INTO `$course` (`subject`,`topic`,`sem`,`assignment`,`staff`) VALUES ('$subject','$topic','$sem','$assignment','$table')";
        $query2=mysqli_query($conn,$sql2);
        if($query2){
        echo '<script type="text/javascript">alert("Updated Successfully !")</script>'; 
        header("location:assignment.php");
        }
    }
    $sql2 = "select * from course";
    $query2=mysqli_query($conn,$sql2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?> ">
    <link href="../fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment - Teacher</title>
</head>
<body>
    <?php include '_sidebar.html';?>
    <div class="home-content">
    <?php include '_nav.html';?>
        <div class="head">Assignments</div>
        <form action="assignment.php" method="POST" enctype="multipart/form-data"> 
        <div class="add-item">
            <p>Subject</p>
            <input type="text" name="subject" placeholder="Subject" required>
            <p>Topic</p>
            <input type="text" name="topic" placeholder="Topic"required>
            <p>Course</p>
                <select name="course" id="">
                    <?php while($result2=mysqli_fetch_array($query2)){?>
                    <option value="<?php echo $result2['cname'];?>"><?php echo $result2['cname'];?></option>
                    <?php }?>
                </select>
            <p>Sem / Year</p>
                <select name="sem" id="">
                    <option value="First">First</option>
                    <option value="Second">Second</option>
                    <option value="Third">Third</option>
                    <option value="Fourth">Fourth</option>
                    <option value="Fifth">Fifth</option>
                    <option value="Sixth">Sixth</option>
                </select>
            <p>Upload Assignment</p>
            <input type="file" name="assignment" required>
            <input type="submit"  name="add" value="Add">
        </div>
        </form>
        <div class="table-content">
            <table>
                <thead>
                    <tr>
                        <th id="sno">#</th>
                        <th id="">Subject</th>
                        <th id="">Topic</th>
                        <th id="">Course</th>
                        <th id="">Sem / Year</th>
                        <th id="">Assignment</th>
                        <th id="action">Delete</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                   
                   $courses_sql = "SELECT cname FROM course";
                   $courses = mysqli_query($conn, $courses_sql);
                   $couses_arr = array();
                   while($course = mysqli_fetch_array($courses)){
                           $course_table = $course['cname'];
                           $sql_single_course = "SELECT * FROM `$course_table` WHERE `staff`='$table'";
                           $query5 = mysqli_query($conn,$sql_single_course);
                   while($result=mysqli_fetch_array($query5)){ if($result['assignment']!="0"){?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $result['subject'];?></td>
                        <td><?php echo $result['topic'];?></td>
                        <td><?php echo $course_table;?></td>
                        <td><?php echo $result['sem'];?></td>
                        <td><a href="../assignments/<?php echo $result['assignment'];?>" target="_blank" rel="noopener noreferrer">Click Here</a></td>
                        <td><form action="assignment.php?id=<?php echo $result['sno'];?>&cname=<?php echo $course_table;?>&assignment=<?php echo $result['assignment'];?>"method="POST"><input type="submit" name="delete"class="danger" value="DELETE"></form></td>
                    </tr>
                    <?php $i++;}; }}?>
                </tbody>
            </table>
        </div>






    </div>
    <script src="js/sidebar.js"></script>
</body>
</html>