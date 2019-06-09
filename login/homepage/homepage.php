<?php
session_start();
include '../db_connection.php'; 
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="../../my_profile/css/style.css">
    <link rel="stylesheet" href="../../my_profile/css/responsive.css">
</head>
<body>
	<style>
		

	#send-button {
		padding-bottom: 50px;
		margin-left: 650px;
	}

h1 { font-family: TimesNewRoman, "Times New Roman", Times, Baskerville, Georgia, serif; font-size: 24px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 26.4px; } h3 { font-family: TimesNewRoman, "Times New Roman", Times, Baskerville, Georgia, serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 15.4px; } p { font-family: TimesNewRoman, "Times New Roman", Times, Baskerville, Georgia, serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 20px; } blockquote { font-family: TimesNewRoman, "Times New Roman", Times, Baskerville, Georgia, serif; font-size: 21px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 30px; } pre { font-family: TimesNewRoman, "Times New Roman", Times, Baskerville, Georgia, serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 18.5714px; }

	</style>
<footer>
	<!--div#footer-bottom>div.container>div.row>div.col-md-6{copyrights}+div.col-md-6{footer-menu}-->
	<div id="contact">
		<div class="container">
			<div class="row">
				<div class="col-md-2">
				</div>	
				<div class="col-md-8">
					<div id="contact-right">
						<form method="post" action="update_status.php" enctype="multipart/form-data">

							<textarea rows="10" name="note" placeholder="whats in you mind..." class="form-control"></textarea>
							<input type="file" name="myimage" id="myimage">
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

echo "<center><h2>welcome ".$_SESSION["u_name"]."</h2></center><br>"."<br>";
$user_id=$_SESSION["u_id"];
$query= mysqli_query($conn,"SELECT * FROM user_note WHERE user_id='$user_id' ORDER BY time desc");
$result_check=mysqli_num_rows($query); 
if ($result_check >0) {
	while ($row = mysqli_fetch_assoc($query)) {
		$post_html='<div class="container"><div class="col-md-3"></div>
		<div class="col-md-6">
			<br>'.$row["time"].'<br><h1>'.$row["note"].'</h1><br><br>
		</div>
		<div class="col-md-3"> </div></div>';
		echo $post_html;
		//echo "<br>".$row['time']."<br>".$row['note']."<br><br>";
		$image_file= $row['picture'];
		if ($image_file!==NULL) {

			echo '<center><img src="data:image/jpeg;base64,'.base64_encode( $image_file ).'" style="width:500px;height:500px"/></center><br><br><br><br><br><br>';
		}
        
	}

}


?>