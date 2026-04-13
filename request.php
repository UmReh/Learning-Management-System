<?php
 include '_dbconnect.php';
 if(isset($_POST['reg_stu'])){

    $name=$_POST['name'];
    $cname=$_POST['cname'];
    $year=$_POST['year'];
    $session=$_POST['session'];
    $eno=$_POST['eno'];
    $mob=$_POST['mob'];
    $password=$_POST['password'];
    $sql = "INSERT INTO `students` (`name`, `password`, `cname`, `year`, `session`, `eno`, `mobile`) VALUES ('$name', '$password', '$cname', '$year', '$session', '$eno', '$mob')";
    $query=mysqli_query($conn,$sql);
    if($query){
    echo '<script type="text/javascript">alert("Registered Successfully !")</script>';
    header("location:register.php");
    }
    else{
        echo '<script type="text/javascript">alert("Registered FAILEd !")</script>'; 
    }
}
if(isset($_POST['status'])){
    $id=$_GET['id'];
    $act=$_GET['act'];
    if($act==1){
        $ch=0;
    }
    else{
        $ch=1;
    }
    $sql = $sql="UPDATE `students` SET `status` = '$ch'WHERE `students`.`sno` = $id";
    $query=mysqli_query($conn,$sql);
    if($query){
        header("location:adminicst/students.php");
    }
    else{
        echo '<script type="text/javascript">alert("Unable to change status !")</script>'; 
    }
}

if(isset($_POST['oad'])){

    $name=$_POST['name'];
    $course=$_POST['course'];
    $session=$_POST['session'];
    $fname=$_POST['fnmae'];
    $mname=$_POST['mname'];
    $mob=$_POST['mob'];
    $gender=$_POST['gender'];
    $adhaar=$_POST['adhaar'];
    $dob=$_POST['dob'];
    $address=$_POST['address'];
    $category=$_POST['category'];
    $sql = "INSERT INTO `admission` (`name`, `course`, `session`, `fname`, `mname`, `dob`, `mob`, `gender`, `adhaar`, `address`, `category`) VALUES ('$name', '$course', '$session', '$fname', '$mname', '$dob', '$mob', '$gender', '$adhaar', '$address', '$category')";
    $query=mysqli_query($conn,$sql);
    if($query){
    echo '<script type="text/javascript">alert("Registered Successfully !")</script>';
    header("location:oad.php");
    }
    else{
        echo '<script type="text/javascript">alert("Registration FAILEd !")</script>'; 
    }
}
?>