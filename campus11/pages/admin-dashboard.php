<?php
session_start();

if(!isset($_SESSION["userid"]) || $_SESSION["role"] != "admin") {
  header("Location: /campus/login.php");
  exit();
}

include "../db.php";

$today = date("Y-m-d");


/* =========================
   DELETE EVENT
   ========================= */

if(isset($_GET['delete'])){
  $eventid = intval($_GET['delete']);

  $conn->query("DELETE FROM registration WHERE eventid='$eventid'");
  $conn->query("DELETE FROM events WHERE id='$eventid'");

  header("Location: admin-dashboard.php");
  exit();
}


/* =========================
   APPROVE REGISTRATION
   ========================= */

if(isset($_GET['approve'])){
  $regid = intval($_GET['approve']);
  $adminid = $_SESSION['userid'];

  $conn->query("
    UPDATE registration
    SET status='approved',
        approvedby='$adminid',
        approvedon=NOW()
    WHERE id='$regid'
  ");

  header("Location: admin-dashboard.php");
  exit();
}


/* =========================
   GET EVENT FOR EDIT
   ========================= */

$edit_mode = false;

if(isset($_GET['edit'])){
  $edit_mode = true;
  $eventid = intval($_GET['edit']);
  $res = $conn->query("SELECT * FROM events WHERE id='$eventid'");
  $edit_event = $res->fetch_assoc();
}


/* =========================
   DASHBOARD STATS
   ========================= */

$total_events = $conn->query("SELECT COUNT(*) AS c FROM events")->fetch_assoc()['c'];
$total_regs = $conn->query("SELECT COUNT(*) AS c FROM registration")->fetch_assoc()['c'];
$active_events = $conn->query("SELECT COUNT(*) AS c FROM events WHERE eventdate >= '$today'")->fetch_assoc()['c'];
$completed_events = $conn->query("SELECT COUNT(*) AS c FROM events WHERE eventdate < '$today'")->fetch_assoc()['c'];


/* =========================
   ADD EVENT
   ========================= */

if(isset($_POST['add_event']) && !$edit_mode){

$title = $_POST['title'];
$category = $_POST['category'];
$venue = $_POST['venue'];
$eventdate = $_POST['eventdate'];
$totalseats = $_POST['totalseats'];
$prize = $_POST['prize'];
$description = $_POST['description'];
$createdby = $_SESSION['userid'];

$conn->query("
INSERT INTO events
(title, category, description, venue, eventdate, prize, totalseats, createdby)
VALUES
('$title','$category','$description','$venue','$eventdate','$prize','$totalseats','$createdby')
");

header("Location: admin-dashboard.php");
exit();
}


/* =========================
   UPDATE EVENT
   ========================= */

if(isset($_POST['update_event'])){

$title = $_POST['title'];
$category = $_POST['category'];
$venue = $_POST['venue'];
$eventdate = $_POST['eventdate'];
$totalseats = $_POST['totalseats'];
$prize = $_POST['prize'];
$description = $_POST['description'];

$conn->query("
UPDATE events SET
title='$title',
category='$category',
venue='$venue',
eventdate='$eventdate',
totalseats='$totalseats',
prize='$prize',
description='$description'
WHERE id='$eventid'
");

header("Location: admin-dashboard.php");
exit();
}

include "../includes/header.php";
?>


<div id="pg-admin" class="pg on">
<div class="admin-wrap">


<!-- ================= STATS ================= -->

<div style="display:flex;align-items:flex-end;gap:1.5rem;margin-bottom:2.5rem;flex-wrap:wrap">
<div>
<p class="sec-tag">Admin Panel</p>
<h1 class="sec-h" style="font-size:2rem">
Management <span class="grad">Dashboard</span>
</h1>
</div>
</div>


<div class="admin-stats">

<div class="as-card">
<div class="as-ico b"><img src="../icons/calendar.png" class="icon-img"></div>
<div>
<div class="as-n"><?php echo $total_events; ?></div>
<div class="as-l">Total Events</div>
</div>
</div>

<div class="as-card">
<div class="as-ico p"><img src="../icons/group.png" class="icon-img"></div>
<div>
<div class="as-n"><?php echo $total_regs; ?></div>
<div class="as-l">Registrations</div>
</div>
</div>

<div class="as-card">
<div class="as-ico r"><img src="../icons/fire.png" class="icon-img"></div>
<div>
<div class="as-n"><?php echo $active_events; ?></div>
<div class="as-l">Active Events</div>
</div>
</div>

<div class="as-card">
<div class="as-ico g"><img src="../icons/check.png" class="icon-img"></div>
<div>
<div class="as-n"><?php echo $completed_events; ?></div>
<div class="as-l">Completed</div>
</div>
</div>

</div>



<div class="admin-body">

<div>

<!-- ================= MANAGE EVENTS ================= -->

<div class="card" style="padding:2rem;margin-bottom:1.5rem">

<div class="ds-title">Manage Events</div>

<div style="overflow-x:auto">

<table>
<thead>
<tr>
<th>Event</th>
<th>Date</th>
<th>Regs</th>
<th>Status</th>
<th>Actions</th>
</tr>
</thead>

<tbody>

<?php
$sql = "SELECT e.*, 
(SELECT COUNT(*) FROM registration r WHERE r.eventid = e.id) AS regs
FROM events e
ORDER BY eventdate DESC";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {

$eventDate = date("M d", strtotime($row['eventdate']));

$status = (strtotime($row['eventdate']) >= strtotime($today))
? "<span class='badge ok'>Active</span>"
: "<span class='badge done'>Done</span>";
?>

<tr>
<td><?php echo $row['title']; ?></td>

<td style="font-size:0.8rem;color:var(--text3)">
<?php echo $eventDate; ?>
</td>

<td>
<strong style="color:var(--a1)">
<?php echo $row['regs']; ?>
</strong>
/ <?php echo $row['totalseats']; ?>
</td>

<td><?php echo $status; ?></td>

<td>
<div style="display:flex;gap:0.4rem">

<a href="admin-dashboard.php?edit=<?php echo $row['id']; ?>">
<button class="ib"><img src="../icons/pencil.png" class="icon-img"></button>
</a>

<a href="admin-dashboard.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete this event?')">
<button class="ib"><img src="../icons/trash.png" class="icon-img"></button>
</a>

</div>
</td>
</tr>

<?php } ?>

</tbody>
</table>

</div>
</div>



<!-- ================= PARTICIPANTS ================= -->

<div class="card" style="padding:2rem">

<div class="ds-title">Manage Participants</div>

<div style="overflow-x:auto">

<table>

<thead>
<tr>
<th>Name</th>
<th>Event</th>
<th>Dept</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php
$sql = "SELECT r.id, u.name, u.department, e.title, r.status
        FROM registration r
        JOIN users u ON r.userid = u.id
        JOIN events e ON r.eventid = e.id
        ORDER BY r.regdate DESC";

$res = $conn->query($sql);

if($res->num_rows == 0){
  echo "<tr><td colspan='5'>No registrations yet</td></tr>";
}

while($p = $res->fetch_assoc()){
?>

<tr>
<td><?php echo $p['name']; ?></td>
<td><?php echo $p['title']; ?></td>
<td><?php echo $p['department']; ?></td>

<td>
<span class="badge wait">
<?php echo ucfirst($p['status']); ?>
</span>
</td>

<td>
<?php if($p['status'] == "pending"){ ?>
<a href="admin-dashboard.php?approve=<?php echo $p['id']; ?>"
   class="btn btn-p btn-sm">Approve</a>
<?php } else { ?>
<span class="badge ok">Approved</span>
<?php } ?>
</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>



<!-- ================= ADD / EDIT EVENT FORM ================= -->

<div>

<form method="POST" class="card add-form">

<h3><?php echo $edit_mode ? "Edit Event" : "+ Add New Event"; ?></h3>

<div class="fg">
<label>Event Title</label>
<input type="text" name="title"
value="<?php echo $edit_mode ? $edit_event['title'] : ''; ?>" required>
</div>

<div class="row2">

<div class="fg">
<label>Category</label>
<select name="category">
<option>Hackathon</option>
<option>Workshop</option>
<option>Cultural</option>
<option>Technical</option>
<option>Sports</option>
</select>
</div>

<div class="fg">
<label>Date</label>
<input type="date" name="eventdate"
value="<?php echo $edit_mode ? $edit_event['eventdate'] : ''; ?>" required>
</div>

</div>

<div class="row2">

<div class="fg">
<label>Venue</label>
<input type="text" name="venue"
value="<?php echo $edit_mode ? $edit_event['venue'] : ''; ?>" required>
</div>

<div class="fg">
<label>Max Seats</label>
<input type="number" name="totalseats"
value="<?php echo $edit_mode ? $edit_event['totalseats'] : ''; ?>" required>
</div>

</div>

<div class="fg">
<label>Prize Pool (₹)</label>
<input type="text" name="prize"
value="<?php echo $edit_mode ? $edit_event['prize'] : ''; ?>">
</div>

<div class="fg">
<label>Description</label>
<textarea name="description"><?php echo $edit_mode ? $edit_event['description'] : ''; ?></textarea>
</div>

<button type="submit"
name="<?php echo $edit_mode ? 'update_event' : 'add_event'; ?>"
class="btn btn-p">
<span><?php echo $edit_mode ? "Update Event" : "Save Event"; ?></span>
</button>

</form>

</div>

</div>

</div>

</div>

<?php include "../includes/footer.php"; ?>