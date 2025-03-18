<?php
if(!defined('ABSPATH')) {
	exit;
}

$dev_tools_element_class = sanitize_title(get_sub_field('dev_tools_element_class')) ?? null;
$dev_tools_element_id = get_sub_field('dev_tools_element_id') ?? null;
if (!empty($dev_tools_element_id)) {
	$dev_tools_element_id = 'id="' . esc_attr(sanitize_title($dev_tools_element_id)) . '"';
}

$heading = get_sub_field('heading') ?? null;

$today = date('Ymd');	
$args = array(  
	'post_type' => 'upcoming-webinar',
	'post_status' => 'publish',
	'meta_key'  => 'webinar_date',
	'orderby'   => 'meta_value_num',
	'order'     => 'ASC',					    
	'posts_per_page' => 99999,
	'meta_query' => array(
		'key' => 'webinar_date',
		'compare' => '>=',
		'value' => $today,
	),
);

$theme_brand = get_field('theme_brand', 'option') ?? null;

if( $theme_brand = 'ahdam' ) {
	$heading_color = 'navy';	
	$date_color = 'white';
} else {
	$heading_color = 'royal';	
	$date_color = 'mint';
}

$loop = new WP_Query( $args ); 
if( $loop->have_posts() ):
	
$post_count = $loop->post_count;
	
?>
<section <?=$dev_tools_element_id;?>class="upcoming-webinars module sky-blue-bg <?=esc_attr($dev_tools_element_class);?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			
			<?php if( !empty( $heading ) ):?>
				<div class="cell small-12">
					<h2 class="<?=$heading_color;?> h3 big-h3"><?php the_sub_field('heading');?></h2>
				</div>
			<?php endif;?>
			
			<div class="cell small-12">
				<div class="events-grid grid-x grid-padding-x align-justify">

					<?php while ( $loop->have_posts() ) : $loop->the_post();?>
						<article id="post-<?php the_ID(); ?>" <?php post_class('event-card cell small-12 medium-6 large-5'); ?> role="article">		
							<div class="fh inner">				
								<a class="fh grid-x flex-dir-column navy" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
									<div>
										<header class="article-header">
											<?php $date_string = get_field('webinar_date'); $date = DateTime::createFromFormat('Ymd', $date_string);?>
											<div class="date <?=$date_color;?> has-bg large-copy">
												<div class="bg royal-blue-bg"></div>
												<span><?php echo $date->format('m'); ?>.</span><span><?php echo $date->format('d'); ?>.</span><span><?php echo $date->format('y'); ?></span>
											</div>
											<h3 class="medium-copy navy"><?php the_title(); ?></h3>
										</header> <!-- end article header -->
														
										<section class="entry-content small-copy" itemprop="text">
											<?php the_field('event_card_excerpt');?>
										</section> <!-- end article section -->
									</div>
									
									<div>				
										<footer class="article-footer">
											<div class="vm-link brand-navy grid-x align-middle">
												<span><u>Register Here</u></span>
											</div>
										</footer> <!-- end article footer -->	
									</div>
								</a>
							</div>
						</article> <!-- end article -->			    
						
										
						<?php endwhile;
					wp_reset_postdata(); 
					?>
				</div>					
			</div>					
		</div>
	</div>
</section>
<?php endif;?>