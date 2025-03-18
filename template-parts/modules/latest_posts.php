<?php
if(!defined('ABSPATH')) {
	exit;
}

$dev_tools_element_class = sanitize_title(get_sub_field('dev_tools_element_class')) ?? null;
$dev_tools_element_id = get_sub_field('dev_tools_element_id') ?? null;
if (!empty($dev_tools_element_id)) {
	$dev_tools_element_id = 'id="' . esc_attr(sanitize_title($dev_tools_element_id)) . '"';
}

$block = get_row_index();

$heading = get_sub_field('heading') ?? null;

$post_types_to_show = get_sub_field('post_types_to_show') ?? null;

$knowledge_center_args = array(  
	'post_type' => 'knowledge-center',
	'post_status' => 'publish',				    
	'posts_per_page' => 2,
);
$knowledge_center_loop = new WP_Query( $knowledge_center_args ); 

$news_args = array(  
	'post_type' => 'news',
	'post_status' => 'publish',				    
	'posts_per_page' => 2,
);
$news_loop = new WP_Query( $news_args ); 

$newsletter_args = array(  
	'post_type' => 'newsletter',
	'post_status' => 'publish',				    
	'posts_per_page' => 2,
);
$newsletter_loop = new WP_Query( $newsletter_args ); 

$whitepaper_args = array(  
	'post_type' => 'newsletter',
	'post_status' => 'publish',				    
	'posts_per_page' => 2,
);
$whitepaper_loop = new WP_Query( $whitepaper_args ); 

?>
<section <?=$dev_tools_element_id;?>class="latest-posts module <?=esc_attr($dev_tools_element_class);?>">
	<div class="grid-container">
		<?php if( !empty($heading) ):?>
			<div class="grid-x grid-padding-x">
				<div class="cell small-12">
					<h2>
						<?=esc_html( $heading );?>
					</h2>
				</div>
			</div>
		<?php endif;?>
		<ul class="tabs grid-x grid-padding-x" data-tabs id="latest-news-knowledge-<?=$block;?>">
			<?php $i = 1; foreach($post_types_to_show as $post_type_to_show):
				$post_type = $post_type_to_show['post_type'] ?? null;
				$active_class = '';
				$active_aria = '';
				if( $i === 1 ) {
					$active_class = ' is-active';
					$active_aria = 'aria-selected="true"';
				}
			?>	
				<?php if( $post_type == 'knowledge-center' && $knowledge_center_loop->have_posts() ):?>
					<li class="tabs-title<?=$active_class;?> cell shrink">
						<a class="button navy-outline color-navy" href="#knowledge-center-tab-<?=$block;?>" <?=$active_aria;?>>Knowledge Center</a>
					</li>
				<?php endif;?>
				<?php if( $post_type == 'news' && $news_loop->have_posts() ):?>
					<li class="tabs-title<?=$active_class;?> cell shrink">
						<a class="button  navy-outline color-navy" href="#industry-news-tab-<?=$block;?>" <?=$active_aria;?>>Industry News</a>
					</li>
				<?php endif;?>
				<?php if( $post_type == 'newsletter' && $newsletter_loop->have_posts() ):?>
					<li class="tabs-title<?=$active_class;?> cell shrink">
						<a class="button  navy-outline color-navy" href="#newsletter-tab-<?=$block;?>" <?=$active_aria;?>>Newsletters</a>
					</li>
				<?php endif;?>
				<?php if( $post_type == 'whitepaper' && $whitepaper_loop->have_posts() ):?>
					<li class="tabs-title<?=$active_class;?> cell shrink">
						<a class="button  navy-outline color-navy" href="#whitepaper-tab-<?=$block;?>" <?=$active_aria;?>>Whitepapers</a>
					</li>
				<?php endif;?>
			<?php $i++; endforeach;?>
		</ul>
		<div class="grid-x grid-padding-x">
			<div class="cell small-12">
				<div class="tabs-content" data-tabs-content="latest-news-knowledge-<?=$block;?>">
					<?php $i = 1; foreach($post_types_to_show as $post_type_to_show):
						$post_type = $post_type_to_show['post_type'] ?? null;
						$active_class = '';
						$active_aria = '';
						if( $i === 1 ) {
							$active_class = ' is-active';
							$active_aria = 'aria-selected="true"';
						}
					?>	
					
						<?php if( $post_type == 'knowledge-center' && $knowledge_center_loop->have_posts() ):?>
							<div class="tabs-panel<?=$active_class;?>" id="knowledge-center-tab-<?=$block;?>">
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
						<?php if( $post_type == 'news' && $news_loop->have_posts() ):?>
							<div class="tabs-panel<?=$active_class;?>" id="industry-news-tab-<?=$block;?>">
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
						<?php if( $post_type == 'newsletter' && $newsletter_loop->have_posts() ):?>
							<div class="tabs-panel<?=$active_class;?>" id="newsletter-tab-<?=$block;?>">
								<div class="post-archive-card grid-x grid-padding-x align-justify">
									<?php while ( $newsletter_loop->have_posts() ) : $newsletter_loop->the_post();
										get_template_part('template-parts/loop', 'archive-news-card',
											array(
												'tag_override' => 'Newsletters',
											),
										);
									endwhile;
									wp_reset_postdata(); 
									?>
									<div class="cell small-12 text-right">
										<a class="see-all-link" href="/newsletters"><u><b>View More Newsletters</b></u></a>
									</div>
								</div>		
							</div>
						<?php endif;?>
						<?php if( $post_type == 'whitepaper' && $whitepaper_loop->have_posts() ):?>
							<div class="tabs-panel<?=$active_class;?>" id="whitepaper-tab-<?=$block;?>">
								<div class="post-archive-card grid-x grid-padding-x align-justify">
									<?php while ( $whitepaper_loop->have_posts() ) : $whitepaper_loop->the_post();
										get_template_part('template-parts/loop', 'archive-news-card',
											array(
												'tag_override' => 'Whitepapers',
											),
										);
									endwhile;
									wp_reset_postdata(); 
									?>
									<div class="cell small-12 text-right">
										<a class="see-all-link" href="/whitepapers"><u><b>View More Whitepapers</b></u></a>
									</div>
								</div>		
							</div>
						<?php endif;?>

					<?php $i++; endforeach;?>
					
				</div>
			</div>
		</div>
	</div>
</section>