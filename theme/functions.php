<?php

/**
 * @package WordPress
 * @subpackage Timberland
 * @since Timberland 1.1.0
 */

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Timber\Menu;
use Timber\Post;
use Timber\Site;
use Timber\Timber;
use Timber\PostQuery;

$timber = new Timber();

Timber::$dirname = array('views', 'blocks');

class Timberland extends Site
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
        add_action('after_setup_theme', [$this, 'theme_supports']);
        add_filter('timber/context', [$this, 'add_to_context']);
        add_filter('timber/twig', [$this, 'add_to_twig']);
        add_action('init', [$this, 'register_custom_post_types']);
        add_action('init', [$this, 'register_taxonomies']);
        add_action('block_categories_all', [$this, 'block_categories_all']);
        add_action('acf/init', [$this, 'acf_register_blocks']);
        add_action('enqueue_block_editor_assets', [$this, 'enqueue_block_editor_assets']);

        parent::__construct();
    }

    public function add_to_context($context)
    {
        $context['site'] = $this;
        $context['menu'] = new Menu();
        
        // Require block functions files
        foreach (glob(dirname(__FILE__) . "/blocks/*/functions.php") as $file) {
            require_once $file;
        }

        return $context;
    }

    public function add_to_twig($twig)
    {
        return $twig;
    }

    public function theme_supports()
    {
        add_theme_support('automatic-feed-links');
        add_theme_support(
            'html5',
            [
                'comment-form',
                'comment-list',
                'gallery',
                'caption'
            ]
        );
        add_theme_support('menus');
        add_theme_support('post-thumbnails');
        add_theme_support('title-tag');
        add_theme_support('editor-styles');
        add_editor_style('public/editor-style.css');
    }

    public function enqueue_scripts()
    {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('wc-block-style');
        wp_dequeue_script('jquery');

        $mixPublicPath = get_template_directory() . '/public';

        wp_enqueue_style('style', get_template_directory_uri() . '/public/' . $this->mix("styles.css", $mixPublicPath));
        wp_enqueue_script('app', get_template_directory_uri() . '/public/' . $this->mix("scripts.js", $mixPublicPath), array(), '', true);
    }

    public function register_custom_post_types()
    {
        // Example
        // $labels = [
        //     "name" => "Example",
        //     "singular_name" => "Example",
        // ];

        // $args = [
        //     "label" => "Example",
        //     "labels" => $labels,
        //     "description" => "",
        //     "public" => true,
        //     "publicly_queryable" => true,
        //     "show_ui" => true,
        //     "show_in_rest" => true,
        //     "rest_base" => "",
        //     "rest_controller_class" => "WP_REST_Posts_Controller",
        //     "has_archive" => false,
        //     "show_in_menu" => true,
        //     "show_in_nav_menus" => true,
        //     "delete_with_user" => false,
        //     "exclude_from_search" => false,
        //     "capability_type" => "post",
        //     "map_meta_cap" => true,
        //     "hierarchical" => false,
        //     "rewrite" => ["slug" => "example", "with_front" => true],
        //     "query_var" => true,
        //     "menu_icon" => "dashicons-groups",
        //     "supports" => ["title"],
        // ];

        // register_post_type("example", $args);
    }

    public function register_taxonomies()
    {
        // Example
        // $labels = [
        //     "name" => "Example",
        //     "singular_name" => "Example",
        // ];

        // $args = [
        //     "label" => "Example",
        //     "labels" => $labels,
        //     "public" => true,
        //     "publicly_queryable" => true,
        //     "hierarchical" => false,
        //     "show_ui" => true,
        //     "show_in_menu" => true,
        //     "show_in_nav_menus" => true,
        //     "query_var" => true,
        //     "rewrite" => ['slug' => 'example', 'with_front' => true,],
        //     "show_admin_column" => false,
        //     "show_in_rest" => true,
        //     "rest_base" => "example",
        //     "rest_controller_class" => "WP_REST_Terms_Controller",
        //     "show_in_quick_edit" => false,
        // ];

        // register_taxonomy("example", ["posttype"], $args);
    }

    public function block_categories_all($categories) {
        return array_merge([['slug' => 'custom', 'title' => __('Custom')]], $categories);
    }

    public function acf_register_blocks() {
        foreach (new DirectoryIterator(dirname(__FILE__) . '/blocks') as $dir) {
            if ($dir->isDot()) continue;

            register_block_type( dirname(__FILE__) . '/blocks/' . $dir->getFilename() . '/block.json' );
        }
    }

    public function acf_block_render_callback( $block, $content = '', $is_preview = false ) {
        $context = Timber::context();
        $context['block'] = $block;
        $context['fields'] = get_fields();
        $context['is_preview'] = $is_preview;
        $dirName = str_replace('acf/', '', $block['name']);
    
        Timber::render('blocks/'. $dirName . '/index.twig', $context);
    }

    public function enqueue_block_editor_assets() {
        //wp_enqueue_style('prefix-editor-font', '//fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap');
        wp_enqueue_script('app', get_template_directory_uri() . '/assets/build/app.js');
    }

    public function mix($path, $manifestDirectory) {
        static $manifest;

        if (! $manifest) {
            if (! file_exists($manifestPath = $manifestDirectory.'/manifest.json')) {
                throw new Exception('The Mix manifest does not exist.');
            }
            $manifest = json_decode(file_get_contents($manifestPath), true);
        }

        if (strpos($path, '/') !== 0) {
            $path = "{$path}";
        }


        if (! array_key_exists($path, $manifest)) {
            throw new Exception(
                "Unable to locate Mix file: {$path}. Please check your webpack.mix.js output paths and try again."
            );
        }

        return $manifest[$path];
    }
}

new Timberland();
