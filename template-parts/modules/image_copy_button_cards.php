<?php
if(!defined('ABSPATH')) {
	exit;
}
$size = 'full';
$left_card = get_sub_field('left_card') ?? null;
$left_card_image = $left_card['image'] ?? null;
$left_card_copy = $left_card['copy'] ?? null;
$left_card_link = $left_card['button_link'] ?? null;

$right_card = get_sub_field('right_card') ?? null;
$right_card_image = $right_card['image'] ?? null;
$right_card_copy = $right_card['copy'] ?? null;
$right_card_link = $right_card['button_link'] ?? null;
?>
<section class="image-copy-button-cards module" data-equalizer="icb-card-img" data-equalize-on="medium">
	<div class="grid-container" data-equalizer="icb-card-content" data-equalize-on="medium">
		<div class="grid-x grid-padding-x">
			
			<?php if( $left_card ):?>
				<div class="left cell small-12 medium-6 tablet-5">
					<?php 
					$image = $left_card_image ?? null;
					if( !empty( $image ) ): ?>
					<div class="img-wrap grid-x align-bottom" data-equalizer-watch="icb-card-img">
					    <?=wp_get_attachment_image( $image['id'], $size );?>
					</div>
					<?php endif; ?>
					<?php if( !empty( $left_card_copy ) ):?>
						<div class="content-wrap" data-equalizer-watch="icb-card-content">
							<div class="copy-wrap medium-copy">
								<?=wp_kses_post($left_card_copy);?>
							</div>	
						</div>		
					<?php endif;?>
					<?php 
					$link = $left_card_link ?? null;
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
			
			<?php if( $right_card ):?>
				<div class="ight cell small-12 medium-6 tablet-5 tablet-offset-2">
					<?php 
					$image = $right_card_image ?? null;
					if( !empty( $image ) ): ?>
					<div class="img-wrap grid-x align-bottom" data-equalizer-watch="icb-card-img">
						<?=wp_get_attachment_image( $image['id'], $size );?>
					</div>
					<?php endif; ?>
					<?php if( !empty( $right_card_copy ) ):?>
						<div class="content-wrap" data-equalizer-watch="icb-card-content">
							<div class="copy-wrap medium-copy">
								<?=wp_kses_post($left_card_copy);?>
							</div>	
						</div>		
					<?php endif;?>
					<?php 
					$link = $right_card_link ?? null;
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