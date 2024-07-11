<?php
class Theme_Settings_Custom_Codes_Callbacks
{
    const OPTION_NAME_PREFIX = 'custom_codes';
    public static function timbertail_render_custom_codes_section($lang)
    {
        ?>
        <div class="space-y-4 mb-12">
            <p class="text-base">Enter your custom codes below. You can place custom JS scripts, GTM installation codes, and others. </p>
            <div class="space-y-2">
                <p class="text-base">To set different codes per language you can use <code>wp</code> javascript object which includes properties</p>
                <ul class="list-disc list-inside text-base">
                    <li><code>languages</code> - contain list of slugs for all languages</li>
                    <li><code>currentLanguage</code> - contain current language slug</li>
                    <li><code>siteUrl</code> - contain site url address</li>
                </ul>
            </div>
            <div class="space-y-2">
                <p class="text-base">Remember to wrap your custom non gtm script into <code>load</code> event listener. Like in the example below</p>
                <?php
                $sampleJs =
                    <<<'EOC'
                    <script>
                        window.addEventListener("load", () => {
                            // your script here
                        });
                    </script>
                    EOC;
                ?>
                <pre><code class="pre block whitespace-pre"><?php echo htmlspecialchars($sampleJs) ?></code></pre>
            </div>
        </div>
        <div class="space-y-12">
            <?php
            self::timbertail_custom_codes_head_field_cb($lang);
            self::timbertail_custom_codes_body_field_cb($lang);
            self::timbertail_custom_codes_footer_field_cb($lang);
            ?>
        </div>
        <?php
    }

    public static function timbertail_custom_codes_head_field_cb($lang)
    {
        $option = $lang ? get_option(self::OPTION_NAME_PREFIX . '_head_' . $lang) : get_option(self::OPTION_NAME_PREFIX . '_head');
        $name = $lang ? self::OPTION_NAME_PREFIX . '_head_' . esc_attr($lang) : self::OPTION_NAME_PREFIX . '_head';
        echo '
        <div class="col-span-full">
            <label for="custom_codes_head" class="block text-sm font-medium leading-6 text-gray-900">Head</label>
            <div class="mt-2">
                <textarea id="custom_codes_head" name="'. $name .'" rows="5" placeholder="Your custom code" class="block w-full max-w-4xl rounded-md border-0 p-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#38bdf8]">' . esc_textarea($option) . '</textarea>
            </div>
            <p class="mt-3 text-sm leading-6 text-gray-600">Enter your custom codes that will be placed inside the <code>&lt;head&gt;</code> tag.</p>
        </div>';
    }

    public static function timbertail_custom_codes_body_field_cb($lang)
    {
        $option = $lang ? get_option(self::OPTION_NAME_PREFIX . '_body_' . $lang) : get_option(self::OPTION_NAME_PREFIX . '_body');
        $name = $lang ? self::OPTION_NAME_PREFIX . '_body_' . esc_attr($lang) : self::OPTION_NAME_PREFIX . '_body';
        echo '
        <div class="col-span-full">
            <label for="custom_codes_body" class="block text-sm font-medium leading-6 text-gray-900">Body</label>
            <div class="mt-2">
                <textarea id="custom_codes_body" name="'. $name .'" rows="5" placeholder="Your custom code" class="block w-full max-w-4xl rounded-md border-0 p-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#38bdf8]">' . esc_textarea($option) . '</textarea>
            </div>
            <p class="mt-3 text-sm leading-6 text-gray-600">Enter your custom codes that will be placed inside the <code>&lt;body&gt;</code> tag.</p>
        </div>';
    }

    public static function timbertail_custom_codes_footer_field_cb($lang)
    {
        $option = $lang ? get_option(self::OPTION_NAME_PREFIX . '_footer_' . $lang) : get_option(self::OPTION_NAME_PREFIX . '_footer');
        $name = $lang ? self::OPTION_NAME_PREFIX . '_footer_' . esc_attr($lang) : self::OPTION_NAME_PREFIX . '_footer';
        echo '
        <div class="col-span-full">
            <label for="custom_codes_footer" class="block text-sm font-medium leading-6 text-gray-900">Footer</label>
            <div class="mt-2">
                <textarea id="custom_codes_footer" name="'. $name .'" rows="5" placeholder="Your custom code" class="block w-full max-w-4xl rounded-md border-0 p-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#38bdf8]">' . esc_textarea($option) . '</textarea>
            </div>
            <p class="mt-3 text-sm leading-6 text-gray-600">Enter your custom codes that will be placed inside the <code>&lt;footer&gt;</code> tag.</p>
        </div>';
    }
}
