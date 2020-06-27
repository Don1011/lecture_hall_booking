<?php
    session_start();
    include("./assets/inc/header.php");
    include("./assets/inc/conn.php");
?>

    <div class="container">
        
        <div class="row">
            <?php
                
                if(isset($_GET['hall']) && isset($_GET['course']) && isset($_GET['time']) && isset($_GET['date']) && isset($_GET['duration'])){
                    $hall = $_GET['hall'];
                    $course = $_GET['course'];
                    $time = $_GET['time'];
                    $date = $_GET['date'];
                    $duration = $_GET['duration'];
                    $class_rep = $_SESSION['class_rep_id'];
                    $date_booked = date("Y-m-d");

                    $sql_course_details = "SELECT * FROM courses_sim WHERE id = '".$course."'";
                    $query_course_details = mysqli_query($conn, $sql_course_details);
                    $fetch_course_details = mysqli_fetch_assoc($query_course_details);
                    $course_code = $fetch_course_details['code'];
                    $course_title = $fetch_course_details['title'];

                    $sql_hall_details = "SELECT * FROM halls WHERE id = '".$hall."'";
                    $query_hall_details = mysqli_query($conn, $sql_hall_details);
                    $fetch_hall_details = mysqli_fetch_assoc($query_hall_details);
                    $hall_name = $fetch_hall_details['name'];

                    $sql_make_booking = "INSERT INTO bookings(class_rep, course_id, duration, class_time, class_date, date_booked, course_code, course_title, hall, hall_name) VALUES('".$class_rep."', '".$course."', '".$duration."', '".$time."', '".$date."', '".$date_booked."', '".$course_code."', '".$course_title."', '".$hall."', '".$hall_name."')";
                    $query_make_booking = mysqli_query($conn, $sql_make_booking);

                    echo "<p class = 'text-success text-center'><b>BOOKING SUCCESSFULLY ADDED. <a href='index.php' class = 'text-danger'>DO YOU WANT TO GO BACK?</a></b></p>";
                }elseif(isset($_GET['booking_id']) && isset($_GET['new_date']) && isset($_GET['new_time']) && isset($_GET['new_hall']) && isset($_GET['new_duration'])){
                    $date = $_GET['new_date'];
                    $time = $_GET['new_time'];
                    $hall = $_GET['new_hall'];
                    $booking_id = $_GET['booking_id'];
                    $duration = $_GET['new_duration'];

                    $sql_hall_details = "SELECT * FROM halls WHERE id = '".$hall."'";
                    $query_hall_details = mysqli_query($conn, $sql_hall_details);
                    $fetch_hall_details = mysqli_fetch_assoc($query_hall_details);
                    $hall_name = $fetch_hall_details['name'];

                    $sql_update = "UPDATE bookings SET duration = '".$duration."', class_time = '".$time."', class_date = '".$date."', hall = '".$hall."', hall_name = '".$hall_name."' WHERE id = '".$booking_id."'";
                    $query_update = mysqli_query($conn, $sql_update);
                    echo "<p class = 'text-success text-center'><b>BOOKING SUCCESSFULLY UPDATED. <a href='index.php' class = 'text-danger'>DO YOU WANT TO GO BACK?</a></b></p>";
                }else{
                    header("location: index.php");
                }
            ?>
            
        </div>
    </div>

<?php
    include("./assets/inc/footer.php");
?>