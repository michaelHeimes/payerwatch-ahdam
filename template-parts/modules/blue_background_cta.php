<?php
if(!defined('ABSPATH')) {
	exit;
}
$image = get_field('bbcta_logo', 'option') ?? null;
$text = get_field('bbcta_text', 'option') ?? null;
$link = get_field('bbcta_button_link', 'option') ?? null;
?>
<section class="blue-background-cta module blue-bg color-bg">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell small-12">
				<div class="grid-x grid-padding-x align-center align-middle">
					<?php if( !empty( $image ) ): ?>
						<div class="cell small-12 medium-shrink">
							<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						</div>
					<?php endif; ?>		
					<?php if( !empty( $text ) ):?>
						<div class="cell auto">
							<p class="large-copy"><?=esc_html($text);?></p>
						</div>
					<?php endif; ?>
					<?php 
					if( $link ): 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
						<div class="cell shrink">
							<a class="button mint-bg" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						</div>
					<?php endif; ?>				
				</div>
			</div>
		</div>
	</div>
</section>