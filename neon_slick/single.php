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
      \get_header();
?>
<div class="single-post"> <div class="content">
<?php /* get post content */
      if(\have_posts()){
      while(\have_posts()){
      \the_post();
?>
      <h1 class="content"><?php \the_title(); ?></h1>
      <p class="content"><?php \the_content(''); ?></p>
<?php
      }
      }
?>
</div>
<div class="post-suggestions">
<table class="post-suggestions">
<tr class="post-suggestions">
<?php /* get video suggestions in a table */
      $args = array(
        'post_type' => 'post'
      , '' => 'publish'
      , '' => 10
      );
      $posts = \get_posts($args);
      define('MAX_ROW', 5);
      $col_count = MAX_ROW;

      foreach ($posts as $post){
      \setup_postdata($post);
        if ($col_count == 0){
?>
        </tr><tr class="post-suggestions">
<?php
        $col_count = MAX_ROW;
        }
?>
      <td class="post-suggestions">
<?php
      \the_title();
?>
      </td>
<?php
      }
      \comments_template();
?>
</tr></table>
</div></div>
