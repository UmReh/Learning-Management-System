<?php
session_start();
$table=$_SESSION['course'];
$sem=$_SESSION['sem'];
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
  header("location: index.php");
  exit;
}
include '../_dbconnect.php';
    $sql4 = "SELECT * FROM `$table` ";
    $query4 = mysqli_query($conn,$sql4);
    $i=1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?> ">
    <link href="../fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions</title>
</head>
<body>
    <?php include '_sidebar.html';?>
    <div class="home-content">
    <?php include '_nav.html';?>
        <div class="head">Questions</div>
        <div class="table-content">
            <table>
                <thead>
                    <tr>
                        <th id="sno">#</th>
                        <th id="">Subject</th>
                        <th id="">Topic</th>
                        <th id="">Questions</th>
                    </tr>
                </thead>
                <tbody>
                   <?php while($result=mysqli_fetch_array($query4)){ if(($result['question']!="0")&&($result['sem']==$sem)){?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $result['subject'];?></td>
                        <td><?php echo $result['topic'];?></td>
                        <td><a href="../question/<?php echo $result['question'];?>" target="_blank" rel="noopener noreferrer">Click Here</a></td>
                    </tr>
                    <?php $i++;}; }?>
                </tbody>
            </table>
        </div>

    </div>
    <script src="js/sidebar.js"></script>
</body>
</html>