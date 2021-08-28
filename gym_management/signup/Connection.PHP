
<?php
 
    $conn=mysqli_connect('localhost','root','','gym');
 
    if(!$conn)
    {
        die(' Please Check Your Connection'.mysqli_error($conn));
    }
?>
