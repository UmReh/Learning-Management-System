<?php
require "assets/nav.php";    
include '_dbconnect.php';
    $sql = "select * from course";
    $query=mysqli_query($conn,$sql);
?>

<div class="main-head wfull">Online Admission</div>
<form action="request.php" method="POST" class="stuReg wfull">
    <table>
        <tr>
            <td>Student's Name</td>
            <td><input type="text" name="name" placeholder="Student's Name"></td>
            <td>Course*</td>
            <td>
                <select name="course" id="">
                    <?php while($result=mysqli_fetch_array($query)){?>
                    <option value="<?php echo $result['cname'];?>"><?php echo $result['cname'];?></option>
                    <?php }?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Mother's Name</td>
            <td><input type="text" name="mname"placeholder="Mother's Name"></td>
            <td>Father's Name</td>
            <td><input type="text" name="fname"placeholder="Father's Name"></td>
        </tr>
        <tr>
            <td>Date of Birth</td>
            <td><input type="date" name="dob"placeholder="DOB"></td>
            <td>Gender</td>
            <td>
                <select name="gender" id="">
                    <option value=""selected>Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Adhaar No. </td>
            <td><input type="text" name="adhaar"placeholder="Adhaar no."></td>
            <td>Mobile No. </td>
            <td><input type="text" name="mob"placeholder="Mobile"></td>
        </tr>
        <tr>
            <td>Special Category</td>
            <td>
                <select name="category" id="">
                    <option value=""selected>Select Category</option>
                    <option value="general">General</option>
                    <option value="OBC">OBC</option>
                    <option value="SC / ST">SC / ST</option>
                </select>
            </td>
            <td>Session</td>
            <td>
                <select name="session" id="">
                    <option value=""selected>Select Session</option>
                    <option value="2023-23">2023-24</option>
                    <option value="2024-25">2024-25</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Address</td>
            <td><textarea name="address" id="" cols="30" rows="5" ></textarea></td>
        </tr>
    </table>
    <input class="readmore-btn" type="submit" name="oad"value="Submit">

</form>


<?php require 'assets/footer.php';?>