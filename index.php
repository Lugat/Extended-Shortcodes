<?

  /**
   * Plugin Name: Extended Shortcodes
   * Plugin URI: http://squareflower.de
   * Description: Extended shortcodes for wordpress
   * Version: 0.1
   * Author: SquareFlower Websolutions (Lukas Rydygel) <hallo@squareflower.de>
   * Author URI: http://squareflower.de
   */
  
  require_once(__DIR__.'/Shortcode.php');
  
  add_action('init', function() {
        
    remove_filter('the_content', 'do_shortcode', 11);
    add_filter('the_content', 'Shortcode\Shortcode::process', 1);
    
  }, 1);
  
  add_action('init', function() {
    
    global $shortcode_tags;
    
    foreach ($shortcode_tags as $tag => $callback) {   
      Shortcode\Shortcode::register($tag, $callback);
    }
    
  }, 9999);