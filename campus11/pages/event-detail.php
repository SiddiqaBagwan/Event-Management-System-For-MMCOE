<?php
include "../includes/header.php";
include "../db.php";

/* ---------- CHECK EVENT ID ---------- */

if (!isset($_GET['eventid']) || !is_numeric($_GET['eventid'])) {
  echo "Event not found";
  exit();
}

$eventid = intval($_GET['eventid']);

/* ---------- GET EVENT ---------- */

$sql = "SELECT * FROM events WHERE id = $eventid";
$result = $conn->query($sql);

if (!$result || $result->num_rows == 0) {
  echo "Event not found";
  exit();
}

$event = $result->fetch_assoc();
?>

<!-- Event Details Page -->
<div id="pg-event-detail" class="pg on">

  <div class="detail-wrap">

    <!-- BACK BUTTON -->
    <button class="btn btn-o btn-sm"
            onclick="window.location.href='events.php'"
            style="margin-bottom:2rem">
      <span>← Back to Events</span>
    </button>

    <div class="detail-grid">

      <!-- LEFT SIDE -->
      <div>

        <!-- EVENT POSTER -->
        <div class="detail-poster"
             style="background-image: url('../images/hackfest-poster.jpg');
                    background-size: cover;
                    background-position: center;">
          <div class="detail-badge">FEATURED EVENT</div>
        </div>

        <!-- ORGANIZER CARD -->
        <div class="card" style="padding:1.5rem;margin-top:1.5rem">

          <h4 style="font-family:'Fira Code',monospace;
                     font-size:0.72rem;
                     color:var(--a1);
                     letter-spacing:0.14em;
                     text-transform:uppercase;
                     margin-bottom:1rem">
            Organizer
          </h4>

          <div style="display:flex;align-items:center;gap:0.8rem">

            <div style="width:44px;height:44px;border-radius:50%;
                        background:linear-gradient(135deg,var(--a1),var(--a3));
                        display:flex;align-items:center;justify-content:center">

              <img src="../icons/tech-person.png"
                   class="icon-img"
                   alt="Organizer" />

            </div>

            <div>
              <strong>Coding Club</strong><br>
              <span style="font-size:0.77rem;color:var(--text3)">
                MIT College, Pune
              </span>
            </div>

          </div>
        </div>

      </div>

      <!-- RIGHT SIDE -->
      <div class="detail-info">

        <p class="sec-tag"><?php echo htmlspecialchars($event['category']); ?></p>

        <h1><?php echo htmlspecialchars($event['title']); ?></h1>

        <p style="color:var(--text2);
                  font-size:0.95rem;
                  line-height:1.8;
                  margin-bottom:1.4rem">
          <?php echo nl2br(htmlspecialchars($event['description'])); ?>
        </p>

        <!-- INFO GRID -->
        <div class="info-grid">

          <div class="info-box">
            <label>Date</label>
            <strong><?php echo $event['eventdate']; ?></strong>
          </div>

          <div class="info-box">
            <label>Venue</label>
            <strong><?php echo htmlspecialchars($event['venue']); ?></strong>
          </div>

          <div class="info-box">
            <label>Total Seats</label>
            <strong><?php echo $event['totalseats']; ?></strong>
          </div>

          <div class="info-box">
            <label>Prize</label>
            <strong><?php echo htmlspecialchars($event['prize']); ?></strong>
          </div>

        </div>

        <!-- ✅ COUNTDOWN (STEP 1 ADDED) -->
        <div class="card" style="padding:1rem;margin:1.5rem 0;text-align:center">

          <div style="font-size:0.8rem;color:var(--text3);margin-bottom:0.4rem">
            Event Starts In
          </div>

          <div id="countdown"
               style="font-family:'Clash Display',sans-serif;
                      font-size:1.4rem;
                      font-weight:700;
                      color:var(--a1)">
            Loading...
          </div>

        </div>

        <!-- ACTION BUTTONS -->
        <div style="display:flex;gap:1rem;flex-wrap:wrap">

          <!-- REGISTER BUTTON -->
          <button class="btn btn-p"
                  onclick="window.location.href='event-registration.php?eventid=<?php echo $event['id']; ?>'">
            <span>
              <img src="../icons/memo.png" class="icon-img" alt="" />
              Register Now
            </span>
          </button>

          <button class="btn btn-o btn-sm">
            <span>Set Reminder</span>
          </button>

          <button class="btn btn-o btn-sm">
            <span>Share</span>
          </button>

        </div>

      </div>

    </div>
  </div>

</div>

<!-- ✅ COUNTDOWN SCRIPT -->
<script>

const eventDate = new Date("<?php echo $event['eventdate']; ?>").getTime();

const timer = setInterval(function(){

  const now = new Date().getTime();
  const distance = eventDate - now;

  if(distance < 0){
    document.getElementById("countdown").innerHTML = "Event Started";
    clearInterval(timer);
    return;
  }

  const days = Math.floor(distance / (1000*60*60*24));
  const hours = Math.floor((distance % (1000*60*60*24)) / (1000*60*60));
  const mins = Math.floor((distance % (1000*60*60)) / (1000*60));
  const secs = Math.floor((distance % (1000*60)) / 1000);

  document.getElementById("countdown").innerHTML =
    days + "d " + hours + "h " + mins + "m " + secs + "s";

}, 1000);

</script>

<?php include "../includes/footer.php"; ?>