<?php 
if(!defined('ABSPATH')) {
	exit;
}

$dev_tools_element_class = sanitize_title(get_sub_field('dev_tools_element_class')) ?? null;
$dev_tools_element_id = get_sub_field('dev_tools_element_id') ?? null;
if (!empty($dev_tools_element_id)) {
	$dev_tools_element_id = 'id="' . esc_attr(sanitize_title($dev_tools_element_id)) . '"';
}

$block = get_row_index();
$remove_top_spacing = get_sub_field('remove_top_spacing');
?>	
<section <?=$dev_tools_element_id;?>class="sticky-heading-nav-paragraphs module navy-bg remove-top-spacing-<?=$remove_top_spacing;?> <?=esc_attr($dev_tools_element_class);?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			
			<?php if( have_rows('paragraphs') ):?>
				<div class="nav-wrap cell small-12 medium-6 show-for-medium" data-sticky-container data-magellan>
					<div class="sticky" data-sticky data-anchor="block-<?php echo $block;?>" data-margin-top="10">
						<ul class="menu expanded vertical" data-magellan data-offset="100">
							
							<?php while ( have_rows('paragraphs') ) : the_row();?>	
							
								<?php 
									$row = get_row_index();
									$target = sanitize_title(get_sub_field('heading'));
								?>
							
								<li class="link-wrap">
									<h2>
										<a class="large-black-text grid-x align-middle" href="#<?php echo $target;?>">
											<?php the_sub_field('heading');?>
										</a>
									</h2>
								</li>

							<?php endwhile;?> 
						
						</ul>
					</div>								
				</div>
			<?php endif;?>
			
			<?php if( have_rows('paragraphs') ):?>
				<div id="block-<?php echo $block;?>" class="block cell small-12 medium-6">
				<?php while ( have_rows('paragraphs') ) : the_row();?>	
					<?php 
						$row = get_row_index();
						$target = sanitize_title(get_sub_field('heading'));
					?>
				
					<div class="section" id="<?php echo $target;?>" data-magellan-target="<?php echo strtolower($target);?>">
						<h3 class="hide-for-medium"><?php the_sub_field('heading');?></h3>
						<div class="copy-wrap"><p><span class="large-copy"><?php the_sub_field('text');?></span></p></div>
					</div>
									
				<?php endwhile;?>
				</div>
			<?php endif;?>
		
		</div>
	</div>
</section>
