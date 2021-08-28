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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" media="screen and (max-width: 1170px)" href="../css/phone.css">
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
</style>
<body>
    <nav id="navbar">
        <div id="logo">
            <img src="../logo.png">
        </div>
        
        <ul>
            <li class="rimail"><a><?php echo ''. $_SESSION['email'].'<br/>'; ?></a></li>
        </ul>

        <div class="right">
            <?php echo '<a href="logout.php?logout"  class="btn">Logout</a>'; ?>
        </div>
    </nav>

    <section id="home">

    <?php
    $user = $_SESSION["email"];
    $query = "SELECT member_email FROM member WHERE member_email='$user'";
  $run_query = mysqli_query($con, $query);
    
    //Count total number of rows
    $count = mysqli_num_rows($run_query);
    
    //Display states list
    if($count > 0){
         while($row = mysqli_fetch_array($run_query)){

            ?>

            <br><br><br><br><h1>You are Member</h1><br><br><br><br>
        
        <br><br>
</section>


<?php
}
}
else
{

    ?>
        <!-- <h1 class=pcolor>Welcome to World's best <br> Fitness Centre</h1> -->
        <br><br><br><br>
        <a href="view_member.php" class="bmbtn">VIEW MEMBERS</a>
        <br><br>
        <a href="add_trainer.php" class="bmbtn">ADD TRAINER</a>
        <br><br>
        <a href="add_gym.php" class="bmbtn">ADD GYM</a>
    </section>
<?php

}
?>
    

    <footer>
        <div class="mid">
            <p>Our Address:<br> 1201, Panchavati, Yari Road, Andheri(w),lokhandwala, Andheri(w),
            Mumbai-87, Maharashtra,India <br><br>
            Email :Fitness@gmail.com <br><br>
            Contact: +91 98078 56765 <br>
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