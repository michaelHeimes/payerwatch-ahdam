<?php
if(!defined('ABSPATH')) {
	exit;
}
$directions_url = get_field('directions_url', 'option') ?? null;
$email_address = get_field('email_address', 'option') ?? null;
$phone_number = get_field('phone_number', 'option') ?? null;
$form_copy = get_field('form_copy') ?? null;
$form_id = get_field('form_id') ?? null;
if( empty($form_id) ) {
	$form_id = 1;
}
?>
<section class="contact-form module has-bg">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell small-12 tablet-10 tablet-offset-1">
				<div class="inner relative">
					<div class="bg navy-bg"></div>
					<div class="grid-x grid-padding-x">
						<div class="relative cell small-12 tablet-10 tablet-offset-1">
							<h2 class="small-copy">Contact <span><?php bloginfo('name'); ?></span></h2>
							<?php if( !empty( $directions_url ) || !empty( $email_address ) || !empty( $phone_number ) || !empty( $form_copy ) ):?>
								<div class="contact">
									<?php if( !empty( $directions_url ) ):?>
										<div>
											<a href="<?=esc_url($directions_url);?>" target="_blank">
												<?=esc_html( $directions_url );?>
											</a>
										</div>
									<?php endif;?>
									<?php if( !empty( $email_address ) ):?>
										<div>
											<a href="mailto:<?=esc_html($email_address);?>">
												<?=esc_html($email_address);?>
											</a>									
										</div>
									<?php endif;?>
									<?php if( !empty( $phone_number ) ):?>
										<div>
											<a href="tel:<?=esc_attr($phone_number);?>">
												+<?=esc_attr($phone_number);?>
											</a>
										</div>
									<?php endif;?>
								</div>
							<?php endif;?>
							<div class="form-wrap white">
								<?php if( !empty( $form_copy ) ):?>
									<p><?=esc_html($form_copy);?></p>
								<?php endif;?>
								<?php gravity_form( $form_id, false, false, false, '', true );?>
							</div>
						</div>
					</div>
				</div>		
			</div>
					
		</div>
	</div>
</section>