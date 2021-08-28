<?php
session_start();
require_once('connection.php');
if (isset($_SESSION['email'])) {


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="bootstrap.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Fitness</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" media="screen and (max-width: 1170px)" href="../css/phone.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Bree+Serif&display=swap" rel="stylesheet">
    </head>
    <style>
        body {
            background-color: rgba(0, 0, 0, 0.1);
        }
        
        .cbtn {
            margin-top: 3%;
            text-align: center;
        }
        
        h1 {
            text-align: center;
            margin-top: 5%;
            height: 2%;
        }
        
        table,
        td,
        tr,
        th {
            padding: 7px;
            border: 2px solid black;
        }
        
        table {
            margin-left: 1px;
        }
    </style>

    <body>
        <nav id="navbar">
            <div id="logo">
                <img src="../logo.png">
            </div>
            <ul>

                <li class="rimail"><a><?php echo ' ' . $_SESSION['email'] . '<br/>'; ?></a></li>
            </ul>
            <div class="rightc">
                <?php echo '<a href="logout.php?logout"  class="btn">Logout</a>'; ?>
            </div>
        </nav>

        <section id="homee">


            <?php


            $query = "select * from member ";
            $run_query = mysqli_query($con, $query);

            //Count total number of rows
            $count = mysqli_num_rows($run_query);

            //Display states list
            if ($count > 0) {
            ?>

                <p>
                    <h1>Member Details</h1>
                </p>
                <table style="width:100%">
                    <tr>
                        <th>&nbsp;&nbsp;&nbsp;MEMBER ID</th>
                        <th>MEMBER NAME</th>
                        <th>MEMBER MOBILE</th>
                        <th>MEMBER EMAIL</th>
                        <th>MEMBER ADDRESS</th>
                        <th>MEMBER PLAN</th>
                        <th>MEMBER PLAN TYPE</th>
                        <th>GYM ID</th>
                        <th>TRAINER ID</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($run_query)) {
                        $member_id = $row['member_id'];
                        $member_name = $row['member_name'];
                        $member_mobile = $row['member_mobile'];
                        $member_email = $row['member_email'];
                        $member_address = $row['member_address'];
                        $member_plan = $row['member_plan'];
                        $member_plan_type = $row['member_plan_type'];
                        $gym_id = $row['gym_id'];
                        $trainer_id = $row['trainer_id'];
                    ?>



                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;
                                <?php echo $member_id;   ?>
                            </td>
                            <td>
                                <?php echo  $member_name;   ?>
                            </td>
                            <td>
                                <?php echo $member_mobile;   ?>
                            </td>
                            <td>
                                <?php echo $member_email;   ?>
                            </td>
                            <td>
                                <?php echo $member_address;   ?>
                            </td>
                            <td>
                                <?php echo $member_plan;   ?>
                            </td>
                            <td>
                                <?php echo $member_plan_type;   ?>
                            </td>
                            <td>
                                <?php echo $gym_id;   ?>
                            </td>
                            <td>
                                <?php echo $trainer_id;   ?>
                            </td>

                        </tr>

                        <br>





                        <?php
                    }
                    ?>

                </table>
                <div class="cbtn">
                    <a href='Wellcome.php' style="font-size: 20px;" class="btn btn-success mt-3">Back</a>
                </div>
                <?php

            } else {
                header("NO MEMBER");
            }




            ?>


        </section>
        <br><br><br><br><br><br><br><br><br><br><br>



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