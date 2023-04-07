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

class Timberland extends Site {
    public function __construct() {
	    add_filter('timber/context', [$this, 'add_to_context']);
	    add_filter('timber/twig', [$this, 'add_to_twig']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
	    add_action('after_setup_theme', [$this, 'theme_supports']);
	    add_action('after_setup_theme', [$this, 'remove_header_actions']);
	    add_action('after_setup_theme', [$this, 'vendor_settings']);
	    add_action('acf/init', [$this, 'register_blocks']);
	    add_action('block_categories_all', [$this, 'register_blocks_category']);
	    add_action('init', [$this, 'register_images']);
	    add_action('init', [$this, 'register_widgets']);
        add_action('init', [$this, 'register_custom_post_types']);
        add_action('init', [$this, 'register_taxonomies']);
	    add_action('login_errors', [$this, 'custom_login_error_message']);

        parent::__construct();
    }

    public function add_to_context($context) {
        $context['site'] = $this;
        $context['menu'] = new Menu();
	    $context['options'] = get_fields('option');

        return $context;
    }

    public function add_to_twig($twig) {
        return $twig;
    }

	public function custom_login_error_message() {
		return 'Błąd!';
	}

	public function remove_header_actions() {
		require_once "lib/remove-action.php";
	}

	public function theme_supports() {
		require_once "lib/theme-supports.php";
    }

    public function enqueue_scripts() {
	    require_once "lib/enqueue-scripts.php";
    }

	public function register_images() {
		require_once "lib/images.php";
	}

	public function register_widgets() {
		require_once "lib/widgets.php";
	}

	public function register_custom_post_types() {
		require_once "lib/custom-post-types.php";
    }

    public function register_taxonomies() {
	    require_once "lib/custom-post-types.php";
    }
    public function register_blocks_category($categories) {
        return array_merge([['slug' => 'custom', 'title' => __('Custom')]], $categories);
    }

    public function register_blocks() {
	    require_once "lib/blocks-register.php";
    }

	public function vendor_settings() {
		require_once "lib/vendor-settings.php";
	}

}

new Timberland();
