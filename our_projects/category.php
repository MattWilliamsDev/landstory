<!doctype html>
<html>
<head>
	<?php include './../global/header.php'; ?>
	
	<?php
	require_once( 'data/project-data.php' );
	$_categories = getCategories();
	$c = $_REQUEST[ 'c' ];
	$_category = $_categories->$c;
	?>

</head>

<body id="<?php $c ?>" class="index categories">

	<div id="container">
		<?php include './../global/topnav.php'; ?>

		<div id="content">
			<?php require_once( 'sidenav.php' ); ?>

			<div id="main">
				<?php if ( $c !== 'grant_writing' ): ?>
					<h2>
						<a href="/our_projects">Projects</a> / 
						<a href="/our_projects/category.php?c=<?php echo $c ?>">
							<?php echo formatCategoryName( $_category->display_name ) ?>
						</a>
					</h2>
					<ul class="grid clearfix">
						<?php include 'thumbs.php' ?>
					</ul>
				<?php else: ?>
					<?php include 'grant_writing/index.php' ?>
				<?php endif ?>
			</div>
			<?php include '../../global/footer.php' ?>
		</div>
	</div>
</body>
</html>
