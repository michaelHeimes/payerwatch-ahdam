<?php
if(!defined('ABSPATH')) {
	exit;
}
$tp_small_heading = get_field('tp_small_heading', 'options') ?? null;
$tp_large_heading = get_field('tp_large_heading', 'options') ?? null;
$images = get_field('tp_logos', 'options') ?? null;;
?>
<?php if( !empty( $tp_small_heading ) || !empty( $tp_large_heading ) || !empty( $images ) ):?>
	<section class="trusted-partners module">
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<div class="cell small-12 text-center">
					<?php if( !empty( $tp_small_heading ) ):?>
						<h2 class="small-copy">
							<?=esc_html( $tp_small_heading );?>
						</h2>
					<?php endif;?>
					<?php if( !empty( $tp_large_heading ) ):?>
						<h3>
							<?=esc_html($tp_large_heading);?>
						</h3>
					<?php endif;?>
				</div>
			</div>
				
			<?php 
			if( $images ): ?>
				<div class="grid-x grid-padding-x align-center">
				<?php foreach( $images as $image ): if( $image ): ?>
					<div class="single-partner cell small-6 medium-shrink text-center grid-x align-middle align-center">
						<img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					</div>
				<?php endif; endforeach; ?>
				</div>
			<?php endif;?>
				
		</div>
	</section>
<?php endif; ?>