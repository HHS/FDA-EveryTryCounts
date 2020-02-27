<?php
	use EveryTryCounts\App as App;
?>

<link rel="canonical" href="https://smokefree.gov/everytrycounts/" />

<link rel="shortcut icon" href="/themes/custom/smokefree_gov/favicon.ico" type="image/vnd.microsoft.icon" />

<title><?php App::get_title(); ?></title>

<?php 
	App::get_meta(); 
	App::get_gtm(); 
	App::get_ga("head");
	App::get_styles();
?>

<!-- Google Fonts, Muli -->
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,900" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

<![endif]-->