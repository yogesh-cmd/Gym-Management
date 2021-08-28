<?php
require_once('connection.php');
session_start();
if (isset($_SESSION['email'])) {
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
        select {
            border: 1px solid black;
            border-radius: 15px;
            background-color: rgb(223, 223, 223);
            padding: 10px 35px;
        }
        
        #plantype {
            font-size: 19px;
            width: 45%;
            margin-left: 1%;
            padding: 5px 14px;
        }
        
        #plan {
            display: inline-block;
            font-size: 19px;
            width: 49%;
            margin-left: 16%;
            padding: 5px 14px;
        }
        
        #trainerid {
            font-size: 19px;
            padding: 5px 14px;
            margin-left: 9%;
        }
        
        #gymid {
            font-size: 19px;
            padding: 5px 14px;
            margin-left: 19%;
        }
        
        #btncen {
            text-align: center;
        }
        
        .mbtn {
            font-size: 15px;
            padding: 15px 20px;
            margin: 0px 5px 0px 5px;
        }
        
        .mbtn:hover {
            text-shadow: 0px 0px 1px;
            font-family: 'Baloo Bhai', cursive;
            text-decoration: none;
            color: rgb(255, 255, 255);
            background-color: rgb(14, 16, 66);
            font-weight: 550;
            font-size: 16px;
            padding: 18px 25px;
            border-radius: 35px;
        }
        
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
    </style>

    <body>
        <nav id="navbar">
            <div id="logo">
                <img src="logo.png">
            </div>
            <ul>
                <li class="item"><a href="wellcome.php">Home</a></li>
                <li class="item"><a href="#plans1">Plans</a></li>
                <li class="item"><a href="#aboutus">About US</a></li>
                <li class="item"><a href="#contactus">Contact US</a></li>
                <li class="rimail"><a><?php echo ' ' . $_SESSION['email'] . '<br/>'; ?></a></li>
            </ul>
            <div class="right">
                <?php echo '<a href="logout.php?logout"  class="btn">Logout</a>'; ?>
            </div>
        </nav>

        <section id="home">
            <!-- <h1 class=pcolor>Welcome to World's best <br> Fitness Centre</h1> -->
            <br>
            <form action="" method="POST">
                <label class="memcolor">Plans</label>

                <select id="plan" name="plan" class="memcolor" required>
          <option value="" disabled selected>Select Plan</option>
          <option value="monthly">Monthly</option>
          <option value="quaterly">Quaterly</option>
          <option value="6_months">Half a year</option>
          <option value="yearly">Yearly</option>
        </select>
                <br>
                <br>
                <label class="memcolor">Plan Type</label>
                <select id="plantype" class="memcolor" name="plan_type" required>
          <option value="" disabled selected>plan type</option>
          <option value="gym only">GYM Only</option>
          <option value="cardio only">CARDIO Only</option>
          <option value="gym and cardio">GYM + CARDIO</option>

        </select>
                <br>
                <br>
                <?php
        $query = "SELECT * FROM trainer ";
        $run_query = mysqli_query($con, $query);

        //Count total number of rows
        $count = mysqli_num_rows($run_query);

        //Display states list
        if ($count > 0) {
        ?>
                    <label class="memcolor">Trainer</label>
                    <select id="trainerid" class="memcolor" name="trainer_id" required>
            <option value="" disabled selected>Select Trainer</option>
            <?php
            while ($row = mysqli_fetch_array($run_query)) {

              $trainer_name = $row['trainer_name'];
              $trainer_id = $row['trainer_id'];


              echo "<option value='$trainer_id'>$trainer_name</option>";
            }
            ?>
          </select>
                    <br>
                    <?php

        }



        ?>

                        <?php
        $query = "SELECT * FROM gym ";
        $run_query = mysqli_query($con, $query);

        //Count total number of rows
        $count = mysqli_num_rows($run_query);

        //Display states list
        if ($count > 0) {
        ?>
                            <br>
                            <label class="memcolor">Gym</label>
                            <select id="gymid" class="memcolor" value="gym_id" name="gym_id" required>
            <option value="" disabled selected>select gym</option>
            <?php
            while ($row = mysqli_fetch_array($run_query)) {

              $gym_name = $row['gym_name'];
              $gym_id = $row['gym_id'];



              echo "<option value='$gym_id'>$gym_name</option>";
            }
            ?>
          </select>
                            <?php

        }



        ?>

                                <br> <br><br>
                                <div id="btncen">
                                    <button class="btn btn-success mt-3 bmbtn mbtn" name="submit" value="submit">Submit</button>
                                    <a href='Wellcome.php' class="btn btn-success mt-3 bmbtn mbtn">Back</a>
                                </div>
            </form>

            <?php

      if (isset($_POST['submit'])) {
        $email = $_SESSION['email'];


        $plan = $_POST['plan'];
        $trainer_id = $_POST['trainer_id'];
        $plan_type = $_POST['plan_type'];
        $gym_id = $_POST['gym_id'];




        $query = "SELECT * FROM user where user_email= '$email'";
        $run_query = mysqli_query($con, $query);

        //Count total number of rows
        $count = mysqli_num_rows($run_query);

        //Display states list
        if ($count > 0) {
          while ($row = mysqli_fetch_array($run_query)) {

            $member_id = $row['user_id'];
            $member_name = $row['user_name'];
            $member_address = $row['user_address'];
            $member_mobile = $row['user_phone'];
            $member_email = $row['user_email'];

            $sql11 = "INSERT INTO member (member_id, member_name, member_mobile, member_email, member_address, member_plan,member_plan_type,gym_id,trainer_id)VALUES('$member_id','$member_name','$member_mobile','$member_email','$member_address','$plan','$plan_type','$gym_id','$trainer_id')";
            if ($con->query($sql11) === TRUE) {
              echo '<br><div id="recs" class="pcolor">Congratulation you are Member</div>';
            } else {
              echo '<h5  class="pcolor">Already a Member</h5>';
            }
          }
        }
      }




      ?>
                <p>
                    <h1></h1>
                </p>
                <br><br>

        </section>

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
                    <a href="https://twitter.com" target="_blank" class="soc soc-t"><i class="fa fa-twitter"></i></a>
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
} else {
  header("location:index.php");
}
?>