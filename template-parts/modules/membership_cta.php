<?php 
if(!defined('ABSPATH')) {
	exit;
}

$dev_tools_element_class = sanitize_title(get_sub_field('dev_tools_element_class')) ?? null;
$dev_tools_element_id = get_sub_field('dev_tools_element_id') ?? null;
if (!empty($dev_tools_element_id)) {
	$dev_tools_element_id = 'id="' . esc_attr(sanitize_title($dev_tools_element_id)) . '"';
}

$mcta_pricepoint = get_field('mcta_pricepoint', 'option') ?? null;
$mcta_image = get_field('mcta_image', 'option') ?? null;
$mcta_heading = get_field('mcta_heading', 'option') ?? null;
$mcta_text = get_field('mcta_text', 'option') ?? null;
$mcta_button_link = get_field('mcta_button_link', 'option') ?? null;
$mcta_disclaimer_copy = get_field('mcta_disclaimer_copy', 'option') ?? null;

$theme_brand = get_field('theme_brand', 'option') ?? null;

if( $theme_brand = 'ahdam' ) {
	$btn_bg_color = 'violet-bg';	
} else {
	$btn_bg_color = 'mint-bg';
}

if( !empty($mcta_pricepoint) || !empty($mcta_image) || !empty($mcta_heading) || !empty($mcta_text) || !empty($mcta_button_link) || !empty($mcta_disclaimer_copy) ):
?>
<section <?=$dev_tools_element_id;?>class="membership-cta module <?=esc_attr($dev_tools_element_class);?>">
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
								<?=wp_get_attachment_image( $mcta_image['id'], 'large', false, ['class' => ''] );?>
								
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
							<a class="button <?=$btn_bg_color;?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						</div>
					<?php endif; ?>	
				</div>
			<?php endif;?> 
		</div>
	</div>
	<?php if( !empty($mcta_disclaimer_copy) ):?>
		<div class="disclaimer">
			<div class="grid-container extended">
				<div class="grid-x grid-padding-x">
					<div class="cell small-12">
						<div class="light-blue-bg">
							<?=wp_kses_post($mcta_disclaimer_copy);?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif;?>
</section>	
<?php endif;?>