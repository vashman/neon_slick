<?php
/* Copyright (C) 2014 Sundeep S. Sangha

    This file is a part of neon_slick.

    Neon_slick is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

function
register_menu(
){
\register_nav_menus(
  array (
    'header-menu' => __('Header Menu')
  , 'footer-menu' => __('Footer Menu')
  )
);
}

/* ### Theme Menu ### */
define ('MY_OPTION_GROUP', 'my-option-group');

function
add_theme_menu(
){
\add_theme_page(
    'Advance Theme Apperance' /* page title */
  , 'Advanced'
  , 'edit_theme_options'
  , 'AdvancedMenu'
  , 'create_theme_menu_cb'
);
 \add_action('admin_init', 'register_settings');
}

/* register settings for theme */
function
register_settings(
){
\register_setting(MY_OPTION_GROUP, 'css-file');
/*\add_settings_section(
    MY_OPTION_GROUP
  , ''
);*/
}

function
create_theme_menu_cb(
){
  if (\current_user_can('manage_options') == false){
  \wp_die(__('No Acess'));
  }
?> <div class="wrap">
   <h2>Neon Theme Options</h2>
   <form method="post" action="options.php">
   <?php
   \settings_fileds(MY_OPTION_GROUP);
   \do_settings_sections(MY_OPTION_GROUP);
   \submit_button();
   ?>
   </form>
   </div> <?php
}

/* validate and make changes to the sumbitted form */
function
validate_theme_form(
  $input
){
foreach ($input as $k => $v){
$newinput[$k] = $v;
}
return $newinput;
}

/* add hooks */
  if (\is_admin()){
  \add_action('admin_menu', 'add_theme_menu');
  } else {
  \add_action('init', 'register_menu');
  }
?>
