<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Landstory : Landscape Architecture/Planning</title>
		<?php include '../global/header.php'; ?>
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"/>
		<style type="text/css" src="/css/gmap.css" rel="stylesheet">
			#gmap,
			#map-canvas {
				height: 128px;
				width: 300px;
				text-align: left;
			}

			.social-link {
				padding: 0;
				margin: 10px auto;
				height: 48px;
				width: 48px;
			}

			.social-link:first-child {
				margin-top: 0;
			}

			.social-link a {
				display: block;
			}
		</style>
	</head>
	
	<body id="contact_us" class="index">
		<div id="container">
			<?php include '../global/topnav.php'; ?>
			<div id="content">
				<?php include 'sidenav.php'; ?>
				<div id="main"  style="margin-bottom: 48px;">
					<h2><a href="/contact_us">CONTACT US</a></h2>
					<img src="../images/building_new.jpg" width="699" height="446" style="margin-bottom: 20px;" />
					
					<div class="row">
						<div class="col-md-4">
							<address>
								901 N. East St<br/>
								Indianapolis, Indiana 46202<br/>
								<abbr title="phone">P:</abbr> 317.951.0000<br/>
								<a href="mailto:info@landstoryla.com">info@landstoryla.com</a>
							</address>
						</div>
						
						<div class="col-md-6">
							<div id="gmap"></div>
							<br>
							<a href="//www.google.com/maps/place/901+N+East+St+46202" class="maps-link" target="_blank">View on Google Maps</a>
						</div>

						<div class="col-md-2">
							<div id="fb" class="social-link">
								<a href="//facebook.com/landstoryla">
									<img src="../images/social/facebook-icon_sm.png" alt="Facebook" title="Facebook" height="48" width="48">
								</a>
							</div>
							<div id="linkedin" class="social-link">
								<a href="//linkedin.com/company/landstory">
									<img src="../images/social/linkedin-icon_sm.png" alt="LinkedIn" title="LinkedIn" height="48" width="48">
								</a>
							</div>
						</div>
					</div>
				</div>
				<?php include '../global/footer.php'; ?>
			</div>
		</div>
		
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZKhTkOaPDfDeujUv8IBdDOpuIgSjHC30"></script>
		<script src="/js/gmap.js"></script>
	</body>
</html>
