<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.css">
    <title>SIGN UP</title>
</head>

<body style="background:#CCC;">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card bg-dark mt-5">
                    <div class="card-title bg-primary text-white mt-5">
                        <h3 class="text-center py-3">SIGN UP</h3>
                    </div>



                    <div class="card-body">
                        <form action="" method="post">
                            <input type="text" name="u_name" placeholder="User Name" class="form-control mb-3" required>
                            <input type="email" name="u_email" placeholder="User Email" class="form-control mb-3" required>
                            <input type="text" name="u_address" placeholder="Address" class="form-control mb-3" required>
                            <input type="tel" name="u_phone" placeholder="phone number" class="form-control mb-3" pattern="[0-9]{10}" required>
                            <input type="password" name="u_password" placeholder=" Password" class="form-control mb-3" required>

                            <button class="btn btn-success mt-3" name="register">REGISTER</button>
                            <a href='../index.php' class="btn btn-success mt-3">Back</a>
                        </form>
                        <?php
                        require_once('connection.php');

                        // Create connection

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        if (isset($_POST['register'])) {


                            $user_name = $_POST['u_name'];
                            $user_emails = $_POST['u_email'];
                            $user_address = $_POST['u_address'];
                            $user_phone = $_POST['u_phone'];
                            $user_password = $_POST['u_password'];


                            $query = "select * from user where user_email='$user_emails'";
                            $run_query = mysqli_query($conn, $query);
                            //Count total number of rows
                            $count = mysqli_num_rows($run_query);


                            if ($count == 0) {

                                $sql = "INSERT INTO user (user_name,user_email,user_address,user_phone,user_password) VALUES ('$user_name','$user_emails','$user_address', '$user_phone','$user_password') ";

                                if ($conn->query($sql) == TRUE) {

                                    echo '<script language="javascript">';
                                    echo 'alert(" successfully registered")';
                                    echo '</script>';
                                    header("location:../index.php");
                                } else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }
                            } else {
                                echo "<h5 style='color: white;'>User already exists. Try new Email Address.</h5>";
                            }
                        }
                        $conn->close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>