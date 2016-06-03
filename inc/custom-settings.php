<?php defined('ABSPATH') or die(); 

add_action( 'admin_menu', 'from_scratch_add_admin_menu' );
add_action( 'admin_init', 'from_scratch_settings_init' );


function from_scratch_add_admin_menu(  ) { 

	add_theme_page( 
		__( 'Custom Settings', 'from-scratch' ), 
		__( 'Custom Settings', 'from-scratch' ), 
		'manage_options', 
		'from_scratch', 
		'from_scratch_options_page' );

}


function from_scratch_settings_init(  ) { 

	register_setting( 'pluginPage', 'from_scratch_settings' );

	add_settings_section(
		'from_scratch_pluginPage_section1', 
		__( 'Site Settings', 'from-scratch' ), 
		'from_scratch_settings_section1_callback', 
		'pluginPage'
	);
	add_settings_section(
		'from_scratch_pluginPage_section2', 
		__( 'Social Networks', 'from-scratch' ), 
		'from_scratch_settings_section2_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'from_scratch_copyright', 
		__( 'Copyright', 'from-scratch' ), 
		'from_scratch_copyright_render', 
		'pluginPage', 
		'from_scratch_pluginPage_section1' 
	);

	add_settings_field( 
		'from_scratch_twitter', 
		__( 'Twitter URL', 'from-scratch' ), 
		'from_scratch_twitter_render', 
		'pluginPage', 
		'from_scratch_pluginPage_section2' 
	);

	add_settings_field( 
		'from_scratch_facebook', 
		__( 'Facebook URL', 'from-scratch' ), 
		'from_scratch_facebook_render', 
		'pluginPage', 
		'from_scratch_pluginPage_section2' 
	);
	
	add_settings_field( 
		'from_scratch_google', 
		__( 'Google+ URL', 'from-scratch' ), 
		'from_scratch_google_render', 
		'pluginPage', 
		'from_scratch_pluginPage_section2' 
	);


}


function from_scratch_copyright_render(  ) { 

	$options = get_option( 'from_scratch_settings' );
	?>
	<textarea cols='40' rows='5' name='from_scratch_settings[from_scratch_copyright]'><?php echo $options['from_scratch_copyright']; ?></textarea>
	<?php

}
function from_scratch_twitter_render(  ) { 

	$options = get_option( 'from_scratch_settings' );
	?>
	<input type='text' name='from_scratch_settings[from_scratch_twitter]' value='<?php echo $options['from_scratch_twitter']; ?>'>
	<?php

}
function from_scratch_facebook_render(  ) { 

	$options = get_option( 'from_scratch_settings' );
	?>
	<input type='text' name='from_scratch_settings[from_scratch_facebook]' value='<?php echo $options['from_scratch_facebook']; ?>'>
	<?php

}
function from_scratch_google_render(  ) { 

	$options = get_option( 'from_scratch_settings' );
	?>
	<input type='text' name='from_scratch_settings[from_scratch_google]' value='<?php echo $options['from_scratch_google']; ?>'>
	<?php

}


// Settings Callbacks

function from_scratch_settings_section1_callback(  ) { 

	echo __( 'The site&rsquo;s copyright, displayed in the footer', 'from-scratch' );

}
function from_scratch_settings_section2_callback(  ) { 

	echo __( 'Enter your Social Networks URLs', 'from-scratch' );

}


function from_scratch_options_page(  ) { ?>
<div class="wrap">

	<form action='options.php' method='post'>
		
		<h1><?php _e( 'Custom Settings', 'from-scratch' ); ?></h1>
		
		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>
		
	</form>

</div>
<?php }

?>