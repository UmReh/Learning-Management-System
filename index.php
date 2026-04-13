<?php require "assets/nav.php";
?>
<?php include '_dbconnect.php';
    $sql2 = "SELECT * FROM `course` ";
    $query2 = mysqli_query($conn,$sql2);
    $sql="select * from slideshow";
    $query = mysqli_query($conn,$sql);
    $sql3 = "SELECT * FROM `notice` ";
    $query3 = mysqli_query($conn,$sql3);
    $sql4 = "SELECT * FROM `notice` ";
    $query4 = mysqli_query($conn,$sql4);
?>
<div class="owl-carousel owl-theme ban">

<?php while($result=mysqli_fetch_array($query)){ ?>
    <div class="item">
        <div class="banner">
            <img class="ban-img" src="slideshow/<?php echo $result['img'];?>" alt="">
        </div>
    </div> 
    <?php }?>
</div>
<div class="notice-bar flex cont-center wfull">
    <marquee  class="w80 th-bl " direction="left" scrollamount="5" onmouseover="this.stop()" onmouseout="this.start()">
        <ul class="flex">
        <?php while($result=mysqli_fetch_array($query3)){?>
            <li class="">
                <a class="f-wh " href="<?php echo $result['link'];?>"><?php echo $result['notice'];?></a>
            </li>
            <?php }?>
        </ul>
    </marquee>
</div> 
<div class="c-row wfull flex">
<a href="student/">
    <div class="card z-1 sh-left flex-col">
        <i class="fas i fa-user-graduate"></i>
        <div class="card-body">
            <h4 class="card-title">Student Portal</h4>
        </div>
        <i class="fas active-i fa-long-arrow-alt-right"></i>
    </div>
    </a>
    <a href="staff/">
    <div class="card z1 sh-left flex-col">
    <i class="fas i fa-chalkboard-teacher"></i>
        <div class="card-body">
            <h4 class="card-title">Teacher Portal</h4>
        </div>
        <i class="fas active-i fa-long-arrow-alt-right"></i>
    </div>
    </a>
    <a href="oad.php">
    <div class="card zup sh-center flex-col">
    <i class="fas i fa-chalkboard-teacher"></i>
        <div class="card-body">
            <h4 class="card-title">Online Admission</h4>
        </div>
        <i class="fas active-i fa-long-arrow-alt-right"></i>
    </div>
    </a>
    <a href="notices.php">
    <div class="card z1 sh-right flex-col">
    <i class="fas i fa-chalkboard-teacher"></i>
        <div class="card-body">
            <h4 class="card-title">Notices</h4>
        </div>
        <i class="fas active-i fa-long-arrow-alt-right"></i>

    </div>
    </a>
    <a href="tc.php">
    <div class="card z-1 sh-right flex-col">
    <i class="fas i fa-award"></i>
        <div class="card-body">
            <h4 class="card-title">Get TC</h4>
        </div>
        <i class="fas active-i fa-long-arrow-alt-right"></i>
    </div>
    </a>
</div>
<section class="content fw text-center">
    <div class="flex">
        <div class="cnt cont-full">
            <div class="heading ">Welcome to Jamia Hamdard</div>
            <div class="text ">The history of Jamia Hamdard begins with the establishment of a small Unani clinic in the year 1906 by Hakeem Hafiz Abdul Majeed, one of the well-known practitioners of Unani System of Medicine of his time. Hakeem Hafiz Abdul Majeed had a vision of making the practice of Unani Medicine into a scientific discipline so that Unani medicines could be dispensed in a more efficacious manner to patients. He gave the name “Hamdard” to his venture which means “sympathy for all and sharing of pain”. His illustrious son, Hakeem Abdul Hameed, carried forward the philosophy and objectives of Hamdard in independent India. Even at the time of partition of India in 1947, Hakeem Abdul Hameed was dreaming of setting up a complex of educational institutions which would concentrate on highlighting the contribution of Islam and Islamic culture to Indian civilization and development of Unani medicines for ... <a href="about.php">Read More</a></div>
            <!-- <a href="" class="readmore-btn">Read More</a> -->
        </div>
        <div class="sec-half wfull">
        <div class="date"><p> News & Events</p></div>
            <div class="newsletter">
                <marquee direction="up" scrollamount="3" onmouseover="this.stop()" onmouseout="this.start()">
                    <ul>
                    <?php while($result4=mysqli_fetch_array($query4)){?>
                        <li>
                            <hr>
                            <p class="news" ><?php echo $result4['notice'];?> </p>
                            <a href="<?php echo $result4['link'];?>" class="readmore">Click Here</a>
                        </li>
                            <?php }?>  
                    </ul>
                </marquee>
            </div>

        </div>
    </div>
    <div class="flex cont-full fw">
        <div class="message flex-col cont-center">
            <div class="img"><img src="img/USAMA.jpg" alt=""></div>
            <div class="cont">
                <div class="cont-int  flex-col cont-center">
                    <div class="heading">Vice Chancellor's Message</div>
                    <div class="text">Professor Mohammad Afshar Alam completed his Post graduation in MCA (Master of Computer ... </div>
                    <a href="message.php" class="readmore">Read More</a>
                </div>
            </div>
        </div>
        <div class="message flex-col cont-center">
            <div class="img"><img src="img/USAMA.jpg" alt=""></div>
            <div class="cont">
                <div class="cont-int  flex-col cont-center">
                    <div class="heading">Chancellor's Message</div>
                    <div class="text">As one of the founding members of Hamdard National Foundation at its inception in 1964... </div>
                    <a href="message.php" class="readmore">Read More</a>
                </div>
            </div>
        </div>
        
    </div>
</section>
<section class="courses owl-carousel owl-theme">
<?php while($result=mysqli_fetch_array($query2)){ ?>
    <div class="item">
        <div class="card course sh-center flex-col">
        <i class="fas i fa-briefcase"></i>
            <div class="card-body">
                <h4 class="card-title"><?php echo $result['cname'];?></h4>
            </div>
            <table class="course active-i">
                <tr>
                    <th>Subjects</th>
                    <td><?php echo $result['subjects'];?></td>
                </tr>
                <tr>
                    <th>Fees</th>
                    <td><?php echo $result['fee'];?></td>
                </tr>
            </table>
        </div>
    </div>
    <?php }?>
</section>


<?php require "assets/footer.php";?>