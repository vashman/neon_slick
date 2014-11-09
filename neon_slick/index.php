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

<div clss="main">

  <div class="content">
    <h1 class="content"></h1>
    <table class="content">
      <tr clas="content">
        <td class="content">
          <span class="content">
            <a class="content"></a>
          </span>
        </td>
      </tr>
  </div>

</div>

*/
      \get_header();
?>
<div class="main"> <div class="content">
<?php
/* print out table of new posts */
\show_recent_posts('Recent Posts', 2, array(
  'post_type' => 'post'
, 'post_status' => 'publish'
, 'posts_per_page' => 5)
);

\show_recent_posts('Recent Test1 Posts', 5, array(
  'post_type' => 'post'
, 'post_status' => 'publish'
, 'posts_per_page' => 2
, 'catagory_name' => 'Test1')
);
?>
</div></div>
<?php \get_footer(); ?>
