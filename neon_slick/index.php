<?php get_header(); ?>
<div class="main"> <div class="content">
<h1 class="content">Recent Posts</h1>
<?php
      /* print out table of new posts */
      $args = array(
      'post_type' => 'post'
      , 'post_status' => 'publish'
      , 'post_per_page' => 20
      );

      $posts = \get_posts($args);
      define('MAX_COL', 5);
      $col_count = MAX_COL;
?>
      <table><tr>
<?php
      /* foreach new post */
      foreach ($posts as $post){
      \setup_postdata($post);
        if ($col_count == 0){
?>
        </tr><tr>
<?php $col_count = MAX_COL;
      }
?>
      <td>
<?php
      the_title();
?>
      </td>
<?php
      $col_count--;
      } /* foreach new post end*/
?>
      </tr></table>
<?php
      \wp_reset_postdata();
      /* end print out table */
?>
</div> </div>
<?php get_footer(); ?>
