<?php
require_once "class-theme-settings-custom-codes-callbacks.php";

class Theme_Settings_Custom_Codes
{
    const OPTION_GROUP_NAME = "theme_settings_custom_codes_group";
    const OPTION_NAME_PREFIX = "custom_codes";
    public static function timbertail_register_custom_codes_settings()
    {
        register_setting(
            self::OPTION_GROUP_NAME,
            self::OPTION_NAME_PREFIX . "_head"
        );
        register_setting(
            self::OPTION_GROUP_NAME,
            self::OPTION_NAME_PREFIX . "_body"
        );
        register_setting(
            self::OPTION_GROUP_NAME,
            self::OPTION_NAME_PREFIX . "_footer"
        );

        $languages = pll_languages_list();
        foreach ($languages as $lang) {
            register_setting(
                self::OPTION_GROUP_NAME . "_" . $lang,
                self::OPTION_NAME_PREFIX . "_head_" . $lang
            );
            register_setting(
                self::OPTION_GROUP_NAME . "_" . $lang,
                self::OPTION_NAME_PREFIX . "_body_" . $lang
            );
            register_setting(
                self::OPTION_GROUP_NAME . "_" . $lang,
                self::OPTION_NAME_PREFIX . "_footer_" . $lang
            );
        }
    }

    public static function timbertail_render_custom_codes_settings_page()
    {
        ?>
        <form action="options.php" method="post">
            <?php
            $lang = pll_current_language("slug");
            if (!$lang) {
                $lang = ""; // Use 'default' as the identifier for general settings
                settings_fields(self::OPTION_GROUP_NAME);
            } else {
                settings_fields(self::OPTION_GROUP_NAME . "_" . $lang);
            }
            // Directly output the fields without the default <table>
        ?>
            <div>
                <?php Theme_Settings_Custom_Codes_Callbacks::timbertail_render_custom_codes_section(
                    $lang
                ); ?>
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
