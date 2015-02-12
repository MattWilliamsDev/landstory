<?php
require_once( 'data/project-data.php' );
$categories = getCategories();
?>

<ul id="sidenav" class="projects">
	<li class="home"><a href="/">Home</a></li>

	<li class="title"><a href="/our_projects">Projects</a></li>
	
	<?php foreach ( $categories as $categoryName => $category ): ?>
		<li class="<?php echo $categoryName ?><?php echo isset( $c ) && $c == $categoryName ? ' active' : '' ?>">
			<a href="/our_projects/category.php?c=<?php echo $categoryName ?>">
				<?php
				/**
				 * Category Display
				 */
				// Set $_display as $category->display_name if it exists
				// Otherwise, use $categoryName
				// $_display = isset( $category->display_name ) ? $category->display_name : $categoryName;
				$_display = $category->display_name;
				
				// Check if $_display has '__'
				// If it does, we know we need to add &amp;
				$display = formatCategoryName( $_display );
				echo $display;
				?>
			</a>
			<ul class="project-list">
				<?php
				/**
				 * Project Display
				 */
				$i = 0; // Keep index to know when to add .last
				foreach ( $category->projects as $projectName => $proj ):
					if ( $projectName !== 'display_name' ):
				?>
					<li class="<?php echo $projectName ?><?php echo $i == ( count( (array) $category->projects ) - 1 ) ? ' last' : '' ?><?php echo isset( $p ) && $p == $projectName ? ' active' : '' ?>">
						<a href="/our_projects/project.php?p=<?php echo $projectName ?>">
							<?php echo $proj->name ?>
						</a>
					</li>
				<?php
						$i++;
					endif;
				endforeach;
				?>
			</ul>
		</li>
	<?php endforeach ?>

	<li class="grant_writing<?php echo $c === 'grant_writing' ? ' active' : '' ?>">
		<a href="/our_projects/category.php?c=grant_writing">Grant Writing</a>
	</li>
</ul>