<?php 

include('db_connection.php');


$uname=$_POST["uname"];
$pass=$_POST["pass"];
$email=$_POST["email"];
$bday=$_POST["birthday"];
$gender=$_POST['gender'];
$phone=$_POST["phone"];
$query= mysqli_query($conn,"SELECT * FROM user WHERE username='$_POST[uname]'"); 
if ($query) {
	
	if (mysqli_num_rows($query)>0)
	{
		die ("Sorry! This Username already exists!");
	}
}
$sql = "INSERT INTO user (email, password, username,gender,birthday,phone) VALUES ('$email','$pass','$uname','$gender','$bday','$phone')";
	//$sql="ALTER TABLE `user` AUTO_INCREMENT=100000";
if ($conn->query($sql) === TRUE) {
	echo "success";
	header('Location: index.php?register_successful');
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>