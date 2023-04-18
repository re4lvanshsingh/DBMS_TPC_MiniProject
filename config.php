<?php 

$conn= mysqli_connect('localhost', 'root', '', 'projmini');
    if(!$conn){
        echo 'connection Error' . mysqli_connect_error();
    }
?>