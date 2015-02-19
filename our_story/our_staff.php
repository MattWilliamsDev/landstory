<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Staff Stories">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Landstory : Landscape Architecture/Planning</title>
	
	<?php
	include '../global/header.php';
	$_storiesDir = '/js/lib/staff-stories';
	?>
	
	<!-- <link rel="stylesheet" href="<?php echo $_storiesDir ?>/bower_components/bootstrap/dist/css/bootstrap.css"> -->
	<link rel="stylesheet" href="<?php echo $_storiesDir ?>/app/css/staffstories.css">
	
</head>

<body id="ourstory" class="ourstaff">
	<div id="container">
		<?php include '../global/topnav.php'; ?>
		<div id="content">
			<?php include 'sidenav.php'; ?>
			<div id="main">
				<h2>
					<a href="/our_story">OUR STORY</a>
					&nbsp;/&nbsp;
					<a href="/our_story/our_staff.php">OUR STAFF</a>
				</h2>
				
				<!-- 
				This is where the magic happens.
				By magic, I mean JS.
				 -->
				<div class="staffstories"></div>

			</div>
			<?php include '../global/footer.php'; ?>
		</div>
	</div>

    <script src="<?php echo $_storiesDir ?>/bower_components/requirejs/require.js"></script>
	<script src="<?php echo $_storiesDir ?>/common/js/require-config.js"></script>
	<script src="<?php echo $_storiesDir ?>/app/js/app-start.js"></script>
</body>

</html>
