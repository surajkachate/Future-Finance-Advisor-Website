<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <title>Loan</title>
</head>

<body  >
    <div class="bg-image">
        <h1 class="text-center text-danger mb-3 mx-3"><b>ADMIN LIST</b></h1>
        <div class="text-center mb-5">
            <a href="logout.php" class="btn btn-dark m-2 p-2"><b>LOGOUT</b></a>
            <a href="loan_a.php" class="btn btn-dark m-2 p-2"><b>CHOOSE LOAN</b></a>
            <a href="fd_a.php" class="btn btn-dark m-2 p-2"><b>CHOOSE FD</b></a>
            <a href="admin.php" class="btn btn-dark m-2 p-2"><b>ADMINS</b></a>
            <a href="user.php" class="btn btn-dark m-2 p-2"><b>USERS</b></a>
        </div>
        <div class="container">

            <table class="table table-bordered table-hover" style="background-color: white !important;">
                <thead class="bg-dark text-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Age</th>
                        <th scope="col">Gender</th>
                        <th scope="col">User Type</th>
                        <th scope="col">Date Created</th>
                    </tr>
                </thead>
            
                <?php
                // Query to select data from the database
                $query = "SELECT * FROM user_form WHERE user_type = 'admin'";

    // Execute the query and get the result set
    $result = mysqli_query($conn, $query);

                // Loop through the result set and display data in the table
                if(mysqli_num_rows($result) > 0){
                    $i=1;
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>$i</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td>".$row['age']."</td>";
                        echo "<td>".$row['gender']."</td>";
                        echo "<td>".$row['user_type']."</td>";
                        echo "<td>".$row['date_create']."</td>";
                        echo "</tr>";
                        $i++;
                    }
                } else {
                    echo "<tr><td colspan='7'>No records found.</td></tr>";
                }
                ?>
            
            </table>
            

        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>