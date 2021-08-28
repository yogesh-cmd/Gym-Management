
<?php
require_once('connection.php');

// Create connection

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['register']))
{


$user_name=$_POST['u_name'];
$user_email=$_POST['u_email'];
$user_address=$_POST['u_address'];
$user_phone=$_POST['u_phone'];
$user_password=$_POST['u_password'];

$sql = "INSERT INTO user (user_name,user_email,user_address,user_phone,user_password)
VALUES ('$user_name','$user_email','$user_address', '$user_phone','$user_password') ";

if ($conn->query($sql) === TRUE) {
 
  echo '<script language="javascript">';
  echo 'alert(" successfully registered")';
  echo '</script>';
  header("location:../index.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

}
$conn->close();
?>

