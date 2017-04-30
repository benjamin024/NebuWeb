<?php
	include("menu.php");
?>
<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<br><br><center><span style='font-size: 2.8em; font-weight: bold;'>Notifications</span><br><br>
					<div class="alert alert-success alert-dismissable">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
					  <span class="glyphicon glyphicon-screenshot" aria-hidden="true"></span>
					  Station <b>3037343657357101</b> has changed to status <b> GREEN </b><br><br>
					  05:48:19
					</div>

					<div class="alert alert-info alert-dismissable">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
					  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					  Employee <b>Pancho</b> has checked in station 3037343657357101<br><br>
					  03:15:39
					</div>

					<div class="alert alert-info alert-dismissable">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
					  <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
					  Service was scheduled for today in station <b>3037343657357101</b><br><br>
					  11:28:52
					</div>

					<div class="alert alert-danger alert-dismissable">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
					  <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
					  Station <b>3037343657357101</b> has been <b>RED</b> for longer than 10 minutes<br><br>
					  22:05:55
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
