<!DOCTYPE html>
<html>
<head>
	<?php include './../global/header.php'; ?>

	<?php
	require_once( './data/project-data.php' );
	$projects = getProjects();
	$p = $_REQUEST[ 'p' ];
	
	if ( isset( $projects->$p ) )
		$project = $projects->$p;
	
	if ( !isset( $project ) )
	{
		foreach ( $projects as $key => $value )
		{
			
			if ( !is_array( $value->alias ) ) {
				if ( $p === $value->alias ) {
					$project = $value;
					$p = $key;
				}
			} else {
				foreach ( $value->alias as $alias ) {
					if ( $p === $alias ) {
						$project = $value;
						$p = $key;
					}
				}
			}
	
		}
	}
	$c = $project->category;
	?>
</head>

<body id="<?php echo $c ?>" class="<?php echo $p ?> projects">
	<div id="container">
		<?php include './../global/topnav.php'; ?>
		
		<div id="content">
			<?php require_once( 'sidenav.php' ); ?>
			<div id="main">
					<h2>
						<a href="/our_projects/<?php echo $c ?>"><?php echo d( $c ) ?></a> / 
						<a href="/our_projects/<?php echo $c ?>/<?php echo $p ?>.php"><?php echo $project->project_name ?></a>
					</h2>

					<?php if ( $project->images ): ?>
						<ul id="gallery">
							<?php foreach ( $project->images as $image ): ?>
								<li>
									<?php if ( substr( $image->uri, 0, 1 ) === '/' ): ?>
										<img src="<?php echo $image->uri ?>" alt="<?php echo $image->alt ? $image->alt : '' ?>" title="<?php echo $image->title ? $image->title : '' ?>">
									<?php else: ?>
										<img src="/lib/images/cropped/<?php echo $image->uri ?>" alt="<?php echo $image->alt ? $image->alt : '' ?>" title="<?php echo $image->title ? $image->title : '' ?>"/>
									<?php endif ?>
								</li>
							<?php endforeach; ?>
						</ul>

						<p id="pager" class="clearfix">
							<a id="prev" href="#">&lt;</a>
							<a id="next" href="#">&gt;</a>
							<span id="pageNum">/</span>
						</p>
					<?php endif; ?>
					

					<p class="storyline">
						<?php echo $project->storyline; ?>
					</p>

					<?php if ( $project->left ): ?>
						<ul class="left">
							<li class="list-heading">
								<h3 class="section-head">
									<?php
									if ( $project->left->heading ):
										echo $project->left->heading;
									else:
										echo 'Project Highlights';
									endif;
									?>
								</h3>
							</li>
							<?php foreach ( $project->left->items as $left ): ?>
								<li>
									<?php echo $left ?>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>

					<?php if ( $project->right ): ?>
						<ul class="right">
							<li class="list-heading">
								<h3 class="section-head">
									<?php
									if ( $project->right->heading ):
										echo $project->right->heading;
									else:
										echo '&nbsp;';
									endif;
									?>
								</h3>
							</li>
							<?php foreach ( $project->right->items as $right ): ?>
								<li>
									<?php echo $right ?>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
					
			</div>
			<?php include './../global/footer.php'; ?>
		</div>
		
	</div>

</body>
</html>
