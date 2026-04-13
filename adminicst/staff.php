<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
  header("location: index.php");
  exit;
}
include '../_dbconnect.php';
    $sql = "SELECT * FROM `staff` ";
    $query = mysqli_query($conn,$sql);
    $i=1;
    if(isset($_POST['delete'])){
        $sno=$_GET['id'];
        $username=$_GET['uname'];
        $sql ="DELETE FROM `staff` WHERE `staff`.`sno` = $sno";
        $query=mysqli_query($conn,$sql);
        $sql2="DROP TABLE `$username`";
        $query2=mysqli_query($conn,$sql2);
        if($query){
        echo '<script type="text/javascript">alert("Course DELETED Successfully !")</script>'; 
        header("location:staff.php");
        }
    }
    if(isset($_POST['add'])){
        $name=$_POST['name'];
        $username=$_POST['username'];
        $password=$_POST['password'];

        $sql = "INSERT INTO `staff` (`name`,`username`,`password`) VALUES ('$name','$username','$password')";
        $query=mysqli_query($conn,$sql);
        $sql2="CREATE TABLE `$database`.`$username` ( `sno` INT(11) NOT NULL AUTO_INCREMENT ,  `subject` VARCHAR(255) NOT NULL,  `topic` VARCHAR(255) NOT NULL,  `course` VARCHAR(255) NOT NULL,  `sem` VARCHAR(255) NOT NULL, `year` VARCHAR(255) NOT NULL,  `url` VARCHAR(255) NOT NULL DEFAULT '0',  `assignment` VARCHAR(255) NOT NULL DEFAULT '0',  `note` VARCHAR(255) NOT NULL DEFAULT '0',  `syllabus` VARCHAR(255) NOT NULL DEFAULT '0',  `question` VARCHAR(255) NOT NULL DEFAULT '0' ,    PRIMARY KEY  (`sno`)) ENGINE = InnoDB";
        $query2=mysqli_query($conn,$sql2);
        if($query){
        echo '<script type="text/javascript">alert("Course Updated Successfully !")</script>'; 
        header("location:staff.php");
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
    <title>Staff Login - Admin</title>
</head>
<body>
    <?php include '_sidebar.html';?>
    <div class="home-content">
    <?php include '_nav.html';?>
        <div class="head">Register Staff Login</div>        <a href="export.php?id=teacher"class="button">Export</a>
        <form action="staff.php" method="POST"> 
        <div class="add-item">
            <p>Staff Name</p>
            <input type="text" name="name" placeholder="Name" required>
            <p>Username</p>
            <input type="text" name="username" placeholder="Username"required>
            <p>password</p>
            <input type="text" name="password" placeholder="Password"required>
            <input type="submit"  name="add" value="Add">
        </div>
        </form>

        <div class="table-content">
        
            <table>
                <thead>
                    <tr>
                        <th id="sno">#</th>
                        <th id="">Name</th>
                        <th id="">Username</th>
                        <th id="">Password</th>
                        <th id="action">Delete</th>
                    </tr>
                </thead>
                <tbody>
                   <?php while($result=mysqli_fetch_array($query)){ ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $result['name'];?></td>
                        <td><?php echo $result['username'];?></td>
                        <td><?php echo $result['password'];?></td>
                        <td><form action="staff.php?id=<?php echo $result['sno'];?>&uname=<?php echo $result['username'];?>"method="POST"><input type="submit" name="delete"class="danger" value="DELETE"></form></td>
                    </tr>
                    <?php $i++; }?>
                </tbody>
            </table>
        </div>






    </div>
    <script src="js/sidebar.js"></script>
</body>
</html>