<?php
if(!defined('ABSPATH')) {
	exit;
}

$block = get_row_index();

$news_args = array(  
	'post_type' => 'news',
	'post_status' => 'publish',				    
	'posts_per_page' => 2,
);
$news_loop = new WP_Query( $news_args ); 

$knowledge_center_args = array(  
	'post_type' => 'knowledge-center',
	'post_status' => 'publish',				    
	'posts_per_page' => 2,
);
$knowledge_center_loop = new WP_Query( $knowledge_center_args ); 

?>
<section class="latest-news-knowledge module">
	<div class="grid-container">
		<ul class="tabs grid-x grid-padding-x" data-tabs id="latest-news-knowledge-<?=$block;?>">
				<?php if( $news_loop->have_posts() ):?>
					<li class="tabs-title is-active cell shrink">
						<a class="button violet-bg" href="#industry-news-tab-<?=$block;?>" aria-selected="true">Industry News</a>
					</li>
				<?php endif;?>
				<?php if( $knowledge_center_loop->have_posts() ):?>
					<li class="tabs-title cell shrink">
						<a class="button navy-outline color-navy" href="#knowledge-center-tab-<?=$block;?>" aria-selected="true">Knowledge Center</a>
					</li>
				<?php endif;?>
		</ul>
		<div class="grid-x grid-padding-x">
			<div class="cell small-12">
				<div class="tabs-content" data-tabs-content="latest-news-knowledge-<?=$block;?>">
					<?php if( $news_loop->have_posts() ):?>
						<div class="tabs-panel is-active" id="industry-news-tab-<?=$block;?>">
							<div class="post-archive-card grid-x grid-padding-x align-justify">
								<?php while ( $news_loop->have_posts() ) : $news_loop->the_post();
									get_template_part('template-parts/loop', 'archive-news-card',
										array(
											'tag_override' => 'Industry News',
										),
									);
								endwhile;
								wp_reset_postdata(); 
								?>
								<div class="cell small-12 text-right">
									<a class="see-all-link" href="/industry-news"><u><b>View More Industry News</b></u></a>
								</div>
							</div>		
						</div>
					<?php endif;?>
					<?php if( $knowledge_center_loop->have_posts() ):?>
						<div class="tabs-panel" id="knowledge-center-tab-<?=$block;?>">
							<div class="post-archive-card grid-x grid-padding-x align-justify">
								<?php while ( $knowledge_center_loop->have_posts() ) : $knowledge_center_loop->the_post();
									get_template_part('template-parts/loop', 'archive-news-card',
										array(
											'tag_override' => 'Knowledge Center',
										),
									);
								endwhile;
								wp_reset_postdata(); 
								?>
								<div class="cell small-12 text-right">
									<a class="see-all-link" href="/knowledge-center"><u><b>View More Knowledge Center</b></u></a>
								</div>
							</div>
						</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
</section>