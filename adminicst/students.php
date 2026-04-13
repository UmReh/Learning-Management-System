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
    $sql ="DELETE FROM `students` WHERE `students`.`sno` = $sno";
    $query=mysqli_query($conn,$sql);
    if($query){
    echo '<script type="text/javascript">alert("Student DELETED Successfully !")</script>'; 
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
    <title>College Management</title>
</head>
<body>
    <?php include '_sidebar.html';?>
    <div class="home-content">
        <?php include '_nav.html';?>
        <div class="head">Waiting Approval List</div>
       
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Sem / Year</th>
                    <th>Session</th>
                    <th>Enrollment</th>
                    <th>Mobile</th>
                    <th>Delete</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while($result=mysqli_fetch_array($query2)){ ?>
                <tr>
                    <td><?php echo $result['name'];?></td>
                    <td><?php echo $result['cname'];?></td>
                    <td><?php echo $result['year'];?></td>
                    <td><?php echo $result['session'];?></td>
                    <td><?php echo $result['eno'];?></td>
                    <td><?php echo $result['mobile'];?></td>
                    <td><form action="students.php?id=<?php echo $result['sno'];?>" method="POST"><input type="submit" name="delete"class="danger" value="DELETE"></form></td>
                    <form action="../request.php?id=<?php echo $result['sno'];?>&act=<?php echo $result['status'];?>" method="POST">
                    <?php if($result['status']==0){
                        $st="Inactive";
                        $suc="";
                        }
                        else{
                            $st="Active";
                            $suc="success";
                        }
                            ?>
                    <td><input type="submit" name="status" class="<?php echo $suc?>" value="<?php echo $st;?>"></td>
                    </form>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    <script src="js/sidebar.js"></script>
</body>
</html>