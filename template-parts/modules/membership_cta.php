<?php 
if(!defined('ABSPATH')) {
	exit;
}
$mcta_pricepoint = get_field('mcta_pricepoint', 'option') ?? null;
$mcta_image = get_field('mcta_image', 'option') ?? null;
$mcta_heading = get_field('mcta_heading', 'option') ?? null;
$mcta_text = get_field('mcta_text', 'option') ?? null;
$mcta_button_link = get_field('mcta_button_link', 'option') ?? null;

if( !empty($mcta_pricepoint) || !empty($mcta_image) || !empty($mcta_heading) || !empty($mcta_text) || !empty($mcta_button_link) ):
?>
<section class="membership-cta">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-justify">
			<?php if( !empty($mcta_pricepoint) || !empty($mcta_image) ):?>
				<div class="cell small-12 medium-6 tablet-5">
					<div class="price-image">
						<?php if( !empty($mcta_pricepoint) ):?>
							<div class="royal-blue-bg h4">
								<?=esc_html( $mcta_pricepoint );?>
							</div>
						<?php endif;?>
						<?php if( !empty($mcta_image) ):?>
							<div class="img-wrap">
								<?=wp_get_attachment_image( $mcta_image['id'], 'large' );?>
							</div>
						<?php endif;?>
					</div>
				</div>
			<?php endif;?>
			<?php if(!empty($mcta_heading) || !empty($mcta_text) || !empty($mcta_button_link) ):?>
				<div class="cell small-12 medium-6">
					<?php if( !empty($mcta_heading) ):?>
						<h2 class="h3"><?=esc_html($mcta_heading);?></h2>
					<?php endif;?> 
					<?php if( !empty($mcta_text) ):?>
						<p class="large-copy"><?=esc_html($mcta_text);?></p>
					<?php endif;?> 
					<?php 
					if( $mcta_button_link ): 
						$link_url = $mcta_button_link['url'];
						$link_title = $mcta_button_link['title'];
						$link_target = $mcta_button_link['target'] ? $mcta_button_link['target'] : '_self';
						?>
						<div class="cell shrink">
							<a class="button mint-bg" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						</div>
					<?php endif; ?>	
				</div>
			<?php endif;?> 
		</div>
	</div>
</section>	
<?php endif;?>