<html><head>
<title><?php \wp_title(); \bloginfo('name'); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="all" />
<style>
<?php include('style.css'); ?>
</style>
<?php
      \wp_head();
?>
</head>
<body>
<div class="header">
<div class="logo">?</div>
<div class="serach">
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
      , 'items_wrap' => '<ul class="nav"><li class="nav">%3$s</li></ul>'
      , 'depth' => 0
      , 'walker' => ''
      ));
?>
</div>
</div>
