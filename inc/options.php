<?php
add_action( 'admin_init', 'pbt_settings_init' );

function pbt_settings_init(  ) { 

	register_setting( 'general', 'pbt_settings' );

	add_settings_section(
		'pbt_legal_settings_section', 
		'PBT Legal Settings', 
		'pbt_settings_section_0_callback', 
		'general'
	);

	add_settings_field( 
		'pbt_legal_disclaimer', 
		'Copyright Notice', 
		'pbt_textarea_legal_render', 
		'general', 
		'pbt_legal_settings_section' 
	);
}


function pbt_textarea_legal_render(  ) { 

	$option = get_option( 'pbt_settings' );
	?>
	<textarea cols='60' rows='5' name='pbt_settings[pbt_legal_disclaimer]'><?php echo $option['pbt_legal_disclaimer']; ?></textarea>
	<?php

}

function pbt_settings_section_0_callback(  ) { 
	echo '<p>This information will be displayed in the footer of every page on the site.</p>';
}
