<?php
session_start();
include "../db.php";

if(!isset($_SESSION["userid"])) {
  header("Location: /campus/login.php");
  exit();
}

if(!isset($_POST["eventid"])) {
  echo "Invalid request";
  exit();
}

$userid  = $_SESSION["userid"];
$eventid = $_POST["eventid"];

/* handle optional fields safely */

$team  = isset($_POST["teamname"]) ? $_POST["teamname"] : "";
$notes = isset($_POST["notes"]) ? $_POST["notes"] : "";


/* CHECK AVAILABLE SEATS */

$check = "SELECT seatsavailable FROM events WHERE id='$eventid'";
$result = $conn->query($check);

if(!$result || $result->num_rows == 0){
  echo "Event not found";
  exit();
}

$row = $result->fetch_assoc();

if($row["seatsavailable"] <= 0){

  echo "<script>
          alert('Event is full!');
          window.location.href='events.php';
        </script>";
  exit();
}


/* PREVENT DUPLICATE REGISTRATION */

$check2 = "SELECT id FROM registration
           WHERE userid='$userid' AND eventid='$eventid'";

$res2 = $conn->query($check2);

if($res2 && $res2->num_rows > 0){

  echo "<script>
          alert('You already registered for this event');
          window.location.href='events.php';
        </script>";
  exit();
}


/* REGISTER EVENT */

$sql = "INSERT INTO registration (userid, eventid, teamname, notes)
        VALUES ('$userid', '$eventid', '$team', '$notes')";

if($conn->query($sql)) {

  /* REDUCE SEAT COUNT */

  $update = "UPDATE events
             SET seatsavailable = seatsavailable - 1
             WHERE id='$eventid' AND seatsavailable > 0";

  $conn->query($update);

  echo "<script>
          alert('Registration successful!');
          window.location.href='dashboard.php';
        </script>";

} else {

  echo "Error: " . $conn->error;

}
?>