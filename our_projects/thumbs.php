<?php foreach ( $_category->projects as $pName => $proj ): ?>
	<li class="thumb-list">
		<div class="thumb">
			<a href="/our_projects/project.php?p=<?php echo $pName ?>">
				<?php if ( substr( $proj->images[0]->uri, 0, 1 ) === '/' ): ?>
					<!-- <img src="<?php echo $proj->images[0]->uri ?>"> -->
					<img src="/lib/images/thumbs/<?php echo $pName ?>.jpg">
				<?php else: ?>
					<img src="/lib/images/thumbs/<?php echo $proj->images[0]->uri ?>"/>
				<?php endif ?>
				<span>
					<?php echo $proj->location ?><br/>
					<?php echo $proj->project_name ?>
				</span>
			</a>
		</div>
	</li>
<?php endforeach ?>
