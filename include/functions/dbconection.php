<?php 
    $conn = new mysqli('localhost','root', '201095', 'gdlwebcamp');

    if($conn->connect_error){
        echo $conn->connect_error;
    }
?>