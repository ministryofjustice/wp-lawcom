 <?php
 // ------------------------------------------------------------------
 // Add page to settings menu
 // ------------------------------------------------------------------

function feedback_banner_add_settings_page() {
    add_options_page( 'Feedback banner', 'Feedback banner', 'manage_options', 'feedback', 'feedback_banner_render_plugin_settings_page' );
}
add_action( 'admin_menu', 'feedback_banner_add_settings_page' );


// ------------------------------------------------------------------
// Sets up different types of settings to collect
// ------------------------------------------------------------------

function feedback_banner_settings_api_init() {

 	add_settings_section(
		'feedback_banner_setting_section',
		'Feedback banner',
		'feedback_banner_setting_section_callback_function',
		'feedback_banner'
	);

	add_settings_field(
		'feedback_banner_active',
		'Feedback banner - turned on',
		'feedback_banner_checkbox_function',
		'feedback_banner',
		'feedback_banner_setting_section',
		array('option_name' => 'feedback_banner_active')
	);

 	add_settings_field(
		'feedback_banner_title',
		'Feedback banner title',
		'feedback_banner_text_field_function',
		'feedback_banner',
		'feedback_banner_setting_section',
		array('option_name' => 'feedback_banner_title')
	);

	add_settings_field(
		'feedback_banner_text',
		'Feedback banner text',
		'feedback_banner_text_field_function',
		'feedback_banner',
		'feedback_banner_setting_section',
		array('option_name' => 'feedback_banner_text')
	);

	add_settings_field(
		'feedback_banner_text',
		'Feedback banner text',
		'feedback_banner_textarea_field_function',
		'feedback_banner',
		'feedback_banner_setting_section',
		array('option_name' => 'feedback_banner_text')
	);

	add_settings_field(
		'feedback_banner_button_text',
		'Feedback banner button text',
		'feedback_banner_text_field_function',
		'feedback_banner',
		'feedback_banner_setting_section',
		array('option_name' => 'feedback_banner_button_text')
	);

	add_settings_field(
		'feedback_banner_button_link',
		'Feedback banner button link',
		'feedback_banner_text_field_function',
		'feedback_banner',
		'feedback_banner_setting_section',
		array('option_name' => 'feedback_banner_button_link')
	);

	register_setting( 'feedback_banner', 'feedback_banner_active' );
	register_setting( 'feedback_banner', 'feedback_banner_title' );
	register_setting( 'feedback_banner', 'feedback_banner_text' );
	register_setting( 'feedback_banner', 'feedback_banner_button_text' );
	register_setting( 'feedback_banner', 'feedback_banner_button_link' );
 }

 add_action( 'admin_init', 'feedback_banner_settings_api_init' );


 // ------------------------------------------------------------------
 // Creates form fields for the different settings
 // ------------------------------------------------------------------

 function feedback_banner_text_field_function($args) {
    $option_value = get_option($args['option_name']);
    ?>
    <input type='text' name='<?php echo $args['option_name']; ?>' id='<?php echo $args['option_name']; ?>'
           value='<?php echo $option_value; ?>' class='moj-component-input'>
    <?php

    return null;
}

 function feedback_banner_textarea_field_function($args) {
    $option_value = get_option($args['option_name']);
    ?>
    <textarea name='<?php echo $args['option_name']; ?>' id='<?php echo $args['option_name']; ?>'
           class='moj-component-input'><?php echo $option_value; ?></textarea>
    <?php

    return null;
}

function feedback_banner_checkbox_function($args) {
    $option_value = get_option($args['option_name']);
    ?>
    <input type='checkbox' name='<?php echo $args['option_name']; ?>' id='<?php echo $args['option_name']; ?>'
           value='yes' <?= checked('yes', $option_value ?? '') ?>
           class='moj-component-input-checkbox'>
    <?php

    return null;
}


// ------------------------------------------------------------------
// Add text at the top of the settings page to explain page
// ------------------------------------------------------------------

 function feedback_banner_setting_section_callback_function() {
 	echo '<p>Turn on and configure the banner.</p>';
 }

// ------------------------------------------------------------------
// Puts the form fields on the settings page
// ------------------------------------------------------------------

function feedback_banner_render_plugin_settings_page() {
    if (!current_user_can('manage_options')) {
        return;
    }

		?>
    <form action="options.php" method="post">
        <?php
        settings_fields( 'feedback_banner' );
        do_settings_sections( 'feedback_banner' ); ?>
        <input name="submit" class="button button-primary" type="submit" value="<?php esc_attr_e( 'Save' ); ?>" />
    </form>
    <?php
}
