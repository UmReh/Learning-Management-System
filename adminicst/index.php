<?php
$login=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  include '../_dbconnect.php';
  $username = $_POST["username"];
  $password = $_POST["password"];
  $sql ="Select * from admin where username ='$username'"; 
  $result = mysqli_query($conn, $sql);    
  $num=mysqli_num_rows($result);
  if($num==1)
  {
    while($row=mysqli_fetch_assoc($result))
    {
          if(password_verify($password,$row['password']))
          {
            $login=true;
            // SESSION STARTS 
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['username']=$username;
            // !!REDIRECT TO GIVEN POOAGE AfTER LOGIN
            header("location: dashboard.php");
          }
          else
          {
            $showError="Invalid Credentials!";
          }
    }
  }   
  else
  {
    $showError="Invalid Credentials!";
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
    <title>Login - Admin Panel</title>

<body>
  <?php 
      require '_nav.html'
      ?>
  <?php
   if($showError)
   {
    echo '<script type="text/javascript">alert("'.$showError.'")</script>';

   }
  ?>
  <div class="main">
    <div class="container">
      <h1 class="text-center">Admin Panel Login</h1>

      <form action="index.php" method="post">
        <div class="row">
          <label for="username">Username</label>
          <div class="get">
            <input type="text" class="form-control" id="username" name="username">
          </div>
        </div>
        <div class="row">
          <label for="password">Password</label>
          <div class="get">
            <input type="password" class="form-control" id="password" name="password">
          </div>
        </div>

        <button type="submit" class="btn">Log In</button>
      </form>
    </div>
  </div>
</body>

</html>