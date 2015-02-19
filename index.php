<!doctype html>
<html>
<head>
	<?php include 'global/header.php'; ?>
	<?php require_once 'our_projects/data/project-data.php' ?>
	<?php $_projects = getProjects() ?>
</head>
<body id="home">
	<div id="intro">
		<div class="logo"></div>
	</div>
	
	<div id="container">
		<?php include 'global/topnav.php'; ?>
		<div id="content">
			<div id="featured">
				<h2>Featured Projects</h2>
				<ul id="gallery">
					<?php
					$imgs = array(
						'white_art_plaza'
						, 'lucas_oil'
						, 'legacy_trail'
						, 'new_albany'
						, 'irvington'
						, 'mdcc'
						);
					foreach ( $imgs as $proj ):
					?>
						<li>
							<div class="center-cropped" style="background-image: url('/lib/images/cropped/<?php echo $proj ?>.jpg')">
								<a href="/our_projects/project.php?p=<?php echo $proj ?>">
									<img src="/lib/images/cropped/<?php echo $proj ?>.jpg">
								</a>
								<p><?php echo $_projects->$proj->name ?> | <?php echo $_projects->$proj->location ?></p>
							</div>
						</li>
					<?php endforeach ?>
				</ul>
				<p id="pager" class="clearfix"><a id="prev" href="#">&lt;</a><a id="next" href="#">&gt;</a><span id="pageNum">/</span></p>
				<p id="brandpromise">
					Landstory is a single discipline landscape architecture firm committed to interpreting each client's unique story, delivering creative, distinctive and sustainable design, a high level of technical competence and a return on investment.
				</p>
			</div>

			<div id="news">
				<h2>News Highlights</h2>

				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<?php include( 'news.php' ) ?>
				
					<div class="panel panel-default">
						<div class="panel-heading" role="tab">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseAwards" aria-expanded="true" aria-controls="collapseAwards">
									Awards
								</a>
							</h4>
						</div>

						<div id="collapseAwards" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingAwards">
							<div class="panel-body">
								<ul>
									<li>
										<strong>Outstanding Overall Achievement Award for a non-TMA MPO</strong>
										<br>
										<a href="/our_projects/project.php?p=university_ave">University Avenue Corridor Study</a>
									</li>

									<li>
										<strong>Monumental Affair Award</strong>
										<br>
										<a href="/our_projects/project.php?p=jw_marriot">JW Marriot White Art Plaza</a>
									</li>

									<li>
										<strong>Mid-America Trails &amp; Greenways State of Kentucky Award</strong>
										<br>
										<a href="/our_projects/project.php?p=legacy_trail">Lexington Legacy Trail</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="panel panel-default">
						<div class="panel-heading" role="tab">
							<h4 class="panel-title">
								<a href="#collapseProjects" data-toggle="collapse" data-parent="#accordion">
									Featured Landstory projects
								</a>
							</h4>
						</div>

						<div id="collapseProjects" class="panel-collapse collapse" role="tabpanel">
							<div class="panel-body">
								<ul class="circle-list">
									<li><a href="/our_projects/project.php?p=new_albany">Main Street Improvements Streetscape</a> | New Albany, Indiana</li>
									<li><a href="/our_projects/project.php?p=mdcc">Medical Diagnosis Corporate Campus Site Design</a> | Indianapolis, Indiana</li>
									<li><a href="/our_projects/project.php?p=white_art_plaza">JW Marriott White Art Plaza</a>  |  Indianapolis, Indiana</a></li>
									<li><a href="/our_projects/project.php?p=legacy_trail">Legacy Trail</a> | Lexington, Kentucky</li>
									<li><a href="/our_projects/project.php?p=lucas_oil">Lucas Oil Stadium</a>  | Indianapolis, Indiana</li>
									<li><a href="/our_projects/project.php?p=irvington">Irvington Neighborhood</a> | Indianapolis, Indiana</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		
			<?php include 'global/footer.php'; ?>
		</div>
	</div>
</body>
</html>