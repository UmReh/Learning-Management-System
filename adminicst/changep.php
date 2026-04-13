<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
  header("location: index.php");
  exit;
}
$showAlert=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"]=="POST")
{


  include '../_dbconnect.php';
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];


  $existSql="SELECT * FROM `admin` WHERE username = 'admin'";
  $result = mysqli_query($conn, $existSql);  
      if( ($password == $cpassword) && $password!="") 
      {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql="UPDATE `admin` SET `password` = '$hash',`dt`=current_timestamp() WHERE `admin`.`username` = 'admin'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
          $showAlert= true;
        }    
      }
      else
      {
        $showError= "Passwords do not match or password cannot be empty";
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
    <title>Change Password - Admin Panel</title>

<body>
<?php include '_sidebar.html';?>
  <div class="home-content">
  <?php 
      require '_nav.html'
      ?>
  <?php
   if($showAlert)
    {
    echo  '<script type="text/javascript">alert("Password Updated Successfully")</script>';
    }
    elseif($showError!=false)
    {
      echo '<script type="text/javascript">alert("'.$showError.'")</script>';
    }
  ?>
  <div class="main">
    <div class="container">
      <h1 class="text-center">Change Password Admin Panel</h1>

      <form action="changep.php" method="post">
      
        <div class="row ">
          <label for="password"> New Password</label>
          <div class="get">
            <input type="password" maxlength="23" id="password" name="password">
          </div>
        </div>
        <div class="row ">
          <label for="cpassword">Confirm Password</label>
          <div class="get">
            <input type="password" id="cpassword" name="cpassword">
          </div>
        </div>
        <button type="submit" class="btn">Submit</button>
      </form>
    </div>
  </div>
  </div>
  <script src="js/sidebar.js"></script>
</body>
</html>