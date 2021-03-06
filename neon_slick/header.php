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
/* Structure

<div class="header">

  <a class="login">
  </a>

  <div class="logo">
    <p class="logo">
    </p>
  </div>

  <div class="search">
  </div>

  <div class="nav">
  <ul class="nav">
  </ul>
  </div>

</div>

*/
?>
<html><head>
<title><?php \wp_title(); \bloginfo('name'); ?></title>
<link rel="stylesheet" href="<?php \css_style_sheet(); ?>"
type="text/css" media="all"
/>
<?php
      \wp_head();
?>
</head>
<body>
<div class="header">
<a href="<?php echo \wp_login_url(); ?>" title="Login" class="login">Login</a>
<div class="logo"><p class="logo"><?php echo(\bloginfo('name')); ?></p></div>
<div class="search">
<?php
      \get_search_form();
?>
</div>
<div class="nav">
<?php
      \wp_nav_menu(array (
        'theme_location' => 'header-menu'
      , 'menu' => ''
      , 'container' => false
      , 'container_class' => ""
      , 'container_id' => ''
      , 'menu_class' => ''
      , 'menu_id' => ''
      , 'echo' => true
      , 'fallback_cb' => 'wp_page_menu'
      , 'before' => ''
      , 'after' => ''
      , 'items_wrap' => '<ul class="nav">%3$s</ul>'
      , 'depth' => 0
      , 'walker' => ''
      ));
?>
</div>
</div>
