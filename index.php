<?php
    include("header.php");
    include("dbcon.php");
?>

        <!-- header and modal button -->
        <div class="box1">
            <h2>All Students</h2>
            <button class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal"> Add Students </button>
        </div>
        
        <!-- Modal -->
        <form action="insert_data.php" method="POST">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class = "modal-body px-2">
                            
                                <label for="f_name">First Name</label>
                                <input type="text" name="f_name" class="form-control">

                                <label for="l_name">Last Name</label>
                                <input type="text" name="l_name" class="form-control">

                                <label for="age">Age</label>
                                <input type="text" name="age" class="form-control">
                            
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" name="add_students" value="Add">
                    </div>
                </div>
            </div>
        </div>
        </form>

        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $query = "SELECT * FROM students";
                    $result = mysqli_query($connection, $query);

                    if(!$result){
                        die("Query failed");
                    }
                    else{
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                                <tr>
                                    <td><?php echo $row["id"]?></td>
                                    <td><?php echo $row["first_name"]?></td>
                                    <td><?php echo $row["last_name"]?></td>
                                    <td><?php echo$row["age"]?></td>
                                    <td><a href="update_page_1.php?id=<?php echo $row["id"]?>" class="btn btn-success">Update</a></td>
                                    <td><a href="delete_page_1.php?id=<?php echo $row["id"]?>" class="btn btn-danger">Delete</a></td>
                                </tr>
                            <?php
                        }
                    }
                ?>
            </tbody>
        </table>

        <!-- get error message -->
        <?php 
            if(isset($_GET["message"])){
                $message = htmlspecialchars($_GET["message"]);
                echo "<h6 class='text-danger'>$message</h6>";
            }
        ?>

<?php
    include("insert_data.php");
    include("footer.php");
?>



