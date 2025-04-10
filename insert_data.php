<?php 

    include_once("dbcon.php");
    
    if(isset($_POST['add_students'])){
        echo("Add Students form submitted");

        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $age = $_POST['age'];

        if($f_name == "" || empty($f_name)){
            header("location:index.php?message=First name is empty");
        }
        else{
            $query = "insert into students (first_name, last_name, age) values('$f_name', '$l_name', '$age')";
            $result = mysqli_query($connection, $query);

            if(!$result){
                die("Query has failed".mysqli_error($connection));
            }
            else{
                header('location:index.php?insert_msg=Successfully inserted data into the students table');
            }
        }
    }
?>