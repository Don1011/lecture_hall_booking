<?php 
    session_start();
    include("./assets/inc/conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture Hall Booking</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>
<body>
    
    <div class = "container">
        <div class="row justify-content-md-center text-center">
            <form action="index.php" method = "POST" class = "login-form">
                <div>
                    <h1>Login</h1>
                </div>
                <?php
                    if(isset($_POST['email']) && isset($_POST['password'])){
                        if(!empty($_POST['email']) && !empty($_POST['password'])){
                            $email = $_POST['email'];
                            $pass = $_POST['password'];

                            $sql_student = "SELECT * FROM students_sim WHERE email = '".$email."' OR matric_number = '".$email."'";
                            $query_student = mysqli_query($conn, $sql_student);
                            if(mysqli_num_rows($query_student)){
                                $fetch_password = mysqli_fetch_assoc($query_student);
                                if($fetch_password['password'] == $pass){
                                    $_SESSION['student_id'] = $fetch_password['id'];
                                    header("location: home.php");
                                }else{
                                    echo "<p class = 'text-danger'>Wrong Password.</p>";
                                }
                            }else{
                                $sql_staff = "SELECT * FROM staff_sim WHERE email = '".$email."'";
                                $query_staff = mysqli_query($conn, $sql_staff);
                                if(mysqli_num_rows($query_staff)){
                                    $fetch_password = mysqli_fetch_assoc($query_staff);
                                    if($fetch_password['password'] == $pass){
                                        $_SESSION['staff_id'] = $fetch_password['id'];
                                        header("location: ./staff/");
                                    }else{
                                        echo "<p class = 'text-danger'>Wrong Password.</p>";
                                    }
                                }else{
                                    echo "<p class = 'text-danger'>Unrecognized login details.</p>";
                                }
                            }
                        }
                    }
                ?>
                <div>
                    <input type="text" name="email" id="email" class = "form-control" placeholder = "Enter Email/Matric number">
                </div>
                <div>
                    <input type="password" name="password" id="password" class = "form-control" placeholder= "Enter Password">
                </div>
                <div>
                    <button class = "btn btn-outline-light my-background">Login</button>
                </div>
                <div>
                    <a href = "class_rep.php" class = "btn btn-outline-light my-background text-light" >Login as class rep</a>
                </div>
            </form>
        </div>
    </div>

    <script src= "./assets/bootstrap/js/bootstrap.js"></script>
    <script src= "./assets/js/jquery-3.4.1.js"></script>
    <script src= "./assets/js/script.js"></script>
    <script src= "./assets/js/common.min.js"></script>
    <script src= "./assets/js/custom.min.js"></script>
    <script src= "./assets/js/settings.js"></script>
    <script src= "./assets/js/gleek.js"></script>
    <script src= "./assets/js/styleSwitcher.js"></script>
</body>
</html>