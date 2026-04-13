<?php
  include '../_dbconnect.php';
session_start();
$table=$_SESSION['username'];
$name=$_SESSION['name'];
$password=$_SESSION['password'];
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
    <title>Teacher Panel</title>
</head>
<body>
    <?php include '_sidebar.html';?>
    <div class="home-content">
        <?php include '_nav.html';?>
        <div class="head">Dashboard</div>
        <table class="dash">
          <tbody>
            <tr>
              <th>Staff Name : </th>
              <td><?php echo $_SESSION['name'];?></td>
            </tr>
            <tr>
              <th>Username : </th>
              <td><?php echo $_SESSION['username'];?></td>
            </tr>
            <tr>
              <th>Password : </th>
              <td><?php echo $_SESSION['password'];?></td>
            </tr>
          </tbody>
        </table>
    </div>
    <script src="js/sidebar.js"></script>
</body>
</html>