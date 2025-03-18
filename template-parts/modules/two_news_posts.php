<?php
if(!defined('ABSPATH')) {
	exit;
}

$dev_tools_element_class = sanitize_title(get_sub_field('dev_tools_element_class')) ?? null;
$dev_tools_element_id = get_sub_field('dev_tools_element_id') ?? null;
if (!empty($dev_tools_element_id)) {
	$dev_tools_element_id = 'id="' . esc_attr(sanitize_title($dev_tools_element_id)) . '"';
}

$args = array(  
	'post_type' => 'news',
	'post_status' => 'publish',
	'posts_per_page' => 2,
);

$loop = new WP_Query( $args ); 

if( $loop->have_posts() ):
?>
<section <?=$dev_tools_element_id;?>class="two-news-posts module <?=esc_attr($dev_tools_element_class);?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			
			<?php			
			    while ( $loop->have_posts() ) : $loop->the_post();
				
				get_template_part('template-parts/loop', 'archive-news-card');
							    
			    endwhile;
			wp_reset_postdata(); 
			?>

		</div>
		<div class="grid-x grid-padding-x align-right">
			<div class="cell shrink">
				<a class="vm-link brand-navy grid-x align-middle" href="/news/">
					<span>View More News</span>
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
					  <defs>
					    <clipPath id="clip-path">
					      <rect width="16" height="16" fill="none"/>
					    </clipPath>
					  </defs>
					  <g id="Component_7" data-name="Component 7" clip-path="url(#clip-path)">
					    <path id="Path_10" data-name="Path 10" d="M8,0,6.545,1.455l5.506,5.506H0V9.039H12.052L6.545,14.545,8,16l8-8Z" fill="#12058f"/>
					  </g>
					</svg>	
				</a>
			</div>
		</div>
	</div>
</section>
<?php endif;?>