<?php
add_options_page(
	'Theme Settings', // Page title
	'Theme Settings', // Menu title
	'manage_options', // Capability
	'theme-settings', // Menu slug
	'timbertail_theme_settings_page_html' // Callback function
);

add_action('admin_init', 'timbertail_theme_settings_init');
function timbertail_theme_settings_init() {
	// Register settings group without sanitization
	register_setting('theme_settings_group', 'custom_code_head');
	register_setting('theme_settings_group', 'custom_code_body');
	register_setting('theme_settings_group', 'custom_code_footer');

	// Add "Custom CSS/JS" tab
	add_settings_section(
		'custom_code_section', // Section ID
		'Custom codes', // Section title
		'timbertail_custom_code_section_cb', // Callback function
		'theme-settings' // Page slug
	);

	// Add text areas under "Custom CSS/JS" tab
	add_settings_field(
		'custom_code_head_field', // Field ID
		'Custom code - Head', // Field title
		'timbertail_custom_code_head_field_cb', // Callback function
		'theme-settings', // Page slug
		'custom_code_section' // Section ID
	);

	add_settings_field(
		'custom_code_body_field', // Field ID
		'Custom code - Body', // Field title
		'timbertail_custom_code_body_field_cb', // Callback function
		'theme-settings', // Page slug
		'custom_code_section' // Section ID
	);

	add_settings_field(
		'custom_code_footer_field', // Field ID
		'Custom Code - Footer', // Field title
		'timbertail_custom_code_footer_field_cb', // Callback function
		'theme-settings', // Page slug
		'custom_code_section' // Section ID
	);
}

// Callback function to display "Custom CSS/JS" tab description
function timbertail_custom_code_section_cb() {
	echo '<p>Enter your custom codes below. You can place there custom JS scripts, GTM installation codes etc.</p>';
}

// Callback function to display the "Custom CSS - Head" text area
function timbertail_custom_code_head_field_cb() {
	$option = get_option('custom_code_head');
	echo '<textarea name="custom_code_head" rows="5" cols="100">' . esc_textarea($option) . '</textarea>';
}

// Callback function to display the "Custom JavaScript - Body" text area
function timbertail_custom_code_body_field_cb() {
	$option = get_option('custom_code_body');
	echo '<textarea name="custom_code_body" rows="5" cols="100">' . esc_textarea($option) . '</textarea>';
}

// Callback function to display the "Custom JavaScript - Footer" text area
function timbertail_custom_code_footer_field_cb() {
	$option = get_option('custom_code_footer');
	echo '<textarea name="custom_code_footer" rows="5" cols="100">' . esc_textarea($option) . '</textarea>';
}

// Callback function to render the options page
function timbertail_theme_settings_page_html() {
	// Check user capabilities
	if (!current_user_can('manage_options')) {
		return;
	}

	?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form action="options.php" method="post">
			<?php
			settings_fields('theme_settings_group');
			do_settings_sections('theme-settings');
			submit_button('Save Settings');
			?>
        </form>
    </div>
	<?php
}