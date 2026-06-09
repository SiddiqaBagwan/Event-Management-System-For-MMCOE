<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

/* Start session safely */
if(session_status() === PHP_SESSION_NONE){
    session_start();
}

include "../db.php";

/* Check login */
if(!isset($_SESSION["userid"])) {
  header("Location: /campus/login.php");
  exit();
}

/* Check event id */
if(!isset($_GET["eventid"])){
  echo "Event not found";
  exit();
}

$userid = $_SESSION["userid"];
$eventid = $_GET["eventid"];

/* Get student name */
$userQuery = $conn->query("SELECT name FROM users WHERE id='$userid'");
$user = $userQuery->fetch_assoc();

/* Get event details */
$eventQuery = $conn->query("SELECT title,eventdate FROM events WHERE id='$eventid'");
$event = $eventQuery->fetch_assoc();

$name = $user["name"];
$title = $event["title"];
$date = $event["eventdate"];
?>

<!DOCTYPE html>
<html>
<head>
<title>Certificate</title>

<style>

body{
font-family: Arial;
text-align: center;
padding: 100px;
background: white;
}

/* Certificate box */

.cert{
border: 12px solid #333;
padding: 60px;
width: 900px;
margin: auto;
box-shadow: 0 0 25px rgba(0,0,0,0.2);
}

/* Title */

h1{
font-size: 40px;
margin-bottom: 20px;
}

/* Student name */

.name{
font-size: 32px;
font-weight: bold;
margin: 20px;
}

/* Event name */

.event{
font-size: 24px;
margin: 20px;
}

</style>

</head>

<body>

<div class="cert">

<h1>Certificate of Participation</h1>

<p>This certifies that</p>

<div class="name"><?php echo $name; ?></div>

<p>has successfully participated in</p>

<div class="event"><?php echo $title; ?></div>

<p>organized by MMCOE</p>

<p>Date: <?php echo $date; ?></p>

</div>

<script>
window.print();
</script>

</body>
</html>