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
	?>
</head>

<body id="our_projects" class="index">
	<div id="container">
		<?php include '../global/topnav.php'; ?>
		<div id="content">
			<?php include 'sidenav.php'; ?>
			
			<div id="main">
				<h2 class="section-title">
					<a href="/our_projects">Projects</a>
				</h2>
				<ul class="grid clearfix">
					<li>
						<a href="/our_projects/category.php?c=site_design">
							<img src="/lib/images/thumbs/white_art_plaza.jpg" />
							<span>Site Design</span>
						</a>
					</li>
					<li>
						<a href="/our_projects/category.php?c=parks_recreation">
							<img src="/images/projects/parks_recreation/white_river/thumb.jpg" />
							<span>Parks &amp; Recreation</span>
						</a>
					</li>
					<li>
						<a href="/our_projects/category.php?c=streetscapes">
							<img src="/lib/images/thumbs/newalbany_1.jpg" />
							<span>Corridors &amp; Streetscapes</span>
						</a>
					</li>
					<li>
						<a href="/our_projects/category.php?c=trails_greenways">
							<img src="/images/projects/trails_greenways/legacy_trail/thumb.jpg" />
							<span>Trails &amp; Greenways</span>
						</a>
					</li>
					<li>
						<a href="/our_projects/category.php?c=downtown_revitalization">
							<img src="/lib/images/thumbs/downtown_revitalization.jpg" />
							<span>Downtown Revitalization</span>
						</a>
					</li>
					<li class="last">
						<a href="/our_projects/category.php?c=grant_writing">
							<img src="/lib/images/thumbs/irvington.jpg" />
							<span>Grant Writing</span>
						</a>
					</li>
				</ul>
			</div>
			
			<?php include '../global/footer.php'; ?>
		</div>
	</div>
</body>
</html>
