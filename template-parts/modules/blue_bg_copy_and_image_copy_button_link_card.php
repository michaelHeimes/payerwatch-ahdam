<?php
if(!defined('ABSPATH')) {
	exit;
}

$dev_tools_element_class = sanitize_title(get_sub_field('dev_tools_element_class')) ?? null;
$dev_tools_element_id = get_sub_field('dev_tools_element_id') ?? null;
if (!empty($dev_tools_element_id)) {
	$dev_tools_element_id = 'id="' . esc_attr(sanitize_title($dev_tools_element_id)) . '"';
}

$size = 'full';
$left_card = get_sub_field('left_card') ?? null;
$left_card_header = $left_card['heading'] ?? null;
$left_card_copy = $left_card['copy'] ?? null;
$right_card = get_sub_field('right_card') ?? null;
$image = $right_card['image'] ?? null;
$copy = $right_card['copy'] ?? null;
$link = $right_card['button_link'] ?? null;
?>
<section <?=$dev_tools_element_id;?>class="blue-bg-image-copy-button-cards module <?=esc_attr($dev_tools_element_class);?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			
			<?php if( $left_card ):	?>	
				<div class="left relative cell small-12 medium-6">
					<div class="bg royal-blue-bg pull-left"></div>
					<?php if( !empty( $left_card_header ) ):?>
						<h2 class="white relative"><?=esc_html($left_card_header);?></h2>
					<?php endif;?>
					<div class="g-pipe relative">
						<span></span>
					</div>
					<div class="copy-wrap white relative"><?=wp_kses_post($left_card_copy);?></div>	
				</div>
			<?php endif;?>

			<?php if( $right_card ):?>
				<div class="left cell small-12 medium-6">
					<?php 
					if( !empty( $image ) ): ?>
					<div class="img-wrap">
					    <?=wp_get_attachment_image( $image['id'], $size );?>
					</div>
					<?php endif; ?>
					<?php if( !empty( $copy ) ):?>
						<h2 class="h3">
							<?=wp_kses_post($copy);?>
						</h2>
					<?php endif;?>
					<div class="copy-wrap medium-copy">
						<?php the_sub_field('copy');?>
					</div>		
					<?php 
					if( $link ): 
					    $link_url = $link['url'];
					    $link_title = $link['title'];
					    $link_target = $link['target'] ? $link['target'] : '_self';
					    ?>
					<div class="link-wrap">
					    <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					</div>
					<?php endif; ?>
				</div>
			<?php endif;?>
					
		</div>
	</div>
</section>