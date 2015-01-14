<?php
	require_once("config.shortcut.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo SITENAME; ?></title>
		<meta name="viewport" contents="width=device-width,initial-scale=1.0">
		<link href="/<?php echo EXTENSION.BOOTSTRAP4; ?>" rel="stylesheet">
		<link href="/<?php echo EXTENSION; ?>css/bootstrap-responsive.css" rel="stylesheet">
		<script src="/<?php echo EXTENSION; ?>js/jquery-2.1.1.js"></script>
		<script src="/<?php echo EXTENSION; ?>js/admin.js"></script>
	</head>
	<body>
<div class="container">

<?php
	require_once("searchLogin.header.php");
	require_once("menu.php");
?>