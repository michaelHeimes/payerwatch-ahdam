<?php
if(!defined('ABSPATH')) {
	exit;
}
$image = get_field('alt_preview_image', 'option') ?? null;;
$heading = get_field('alt_heading', 'option') ?? null;
$text = get_field('alt_text', 'option') ?? null;
$alt_form_id = get_field('alt_form_id', 'option') ?? null;

if( empty( get_field('alt_form_id', 'option' ) ) )  {
	$alt_form_id = 3;
}
?>
<section class="appeal-letter-template module has-bg color-bg">
	<div class="bg royal-blue-bg skewed-bg"></div>
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell small-12">
				<div class="animate grid-x grid-padding-x">
					<div class="left relative small-12 tablet-4 large-3 large-offset-1 navy-bg">
						<?php 
						if( !empty( $image ) ): 
							$size = 'full';
						?>
						<div class="img-wrap">
						    <?=wp_get_attachment_image( $image['id'], $size );?>
						</div>
						<?php endif; ?>						
					</div>
					<div class="right small-12 tablet-8 large-8 relative">
						<div class="bg navy-bg"></div>
						<h2 class="white relative"><?=esc_html($heading);?></h2>
						<div class="form-wrap relative">
							<div class="white relative"><?=wp_kses_post($text);?></div>
							<?php gravity_form( $alt_form_id, false, false, false, '', true );?>
						</div>
					</div>					
				</div>
			</div>
					
		</div>
	</div>
</section>