<?php
require_once dirname(__FILE__) . '/custom-codes/class-theme-settings-custom-codes.php';

// Enqueue Tailwind CSS and Alpine.js in WordPress admin
function timbertail_enqueue_tailwindcss_admin()
{
    $current_screen = get_current_screen();

    // Check if the current screen is our theme settings page
    if ($current_screen->id === 'toplevel_page_theme-settings') {
        // Enqueue Tailwind CSS
        wp_enqueue_script('tailwindcss', 'https://cdn.tailwindcss.com');

        // Enqueue Alpine.js
        wp_enqueue_script('alpinejs', 'https://unpkg.com/alpinejs', [], null, true);
    }
}

add_action('admin_enqueue_scripts', 'timbertail_enqueue_tailwindcss_admin');

function timbertail_add_theme_menu()
{
// Add theme page
    add_menu_page(
        'Theme Settings', // Page title
        'Theme Settings', // Menu title
        'manage_options', // Capability
        'theme-settings', // Menu slug
        'timbertail_theme_settings_page_html',
        'data:image/svg+xml;base64,ICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8c3ZnIGNsYXNzPSJ3LTgiIHZpZXdCb3g9IjAgMCAzMiAzMiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBvbHlnb24gY2xhc3M9ImIiIHBvaW50cz0iMjkuMTQ3IDI4LjE0OSAyNy40ODMgMjYuMDE2IDE3LjkxNSAyNi4wMTYgMTcuOTE1IDIzLjcyMyAyNS43MDIgMjMuNzIzIDI0LjA0OSAyMS41ODkgMTcuOTE1IDIxLjU4OSAxNy45MTUgMTkuMjk2IDI2LjAzMyAxOS4yOTYgMjQuNDk3IDE3LjE2MyAxNy45MTUgMTcuMTYzIDE3LjkxNSAxNC44NjkgMjIuODUzIDE0Ljg2OSAyMS4zMTggMTIuNzM2IDE3LjkxNSAxMi43MzYgMTcuOTE1IDEwLjQ0MyAyMi41ODcgMTAuNDQzIDIxLjA4MiA4LjMwOSAxNy45MTUgOC4zMDkgMTcuOTE1IDYuMDE2IDE5LjQ2MiA2LjAxNiAxNy45NTcgMy44ODMgMTcuOTE1IDMuODgzIDE3LjkxNSAwIDEwLjg5NyA5Ljc4MSAxNC44NDIgOS43OTIgNi44NzUgMjAuODk2IDEwLjk4MiAyMC44OTYgMi44NTQgMzIgMTcuOTE1IDMyIDE3LjkxNSAyOC4xNDkgMjkuMTQ3IDI4LjE0OSIgc3R5bGU9ImZpbGw6IHJnYig1NiwgMTg5LCAyNDgpOyI+PC9wb2x5Z29uPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvc3ZnPg==',
        99
    );
}
add_action('admin_menu', 'timbertail_add_theme_menu');

function timbertail_theme_settings_init()
{
    Theme_Settings_Custom_Codes::timbertail_register_custom_codes_settings();
}
add_action('admin_init', 'timbertail_theme_settings_init');


// Callback function to render the options page
function timbertail_theme_settings_page_html()
{
    // Check user capabilities
    if (!current_user_can('manage_options')) {
        return;
    }

    ?>
    <div class="wrap">
        <div class="min-h-full mt-8" x-data="{ activeTab: 'custom_codes' }">
            <nav class="bg-[#0b1120]">
                <div class="px-8">
                    <div class="flex h-16 items-center justify-between">
                        <div class="flex items-center w-full">
                            <div class="flex-shrink-0 flex items-center gap-4">
                                <svg class="w-8" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                    <polygon class="b" points="29.147 28.149 27.483 26.016 17.915 26.016 17.915 23.723 25.702 23.723 24.049 21.589 17.915 21.589 17.915 19.296 26.033 19.296 24.497 17.163 17.915 17.163 17.915 14.869 22.853 14.869 21.318 12.736 17.915 12.736 17.915 10.443 22.587 10.443 21.082 8.309 17.915 8.309 17.915 6.016 19.462 6.016 17.957 3.883 17.915 3.883 17.915 0 10.897 9.781 14.842 9.792 6.875 20.896 10.982 20.896 2.854 32 17.915 32 17.915 28.149 29.147 28.149" style="fill: rgb(56, 189, 248);"></polygon>
                                </svg>
                                <h2 class="text-white text-lg font-bold">TimberTail Theme Settings</h2>
                            </div>
                            <div class="block ml-auto">
                                <div class="ml-10 flex items-baseline space-x-4">
                                    <button @click.prevent="activeTab = 'custom_codes'"
                                            :class="{ 'text-[#38bdf8]': activeTab === 'custom_codes', 'text-white hover:text-[#38bdf8]': activeTab !== 'custom_codes' }"
                                            class="rounded-md px-3 py-2 text-sm font-medium focus:text-white">Custom Codes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <header class="bg-white shadow">
                <div class="px-4 py-6 px-8">
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900"
                        x-text="activeTab === 'custom_codes' ? 'Custom Codes' : ''"></h1>
                </div>
            </header>
            <main class="bg-white shadow">
                <div class="px-4 py-6 px-8">
                    <div x-show="activeTab === 'custom_codes'">
                        <?php Theme_Settings_Custom_Codes::timbertail_render_custom_codes_settings_page(); ?>
                    </div>
                    <!-- another tab with x-show here -->
                </div>
            </main>
        </div>
    </div>
    <?php
}