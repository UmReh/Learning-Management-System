<?php require "assets/nav.php";
include '_dbconnect.php';
$sql="select * from gallery";
$query = mysqli_query($conn,$sql);
?>
<div class="main-head wfull">Jamia Hamdard Gallery</div>


<div class="gallery wfull">
<secion id="portfolio">

<?php while($result=mysqli_fetch_array($query)){ ?>
        <div class="project">
            <img src="gal-img/<?php echo $result['img'];?>" alt="" class="project-image">
            <div class="grid-overlay">
                <button class="viewbutton">View More</button>
            </div>
        </div>
        <?php }?>
        <div class="overlay">
            <div class="overlay-inner">
                <img src="" alt="">
                <button class="close">Close X</button>
            </div>
        </div>
    
    
    </secion>
    </div>
<?php require "assets/footer.php";?>