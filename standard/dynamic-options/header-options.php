<?php
/**
 * 
 *  Ideal hooks Actions.
 *
 * @package Ideal Theme
 * @subpackage header Options and functions
 * @since V1.0.0
 * @version 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$ideal_options            = get_ideal_theme_options();
global $transparent_header;
$transparent_header       = $ideal_options['transparent-header'];
$is_transparent_header    = get_post_meta( get_the_ID(), 'is_header_trans', true );

if ( $is_transparent_header == 'off' ){
  $transparent_header = 0 ;
}elseif( $is_transparent_header == 'on' ) {
  $transparent_header = 1 ;
}

//Reveal a Sticky Header
if( $ideal_options['reveal-header'] == 1 ){
  add_action( 'ideal_hook_before_header' , 'ideal_reveal_header_top' );
  add_action( 'ideal_hook_after_header' , 'ideal_reveal_header_after' );

  function ideal_reveal_header_top(){
    global $ideal_options;
    global $transparent_header;
    $mode = $ideal_options['select-header-mod'];

    if( $transparent_header == 1 ){
      
      echo '<div uk-sticky="media: 960; show-on-up: true; animation: uk-animation-slide-top; cls-active uk-navbar-sticky; sel-target: .uk-navbar-container; cls-inactive: cls-inactive: uk-navbar-transparent '. $mode .'; "class="uk-sticky" style="">';
    }else{
      echo '<div uk-sticky="media: 960; show-on-up: true; animation: uk-animation-slide-top; cls-active uk-navbar-sticky; sel-target: .uk-navbar-container;"
    class="uk-sticky" style="">';

    }
  
  }
  function ideal_reveal_header_after(){
    echo '</div>';
  }
}

//Sticky Navbar fixed
if(  $ideal_options['sticky-header'] == 1  &&   ! $ideal_options['reveal-header'] == 1 ) {
    add_action( 'ideal_hook_before_header' , 'ideal_reveal_header_top' , 1, 10 );
    add_action( 'ideal_hook_after_header' , 'ideal_reveal_header_after', 1 , 10 );

    function ideal_reveal_header_top(){
      
      global $transparent_header;
      global $ideal_options;

      if(  $ideal_options['sticky-header'] == 1  &&  $transparent_header == 1 ) {

        echo '<div uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent ' . $ideal_options['select-header-mod'] .' ; top: 200" class= "kimo">
        ';
      }elseif(  $ideal_options['sticky-header'] == 1  && ! $transparent_header == 1 ) {
        echo '<div uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky;  top: 200">';

      }
      else{
        echo '<div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar">' ;
      }
    }
    function ideal_reveal_header_after(){
      echo '</div>';
    }
}elseif(   $ideal_options['sticky-header'] == 1  &&  $ideal_options['reveal-header'] == 1 ){
  /* do nothing */
} 

// bg Header with Transparent Header
if( $transparent_header == 1 ){
  add_action( 'ideal_hook_page_header_close' , 'ideal_page_header_after' );

  function ideal_page_header_after(){
    echo '<div class="header-hero"> </div>'; 
  }

}
