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

namespace neon_slick_namespace;

/* register menu locations in the theme.*/
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
define ('MY_OPTION_GROUP', __NAMESPACE__ . 'my-option-group');
define ('THEME_MENU_SLUG', __NAMESPACE__ . 'AdvancedMenu');

/* options */
define ('CSS_FILE', __NAMESPACE__ 'css-file'); // css string file name
define ('RECENT_CATS', __NAMESPACE__ . 'recent_cats'); // recent posts category array

/* field ids used by id tags for rendered fields */
define ('CSS_SELECTER', __NAMESPACE__ . 'css_selecter');
define ('RECENT_CATS_SELECTER', __NAMESPACE__ . 'recent_cats_selecter');

/* add theme menu pages */
function
add_theme_menu(
){
\add_theme_page(
    'Advance Theme Apperance' /* page title */
  , 'Advanced' /* label in menu */
  , 'edit_theme_options' /* premissons / capability */
  , THEME_MENU_SLUG
  , __NAMESPACE__ . 'create_theme_menu_cb'
);
}

/* css-file save sanitize */
function
css_sanitize(
  $input
){
$output = '';
$output = $input;
return \apply_filters('css_sanitize_filter', $output, $input);
}

/* show recent categorys sanitize on save */
function
recent_cat_sanitize(
  $input
){
var_dump($input);
exit;
$options = get_recent_cats();
/* check if input is new or editing a previous element by its index id
number. */
  if ($input['index'] == -1){ // add new
  array_push($options, $input);
  } elseif ($input['index'] < count($options)){ // edit previous data
  $options[$input['index']] = $input;
  }
return \apply_filters('recent_cats_filter', $output, $input);
}

/* register settings for theme */
function
register_settings(
){
\register_setting(MY_OPTION_GROUP, CSS_FILE, __NAMESPACE__ .'css_sanitize');
\register_setting(MY_OPTION_GROUP, RECENT_CATS, __NAMESPAE__ . 'recent_cat_sanitize');

\add_settings_section(
    MY_OPTION_GROUP
  , 'Site Style'
  , 'create_theme_style_options'
  , THEME_MENU_SLUG
);

\add_settings_field(
    CSS_SELECTER
  , 'style sheet' // title
  , __NAMESPACE__ . 'create_theme_css_selecter'
  , THEME_MENU_SLUG
  , MY_OPTION_GROUP
);

\add_settings_section(
    MY_OPTION_GROUP
  , 'Front Page'
  , '__return_false'
  , THEME_MENU_SLUG
);


\add_settings_field(
    RECENT_CATS_SELECTER
  , 'Recent Posts'
  , __NAMESPACE__ . 'create_theme_recents_cats_selecter'
  , THEME_MENU_SLUG
  , MY_OPTION_GROUP
);
}

function
get_recent_cats(
){
$options = (array)\get_option(RECENT_CATS);
  if (count($options) == 0){
  $options = array(
  array = (
    'title' => 'Recent Posts'
  , 'cats' => array('uncatagorized')
  , 'col' => 5
  , 'max_posts' => 20
  )
  );
  }
return $options;
}

/* get the current set css style sheet */
function
css_style_sheet(
){
$css = \get_option(CSS_FILE, false);
  if (false == $css){
  \bloginfo('stylesheet_url');
  return;
  }
echo(\get_stylesheet_directory_uri().'/css/' . $css);
}

/* should echo the output*/
function
create_theme_css_selecter(
  $args
){
// Blank to remove variable thus disabling it.
echo('<select name="'.CSS_FILE.'" id="'.CSS_SELECTER.'">'
  .'<option value=""> remove style </option>'
);
  if ($handle = opendir(\get_template_directory() . '/css')){
  while (false !== ($entry = readdir($handle))){
    if ($entry != '.' && $entry != '..'){
    echo('<option value="'.$entry.'" name="'.CSS_FILE.'" id="'
      .CSS_SELECTER.'">'.$entry.'</option>');
    }
  }
  }
echo('</select>');
echo('<label for="'.CSS_SELECTER.'">Current css file: ');
\css_style_sheet();
echo('</label>');
closedir($handle);
}

/* create html for front page posts selecter 
<select name="[index]">
  <option value="-1">Add New</option>
  <option value="id">Title</option>
</select>

<label for=$id>
  <input id=$id type="checkbox" name="[cats][$id]" value="$cat->slug">
  $cat->name : $cat->description
</label>
*/
function
create_theme_recents_cats_selecter(
  $args
){
$options = get_recent_cats();
$i = 0;
var_dump($options);
echo('<select name="'.RECENT_CATS
. '[index]" id=""><option value="-1">Add New</option>'
);
foreach($options as $option){
echo('<option value="'.$i.'">'.$option['title'].'</option>');
}
echo('</select>');
$cats = \get_categories(array('orderby' => 'name', 'order' => 'ASC'));
foreach($cats as $cat){
/* each option selected is part of a sub array */
echo('<label for="'.RECENT_CATS_SELECTER.++$i.'"><input type="checkbox" '.
  'id="'.RECENT_CATS_SELECTER.$i.'"name="'.RECENT_CATS.'[cats][.'$i'.]"'
  . 'value="'.$cat->slug.
  '"/>' . $cat->name . ' : ' . $cat->description. '</label>'
);
}
/* the following echo produces something like.
</br><label><input type="text" name="RECENT_CATS[title]">Title</label>
</br><label><input type="text" name="RECENT_CATS[col]">Columns</label>
</br><label><input type="text" name="RECENT_CATS[max_show]">Max</label>
*/
echo('</br><label for="'.RECENT_CATS_SELECTER.++$i.'"><input type="text"'
. 'id="'.RECENT_CATS_SELECTER.$i.'" name="'.RECENT_CATS
. '[title]"/>Title</label>'
. '</br><label for="'.RECENT_CATS_SELECTER.++$i.'"><input type="text"'
. 'id="'.RECENT_CATS_SELECTER.$i.'" name="'.RECENT_CATS
. '[col]"/>Columns</label>'
. '</br><label for="'.RECENT_CATS_SELECTER.++$i.'"><input type="text"'
. 'id="'.RECENT_CATS_SELECTER.$i.'" name="'.RECENT_CATS
. '[max_show]"/>Max Posts</label>'
);
}

/* output theme section html. Should use echo for outpt. */
function
create_theme_style_options(
  $args
){
echo('<h3>Style<h3>');
}

function
create_theme_menu_cb(
){
  if (\current_user_can('manage_options') == false){
  \wp_die(__('No Access'));
  }
  \settings_errors();
?> <div class="wrap">
   <h2>Theme Options</h2>
   <form method="post" action="options.php">
   <?php
   \settings_fields(MY_OPTION_GROUP);
   \do_settings_sections(THEME_MENU_SLUG);
   \submit_button();
   ?>
   </form>
   </div> <?php
}

/* show recent posts for catagory
print out table of new posts */
function
show_recent_posts(
  $title
, $col_count
, $args
){
/* set globals for wp query loop */
global $post;
global $posts;
echo ('<h1 class="content">' . $title . '</h1>');
$posts = \get_posts($args);
echo('<table class="content"><tr class="content">');
$i = $col_count;
foreach ($posts as $post){ /* foreach row */
\setup_postdata($post);
   if ($i == 0){
   echo('</tr><tr class="content">');
   $i = $col_count;
   }
echo('<td class="content"><span class="content">');
echo('<a class="content" href="'); \the_permalink(); echo('">');
\the_title();
echo('</a></span></td>');
$i--;
}
echo('</tr></table>');
\wp_reset_postdata();
} /* show_recent_posts */

/* show recent posts for settings, calls show recent posts in a loop for
all saved sections saved in settings.
*/
function
show_recent_posts_for(
){
$settings = get_recent_cats();
foreach($settings as $setting){
show_recent_posts($setting['title'], $setting['cols'], array(
  'post_type' => 'post'
, 'post_status' => 'publish'
, 'posts_per_page' => $setting[max_show]
, 'category_name' => implode(', ', $setting['cats'])
));
}
}

/* add hooks */
  if (\is_admin()){
  \add_action('admin_menu', __NAMESPACE__ . 'add_theme_menu');
  \add_action('admin_init', __NAMESPACE__ . 'register_settings');
  } else {
  \add_action('init', __NAMESPACE__ . 'register_menu');
  }
?>
