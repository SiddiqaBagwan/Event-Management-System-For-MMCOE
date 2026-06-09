<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $studentid = $_POST["studentid"];
  $department = $_POST["department"];
  $year = $_POST["year"];
  $phone = $_POST["phone"];

  $sql = "INSERT INTO users
          (name, email, password, role,
           studentid, department, year, phone)
          VALUES
          ('$name','$email','$password','student',
           '$studentid','$department','$year','$phone')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Registration successful! Please login'); 
          window.location='login.php';</script>";
  } else {
    echo "<script>alert('Email already exists');</script>";
  }
}
?>

<?php include "includes/header.php"; ?>


<div id="pg-register" class="pg on">
  <div class="reg-wrap">
    <div class="card reg-card">

      <div class="reg-hdr">
        <p class="sec-tag" style="justify-content:center">Create Account</p>
        <h2 style="font-family:'Clash Display',sans-serif;
                   font-size:1.8rem;font-weight:700">
          Student Registration
        </h2>
      </div>

      <form method="POST">

        <div class="row2">
          <div class="fg">
            <label>Full Name *</label>
            <input type="text" name="name" required>
          </div>

          <div class="fg">
            <label>Email *</label>
            <input type="email" name="email" required>
          </div>
        </div>

        <div class="row2">
          <div class="fg">
            <label>Password *</label>
            <input type="password" name="password" required>
          </div>

          <div class="fg">
            <label>Student ID *</label>
            <input type="text" name="studentid" required>
          </div>
        </div>

        <div class="row2">
          <div class="fg">
            <label>Department *</label>
            <input type="text" name="department" required>
          </div>

          <div class="fg">
            <label>Year *</label>
            <input type="text" name="year" required>
          </div>
        </div>

        <div class="fg">
          <label>Phone *</label>
          <input type="tel" name="phone" required>
        </div>

        <button type="submit"
                class="btn btn-p"
                style="width:100%;margin-top:1rem">
          <span>Register</span>
        </button>

      </form>

    </div>
  </div>
</div>


<?php include "includes/footer.php"; ?>
