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
$orientation = get_sub_field('orientation') ?? null;
$copy = get_sub_field('copy') ?? null;
$image = get_sub_field('image') ?? null;
$download_button_1 = get_sub_field('download_button_1') ?? null;
$download_button_2 = get_sub_field('download_button_2') ?? null;
?>
<section <?=$dev_tools_element_id;?>class="copy-image module <?=esc_attr($dev_tools_element_class);?> <?php echo $orientation;?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x<?php if( $orientation == 'copy-left' ):?> medium-flex-dir-row-reverse<?php endif;?>">
			
			<div class="left cell small-12 medium-6">
				<?php 
				if( !empty( $image ) ): ?>
				<div class="img-wrap">
					<?=wp_get_attachment_image( $image['id'], $size );?>
				</div>
				<?php endif; ?>		
			</div>

			<div class="right cell small-12 medium-6">
				<?php if( $copy ):?>
					<div class="copy-wrap">
						<?=$copy;?>
					</div>
				<?php endif;?>
				<div class="grid-x grid-padding-x align-left">					
					<?php 
					$link = $download_button_1;
					if( $link ): 
						$link_title = $link['button_text'];
						$link_file = $link['file'];
					?>
					<div class="link-wrap cell shrink">
						<a class="button violet-bg" href="<?php echo esc_url( $link_file ); ?>" target="_blank">
							<svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#a)" fill="#050D57"><path d="M7 0c-.43 0-.783.337-.783.748v11.591L1.339 7.658a.81.81 0 0 0-1.108 0 .726.726 0 0 0 0 1.058l6.217 5.938a.959.959 0 0 0 .117.093h.032l.102.052h.047a.52.52 0 0 0 .254.026c.05.004.106.004.157 0a.411.411 0 0 0 .097-.026h.047l.102-.052h.032l.12-.094 6.214-5.937a.726.726 0 0 0 0-1.058.81.81 0 0 0-1.108 0L7.783 12.32V.748C7.783.337 7.431 0 7 0ZM.783 18h12.434c.43 0 .783-.337.783-.748s-.352-.748-.783-.748H.783c-.43 0-.783.337-.783.748 0 .412.352.748.783.748Z"/></g><defs><clipPath id="a"><path fill="#fff" d="M0 0h14v18H0z"/></clipPath></defs></svg>
							<span><?php echo esc_html( $link_title ); ?></span>
						</a>
					</div>
					<?php endif; ?>		
			
					<?php 
					$link = $download_button_2;
					if( $link ): 
					    $link_title = $link['button_text'];
						$link_file = $link['file'];
					?>
					<div class="link-wrap cell shrink">
					    <a class="button violet-bg" href="<?php echo esc_url( $link_file ); ?>" target="_blank">
							<svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#a)" fill="#050D57"><path d="M7 0c-.43 0-.783.337-.783.748v11.591L1.339 7.658a.81.81 0 0 0-1.108 0 .726.726 0 0 0 0 1.058l6.217 5.938a.959.959 0 0 0 .117.093h.032l.102.052h.047a.52.52 0 0 0 .254.026c.05.004.106.004.157 0a.411.411 0 0 0 .097-.026h.047l.102-.052h.032l.12-.094 6.214-5.937a.726.726 0 0 0 0-1.058.81.81 0 0 0-1.108 0L7.783 12.32V.748C7.783.337 7.431 0 7 0ZM.783 18h12.434c.43 0 .783-.337.783-.748s-.352-.748-.783-.748H.783c-.43 0-.783.337-.783.748 0 .412.352.748.783.748Z"/></g><defs><clipPath id="a"><path fill="#fff" d="M0 0h14v18H0z"/></clipPath></defs></svg>
							<span><?php echo esc_html( $link_title ); ?></span>
						</a>
					</div>
					<?php endif; ?>					
				</div>
				
			</div>
					
		</div>
	</div>
</section>