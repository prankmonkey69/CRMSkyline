<?php 

	include 'includes/header.php';
	include 'class/db.php';
	include 'class/controller.php';
	include 'class/view.php';
	include 'class/auth.php';

$object = new Auth;

$object->logout();
header("location:index.php");



?>