<?php 
/*
Plugin Name: WPMS List sites
Plugin URI:  https://github.com/
Description: For stuff that's magical
Version:     1.0
Author:      Tom Woodward
Author URI:  https://tomwoodward.us
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: my-toolset

*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


function wpls_list_all_the_sites(){
   if(is_user_logged_in()){
      $user_id = get_current_user_id();
      $sites = get_blogs_of_user($user_id);
      //var_dump($sites);
      $html = '';
      foreach ($sites as $key => $site) {
         // code...
         $title = $site->blogname;
         $url = $site->siteurl;
         //return "{$title}";
         $html .= "<li><a href='{$url}'>{$title}</a> - <a href='{$url}/wp-admin'>dashboard</a></li>";
      }
      return "<ul id='site-list'>{$html}</ul>";
   }
}

add_shortcode( 'list-sites', 'wpls_list_all_the_sites' );


//LOGGER -- like frogger but more useful

if ( ! function_exists('write_log')) {
   function write_log ( $log )  {
      if ( is_array( $log ) || is_object( $log ) ) {
         error_log( print_r( $log, true ) );
      } else {
         error_log( $log );
      }
   }
}

  //print("<pre>".print_r($a,true)."</pre>");
