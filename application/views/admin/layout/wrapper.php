<?php 
	// proteksi halam admin dengan fungsi cek_lign yang ada di simple login
	$this->simple_login->cek_login();
	// Gabung semua layout
	require_once('head.php');
	require_once('header.php');
	require_once('nav.php');
	require_once('content.php');
	require_once('footer.php');
?>