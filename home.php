<?php
    include("./assets/inc/header.php");
    include("./assets/inc/conn.php");
?>

    <div class="container">
        <div class="row">
            <div class = "col-12 margin-20">
                <form id = "searchForm">
                    <div class="input-group mb-3">
                        <input id="searchQuery" type="text" class="form-control" placeholder = "Search a course's title, code or the hall's name" oninput = "search()">
                        <div class="input-group-append">
                            <button class="btn btn-outline-light fa fa-search my-background" type="button"></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- For normal display on page load -->
        <div class="row" id = "display">
            <?php
                $sql_show_all = "SELECT * FROM bookings ORDER BY id DESC";
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
                            <button type='button' class='btn my-background btn-outline-light' data-toggle='modal' data-target='#exampleModalCenter<?php echo $fetch_all['id']?>''>View Details</button>
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
                                                <b>Course title: </b><?php echo $fetch_all['course_title']?> <br><br>
                                                <!-- write code to fetch hall details later -->
                                                <b>Hall: </b><?php echo $fetch_all['hall']?><br><br>
                                                <?php
                                                    $sql_class_rep = "SELECT * FROM students_sim WHERE id = '".$fetch_all['class_rep']."'";
                                                    $query_class_rep = mysqli_query($conn, $sql_class_rep);
                                                    $fetch_class_rep = mysqli_fetch_assoc($query_class_rep);
                                                ?>
                                                <b>Class Representative Name: </b><?php echo $fetch_class_rep['name']." ".$fetch_class_rep['surname']?><br><br>
                                                <b>Time: </b><?php echo $fetch_all['class_time']?><br><br>
                                                <b>Date: </b><?php echo $fetch_all['class_date']?><br><br>
                                                <b>Date Posted: </b><?php echo $fetch_all['date_booked']?>
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