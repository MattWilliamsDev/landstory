<?php
include( 'news-articles.php' );
$i = 0;
foreach ( $news_articles as $article ):
?>
	
	<div class="panel panel-default">
		<div class="panel-heading" role="tab">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i ?>" aria-expanded="true" aria-controls="collapse<?php echo $i ?>">
					<?php echo $article->title ?>
				</a>
			</h4>
		</div>
		<div id="collapse<?php echo $i ?>" class="panel-collapse collapse<?php echo $i == 0 ? ' in' : '' ?>" role="tabpanel">
			<div class="panel-body">
				<?php
				if ( $article->body !== "" && $article->body !== NULL ):
					echo $article->body;
				elseif ( isset( $article->lists ) && count( $article->lists ) > 0 ): 
				?>
					<div class="article-body-lists">
				
						<?php foreach ( $article->lists as $entry ): ?>
							<h3 class="list-title"><?php echo $entry->title ?></h3>
							<ul>
								<?php foreach ( $entry->items as $item ): ?>
									<li class="list-item"><?php echo $item ?></li>
								<?php endforeach ?>
							</ul>
						<?php endforeach ?>
						
					</div>
				<?php endif ?>

				<?php if ( isset( $article->links ) ): ?>
					<ul class="article-links">
						
						<?php foreach ( $article->links as $link ): ?>
							<li class="article-link">
								<a href="<?php echo $link->uri ?>"><?php echo $link->display ? $link->display : $link->uri ?></a>
							</li>
						<?php endforeach ?>

					</ul>
				<?php endif ?>

			</div>
		</div>
	</div>

<?php
	$i++;
endforeach;
?>