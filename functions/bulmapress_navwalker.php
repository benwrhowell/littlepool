<?php
/**
 * Custom Navwalker Class
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bulmapress
 *
 * Class Name: bulmapress_navwalker
 * Description: A custom WordPress nav walker class to implement the Bulma navigation style in a custom theme using the WordPress built in menu manager.
 * Version: 0.0.1
 * Author: Scops UG (haftungsbeschränkt)
 * Credit: Based on Bootstrap navwalker from Edward McIntyre - @twittem
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */


  class bulma_navwalker extends Walker_Nav_Menu {
    // Opening markup for dropdowns
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= "<div class='navbar-dropdown is-boxed'>";
    }

    // Links/Icons/Dropdowns
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

      $liClasses = 'navbar-item';
      $hasChildren = $args->walker->has_children;
      $liClasses .= $hasChildren? " has-dropdown is-hoverable": "";
      $hasDesc = $args->walker->has_description;
      $description = $item->description;
      $is_current_item = '';
      $is_current_item_parent = '';
      $customClasses = $item->classes[0];

      if(array_search('current-menu-item', $item->classes) != 0)
      {
          $is_current_item = 'is-active';
      }

      if(array_search('current-page-ancestor', $item->classes) != 0)
      {
          $is_current_item_parent = 'is-active';
      }

    




      // Checks description field for a value and returns markup etc.. if so
      if ( !empty($description)  ) {
            $icon = "<span class='icon is-large'><img src='".$item->description."'></i></span>";
      }
      // Checks for dropdowns
      if($hasChildren){
          $output .= "<div class='".$liClasses."'>";
          $output .= "\n<a class='navbar-link ".$is_current_item." ".$is_current_item_parent."' href='".$item->url."'>".$icon."".$item->title."</a>";
      }
      // Carries on creating menu item
      else {
          $output .= "<a class='".$customClasses." ".$liClasses." ".$is_current_item."' href='".$item->url."'> ".$icon."".$item->title;
      }
      // Adds has_children class to the item so end_el can determine if the current element has children
      if ( $hasChildren ) {
          $item->classes[] = 'has_children';
      }


        return $classes;
    }

    // Adds closing markup for normal or dropdown items
    public function end_el(&$output, $item, $depth = 0, $args = array(), $id = 0 ){
      if(in_array("has_children", $item->classes)) {
          $output .= "</div>";
      }
      $output .= "</a>";
    }
    public function end_lvl (&$output, $depth = 0, $args = array()) {
      $output .= "</div>";
    }

  }


?>
