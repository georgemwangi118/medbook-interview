<?php
$con = new mysqli('localhost', 'root', '', 'medibook');

if(!$con) {
    die(mysqli_error($con));
}
?>