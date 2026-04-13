<?php require "assets/nav.php"?>
<?php 
    include '_dbconnect.php';
    $sql = "SELECT * FROM `notice` ";
    $query = mysqli_query($conn,$sql);

?>
 <div class="main-head wfull">Notices & Events</div>
<div class="notice-page">  
    <div class="notices">
        <div class="heading pad20">Important Notices</div>
       <?php while($result=mysqli_fetch_array($query)){?>
        <div class="notice-date date"><p><?php echo $result['dt'];?></p></div>
        <div class="notice">
            <div class="notice-content">
                <div class="notice-head"><?php echo $result['notice'];?></div>
                <div class="notice-txt"><?php echo $result['detail'];?></div>
           
                <a href="<?php echo $result['link'];?>">Click Here</a>
            </div>
        </div>
        <?php }?>
    </div>


    <div class="events">
        <div class="heading pad20">Upcoming Events</div>
        <div class="event-row">
            <div class="event-dt">
                <div class="event-date">
                    <h3>20</h3>
                    <p>May 2024</p>
                </div>
                <div class="event-time">
                    <p>9:00 AM</p>
                </div>
            </div>
            <div class="event">
                    <h3>Cricket Tournament</h3>
                    <p>Venue : Hamdard Cricket ground</p>
            </div>
        </div>
        <div class="event-row">
            <div class="event-dt">
                <div class="event-date">
                    <h3>26</h3>
                    <p>Jan 2024</p>
                </div>
                <div class="event-time">
                    <p>7:00 AM</p>
                </div>
            </div>
            <div class="event">
                    <h3>Republic day Flag Hoisting</h3>
                    <p>Republic day Flag Hoisting cremeony will be held in the auditorium of campus</p>
            </div>
        </div>
    </div>    
</div>
<?php require "assets/footer.php"?>