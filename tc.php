<?php require "assets/nav.php";?>
<?php include '_dbconnect.php';
$found=false;
if(isset($_POST['submit'])){
    $tc="0";
    $course=$_POST['class'];
    $eno=$_POST['eno'];
    $sql = "SELECT * FROM `students` WHERE `eno`='$eno'";
    $query = mysqli_query($conn,$sql);
    $result2=mysqli_fetch_array($query);
    if($result2['cname']==$course){
        $tc=$result2['tc'];
        $found=true;
    }
}
    $sql2 = "SELECT * FROM `course` ";
    $query2 = mysqli_query($conn,$sql2);
?>
<div class="main-head wfull">Get TC</div>

<form action="tc.php" method="POST" class="stuReg wfull">
    <table>
        <tr>
            <th>Select Class : </th>
            <td>
                <select class="form-input c-bord pad20"name="class" id="">
                    <option value=""selected>Select Class</option>
                    <?php while($result=mysqli_fetch_array($query2)){ ?>
                    <option value="<?php echo $result['cname'];?>"><?php echo $result['cname'];?></option>
                    <?php }?>
          
                </select>
            </td>
        </tr>
        <tr class=" resp-al-rt ">
            
            <th>Enrolment Number : </th>
            
            <td><input class="form-input c-bord pad20 "type="text" name="eno" Placeholder="Admission No."></td>
            
        </tr>
        <tr>
            <th> <input type="submit" name="submit" value="View TC"  class="readmore-btn"></th>
        </tr>
    </table>
   
</form>
<?php 
if($found){
    if($result2['tc']!="0"){
?>
<table class="display">
    <thead>
        <tr>
            <th>En. No.</th>
            <th>Name</th>
            <th>Class</th>
            <th>Sem / Year</th>
            <th>TC</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $result2['eno'];?></td>
            <td><?php echo $result2['name'];?></td>
            <td><?php echo $result2['cname'];?></td>
            <td><?php echo $result2['year'];?></td>
            <td><a href="tc/<?php echo $result2['tc'];?>"class="readmore" target="blank">Click Here</a></td>
        </tr>
    </tbody>
</table>
<?php }
else{
    echo "<script>alert('TC not found');</script>";
}
}?>
<?php require "assets/footer.php";?>