<?php
    include("./assets/inc/conn.php");
    if(isset($_GET['query'])){
        // time, date, course title, course code, hall name
        $query = $_GET['query'];
        $sql_search = "SELECT * FROM bookings WHERE class_time LIKE '%".$query."%' OR class_date LIKE '%".$query."%' OR course_title LIKE '%".$query."%' OR course_code LIKE '%".$query."%' OR hall_name LIKE '%".$query."%'";
        $query_search = mysqli_query($conn, $sql_search);
        if(mysqli_num_rows($query_search)){
            while($fetch_search = mysqli_fetch_assoc($query_search)){
            ?>
                    <!-- Start Of Single Booking -->
            <div class='col-md-6 col-lg-3 margin-20'>
                <div class='card text-center'>
                    <div class='card-body'>
                        <h5 class='card-title'><?php echo $fetch_search['course_code']?></h5>
                        <p class='card-text'>
                            <?php echo $fetch_search['course_title']?>
                        </p>
                        <!-- Modal Begins -->
                        <div class='bootstrap-modal'>
                            <!-- Button trigger modal -->
                            <button type='button' class='btn my-background btn-outline-light' data-toggle='modal' data-target='#exampleModalCenter<?php echo $fetch_search['id']?>''>View Details</button>
                            <!-- Modal -->
                            <div class='modal fade' id='exampleModalCenter<?php echo $fetch_search['id']?>'>
                                <div class='modal-dialog modal-dialog-centered' role='document'>
                                    <div class='modal-content'>
                                        <div class='modal-header text-center'>
                                            <h5 class='modal-title'><?php echo $fetch_search['course_code']?></h5>
                                            <button type='button' class='close' data-dismiss='modal'><span>&times;</span>
                                            </button>
                                        </div>
                                        <div class='modal-body '>
                                            <p class = 'text-left'>
                                                <b>Course title: </b><?php echo $fetch_search['course_title']?> <br><br>
                                                <!-- write code to fetch hall details later -->
                                                <b>Hall: </b><?php echo $fetch_search['hall']?><br><br>
                                                <!-- write code to fetch class rep details later -->
                                                <b>Class Representative Name: </b><?php echo $fetch_search['class_rep']?><br><br>
                                                <b>Time: </b><?php echo $fetch_search['class_time']?><br><br>
                                                <b>Date: </b><?php echo $fetch_search['class_date']?><br><br>
                                                <b>Date Posted: </b><?php echo $fetch_search['date_booked']?>
                                            </p>
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='card-footer text-muted'>
                        <div>
                            Time: <?php echo $fetch_search['class_time']?>
                        </div>
                        <div>
                            Date: <?php echo $fetch_search['class_date']?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Of Single Booking -->
            <?php
            }
        }else{
            echo "<div style = 'width: 100%; padding: 50px' class = 'text-danger text-center'>NO BOOKING MATCHES YOUR SEARCH.</div>";
        }
    }
?>