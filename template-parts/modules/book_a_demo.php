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
$iframe = get_sub_field('video_url') ?? null;
$copy = get_sub_field('copy') ?? null;
$image = get_sub_field('skewed_image') ?? null;
$link = get_sub_field('button_link') ?? null;
?>
<section <?=$dev_tools_element_id;?>class="book-demo module <?=esc_attr($dev_tools_element_class);?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			
			<?php if( !empty( $iframe ) ):?>
				<div class="left cell small-12 tablet-6 large-6">
					<div class="video-wrap">
						<?php
											
						// Use preg_match to find iframe src.
						preg_match('/src="(.+?)"/', $iframe, $matches);
						$src = $matches[1];
						
						// Add extra parameters to src and replace HTML.
						$params = array(
							'controls'  => 1,
							'hd'        => 1,
							'autohide'  => 1
						);
						$new_src = add_query_arg($params, $src);
						$iframe = str_replace($src, $new_src, $iframe);
						
						// Add extra attributes to iframe HTML.
						$attributes = 'frameborder="0"';
						$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
						
						// Display customized HTML.
						echo '<div class="responsive-embed widescreen">';
						echo $iframe;
						echo '</div>';
						?>
					</div>	
				</div>
			<?php endif;?>
			
			<?php if( !empty( $copy ) || !empty( $image ) || !empty( $link ) ):?>		
				<div class="right cell small-12 tablet--6 large-5 large-offset-1">
					<?php if( !empty( $copy ) ):?>
					<div class="copy-wrap relative">
						<?=wp_kses_post($copy);?>
					</div>
					<?php endif;?>
					<?php if( !empty( $image ) || !empty( $link ) ):?>	
						<div class="book relative">
							<div class="bg pull-right"></div>
							<?php 
							if( !empty( $image ) ): ?>
							<div class="img-wrap relative">
								<?=wp_get_attachment_image( $image['id'], $size );?>
							</div>
							<?php endif; ?>
							<?php 
							if( $link ): 
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								?>
							<div class="link-wrap relative">
								<a class="button royal-bg" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endif;?>
		</div>
	</div>
</section>