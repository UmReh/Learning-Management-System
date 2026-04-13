<?php require "assets/nav.php";?>
<?php include '_dbconnect.php';
    $sql2 = "SELECT * FROM `course` ";
    $query2 = mysqli_query($conn,$sql2);
?>
<div class="main-head wfull">All Courses</div>

<table class="display">
    <thead>
        <tr>
            <th>Course Name</th>
            <th>Subjects</th>
            <th>Fees</th>
            <th>Practical Fees</th>

        </tr>
    </thead>
    <tbody>
    <?php while($result=mysqli_fetch_array($query2)){ 
        ?>
        <tr>
            <td><?php echo $result['cname'];?></td>
            <td><?php echo $result['subjects'];?></td>
            <td><?php echo $result['fee'];?></td>
            <td><?php echo $result['pfee'];?></td>
           
        </tr>
        <?php }?>
    </tbody>
</table>




<?php require "assets/footer.php";?>