<?php

    include_once("dbcon.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "delete from students where id = $id";

        $result = mysqli_query($connection, $query);

        if(!$result){
            die("Delete not successful at $id".mysqli_error($connection));
        }
        else{
            header('location:index.php?update_msg=successfully deleted id: ', $id);
        }
    }
?>