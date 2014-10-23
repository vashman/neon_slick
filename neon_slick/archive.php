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

<div class="content">
  <h1 class="content"></h1>
  <h2 class="content"></h2>
  {
   <div class="content">
     <div class="post">
     </div>
   </div>
  ...}
</div>

*/
      \get_header();
?>
<div class="content">
<?php if (\is_category()) { ?>
      <h1><?php \single_cat_title(); ?> Catagory</h1>
<?php } elseif (\is_month()) { ?>
      <h2><?php the_time('F', 'Y'); ?></h2>
      <div class="content">
<?php }
      while(\have_posts()){
      ?> <div class="post"> <?php
      \the_post();
      }
      ?> </div> <?php
?>
     </div>
</div>
<?php \get_footer(); ?>
