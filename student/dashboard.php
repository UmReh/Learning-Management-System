<?php
  include '../_dbconnect.php';
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
  header("location: index.php");
  exit;
}?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?> ">
    <link href="../fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Panel</title>
</head>
<body>
    <?php include '_sidebar.html';?>
    <div class="home-content">
        <?php include '_nav.html';?>
        <div class="head">Dashboard</div>
        <table class="dash">
          <tbody>
            <tr>
              <th>Student Name : </th>
              <td><?php echo $_SESSION['name'];?></td>
            </tr>
            <tr>
              <th>Enrollment No. : </th>
              <td><?php echo $_SESSION['eno'];?></td>
            </tr>
            <tr>
              <th>Course : </th>
              <td><?php echo $_SESSION['course'];?></td>
            </tr>
            <tr>
              <th>Sem / Year : </th>
              <td><?php echo $_SESSION['sem'];?></td>
            </tr>
            <tr>
              <th>Mobile : </th>
              <td><?php echo $_SESSION['mob'];?></td>
            </tr>
          </tbody>
        </table>
    </div>
    <script src="js/sidebar.js"></script>
</body>
</html>