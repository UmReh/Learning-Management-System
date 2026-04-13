<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
  header("location: login.php");
  exit;
}
include '../_dbconnect.php';
$id=$_GET['id'];
if($id=="student"){
$sql2 = "SELECT * FROM `students` ";
$query2 = mysqli_query($conn,$sql2);
$i=1;
$html='<table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Course</th>
                <th>Sem / Year</th>
                <th>Session</th>
                <th>Enrollment</th>
                <th>Mobile</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>';
while($result=mysqli_fetch_array($query2)){
    $html.='<tr>
    <td>'. $result['name'] .'</td>
    <td>'. $result['cname'] .'</td>
    <td>'. $result['year'] .'</td>
    <td>'. $result['session'] .'</td>
    <td>'. $result['eno'] .'</td>
    <td>'. $result['mobile'] .'</td>
    <td>'. $result['status'] .'</td>
    </tr>';
}
$html.='</tbody></table>';
header("Content-Type:application/xls");
header("Content-Disposition:attachment;filename=student-report.xls");
echo $html;
}











if($id=="teacher"){
$sql2 = "SELECT * FROM `staff` ";
$query2 = mysqli_query($conn,$sql2);
$i=1;
$html='<table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>';
while($result=mysqli_fetch_array($query2)){
    $html.='<tr>
    <td>'. $result['name'] .'</td>
    <td>'. $result['username'] .'</td>
    <td>'. $result['password'] .'</td>';
}
$html.='</tbody></table>';
header("Content-Type:application/xls");
header("Content-Disposition:attachment;filename=staff-report.xls");
echo $html;
}




if($id=="admission"){
$sql2 = "SELECT * FROM `admission` ";
$query2 = mysqli_query($conn,$sql2);
$i=1;
$html='<table>
        <thead>
        <tr>
        <th>Student Name</th>
        <th>Course</th>
        <th>Session</th>
        <th>Mobile</th>
        <th>Father\'s Name</th>
        <th>Mother\'s Name</th>
        <th>Adhaar No.</th>
        <th>Date Of Birth</th>
        <th>Gender</th>
        <th>Category</th>
        <th>Address</th>
        <th>Delete</th>
    </tr>
        </thead>
        <tbody>';
while($result=mysqli_fetch_array($query2)){
    $html.='<tr>
    <td>'. $result['name'] .'</td>
    <td>'. $result['course'] .'</td>
    <td>'. $result['session'] .'</td>
    <td>'. $result['mob'] .'</td>
    <td>'. $result['fname'] .'</td>
    <td>'. $result['mname'] .'</td>
    <td>'. $result['adhaar'] .'</td>
    <td>'. $result['dob'] .'</td>
    <td>'. $result['gender'] .'</td>
    <td>'. $result['category'] .'</td>
    <td>'. $result['address'] .'</td>';
}
$html.='</tbody></table>';
header("Content-Type:application/xls");
header("Content-Disposition:attachment;filename=admission-report.xls");
echo $html;
}

?>