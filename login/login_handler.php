<?php
session_start();  
include 'db_connection.php';

$uname=$_POST["username"];
$pass=$_POST["password"];
$query= mysqli_query($conn,"SELECT * FROM user WHERE username='$uname'");
$result_check=mysqli_num_rows($query); 
if ($result_check !=1) {
	header("Location: index.php?login=error");
	exit();
}
else{
	if ($row = mysqli_fetch_assoc($query)) {
		if ($pass === $row['password']) {
			
			$_SESSION['u_id']=$row['id'];
			$_SESSION['u_name']=$row['username'];
			$var=$_GET["var"];
			if ($var=="games") {
				header('Location: homepage/snakesGame/snakes.html?$var');
			}
			elseif ($var=="notes") {
				header("Location: homepage/homepage.php?$var");
			}
			elseif($var=="login"){
				header("Location: ../my_profile/logged_in_html.php");
			}
			else{

			}


		}
		else{
			header("Location: index.php?login=error");
		}
	}

}

?>
