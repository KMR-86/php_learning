<?php 
session_start();
include '../db_connection.php'; 



$user_id=$_SESSION['u_id'];
$status=$_POST["note"];


$sql = "INSERT INTO user_note (user_id, note, time) VALUES ('$user_id','$status',CURRENT_TIMESTAMP())";
	//$sql="ALTER TABLE `user` AUTO_INCREMENT=100000";
if ($conn->query($sql) === TRUE) {
	header('Location: homepage.php?status_posted');
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>