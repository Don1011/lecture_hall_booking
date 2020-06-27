<?php
    include("./assets/inc/header.php");
    include("./assets/inc/conn.php");
?>

    <div class="container">
        <div class="row">
            <div class = "col-12 margin-20">
                <form id = "searchForm">
                    <div class="input-group mb-3">
                        <input id="searchQuery" type="text" class="form-control" placeholder = "Search hall's name" oninput = "search()">
                        <div class="input-group-append">
                            <button class="btn btn-outline-light fa fa-search my-background" type="button"></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row" id = "display">
            <?php
                $sql_halls = "SELECT * FROM halls "; 
                $query_halls = mysqli_query($conn, $sql_halls);
                while($fetch_halls = mysqli_fetch_assoc($query_halls)):
            ?>
            <!-- Start Of Single Hall -->
            <div class="col-md-6 col-lg-3 margin-20">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $fetch_halls["name"]?></h5>
                        <!-- Modal Begins -->
                        <div class="bootstrap-modal">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn my-background btn-outline-light" data-toggle="modal" data-target="#exampleModalCenter<?php echo $fetch_halls["id"]?>">View Details</button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter<?php echo $fetch_halls["id"]?>">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h5 class="modal-title"><?php echo $fetch_halls["name"]?></h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body ">
                                            <h2>Hall Bookings</h2>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Course Code</th>
                                                            <th>Time</th>
                                                            <th>Date</th>
                                                            <th>Class Duration</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $sql_bookings = "SELECT * FROM bookings WHERE hall = '".$fetch_halls['id']."'";
                                                            $query_bookings = mysqli_query($conn, $sql_bookings);
                                                            while($fetch_bookings = mysqli_fetch_assoc($query_bookings)):
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $fetch_bookings['course_code']?></td>
                                                            <td><?php echo $fetch_bookings['class_time']?></td>
                                                            <td><?php echo $fetch_bookings['class_date']?></td>
                                                            <td><?php echo $fetch_bookings['duration']?> Hours</td>
                                                        </tr>
                                                        <?php 
                                                            endwhile;
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div id="accordion-one" class="accordion">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fa" aria-hidden="true"></i> Book Hall </div>
                                                    </div>
                                                    <div id="collapseTwo" class="collapse" data-parent="#accordion-one">
                                                        <div class="card-body">
                                                            <form id = "bookForm" class = "text-center" onsubmit = "hallBooking(<?php echo $fetch_halls['id']?>)">
                                                                
                                                                <input type="hidden" value = "<?php echo $fetch_halls['id']?>" id = "hall<?php echo $fetch_halls['id']?>">
                                                                <label for="course">Select the course</label>
                                                                <select  id="course<?php echo $fetch_halls['id']?>" class = "form-control">
                                                                    <option value="">-Select the course-</option>
                                                                    <?php
                                                                        $sql_courses = "SELECT * FROM courses_sim";
                                                                        $query_courses = mysqli_query($conn, $sql_courses);
                                                                        while($fetch_courses = mysqli_fetch_assoc($query_courses)):
                                                                    ?>
                                                                    <option value="<?php echo $fetch_courses['id']?>"><?php echo $fetch_courses['code']?></option>
                                                                    <?php
                                                                        endwhile;
                                                                    ?>
                                                                </select>
                                                                <br>
                                                                <input type="time"  id="time<?php echo $fetch_halls['id']?>" class = "form-control">
                                                                <br>
                                                                <label for="date">Date for class</label>
                                                                <input type="date"  id="date<?php echo $fetch_halls['id']?>" class = "form-control">
                                                                <br>
                                                                <label for="duration">Class Duration</label>
                                                                <input type="number"  id="duration<?php echo $fetch_halls['id']?>" class = "form-control" placeholder = "Enter the number of hours the class will hold">
                                                                <br>
                                                                <button role = "button" class = "btn btn-outline-light my-background">Book Hall</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Of Single Hall -->
            <?php
                endwhile;
            ?>
            
        </div>
    </div>

<?php
    include("./assets/inc/footer.php");
?>