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
$pull_wide = get_sub_field('pull_wide_optional') ?? null;
$img_or_vid = get_sub_field('image_or_video') ?? null;
$btn_style = get_sub_field('button_style') ?? null;
$click_enlarge = get_sub_field('click_to_enlarge') ?? null;
$special_image_type = get_sub_field('special_image_type') ?? null;
$mod_row = get_row_index();
$image = get_sub_field('image') ?? null;
$modal_image = get_sub_field('image_for_modal') ?? null;
$iframe = get_sub_field('video_url') ?? null;
$expert_credentials = get_sub_field('expert_credentials') ?? null;
$webinar_label = get_sub_field('webinar_label') ?? null;
$mint_btn_link = get_sub_field('button_link') ?? null;
$blue_btn_link = get_sub_field('button_link_2') ?? null;
$outline_btn_link = get_sub_field('outline_button_link') ?? null;
?>
<section <?=$dev_tools_element_id;?>class="copy-image module <?=esc_attr($dev_tools_element_class);?> <?php echo $pull_wide;?> <?php echo $img_or_vid;?> <?php if($click_enlarge):?> click-enlarge <?php endif;?> <?php echo $orientation;?> ">
	<div class="grid-container">
		<div class="grid-x grid-padding-x<?php if( $orientation == 'copy-left' ):?> medium-flex-dir-row-reverse<?php endif;?>">
			
			<div class="left cell small-12 medium-6">
				<?php if($img_or_vid == 'image'):?>
					<?php 
					if( !empty( $image ) ): ?>
					<div class="img-wrap <?php echo $special_image_type;?>">
						
						<?php if($click_enlarge):?>
							<div class="reveal" id="modal-<?php echo $mod_row;?>" data-reveal>
							<?php 
							if( !empty( $modal_image ) ): ?>
								<div class="btn-wrap text-right">
									<button class="close-button" data-close aria-label="Close modal" type="button">
										<svg xmlns="http://www.w3.org/2000/svg" width="35.536" height="35.536" viewBox="0 0 35.536 35.536">
										<g id="Group_1187" data-name="Group 1187" transform="translate(-1184.082 -2634.732)">
											<line id="Line_1" data-name="Line 1" x1="32" y2="32" transform="translate(1185.85 2636.5)" fill="none" stroke="#fff" stroke-width="5"/>
											<line id="Line_2" data-name="Line 2" x2="32" y2="32" transform="translate(1185.85 2636.5)" fill="none" stroke="#fff" stroke-width="5"/>
										</g>
										</svg>
									</button>
								</div>
								<div class="modal-img-wrap">
									<?=wp_get_attachment_image( $image['id'], $size );?>

								</div>
							<?php endif; ?>							
							</div>
							<button type="button" class="enlarge-btn relative royal-blue-bg grid-x align-middle align-center" data-open="modal-<?php echo $mod_row;?>">
								<span class="inner">
									<span class="blocker"></span>
									<span class="blocker"></span>
									<span class="relative">Click to<br>enlarge</span>
								</span>
							</button>
						<?php endif;?>
						
						<?=wp_get_attachment_image( $image['id'], $size );?>
					    
					    <?php if($special_image_type == 'expert' && !empty( $expert_credentials  ) ):?>
					    	<div class="expert-credentials">
						    	<?=wp_kses_post($expert_credentials);?>
					    	</div>
					    <?php endif;?>

					    <?php if($special_image_type == 'webinar' && !empty( $webinar_label )):?>
					    	<div class="webinar-label text-right">
						    	<span class="violet-bg"><span><?=esc_html($webinar_label);?></span></span>
					    	</div>
					    <?php endif;?>
					    
					</div>
					<?php endif; ?>		
				<?php endif;?>	
				<?php if($img_or_vid == 'video' && !empty( $iframe ) ):?>
					<div class="video-wrap">
						<?php
						
						// Load value.
						
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
						echo $iframe;
						?>				
					</div>
				<?php endif;?>
			</div>

			<div class="right cell small-12 medium-6">
				<div class="copy-wrap">
					<?php the_sub_field('copy');?>
				</div>
				<div class="grid-x grid-padding-x align-left">
					
					<?php if($btn_style == 'solid'):?>
						<?php 
						$link = $mint_btn_link;
						if( $link ): 
						    $link_url = $link['url'];
						    $link_title = $link['title'];
						    $link_target = $link['target'] ? $link['target'] : '_self';
						    ?>
						<div class="link-wrap cell shrink">
						    <a class="button mint-bg" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						</div>
						<?php endif; ?>
				
						<?php 
						$link = $blue_btn_link;
						if( $link ): 
						    $link_url = $link['url'];
						    $link_title = $link['title'];
						    $link_target = $link['target'] ? $link['target'] : '_self';
						    ?>
						<div class="link-wrap cell shrink">
						    <a class="button royal-bg" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						</div>
						<?php endif; ?>
					<?php endif; ?>
					<?php if( $btn_style == 'outlined' && !empty( $outline_btn_link )) :?>
						<?php 
						$link = $outline_btn_link;
						if( $link ): 
						    $link_url = $link['url'];
						    $link_title = $link['title'];
						    $link_target = $link['target'] ? $link['target'] : '_self';
						    ?>
						<div class="link-wrap cell style-outline">
						    <a class="button outline small" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						</div>
						<?php endif; ?>					
					<?php endif; ?>
					
				</div>
				
			</div>
					
		</div>
	</div>
</section>