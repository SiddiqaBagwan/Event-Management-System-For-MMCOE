<?php
include "../db.php";

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$sql = "INSERT INTO messages (name,email,subject,message)
        VALUES ('$name','$email','$subject','$message')";

if($conn->query($sql)){

echo "<script>
alert('Message sent successfully!');
window.location.href='../index.php';
</script>";

}else{

echo "Error: ".$conn->error;

}
?>