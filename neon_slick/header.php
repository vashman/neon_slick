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
      , 'container' => 'false'
      , 'menu_class' => 'nav'
      , 'items_wrap' => '<ul class="nav"><li class="nav">%3$s</li></ul>'
      ));
?>
</div>
</div>
