<?php
    session_start();
    require_once('connection.php');
    if(isset($_SESSION['email']))
    {
        

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

<body>
    <nav id="navbar">
        <div id="logo">
            <img src="../logo.png">
        </div>
        <ul>
            
            <li class="rimail"><a><?php echo '' . $_SESSION['email'].'<br/>'; ?></a></li>
        </ul>
        <div class="rightc">
            <?php echo '<a href="logout.php?logout"  class="btn">Logout</a>'; ?>
        </div>
    </nav>

    <section id="home">

<p><h1>Add Trainer</h1></p>

    <form action="" method="post">
        <div class="form-group">
        <input style="border-radius: 10px;" id='name'  class="form-control" name="name" placeholder="Trainer name" required></input>
    </div>
        <div class="form-group">
        <input style="border-radius: 10px;" id='mobile' class='form-control' name='mobile' placeholder="Trainer mobile No"  required></input>
    </div>
        <div class="form-group">

        <input style="border-radius: 10px;" id='email' class='form-control' name='email' placeholder="Trainer email" required></input>
    </div>
        
        <button class="btn btn-success mt-3" name="submit"  class="bmbtn" value="submit">Add Member</button>
        <a href='wellcome.php' class="btn btn-success mt-3" >Back</a>
   
    </form>
    <?php
    if(isset($_POST['submit']))
    {

        $name=$_POST['name'];
        $mobile=$_POST['mobile'];
        $email=$_POST['email'];

        $sql = "INSERT INTO trainer (trainer_name,trainer_email,trainer_mobile)
VALUES ('$name','$email','$mobile') ";

if ($con->query($sql) === TRUE) {

    echo "<p><h1>Trainer Added " .$name."</h1></p>";
        
    }

}

    ?>
       
       
    </section>

    

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