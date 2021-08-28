<?php
    session_start();
    require_once('connection.php');
    if(isset($_SESSION['email']))
    {
        

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Fitness</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" media="screen and (max-width: 1170px)" href="css/phone.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Bree+Serif&display=swap" rel="stylesheet">
    </head>
    <style>
        .rimail {
            position: absolute;
            right: 6%;
            top: 25%;
            color: white;
            display: block;
            padding: 3px 22px;
            border-radius: 20px;
            text-decoration: none;
        }
        
        .container {
            color: rgb(1, 0, 61);
            border: 2px solid black;
            border-radius: 20px;
            padding: 0px 15px 0px 15px;
            text-align: center;
        }
    </style>

    <body>
        <nav id="navbar">
            <div id="logo">
                <img src="logo.png">
            </div>
            <ul>
                <li class="item"><a href="#home">Home</a></li>
                <li class="item"><a href="#plans1">Plans</a></li>
                <li class="item"><a href="#aboutus">About US</a></li>
                <li class="item"><a href="#contactus">Contact US</a></li>
                <li class="rimail"><a><?php echo '' . $_SESSION['email'].'<br/>'; ?></a></li>
            </ul>
            <div class="right">
                <?php echo '<a href="logout.php?logout"  class="btn">Logout</a>'; ?>
            </div>
        </nav>

        <section id="home">

            <?php
    $user = $_SESSION["email"];
    $query = "SELECT * FROM member WHERE member_email='$user'";
  $run_query = mysqli_query($con, $query);
    
    //Count total number of rows
    $count = mysqli_num_rows($run_query);
    
    //Display states list
    if($count > 0){
         while($row = mysqli_fetch_array($run_query)){





  $run_query = mysqli_query($con, $query);
    
    //Count total number of rows
    $count = mysqli_num_rows($run_query);
    
    //Display states list
    if($count > 0){
      while($row = mysqli_fetch_array($run_query)){
         
                $member_id=$row['member_id'];
                $member_name=$row['member_name'];
                $member_mobile=$row['member_mobile'];
                $member_email=$row['member_email'];
                $member_address=$row['member_address'];
                $member_plan=$row['member_plan'];
                $member_plan_type=$row['member_plan_type'];
                $gym_id=$row['gym_id'];
                $trainer_id=$row['trainer_id'];

            ?>
                <div class="container">
                    <br>
                    <h1>Your Membership Details:</h1><br><br><br>

                    <h2>Member ID:-
                        <?php echo $member_name;  ?>
                    </h2><br>
                    <h2>NAME:-
                        <?php echo $member_mobile;  ?>
                    </h2><br>
                    <h2>EMAIL:-
                        <?php echo $member_email;  ?>
                    </h2><br>
                    <h2>ADDRESS:-
                        <?php echo $member_address;  ?>
                    </h2><br>
                    <h2>PLAN:-
                        <?php echo $member_plan;  ?>
                    </h2><br>
                    <h2>PLAN TYPE:-
                        <?php echo $member_plan_type;  ?>
                    </h2><br>
                    <h2>GYM ID:-
                        <?php echo $gym_id;  ?>
                    </h2><br>
                    <h2>TRAINER ID:-
                        <?php echo $trainer_id;  ?>
                    </h2><br>
                </div>

                <?php

           


           
            
        }
    }

            ?>


                    <br><br>
        </section>


        <?php
}
}
else
{

    ?>
            <!-- <h1 class=pcolor>Welcome to World's best <br> Fitness Centre</h1> -->
            <br><br><br><br><br><br><br><br>
            <p>
                <h1>Join Our Membership:</h1>
            </p>
            <br><br>
            <a href="member.php" class="bmbtn">Become Member</a>
            </section>
            <?php

}
?>
                <section id="plans1">
                    <h1 class="pcolor">Our Plans</h1>
                    <div id="plans">
                        <div class="box">
                            <img src="img/1.png" alt="">
                            <h2 class="scolor">Only Cardio</h2>
                            <p class="center">This plan contains only Cardio</p>
                        </div>
                        <div class="box">
                            <img src="img/2.png" alt="">
                            <h2 class="scolor">Gym Workout</h2>
                            <p class="center">This plan contains only Gym Workout</p>
                        </div>
                        <div class="box">
                            <img src="img/3.png" alt="">
                            <h2 class="scolor">Cardio + Gym</h2>
                            <p class="center">This plan contains Cardio + Gym Workout.</p>
                        </div>
                    </div>
                </section>
                <hr>
                <!-- About us section -->
                <section id="aboutus">
                    <h1 class="pcolor">About US</h1>
                    <div id="about">
                        <div id="plans">
                            <div class="box">
                                <img src="img/4.png" alt="">
                                <h2 class="scolor">Bodybuilding</h2>
                                <p class="center">Best bodybuilding tips with 10+ years of trainers in coaching.</p>
                            </div>
                            <div class="box">
                                <img src="img/5.png" alt="">
                                <h2 class="scolor">Gym Equipments</h2>
                                <p class="center">We have all Basic & Advanced Equipments required for bodybuilding,so you need not have to go anywhere.</p>
                            </div>
                            <div class="box">
                                <img src="img/6.png" alt="">
                                <h2 class="scolor">Weight loss</h2>
                                <p class="center">We have done weight loss among many.Be one of them. </p>
                            </div>
                        </div>
                    </div>

                </section>

                <section id="contactus">
                    <h1 class="pcolor">Contact Us</h1>
                    <div id="contactb">

                        <div class="formgroup">

                            <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdyE_wHN5J51jCD_zsFDIpnT7GIlTemNAXPU0kLguUnSezWxA/viewform?embedded=true" width="500" height="500" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
                        </div>

                    </div>
                </section>

                <footer>
                    <div class="mid">
                        <p>Our Address:<br> 1201, Panchavati, Yari Road, Andheri(w),lokhandwala, Andheri(w), Mumbai-87, Maharashtra,India <br><br> Email :Fitness@gmail.com <br><br> Contact: +91 98078 56765 <br>
                            <br>
                        </p>
                        <div class="social">
                            <a href="https://facebook.com" target="_blank" class="soc soc-f"><i class="fa fa-facebook"></i></a>
                            <a href="https://twitter.com" target="_blank" class="soc soc-t"><i class="fa fa-twitter" ></i></a>
                            <a href="https://youtube.com" target="_blank" class="soc soc-y"><i class="fa fa-youtube"></i></a>
                            <a href="https://instagram.com" target="_blank" class="soc soc-i"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="center">
                        Copyright &copy; www.Fitness.com. All rights reserved!
                    </div>
                </footer>
    </body>

    </html>
    <?php

 }
    else
    {
        header("location:index.php");
    }


?>