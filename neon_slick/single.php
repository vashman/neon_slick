<div class="single-post"> <div class="post">
<?php /* get post content */
      post();
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
      $col_count = MAX_COL

      foreach ($posts as $post){
      \setup_postdata($post);
        if ($col_count == 0){
?>
        </tr><tr class="post-suggestions">
<?php
        }
?>
      <td class="post-suggestions">
<?php
      \the_title();
?>
      </td>
<?php
      }
?>
</tr></table>
</div></div>
