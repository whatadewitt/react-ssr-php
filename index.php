<?php
	ini_set( 'display_errors', 1 );
	ini_set( 'display_startup_errors', 1 );
	error_reporting( E_ALL );

	require_once 'functions.php';
	ssr();
?>
<!doctype html>

<html class="no-js" lang="">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Hello, React PHP World</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="/static/css/main.c17080f1.css">
</head>

<body>
	<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->
	<div id="root"><?php echo $rendered; ?></div>

	<script>
		window.PROPS = <?php echo $props; ?>;
	</script>
	<script src="/static/js/main.42952d76.js"></script>
</body>
</html>
