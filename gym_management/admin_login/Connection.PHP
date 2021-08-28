
<?php
 
    $con=mysqli_connect('localhost','root','','gym');
 
    if(!$con)
    {
        die(' Please Check Your Connection'.mysqli_error($con));
    }
?>