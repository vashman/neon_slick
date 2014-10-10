<html>
<head>
<title><?php \wp_title(); \bloginfo('name'); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="test/css" media="all" />
<?php \wp_head(); ?>
</head>
<body>
<div class="header">
	<div class="logo">?</div>
	<div class="serach"><?php get_search_form(); ?></div>
	<div class="nav"><?php ?></div>
</div>
