<?php
include 'connection.php';

if(isset($_POST['submit'])){
    //var_dump($_POST);
    //$id = $_POST['ID'];
    $FName = $_POST['FName'];
    $LName = $_POST['LName'];
    $Email = $_POST['Email'];
    $Mobile = $_POST['Mobile'];
    $Message = $_POST['message'];

    $input = "INSERT INTO `contactDB` (`FName`,`LName`,`Email`,`Mobile`,`Message`) VALUES 
    ('$FName','$LName','$Email','$Mobile','$Message')";

    $output = mysqli_query($conn,$input);
    if($output){
        echo "Form Submitted successfully";
    }
    else
    echo mysqli_error($output);// "error";
}
mysqli_close();

?>