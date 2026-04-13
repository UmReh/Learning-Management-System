<?php
    
include '../_dbconnect.php';
    $sql = "select * from admission";
    $query=mysqli_query($conn,$sql);
    if(isset($_POST['delete'])){
        $sno=$_GET['id'];
        $sql2 ="DELETE FROM `admission` WHERE `admission`.`sno` = $sno";
        $query2=mysqli_query($conn,$sql2);
        if($query2){
        echo '<script type="text/javascript">alert("Student DELETED Successfully !")</script>'; 
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
    <title>College Management</title>
</head>
<body>
    <?php include '_sidebar.html';?>
    <div class="home-content">
        <?php include '_nav.html';?>
        <div class="head">Admission Enquiries</div><a href="export.php?id=admission"class="button">Export</a>
        
        <table>
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Course</th>
                    <th>Session</th>
                    <th>Mobile</th>
                    <th>Father's Name</th>
                    <th>Mother's Name</th>
                    <th>Adhaar No.</th>
                    <th>Date Of Birth</th>
                    <th>Gender</th>
                    <th>Category</th>
                    <th>Address</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php while($result=mysqli_fetch_array($query)){ ?>
                <tr>
                    <td><?php echo $result['name'];?></td>
                    <td><?php echo $result['course'];?></td>
                    <td><?php echo $result['session'];?></td>
                    <td><?php echo $result['mob'];?></td>
                    <td><?php echo $result['fname'];?></td>
                    <td><?php echo $result['mname'];?></td>
                    <td><?php echo $result['adhaar'];?></td>
                    <td><?php echo $result['dob'];?></td>
                    <td><?php echo $result['gender'];?></td>
                    <td><?php echo $result['category'];?></td>
                    <td><?php echo $result['address'];?></td>
                   
                    <td><form action="admission.php?id=<?php echo $result['sno'];?>" method="POST"><input type="submit" name="delete"class="danger" value="DELETE"></form></td>
                    
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    <script src="js/sidebar.js"></script>
</body>
</html>