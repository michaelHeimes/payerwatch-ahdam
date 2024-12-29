<?php
if(!defined('ABSPATH')) {
	exit;
}
$size = 'full';
$image = get_sub_field('graphic') ?? null;
$stat_1 = get_sub_field('stat_1') ?? null;
$before1 = $stat_1['before_number'];
$number1 = $stat_1['number'];	
$after1 = $stat_1['after_number'];	
$label1 = $stat_1['label'];	
$stat_2 = get_sub_field('stat_2') ?? null;
$before2 = $stat_2['before_number'];
$number2 = $stat_2['number'];	
$after2 = $stat_2['after_number'];	
$label2 = $stat_2['label'];	
?>
<section class="graphic-and-stats module">
	<div class="grid-container">
		<div class="grid-x grid-padding-x small-up-1 medium-up-3 tablet-up-3 align-center align-middle">
			<div class="cell col">
				<?php 
				if( !empty( $image ) ): ?>
				    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
				<?php endif; ?>			
			</div>
			<?php if( $stat_1 ):?>
				<div class="cell col">
					<div class="number grid-x">
						<?php if($before1):?>
							<span class="before"><?=esc_attr(before1);?></span>
						<?php endif;?>
						<?php if($number1):?>
							<span class="stat-1" class="number" data-stat1num="<?=esc_attr($number1);?>">0</span>
						<?php endif;?>
						<?php if($after1):?>
							<span class="after"><?=esc_attr($after1);?></span>
						<?php endif;?>
					</div>
					<?php if($label1):?>
						<div class="figure-label">
							<?=esc_html( $label1 );?>
						</div>
					<?php endif;?>
				</div>
			<?php endif;?>
			<?php if( $stat_2 ):?>
				<div class="cell col">
					<div class="number grid-x">
						<?php if($before2):?>
							<span class="before"><?=esc_attr(before2);?></span>
						<?php endif;?>
						<?php if($number2):?>
							<span class="stat-2" class="number" data-stat2num="<?=esc_attr($number2);?>">0</span>
						<?php endif;?>
						<?php if($after2):?>
							<span class="after"><?=esc_attr($after2);?></span>
						<?php endif;?>
					</div>
					<?php if($label2):?>
						<div class="figure-label">
							<?=esc_html( $label2 );?>
						</div>
					<?php endif;?>
				</div>
			<?php endif;?>
		</div>
	</div>
</section>