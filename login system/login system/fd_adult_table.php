<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
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
        <h1 class="text-center text-danger mb-3 mx-3"><b>FD-ADULT PREFERENCE</b></h1>
        <div class="text-center">
            <a href="logout.php" class="btn btn-dark m-2 p-2"><b>LOGOUT</b></a>
            <a href="loan.php" class="btn btn-dark m-2 p-2"><b>CHOOSE LOAN</b></a>
            <a href="fd.php" class="btn btn-dark m-2 p-2"><b>CHOOSE FD</b></a>
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
                        "HDFC" => array(	3.00,	4.50,	5.75,	6.00,	6.60,	7.00),
                        "AXIS" => array(	3.50,	4.00,	6.00,	6.75,	7.00,	7.20),
                        "ICICI" => array(	3.50,	4.25,	5.75,	6.70,	7.00,	7.20),
                        "BANK OF INDIA" => array(	3.00,	4.50,	5.00,	6.00,	6.75,	7.00),
                        "BANK OF BARODA" => array(	3.00,	4.50,	5.25,	6.75,	6.75,	7.25),
                        "KOTAK" => array(	3.25,	3.50,	6.00,	6.80,	7.00,	7.25),
                        "CANERA" => array(	2.90,	4.00,	4.50,	5.40,	5.70,	5.75),
                        "SBI" => array(	3.00,	4.50,	5.25,	6.80,	7.00,	7.10),
                        "PUNB" => array(	3.50,	4.50,	5.50,	6.80,	7.00,	7.20),
                        "UNION" => array(	4.05,	4.40,	5.00,	6.75,	7.10,	7.15)

                    );

                    $bankDetails = array();

                    foreach ($bankData as $bankName => $interestRates) {
                        switch ($duration) {
                            case ($duration >= 0 && $duration <= 0.123287671232876):
                                $interest = $principal * ($interestRates[0] / 100);
                                $rate = $interestRates[0];
                                $durationRange = "7-45 days";
                                break;
                            case ($duration > 0.123287671232876 && $duration <= 0.5):
                                $interest = $principal * ($interestRates[1] / 100) * $duration;
                                $rate = $interestRates[1];
                                $durationRange = "46-6 Months";
                                break;
                            case ($duration > 0.5 && $duration <= 1):
                                $interest = $principal * ($interestRates[2] / 100) * $duration;
                                $rate = $interestRates[2];
                                $durationRange = "6-1 Years";
                                break;
                            case ($duration > 1 && $duration <= 2):
                                $interest = $principal * ($interestRates[3] / 100) * $duration;
                                $rate = $interestRates[3];
                                $durationRange = "1-2 Years";
                                break;
                            case ($duration > 2 && $duration <= 5):
                                $interest = $principal * ($interestRates[4] / 100) * $duration;
                                $rate = $interestRates[4];
                                $durationRange = "2-5 Years";
                                break;
                            case ($duration > 5 && $duration <= 10):
                                $interest = $principal * ($interestRates[5] / 100) * $duration;
                                $rate = $interestRates[5];
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