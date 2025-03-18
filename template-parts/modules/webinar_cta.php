<?php
if(!defined('ABSPATH')) {
	exit;
}

$dev_tools_element_class = sanitize_title(get_sub_field('dev_tools_element_class')) ?? null;
$dev_tools_element_id = get_sub_field('dev_tools_element_id') ?? null;
if (!empty($dev_tools_element_id)) {
	$dev_tools_element_id = 'id="' . esc_attr(sanitize_title($dev_tools_element_id)) . '"';
}
?>
<section <?=$dev_tools_element_id;?>class="webinar-cta module has-bg <?=esc_attr($dev_tools_element_class);?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-middle">

			<div class="left cell small-12 tablet-6 large-5">
				<h2><?php the_sub_field('large_heading');?></h2>
				<h3 class="big-h3 violet"><?php the_sub_field('small_heading');?></h3>
			</div>
			
			<div class="right cell small-12 tablet-6 large-7">
				<div class="inner relative pull-right text-center">
					<div class="bg violet-bg pull-right"></div>
					<?php 
					$image = get_sub_field('skewed_image');
					if( !empty( $image ) ): ?>
					<div class="img-wrap">
					    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					</div>
					<?php endif; ?>	
					<?php 
					$link = get_sub_field('button_link');
					if( $link ): 
					    $link_url = $link['url'];
					    $link_title = $link['title'];
					    $link_target = $link['target'] ? $link['target'] : '_self';
					    ?>
					    <a class="button royal-bg" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					<?php endif; ?>						
				</div>		
			</div>
					
		</div>
	</div>
</section>