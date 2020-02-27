<?php
	use EveryTryCounts\App as App;
?>

<!doctype html>
<html lang="en">
	<head>
		<?php App::get_head(); ?>
	</head>
	<body>
		<!-- Google Tag Manager (noscript) -->
			<noscript>
				<iframe src="https://www.googletagmanager.com/ns.html?id=" height="0" width="0" style="display:none;visibility:hidden"></iframe>
			</noscript>
		<!-- End Google Tag Manager (noscript) -->
		
		<!-- Header -->
			<?php App::get_header(); ?>
		<!-- End Header -->

		<!-- Body -->
			<?php App::get_body(); ?>		
		<!-- End Body -->

		<!-- Footer -->
			<?php App::get_footer(); ?>
		<!-- End Footer -->
		
		<!-- Google Analytics -->
			<?php App::get_ga(); ?>
		<!-- End Google Analytics -->
		
		<!--Add user agent related info to HTML tag -->
			<script>
				var b = document.documentElement;
				b.className = b.className.replace('no-js', 'js');
				b.setAttribute("data-useragent", navigator.userAgent);
				b.setAttribute("data-platform", navigator.platform);
			</script>

		<!-- Omniture Analytics -->
			<script src="https://static.cancer.gov/webanalytics/WA_DCCPS_PageLoad.js"></script>
		<!-- End Omniture Analytics -->

		<!-- Scripts -->
			<?php App::get_scripts(); ?>
		<!-- End Scripts -->
	</body>
</html>
