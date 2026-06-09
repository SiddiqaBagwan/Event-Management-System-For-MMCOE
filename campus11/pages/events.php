<?php
include "../db.php";

/* all events for grid */
$sql = "SELECT * FROM events ORDER BY eventdate ASC";
$result = $conn->query($sql);

/* upcoming event (next event) */
$upcomingQuery = "
SELECT * FROM events
WHERE eventdate >= CURDATE()
ORDER BY eventdate ASC
LIMIT 1
";

$upcomingResult = $conn->query($upcomingQuery);
$nextEvent = $upcomingResult->fetch_assoc();

/* past events */
$pastQuery = "
SELECT * FROM events
WHERE eventdate < CURDATE()
ORDER BY eventdate DESC
";

$pastResult = $conn->query($pastQuery);
?>

<?php include "../includes/header.php"; ?>

<!--events Page-->
<div id="pg-events" class="pg on">

  <div class="pg-banner">
    <p class="sec-tag" style="justify-content:center">Browse & Register</p>
    <h1 class="pg-banner-title">Explore <span class="grad">Upcoming</span> Events</h1>
    <p class="pg-banner-sub">Find your next challenge, stage, or podium</p>
  </div>

  <!--Carousel-->
  <div style="padding:0 0 2rem;overflow:hidden">
    <div class="carousel-outer">
      <div class="carousel-track" id="car-track"></div>
    </div>
  </div>

  <!--filter-->
  <div class="w">

    <div class="filter-bar" id="filter-bar">
      <button class="fb act" data-f="all" onclick="filterEv('all',this)">All</button>
      <button class="fb" data-f="hackathon" onclick="filterEv('hackathon',this)">💻 Hackathons</button>
      <button class="fb" data-f="workshop" onclick="filterEv('workshop',this)">🛠 Workshops</button>
      <button class="fb" data-f="cultural" onclick="filterEv('cultural',this)">🎭 Cultural</button>
      <button class="fb" data-f="technical" onclick="filterEv('technical',this)">⚙️ Technical</button>
      <button class="fb" data-f="sports" onclick="filterEv('sports',this)">🏆 Sports</button>
    </div>


    <!--Events grid-->
    <div class="events-grid" id="ev-page-grid">

<?php while($row = $result->fetch_assoc()) { ?>

  <div class="card reveal">

    <p class="sec-tag"><?php echo $row['category']; ?></p>

    <h3 class="sec-h" style="font-size:1.3rem">
      <?php echo $row['title']; ?>
    </h3>

    <p style="color:var(--text2);font-size:0.9rem;margin:0.6rem 0">
      <?php echo $row['description']; ?>
    </p>

    <p style="font-size:0.85rem;color:var(--text3)">
      📍 <?php echo $row['venue']; ?><br>
      📅 <?php echo $row['eventdate']; ?><br>
      🎟 Seats: <?php echo $row['seatsavailable']; ?> / <?php echo $row['totalseats']; ?>
    </p>

    <div style="margin-top:1rem;display:flex;gap:10px;flex-wrap:wrap">

      <a href="/campus/pages/event-detail.php?eventid=<?php echo $row['id']; ?>" class="btn btn-p">
        <span>View Details</span>
      </a>

      <?php if($row['seatsavailable'] > 0){ ?>

      <form action="/campus/pages/event-registration.php" method="POST">
        <input type="hidden" name="eventid" value="<?php echo $row['id']; ?>">
        <button class="btn btn-o"><span>Register</span></button>
      </form>

      <?php } else { ?>

      <button class="btn btn-o" disabled>
        <span>Event Full</span>
      </button>

      <?php } ?>

    </div>

  </div>

<?php } ?>

</div>


    <!--Featured Event (Upcoming)-->
    <?php if($nextEvent){ ?>

    <div class="feat-ev reveal" style="margin-top:3rem">

      <div class="feat-ev-inner">

        <div>

          <div class="feat-tag-line">⭐ Featured Event of the Month</div>

          <h2 class="feat-ev-h">
            <?php echo $nextEvent['title']; ?>
          </h2>

          <p style="color:var(--text2);font-size:0.95rem;line-height:1.75;margin-bottom:1.4rem">
            <?php echo $nextEvent['description']; ?>
          </p>

          <div class="feat-ev-prize">
            🏆 Prize: <?php echo $nextEvent['prize']; ?>
          </div>

          <div style="display:flex;gap:1rem;flex-wrap:wrap">

            <a href="/campus/pages/event-detail.php?eventid=<?php echo $nextEvent['id']; ?>" class="btn btn-p">
              <span>View Details</span>
            </a>

            <a href="/campus/pages/event-registration.php?eventid=<?php echo $nextEvent['id']; ?>" class="btn btn-o">
              <span>Register Team</span>
            </a>

          </div>

        </div>

        <div class="feat-ev-vis"
             style="background-image: url('../images/hackfest-featured.jpg');
                    background-size: cover;
                    background-position: center;">
        </div>

      </div>

    </div>

    <?php } ?>


    <!--Calendar-->
    <div style="margin:3rem 0 2rem">
      <p class="sec-tag">Schedule</p>
      <h3 class="sec-h" style="font-size:1.8rem">April 2026 — <span class="grad">Calendar</span></h3>
      <div class="cal-grid" id="cal-grid"></div>
    </div>


    <!--Past Events-->
    <div style="margin:3rem 0 4rem">
      <p class="sec-tag">Archive</p>
      <h3 class="sec-h" style="font-size:1.8rem">Past <span class="grad">Events</span></h3>
      <div class="events-grid" id="past-grid" style="margin-top:2rem">

<?php while($past = $pastResult->fetch_assoc()) { ?>

  <div class="card reveal">

    <p class="sec-tag"><?php echo $past['category']; ?></p>

    <h3 class="sec-h" style="font-size:1.3rem">
      <?php echo $past['title']; ?>
    </h3>

    <p style="color:var(--text2);font-size:0.9rem;margin:0.6rem 0">
      <?php echo $past['description']; ?>
    </p>

    <p style="font-size:0.85rem;color:var(--text3)">
      📍 <?php echo $past['venue']; ?><br>
      📅 <?php echo $past['eventdate']; ?>
    </p>

    <button class="btn btn-o" disabled>
      <span>Event Completed</span>
    </button>

  </div>

<?php } ?>

</div>
    </div>

  </div>
</div>

<?php include "../includes/footer.php"; ?>