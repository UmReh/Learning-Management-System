<?php
$showAlert=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"]=="POST")
{


  include '../_dbconnect.php';
  $username = $_POST["username"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];


  $existSql="SELECT * FROM `admin` WHERE username = '$username'";
  $result = mysqli_query($conn, $existSql);  
  $numExistsRows= mysqli_num_rows($result); 
  if($numExistsRows >0)
  {
    $showError= "Username already exists";
  }
  else
  {
      if( ($password == $cpassword) && $password!="") 
      {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `admin` (`username`, `password`, `dt`) VALUES ('$username', '$hash', current_timestamp())";
        $result = mysqli_query($conn, $sql); 
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
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?> ">
    <link href="../fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Admin Panel</title>

<body>
  <?php 
      require '_nav.html'
      ?>
  <?php
   if($showAlert)
    {
    echo  '<script type="text/javascript">alert("Account Created Successfully")</script>';
    }
    elseif($showError!=false)
    {
      echo '<script type="text/javascript">alert("'.$showError.'")</script>';
    }
  ?>
  <div class="main">
    <div class="container">
      <h1 class="text-center">SignUp Admin Panel</h1>

      <form action="signup.php" method="post">
        <div class="row">
          <label for="username" >Username</label>
          <div class="get">
            <input type="text"  maxlength="12" id="username" name="username">
          </div>
        </div>
        <div class="row ">
          <label for="password">Password</label>
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


        <button type="submit" class="btn">Sign up</button>
      </form>
    </div>
  </div>
</body>

</html>