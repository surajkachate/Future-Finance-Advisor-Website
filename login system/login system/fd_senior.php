<div class="card m-3 shadow border" style="width: 100%; border-radius:25px;">
  <div class="card-body">
    <h1 class="text-center mb-3 text-danger"><b>FD - SENIOR<b></h1>

    <div class="container mt-3">



      <form method="post" action="fd_senior_table_a.php">
        <div class="form-group">
          <label for="exampleFormControlInput1"><b>Name *</b></label>
          <input type="text" class="form-control" style="background-color: rgb(247, 252, 254) !important;"
            placeholder="Name" name="name" id="name-input" required>
            <span id="name-error" style="color: red; display: none;">Please enter a name.</span>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput2"><b>Age *</b></label>
          <input type="number" class="form-control" style="background-color: rgb(247, 252, 254) !important;"
            placeholder="Age" name="age" id="age-input" required>
            <span id="age-error" style="color: red; display: none;">Age must be in between 18 to 100</span>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1"><b>Gender *</b></label>
          <select class="form-control" style="background-color: rgb(247, 252, 254) !important;"
            id="exampleFormControlSelect1" name="gender" id="gender-input">
            <option>Male</option>
            <option>Female</option>
            <option>Others</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput3"><b>Amount *</b></label>
          <input type="number" style="background-color: rgb(247, 252, 254) !important;" class="form-control"
            style="background-color: rgb(238, 246, 251) !important;" placeholder="Amount" name="amount" id="amount-input" required>
          <span id="amount-error" style="color: red; display: none;">Please enter a valid amount 1 to 10,00,00,000.</span>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput3"><b>Duration *</b></label>
          <input type="number" class="form-control" style="background-color: rgb(247, 252, 254) !important;"
            placeholder="Duration" name="duration" id="duration-input">
            <span id="duration-error" style="color: red; display: none;">Please enter a valid duration</span>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1"><b>Duration Unit *</b></label>
          <select class="form-control" style="background-color: rgb(247, 252, 254) !important;"
            id="exampleFormControlSelect1" name="duration_unit">
            <option value="days">Days</option>
            <option value="months">Months</option>
            <option value="years">Years</option>
          </select>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-dark" id="submit-button"><b>Submit</b></button>
        </div>
      </form>
    </div>
  </div>
</div>



<script>
  const amountInput = document.getElementById("amount-input");
  const durationInput = document.getElementById("duration-input");
  const nameInput = document.getElementById("name-input");
  const ageInput = document.getElementById("age-input");
  const genderInput = document.getElementById("gender-input");
  const submitButton = document.getElementById("submit-button");
  const amountError = document.getElementById("amount-error");
  const durationError = document.getElementById("duration-error");
  const nameError = document.getElementById("name-error");
  const ageError = document.getElementById("age-error");
  const genderError = document.getElementById("gender-error");

  submitButton.addEventListener("click", function(event) {
    if (amountInput.value < 1 || amountInput.value > 100000000) {
      amountError.style.display = "inline-block";
      amountInput.style.borderColor = "red";
      event.preventDefault();
    } else {
      amountError.style.display = "none";
    }

    if (durationInput.value < 1 || durationInput.value > 100) {
      durationError.style.display = "inline-block";
      durationInput.style.borderColor = "red";
      event.preventDefault();
    } else {
      durationError.style.display = "none";
    }

    if (nameInput.value=="") {
      nameError.style.display = "inline-block";
      nameInput.style.borderColor = "red";
      event.preventDefault();
    } else {
      nameError.style.display = "none";
    }

    if (ageInput.value < 18 || ageInput.value > 100) {
      ageError.style.display = "inline-block";
      ageInput.style.borderColor = "red";
      event.preventDefault();
    } else {
      ageError.style.display = "none";
    }

    if (genderInput.value === "--") {
      genderError.style.display = "inline-block";
      genderInput.style.borderColor = "red";
      event.preventDefault();
    } else {
      genderError.style.display = "none";
    }

  });
</script>