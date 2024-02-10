<?php 

    $conn = mysqli_connect('localhost', 'root','','db_id_app');

    if(!$conn){
        echo 'Connection error: '. mysqli_connect_error();
    }

?>