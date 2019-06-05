<?php
session_start();
include '../db_connection.php'; 
?>

<!DOCTYPE html>
<html>
<header>
	<link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
</header>
<body>
	<style>
		
		/********************************************
default values:
    font family       : Roboto Condensed 
    greenish blue     : #34c6d3 (buttons,icons,links,lines,backgrouds)
    steel gray        : #41464b (heading)
    blue bayoxe       : #64707b (paragraphs)
    white             : #fff (text with black background)
    black             : #000
    

    ********************************************/

    body {
    	font-family: "Roboto Condensed", sans-serif;
    }

/********************************************
HOME 
**********************************************/

html,
body {
	height: 100%;
	width: 100%;
}


p {
	color: #64707b;
	font-size: 16px;
	font-weight: 300;
}

#home {
	height: 100%;
}

#home-cover {
	height: 100%;
	background-image: url(../images/bg-home2.png);
	background-repeat: no-repeat;
	background-size: cover;
	background-position: center;
	background-attachment: fixed;


}

h3 {
	text-transform: uppercase;
	color: #41464b;
}

#home-content-box {
	height: 100%;
	width: 100%;
	font-weight: 100%;
	display: table;
}

#home-content-box-inner {
	display: table-cell;
	vertical-align: middle;
	text-align: center;
}

#home-heading h3 {
	color: #fff;
	font-size: 55px;
	font-weight: 700;
	margin: 20px 0 20px 0;
	/*padding-left: 200px;*/
	/*text-align: center;*/
}




.btn-general {

	border-width: 2px;
	border-radius: 0;
	padding: 12px 26px 12px 26px;
	font-size: 16px;
	font-weight: 40;
	text-transform: uppercase;
}

.btn-white {
	border-color: #fff;
	color: #fff;
}

.btn-white:hover,
.btn-while:focus {
	background-color: #fff;
	color: #41464b;
}

.btn-blue {
	border-color: #34c6d3;
	color: #34c6d3;
}

.btn-blue:hover,
.btn-blue:focus {
	background-color: #34c6d3;
	color: #fff;
}

.btn-back-to-top {
	position: fixed;
	bottom: 20px;
	right: 20px;
	font-size: 22px;
	padding: 3px 15px;
	border-radius: 0;
	display: none;
}





footer {
	background-color: #41464b;
	padding-top: 30px;
	border-top: 5px solid rgba(0, 0, 0, 0.1);

}

#contact-left h3,
#contact-right h3 {
	color: #fff;
	font-size: 27px;
	font-weight: 700;
}




form .form-control {
	background: transparent;
	border-radius: 0;
	border-color: white;
	font-size: 17px;
	font-weight: 300;
	padding: 8px 16px;
	margin-bottom: 20px;
	color: white;
}

#send-button {
	padding-bottom: 50px;
	margin-left: 650px;
}

/**************************************************************
Footer section
**************************************************************/

#footer-bottom {
	background-color: rgba(0, 0, 0, 0.1);
	padding: 30px 0;
	margin-top: 60px;
}

#footer-copyrights p {
	margin: 0;
	color: white;
}

#footer-menu {
	float: left;
	color: white;
	font-size: 16px;
	font-weight: 300;
}

#footer-menu ul {
	list-style: none;
	padding-left: 0;
	margin: 0;

}

#footer-menu ul li {
	display: inline-block;

}

#footer-menu button {
	color: white;
	font-size: 16px;
	font-weight: 300;
	margin: 0 10px;
	text-decoration: none;
}

#footer-menu button:hover {
	color: #34c6d3;
}

</style>
<footer>
	<!--div#footer-bottom>div.container>div.row>div.col-md-6{copyrights}+div.col-md-6{footer-menu}-->
	<div id="contact">
		<div class="container">
			<div class="row">
				<div class="col-md-2">
					<div id="send-button">
						
					</div>
				</div>	
				<div class="col-md-8">
					<div id="contact-right">
						<form method="POST" action="update_status.php">

							<textarea rows="10" name="note" placeholder="whats in you mind..." class="form-control"></textarea>
							<div id="send-button">
								<button class="btn btn-lg btn-general" type="submit">SEND</button> 
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-2">
					
				</div>
			</div>
		</div>
	</div>

</footer>
</body>

</html>
<?php

echo "welcome ".$_SESSION["u_name"]."<br>"."<br>";
$user_id=$_SESSION["u_id"];
$query= mysqli_query($conn,"SELECT * FROM user_note WHERE user_id='$user_id' ORDER BY time desc");
$result_check=mysqli_num_rows($query); 
if ($result_check >0) {
	while ($row = mysqli_fetch_assoc($query)) {

		echo "<br>".$row['time']."<br>".$row['note']."<br><br>" ;
	}

}


?>