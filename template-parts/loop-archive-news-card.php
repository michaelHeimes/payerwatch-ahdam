<?php
/**
 * Template part for displaying posts
 *
 * Used for single, index, archive, search.
 */
 $tag_override = $args['tag_override'] ?? null;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-archive-card cell small-12 medium-6'); ?> role="article">		
	<div class="fh inner navy-bg">				
		<a class="fh white grid-x flex-dir-column" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
			<div>
				<header class="article-header">
					<div class="archive-tag mint">
						<?php if( $tag_override ):?>
							<?=$tag_override;?>
						<?php else:?>
							News
						<?php endif;?>
					</div>
					<h2 class="white"><?php the_title(); ?></h2>
				</header> <!-- end article header -->
								
				<section class="entry-content" itemprop="text">
					<?php $excerpt = get_the_excerpt();
						$excerpt = wp_trim_words($excerpt, 40, '...');
						$result = substr($excerpt, 0, strrpos($excerpt, ' '));	
						echo $excerpt;
					?>
				</section> <!-- end article section -->
			</div>
			
			<div>				
				<footer class="article-footer">
					<div class="button white-outline">
						Read More
					</div>
				</footer> <!-- end article footer -->	
			</div>
		</a>
	</div>
</article> <!-- end article -->			    

