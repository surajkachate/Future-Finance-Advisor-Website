<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:login_form.php');
 }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>admin page</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>



    <div class="bg-image">
        <h1 class="text-center text-danger mb-3 mx-3"><b>PERSONAL LOAN PREFERENCE</b></h1>
        <div class="text-center">
            <a href="logout.php" class="btn btn-dark m-2 p-2"><b>LOGOUT</b></a>
            <a href="loan_a.php" class="btn btn-dark m-2 p-2"><b>CHOOSE LOAN</b></a>
            <a href="fd_a.php" class="btn btn-dark m-2 p-2"><b>CHOOSE FD</b></a>
            <a href="admin.php" class="btn btn-dark m-2 p-2"><b>ADMINS</b></a>
            <a href="user.php" class="btn btn-dark m-2 p-2"><b>USERS</b></a>
        </div>
        <div class="container">

            <table class="table table-bordered table-hover " style="background-color: white;">
                <thead class="bg-dark text-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Bank Name</th>
                        <th scope="col">Principal</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Interest Rate</th>
                        <th scope="col">Interest</th>
                        <th scope="col">Total Amount</th>
                    </tr>
                </thead>

                <?php

function compareBanks($a, $b) {
    if ($a['totalAmount'] == $b['totalAmount']) {
        return strcmp($a['bankName'], $b['bankName']);
    }
    return ($a['totalAmount'] < $b['totalAmount']) ? -1 : 1;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $duration_value = $_POST['duration'];
    $duration_unit = $_POST['duration_unit'];
    $principal = $_POST['amount'];
    
    switch ($duration_unit) {
        case 'days':
            $duration = $duration_value / 365;
            break;
        case 'months':
            $duration = $duration_value / 12;
            break;
        case 'years':
        default:
            $duration = $duration_value;
            break;
    }
} else {
    $principal = 100;
    $duration = 1;
}

$bankData = array(
    "HDFC" => array(	10.50,	11.20,	12.75,	13.75,	15.75),
"AXIS" => array(	10.25,	10.75,	11.75,	13.15,	14.50),
"ICICI" => array(	10.50,	11.15,	13.75,	14.15,	15.25),
"BANK OF INDIA" => array(	10.15,	10.75,	11.15,	13.50,	14.25),
"BANK OF BARODA" => array(	10.98,	11.45,	13.75,	16.50,	18.25),
"KOTAK" => array(	10.99,	11.40,	13.15,	14.45,	16.49),
"CANERA" => array(	11.75,	12.75,	14.45,	15.25,	16.95),
"SBI" => array(	9.60,	9.95,	10.25,	10.75,	12.25),
"PUNB" => array(	10.40,	11.25,	12.95,	15.25,	16.95),
"UNION" => array(	11.40,	12.25,	13.15,	14.45,	15.55)

);

$bankDetails = array();

foreach ($bankData as $bankName => $interestRates) {
    switch ($duration) {
        case ($duration >= 0 && $duration <= 0.5):
            $interest = $principal * ($interestRates[0] / 100) * $duration;
            $rate = $interestRates[0];
            $durationRange = "0-6 Months";
            break;
        case ($duration > 0.5 && $duration <= 1):
            $interest = $principal * ($interestRates[1] / 100) * $duration;
            $rate = $interestRates[1];
            $durationRange = "6 Months - 1 Year";
            break;
        case ($duration > 1 && $duration <= 3):
            $interest = $principal * ($interestRates[2] / 100) * $duration;
            $rate = $interestRates[2];
            $durationRange = "1-3 Years";
            break;
        case ($duration > 3 && $duration <= 5):
            $interest = $principal * ($interestRates[3] / 100) * $duration;
            $rate = $interestRates[3];
            $durationRange = "3-5 Years";
            break;
        case ($duration > 5 && $duration <= 10):
            $interest = $principal * ($interestRates[4] / 100) * $duration;
            $rate = $interestRates[4];
            $durationRange = "5-10 Years";
            break;
        default:
            $interest = 0;
            $rate = 0;
            $durationRange = "";
            break;
    }

    $totalAmount = $principal + $interest;

    $bankDetails[] = array(
        'bankName' => $bankName,
        'principal' => $principal,
        'duration' => $duration_value ." ". $duration_unit,
        'durationRange' => $durationRange,
        'interestRate' => $rate,
        'interest' => $interest,
        'totalAmount' => $totalAmount
    );
}

usort($bankDetails, 'compareBanks');
$i=1;
foreach ($bankDetails as $bank) {
    if ($i == 1) {
        echo "<tr class=\"highlighted-row\"><td scope=\"row\">{$i}</td><td>{$bank['bankName']}</td><td>₹ {$bank['principal']}</td><td>{$bank['duration']}</td><td>{$bank['interestRate']}%</td><td>₹ {$bank['interest']}</td><td>₹ {$bank['totalAmount']}</td></tr>";
    } else {
        echo "<tr><td scope=\"row\">{$i}</td><td>{$bank['bankName']}</td><td>₹ {$bank['principal']}</td><td>{$bank['duration']}</td><td>{$bank['interestRate']}%</td><td>₹ {$bank['interest']}</td><td>₹ {$bank['totalAmount']}</td></tr>";
    }
    $i++;
    }
?>

            </table>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

</body>

</html>