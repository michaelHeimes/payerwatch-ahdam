<?php
if(!defined('ABSPATH')) {
	exit;
}
$wysiwyg_editor = get_sub_field('wysiwyg_editor') ?? null;
?>
<?php if( $wysiwyg_editor ):?>
	<section class="wysiwyg-editor module">
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
	
				<div class="cell small-12">
					<?=wp_kses_post($wysiwyg_editor);?>			
				</div>
						
			</div>
		</div>
	</section>
<?php endif;?>