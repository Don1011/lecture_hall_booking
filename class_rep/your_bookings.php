<?php
    session_start();
    include("./assets/inc/header.php");
    include("./assets/inc/conn.php");
?>

    <div class="container">
        <div class="row text-center">
            <h3 style = "width: 100%">Your Bookings</h3>
        </div>
        <!-- For normal display on page load -->
        <div class="row" id = "display">
            <?php
                $sql_show_all = "SELECT * FROM bookings WHERE class_rep = '".$_SESSION['class_rep_id']."' ORDER BY id DESC";
                $query_show_all = mysqli_query($conn, $sql_show_all);
                while($fetch_all = mysqli_fetch_assoc($query_show_all)):
            ?>
            <!-- Start Of Single Booking -->
            <div class='col-md-6 col-lg-3 margin-20'>
                <div class='card text-center'>
                    <div class='card-body'>
                        <h5 class='card-title'><?php echo $fetch_all['course_code']?></h5>
                        <p class='card-text'>
                            <?php echo $fetch_all['course_title']?>
                        </p>
                        <!-- Modal Begins -->
                        <div class='bootstrap-modal'>
                            <!-- Button trigger modal -->
                            <button type='button' class='btn my-background btn-outline-light' data-toggle='modal' data-target='#exampleModalCenter<?php echo $fetch_all['id']?>'>View Details</button>
                            <!-- Modal -->
                            <div class='modal fade' id='exampleModalCenter<?php echo $fetch_all['id']?>'>
                                <div class='modal-dialog modal-dialog-centered' role='document'>
                                    <div class='modal-content'>
                                        <div class='modal-header text-center'>
                                            <h5 class='modal-title'><?php echo $fetch_all['course_code']?></h5>
                                            <button type='button' class='close' data-dismiss='modal'><span>&times;</span>
                                            </button>
                                        </div>
                                        <div class='modal-body '>
                                            <p class = 'text-left'>
                                                <form onsubmit = "submitForm(<?php echo $fetch_all['id']?>)" id = "editForm<?php echo $fetch_all['id']?>" action = "process_booking.php" method = "GET">
                                                    <div>
                                                        <b>Course title: </b><?php echo $fetch_all['course_title']?> <br><br>
                                                    </div>
                                                    <div>
                                                        <b>Hall: </b><?php echo $fetch_all['hall_name']?><br><br>
                                                    </div>
                                                    <!-- change hall -->
                                                    <div class="halls_container" id = "hallsContainer<?php echo $fetch_all['id']?>">
                                                        <select name = "new_hall" id="hall<?php echo $fetch_all['id']?>" class = "form-control">
                                                            <option value="">-Change Hall-</option>
                                                            <?php
                                                                $sql_fetch_halls = "SELECT * FROM halls";
                                                                $query_halls = mysqli_query($conn, $sql_fetch_halls);
                                                                while($fetch_halls = mysqli_fetch_assoc($query_halls)):
                                                            ?>
                                                                <option value="<?php echo $fetch_halls['id']?>"><?php echo $fetch_halls['name']?></option>
                                                            <?php
                                                                endwhile;
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <!-- edit class time -->
                                                    <b>Time: </b><?php echo $fetch_all['class_time']?><br><br>
                                                    <div class="time_container" id = "timeContainer<?php echo $fetch_all['id']?>">
                                                        <input type="time" name = "new_time" id= "time<?php echo $fetch_all['id']?>" class = "form-control" value = "<?php echo $fetch_all['class_time']?>" >
                                                    </div>

                                                    <!-- edit class date -->
                                                    <b>Date: </b><?php echo $fetch_all['class_date']?><br><br>
                                                    <div class="date_container" id = "dateContainer<?php echo $fetch_all['id']?>">
                                                        <input type="date" name = "new_date" id= "date<?php echo $fetch_all['id']?>" class = "form-control" value = "<?php echo $fetch_all['class_date']?>" >
                                                    </div>

                                                    <!-- edit class duration -->
                                                    <b>Duration: </b><?php echo $fetch_all['duration']." hours"?><br><br>
                                                    <div class="duration_container" id = "durationContainer<?php echo $fetch_all['id']?>">
                                                        <input type="number" name = "new_duration" id= "duration<?php echo $fetch_all['id']?>" class = "form-control" value = "<?php echo $fetch_all['duration']?>" >
                                                    </div>


                                                    <!-- input  field to store the id of the booking  -->
                                                    <input type="hidden" name = "booking_id" value = "<?php echo $fetch_all['id']?>" id = "bookingId">

                                                    <b>Date Posted: </b><?php echo $fetch_all['date_booked']?>

                                                    <!-- submit button -->
                                                    <div class="submit_container" id = "submitContainer<?php echo $fetch_all['id']?>">
                                                        <button role = "submit" class = "btn btn-primary" onclick = "submitForm(<?php echo $fetch_all['id']?>)">Save Details</button>
                                                    </div>
                                                </form>
                                            </p>
                                        </div>
                                        
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-primary' onclick = "displayInputFields(<?php echo $fetch_all['id']?>)"> Edit</button>
                                            <button type='button' class='btn btn-secondary' data-dismiss = 'modal'> Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='card-footer text-muted'>
                        <div>
                            Time: <?php echo $fetch_all['class_time']?>
                        </div>
                        <div>
                            Date: <?php echo $fetch_all['class_date']?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Of Single Booking -->
            <?php
                endwhile;
            ?>
        </div>
        
    </div>

<?php
    include("./assets/inc/footer.php");
?>