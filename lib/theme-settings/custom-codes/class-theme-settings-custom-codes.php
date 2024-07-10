<?php
require_once 'class-theme-settings-custom-codes-callbacks.php';
class Theme_Settings_Custom_Codes
{
    public static function timbertail_register_custom_codes_settings()
    {
        register_setting('theme_settings_custom_codes_group', 'custom_codes_head');
        register_setting('theme_settings_custom_codes_group', 'custom_codes_body');
        register_setting('theme_settings_custom_codes_group', 'custom_codes_footer');
    }
    public static function timbertail_render_custom_codes_settings_page() {
        ?>
        <form action="options.php" method="post">
            <?php
            settings_fields('theme_settings_custom_codes_group');
            // Directly output the fields without the default <table>
            ?>
            <div class="col-span-full">
                <?php Theme_Settings_Custom_Codes_Callbacks::timbertail_render_custom_codes_section(); ?>
            </div>
            <div class="mt-6">
                <button type="submit"
                        class="rounded-md bg-[#38bdf8] px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#6fd3ff] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#6fd3ff]">
                    Save Settings
                </button>
            </div>
        </form>
        <?php
    }
}