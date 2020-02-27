<?php
	use EveryTryCounts\App as App;
?>

<link rel="canonical" href="https://smokefree.gov/everytrycounts/" />

<link rel="shortcut icon" href="/themes/custom/smokefree_gov/favicon.ico" type="image/vnd.microsoft.icon" />

<title><?php App::get_title(); ?></title>

<?php App::get_meta(); ?>

<?php App::get_gtm(); ?>

<!-- Global site tag (gtag.js) - DoubleClick -->
<script async src="https://www.googletagmanager.com/gtag/js?id=DC-4345482"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'DC-4345482');
</script>
<!-- End of global snippet: Please do not remove -->
<!-- Google Fonts, Muli -->
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,900" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

<![endif]-->