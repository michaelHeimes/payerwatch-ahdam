<?php
if(!defined('ABSPATH')) {
	exit;
}

$dev_tools_element_class = sanitize_title(get_sub_field('dev_tools_element_class')) ?? null;
$dev_tools_element_id = get_sub_field('dev_tools_element_id') ?? null;
if (!empty($dev_tools_element_id)) {
	$dev_tools_element_id = 'id="' . esc_attr(sanitize_title($dev_tools_element_id)) . '"';
}

$source = get_sub_field('source') ?? null;

if( $source == 'custom' ) {
	$large_text = get_sub_field('large_text') ?? null;
	$text = get_sub_field('text') ?? null;
	$link = get_sub_field('button_link') ?? null;
} else {
	$image = get_field('bbcta_logo', 'option') ?? null;
	$text = get_field('bbcta_text', 'option') ?? null;
	$link = get_field('bbcta_button_link', 'option') ?? null;	
}

$theme_brand = get_field('theme_brand', 'option') ?? null;

if( $theme_brand = 'ahdam' ) {
	$btn_bg_color = 'violet-bg';	
} else {
	$btn_bg_color = 'mint-bg';
}

?>
<section <?=$dev_tools_element_id;?>class="blue-background-cta module blue-bg color-bg <?=esc_attr($dev_tools_element_class);?>">
	<div class="grid-container<?php if( $source == 'custom') { echo ' extended'; }?>">
		<div class="grid-x grid-padding-x">
			<div class="cell small-12">
				<div class="grid-x grid-padding-x align-center align-middle">
					<?php if( $source !== 'custom' && !empty( $image ) ): ?>
						<div class="cell small-12 medium-shrink">
							<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						</div>
					<?php endif; ?>		
					<?php if( $source == 'custom' && !empty( $large_text ) ): ?>
						<div class="large-text cell small-12 medium-5">
							<p class="large-copy"><?=wp_kses_post($large_text);?></p>
						</div>
					<?php endif;?>
					<?php if( !empty( $text ) ):?>
						<div class="cell auto">
							<p class="medium-copy"><?=esc_html($text);?></p>
						</div>
					<?php endif; ?>
					<?php 
					if( $link ): 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
						<div class="cell shrink">
							<a class="button <?=$btn_bg_color;?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						</div>
					<?php endif; ?>				
				</div>
			</div>
		</div>
	</div>
</section>