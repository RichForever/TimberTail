<?php

class Theme_Settings_Custom_Codes_Callbacks
{

    public static function timbertail_render_custom_codes_section()
    {
        ?>
        <div class="space-y-4 mb-12">
            <p class="text-base">Enter your custom codes below. You can place custom JS scripts, GTM installation codes and others. </p>
        </div>
        <div class="space-y-12">
            <?php
            self::timbertail_custom_codes_head_field_cb();
            self::timbertail_custom_codes_body_field_cb();
            self::timbertail_custom_codes_footer_field_cb();
            ?>
        </div>
        <?php
    }

    public static function timbertail_custom_codes_head_field_cb()
    {
        $option = get_option('custom_codes_head');
        echo '
        <div class="col-span-full">
            <label for="custom_codes_head" class="block text-sm font-medium leading-6 text-gray-900">Head</label>
            <div class="mt-2">
                <textarea id="custom_codes_head" name="custom_codes_head" rows="5" placeholder="Your custom code" class="block w-full max-w-4xl rounded-md border-0 p-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#38bdf8]">' . esc_textarea($option) . '</textarea>
            </div>
            <p class="mt-3 text-sm leading-6 text-gray-600">Enter your custom codes that will be placed inside the <code>&lt;head&gt;</code> tag.</p>
        </div>';
    }

    public static function timbertail_custom_codes_body_field_cb()
    {
        $option = get_option('custom_codes_body');
        echo '
        <div class="col-span-full">
            <label for="custom_codes_body" class="block text-sm font-medium leading-6 text-gray-900">Body</label>
            <div class="mt-2">
                <textarea id="custom_codes_body" name="custom_codes_body" rows="5" placeholder="Your custom code" class="block w-full max-w-4xl rounded-md border-0 p-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#38bdf8]">' . esc_textarea($option) . '</textarea>
            </div>
            <p class="mt-3 text-sm leading-6 text-gray-600">Enter your custom codes that will be placed inside the <code>&lt;body&gt;</code> tag.</p>
        </div>';
    }

    public static function timbertail_custom_codes_footer_field_cb()
    {
        $option = get_option('custom_codes_footer');
        echo '
        <div class="col-span-full">
            <label for="custom_codes_footer" class="block text-sm font-medium leading-6 text-gray-900">Footer</label>
            <div class="mt-2">
                <textarea id="custom_codes_footer" name="custom_codes_footer" rows="5" placeholder="Your custom code" class="block w-full max-w-4xl rounded-md border-0 p-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#38bdf8]">' . esc_textarea($option) . '</textarea>
            </div>
            <p class="mt-3 text-sm leading-6 text-gray-600">Enter your custom codes that will be placed inside the <code>&lt;footer&gt;</code> tag.</p>
        </div>';
    }
}