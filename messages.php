<?php 
session_start();
if (!isset($_SESSION['logged_in'])) {
	header('Location: sign-in.php');
}
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="quyen huynh, alex johnson">

	<?php include('styles.html') ?>
	<link rel="stylesheet" href="css/messages.css">

	<title>invit.io</title>
</head>

<body>
    <?php include('navbar.php') ?>
    
    <!-- messages page that displays contacts and the current conversation -->

	<div class="row">
		<div class="col">
			<div class="col">
				<div class="box" onClick="changeColor(this)">
					<p style="">Jane Doe</p>
					<p style="font-size: 13px;">Preview Message</p>
				</div>
			</div>
			<div class="col">
				<div class="box" onClick="changeColor(this)">
					<p style="">John Doe</p>
					<p style="font-size: 13px;">Preview Message</p>
				</div>
			</div>
			<div class="col">
				<div class="box" onClick="changeColor(this)">
					<p style="">Bob Doe</p>
					<p style="font-size: 13px;">Preview Message</p>
				</div>
			</div>
			<div class="col">
				<div class="box" onClick="changeColor(this)">
					<p style="">Alex Doe</p>
					<p style="font-size: 13px;">Preview Message</p>
				</div>
			</div>
			<div class="col">
				<div class="box" onClick="changeColor(this)">
					<p style="">Quin Doe</p>
					<p style="font-size: 13px;">Preview Message</p>
				</div>
			</div>
		</div>
		<div class="col-9">
			<div class="box2">
				<img style="display:inline-block;" src="media/profile-picture.jpg" class="profile-pic3" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" alt="">
				<p style="display:inline-block; font-weight: bold; padding: 20px;">Jane Doe</p>
			</div>
			<br></br>
			<div class="messages">
				<p>Hello, this is a test message </p>
			</div>
			<br></br>
			<div style="float: right;" class="messages">
				<p>Hellow, this is a test message</p>
			</div>
			<div class="input-group">
				<textarea class="form-control custom-control" rows="3" style="resize:none"></textarea>
				<span class="input-group-addon btn btn-primary">Send</span>
			</div>
		</div>

		<?php include('js.html') ?>

		<script>
          // Source:
           /* 
           Title: setting-background-color-of-div-on-click
           Author: Julia Shestakova
           Date: 3/15
           Code Version: Javascript
           Avalability: https://stackoverflow.com/questions/31896819/setting-background-color-of-div-on-click/31897055
           */
            
            // changes the background to gray when it is clicked

			var divItems = document.getElementsByClassName("box");

			function changeColor(item) {
				this.clear();
				item.style.backgroundColor = 'gray';
			}

			function clear() {
				for (var i = 0; i < divItems.length; i++) {
					var item = divItems[i];
					item.style.backgroundColor = 'white';
				}
			}
		</script>
</body>

</html>