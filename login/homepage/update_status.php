<?php 
session_start();
include '../db_connection.php'; 



$user_id=$_SESSION['u_id'];
$status=$_POST["note"];


$check = getimagesize($_FILES['myimage']['tmp_name']);
if($check !== false){

	$image = $_FILES['myimage']['tmp_name'];
	$imgContent = addslashes(file_get_contents($image));
	$sql = "INSERT INTO user_note (user_id, note, time, picture) VALUES ('$user_id','$status',CURRENT_TIMESTAMP(),'$imgContent')";
	if ($conn->query($sql) === TRUE) {
		header('Location: homepage.php?status_posted');
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
else{
	echo 'here';
	$sql = "INSERT INTO user_note (user_id, note, time) VALUES ('$user_id','$status',CURRENT_TIMESTAMP())";
	if ($conn->query($sql) === TRUE) {
		header('Location: homepage.php?status_posted');
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}




$conn->close();

?>