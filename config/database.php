
<?php

$db = mysqli_connect("localhost","root","","carfiue");

if(!$db){
    header('location: ../error/404.php');
}

?>