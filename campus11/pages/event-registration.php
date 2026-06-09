<?php
session_start();

if(!isset($_SESSION["userid"])) {
  header("Location: /campus/login.php");
  exit();
}

if(!isset($_GET["eventid"])) {
  echo "Event not found";
  exit();
}

$eventid = $_GET["eventid"];

include "../includes/header.php";
?>

<!--registration page-->
<div id="pg-register" class="pg on">
  <div class="reg-wrap">

    <div class="card reg-card">

      <div class="reg-hdr">
        <p class="sec-tag" style="justify-content:center">Step 1 of 1</p>

        <h2 style="font-family:'Clash Display',sans-serif;
                   font-size:1.8rem;
                   font-weight:700">
          Event Registration
        </h2>

        <p style="color:var(--text2);
                  font-size:0.88rem;
                  margin-top:0.4rem">
          Complete your details
        </p>
      </div>

      <!--form-->
      <form action="register-event.php" method="POST">

        <!--IMP : dynamic event id-->
        <input type="hidden" name="eventid" value="<?php echo $eventid; ?>">

        <div class="row2">

          <div class="fg">
            <label>Full Name *</label>
            <input type="text" name="fullname" required>
          </div>

          <div class="fg">
            <label>Email *</label>
            <input type="email" name="email" required>
          </div>

        </div>

        <div class="row2">

          <div class="fg">
            <label>Student ID *</label>
            <input type="text" name="studentid" required>
          </div>

          <div class="fg">
            <label>Phone *</label>
            <input type="tel" name="phone" required>
          </div>

        </div>

        <div class="row2">

          <div class="fg">
            <label>Department *</label>
            <select name="department" required>
              <option value="">Select...</option>
              <option>Computer Science</option>
              <option>Electronics & TC</option>
              <option>Mechanical</option>
              <option>Civil</option>
              <option>IT</option>
            </select>
          </div>

          <div class="fg">
            <label>Year *</label>
            <select name="year" required>
              <option value="">Select...</option>
              <option>1st Year</option>
              <option>2nd Year</option>
              <option>3rd Year</option>
              <option>4th Year</option>
            </select>
          </div>

        </div>

        <div class="fg">
          <label>Team Name (Optional)</label>
          <input type="text" name="teamname">
        </div>

        <div class="fg">
          <label>Special Requirements</label>
          <textarea name="notes"></textarea>
        </div>

        <div style="display:flex;gap:1rem;margin-top:1rem;flex-wrap:wrap">

          <button type="submit"
                  class="btn btn-p"
                  style="flex:1">
            <span>✓ Submit Registration</span>
          </button>

          <button type="reset"
                  class="btn btn-o btn-sm">
            <span>Reset</span>
          </button>

        </div>

      </form>

    </div>

  </div>
</div>

<?php include "../includes/footer.php"; ?>