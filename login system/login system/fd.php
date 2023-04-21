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

  <title>FD</title>
</head>

<body class="bg-image1">
  <div class="container">
    <div class="text-center">
      <h1 class="text-danger"><b>CHOOSE YOUR PREFERENCE</b></h1>
    <div class="btn-group">
  <button type="button" class="btn btn-dark dropdown-toggle m-5 " data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">
          FD Type <span class="caret"></span>
  </button>
  <ul class="dropdown-menu bg-dark ">
    <li><a class="text-light m-2" href="fd.php?type=adult">FD - ADULT</a></li>
    <li><a class="text-light m-2" href="fd.php?type=senior">FD - SENIOR</a></li>
    <!-- <li><a class="text-light m-2" href="loan.php?type=personal">Personal Loan</a></li> -->
    <!-- <li><a class="text-light m-2" href="loan.php?type=fd">FD</a></li> -->
  </ul>
</div>
    </div>
  

<!-- Check which loan type was clicked and load the corresponding page -->
<?php
if(isset($_GET['type'])) {
  $type = $_GET['type'];
  switch($type) {
    case 'adult':
      include 'fd_adult.php';
      break;
    case 'senior':
      include 'fd_senior.php';
      break;
    default:
      // handle invalid loan type
      break;
  }
}
?>

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