<?php
session_start();

if(!isset($_SESSION["userid"])) {
  header("Location: /campus/login.php");
  exit();
}

include "../includes/header.php";
include "../db.php";

$userid = $_SESSION["userid"];

/* =========================
   FETCH USER PROFILE
   ========================= */

$user_sql = "SELECT * FROM users WHERE id = $userid";
$user_res = $conn->query($user_sql);
$user = $user_res->fetch_assoc();

/* =========================
   FETCH REGISTERED EVENTS
   ========================= */

$reg_sql = "SELECT r.*, e.title, e.eventdate, e.venue
            FROM registration r
            JOIN events e ON r.eventid = e.id
            WHERE r.userid = $userid
            ORDER BY e.eventdate ASC";

$reg_res = $conn->query($reg_sql);

/* =========================
   CALCULATE STATS
   ========================= */

$total_registered = $reg_res->num_rows;

$upcoming = 0;
$completed = 0;

$today = date("Y-m-d");

$reg_res->data_seek(0);

while($row = $reg_res->fetch_assoc()) {
  if($row['eventdate'] >= $today) $upcoming++;
  else $completed++;
}

$reg_res->data_seek(0);
?>

<!-- Student dashboard -->
<div id="pg-dashboard" class="pg on">

  <div class="dash-wrap">

    <!-- Header -->
    <div class="dash-hdr">
      <div class="dash-av">
        <img src="/campus/icons/man-coder.png" class="icon-img">
      </div>

      <div>
        <div class="dash-name"><?php echo $user['name']; ?></div>
        <div class="dash-role">Student Dashboard</div>
      </div>
    </div>


    <div class="dash-grid">

      <!-- LEFT SIDE -->
      <div class="dash-side">

        <!-- Profile -->
        <div class="card dp-card">
          <div class="ds-title">Profile</div>

          <div class="dp-f">
            <label>Full Name</label>
            <span><?php echo $user['name']; ?></span>
          </div>

          <div class="dp-f">
            <label>Email</label>
            <span><?php echo $user['email']; ?></span>
          </div>

          <div class="dp-f">
            <label>Student ID</label>
            <span><?php echo $user['studentid']; ?></span>
          </div>

          <div class="dp-f">
            <label>Department</label>
            <span><?php echo $user['department']; ?></span>
          </div>

          <div class="dp-f">
            <label>Year</label>
            <span><?php echo $user['year']; ?></span>
          </div>
        </div>


        <!-- Quick Stats -->
        <div class="card" style="padding:1.5rem">
          <div class="ds-title">Quick Stats</div>

          <div style="display:grid;grid-template-columns:1fr 1fr;gap:0.8rem">

            <div class="stat-box">
              <div class="stat-num"><?php echo $total_registered; ?></div>
              <div class="stat-label">Registered</div>
            </div>

            <div class="stat-box">
              <div class="stat-num"><?php echo $completed; ?></div>
              <div class="stat-label">Completed</div>
            </div>

            <div class="stat-box">
              <div class="stat-num"><?php echo $upcoming; ?></div>
              <div class="stat-label">Upcoming</div>
            </div>

            <div class="stat-box">
              <div class="stat-num">0</div>
              <div class="stat-label">Certs</div>
            </div>

          </div>
        </div>

      </div>



      <!-- RIGHT SIDE -->
      <div class="dash-main">

        <!-- Registered Events -->
        <div class="card" style="padding:2rem">
          <div class="ds-title">Registered Events</div>

          <?php if($total_registered == 0){ ?>

            <p style="color:var(--text2)">
              You have not registered for any events yet.
            </p>

          <?php } else { ?>

            <table style="width:100%">
              <tr>
                <th>Event</th>
                <th>Date</th>
                <th>Venue</th>
                <th>Status</th>
                <th>Certificates</th>
              </tr>

              <?php while($row = $reg_res->fetch_assoc()){ ?>

              <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['eventdate']; ?></td>
                <td><?php echo $row['venue']; ?></td>
                <td><?php echo ucfirst($row['status']); ?></td>
                <td>

<?php if($row['eventdate'] < date("Y-m-d")){ ?>

<a href="/campus/pages/generate-certificate.php?eventid=<?php echo $row['eventid']; ?>" class="btn btn-o btn-sm">
Download
</a>

<?php } else { ?>

<span style="color:var(--text3)">Not Available</span>

<?php } ?>

</td>
              </tr>

              <?php } ?>

            </table>

          <?php } ?>
        </div>


        <!-- Reminders -->
        <div class="card" style="padding:2rem">
          <div class="ds-title">Upcoming Reminders</div>
          <p style="color:var(--text2)">No upcoming reminders.</p>
        </div>


        <!-- Certificates -->
        <div class="card" style="padding:2rem">
          <div class="ds-title">Certificates</div>
          <p style="color:var(--text2)">No certificates available.</p>
        </div>

      </div>

    </div>

  </div>

</div>

<?php include "../includes/footer.php"; ?>