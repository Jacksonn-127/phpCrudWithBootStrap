<?php
include("header.php");
include_once("dbcon.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "select * from students where id = $id";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed" . mysqli_error($connection));
        } else {
            $row = mysqli_fetch_assoc($result);

            print_r($row);
        }
    }
?>

<?php 

    if(isset($_POST['update_students'])){
        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $age = $_POST['age'];
        $id = $_GET['id_new'];

        $query = "update students set first_name = '$f_name', last_name = '$l_name', age = '$age' where id = '$id'";

        $result = mysqli_query($connection, $query);

        print_r($result);

        if(!$result){
            die("Query Failed".mysqli_error($connection));
        }
        else{
            header("location:index.php?update_msg=Successfully updated the data");
        }
    }

?>

<form action="update_page_1.php?id_new=<?php echo $id;?>" method="POST" >
        <div class="form-group px-2">

            <label for="f_name">First Name</label>
            <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name']; ?>">

            <label for="l_name">Last Name</label>
            <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name']; ?>">

            <label for="age">Age</label>
            <input type="text" name="age" class="form-control" value="<?php echo $row['age']; ?>">

            <input type="submit" class="btn btn-success mt-2" name="update_students" value="update">   

        </div>
</form>




<?php

include("footer.php");
?>