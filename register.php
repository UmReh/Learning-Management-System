<?php
    require "assets/nav.php";
    include '_dbconnect.php';
    $sql2 = "SELECT * FROM `course` ";
    $query2 = mysqli_query($conn,$sql2);
?>

<div class="main-head wfull">Register Student</div>
<form action="request.php" class="stuReg" method="POST">
    <table>
        <tr>
            <td>Student Name</td>
            <td><input type="text" name="name" placeholder="Name"></td>
        </tr>
        <tr>
            <td>Course</td>
            <td>
                <select name="cname" id="">
                    <option value="" selected>Select Course</option>
                    <?php while($result=mysqli_fetch_array($query2)){ ?>
                    <option value="<?php echo $result['cname'];?>"><?php echo $result['cname'];?></option>
                    <?php }?>
                </select>
            <td>
        </tr>
        <tr>
            <td>Year / Semester</td>
            <td>
                <select name="year" id="">
                    <option value="" selected>Select Year / Semester</option>
                    <option value="First">First</option>
                    <option value="Second">Second</option>
                    <option value="Third">Third</option>
                    <option value="Fourth">Fourth</option>
                    <option value="Fifth">Fifth</option>
                    <option value="Sixth">Sixth</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Session</td>
            <td>
                <select name="session" id="">
                    <option value="" selected>Select Session</option>
                    <option value="2022-23">2022-2023</option>
                    <option value="2023-24">2023-2024</option>
                    <option value="2024-25">2024-2025</option>
                    <option value="2025-26">2025-2026</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Enrolment No. </td>
            <td><input type="text" name="eno" placeholder="Enrol No."></td>
        </tr>
        <tr>
            <td>Mobile No.</td>
            <td><input type="text" name="mob"placeholder="Mobile"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" placeholder="Password"></td>
        </tr>
        <tr>
        <td></td>
        <td><input class="readmore-btn" type="submit" name="reg_stu" value="Register"></td>
        </tr>
    </table>
</form>


<?php require 'assets/footer.php';?>
</body>
</html>