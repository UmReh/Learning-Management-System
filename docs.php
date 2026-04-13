<?php require "assets/nav.php";?>
<?php include '_dbconnect.php';
    $sql2 = "SELECT * FROM `docs` ";
    $query2 = mysqli_query($conn,$sql2);
    $i=1;
?>
<div class="main-head wfull">College Documents</div>

<table class="display">
    <thead>
        <tr>
            <th>S. No.</th>
            <th>Information</th>
            <th>Document</th>
        </tr>
    </thead>
    <tbody>
    <?php while($result=mysqli_fetch_array($query2)){ 
        ?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $result['name'];?></td>
            <td><a href="docs/<?php echo $result['docs'];?>" target="blank" class="readmore">Click Here</a></td>
        </tr>
        <?php }?>
    </tbody>
</table>




<?php require "assets/footer.php";?>