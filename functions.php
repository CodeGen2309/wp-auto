<?
defined('ABSPATH') or die();

class autosfera {
  function __construct () {
    $this -> themeFolder = get_template_directory_uri();

    add_action('wp_enqueue_scripts', [$this, 'loadScripts']);
    add_action('wp_enqueue_scripts', [$this, 'loadStyles']);
    add_action('after_setup_theme',  [$this, 'loadMenu']);

    add_theme_support( 'post-thumbnails' );
  }


  function loadScripts () {
    $folder = $this -> themeFolder;

    wp_register_script('motion', "{$folder}/js/motion.min.js");
    wp_enqueue_script('motion');
  }

  public function loadMenu () {
    register_nav_menu('top_menu', 'Меню в шапке сайта');
    register_nav_menu('sidemenu', 'Боковое меню в каталоге');
    register_nav_menu('submenu', 'Выпадающее меню');
  }


  function loadStyles () {
    $folder = $this -> themeFolder;

    wp_register_style('asf-base', "{$folder}/styles/base.css");
    wp_register_style('asf-main', "{$folder}/styles/main.css");
    wp_register_style('asf-shop', "{$folder}/styles/shop.css");
    wp_register_style('asf-font', "{$folder}/fonts/roboto.css");

    wp_enqueue_style('asf-base');
    wp_enqueue_style('asf-main');
    wp_enqueue_style('asf-shop');
    wp_enqueue_style('asf-font');
  }

}


$theme = new autosfera();
?>