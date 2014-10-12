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
<div class="main"> <div class="content">
<h1 class="content">Recent Posts</h1>
<?php
      /* print out table of new posts */
      $args = array(
      'post_type' => 'post'
      , 'post_status' => 'publish'
      , 'posts_per_page' => 20
      );

      $posts = \get_posts($args);
      define('MAX_COL', 5);
      $col_count = MAX_COL;
?>
      <table class="content"><tr class="content">
<?php
      /* foreach new post */
      foreach ($posts as $post){
      \setup_postdata($post);
        if ($col_count == 0){
?>
        </tr><tr class="content">
<?php 
        $col_count = MAX_COL;
        }
?>
      <td class="content"><span class="content">
       &hearts;
      <a class="content" href=" <?php the_permalink(); ?> ">
<?php
      the_title();
?>
      </a>
      </span></td>
<?php
      $col_count--;
      } /* foreach new post end*/
?>
      </tr></table>
<?php
      \wp_reset_postdata();
      /* end print out table */
?>
</div></div>
<?php get_footer(); ?>
