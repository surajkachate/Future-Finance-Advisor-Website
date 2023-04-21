<?php
$conn = mysqli_connect('localhost','root','','financialservices');
//echo 'Succesful';
if(mysqli_connect_errno()){
    echo 'Failed to connect';
    exit();
}
?>