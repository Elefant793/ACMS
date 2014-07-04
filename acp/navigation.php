<?php
	include_once "classes/adminpage.php";
	$home = new adminpage;
	
	$home->createHead();
	$home->createHeader();
	if(isset($_GET['action']))
	{
		$action = $_GET['action'];
		switch ($action)
		{
			case 'add':
				$home->createAddNavigation();
				break;
			case 'edit':
				$home->createEditNavigation($_GET['id']);
				break;
			case 'delete':
				$home->createDeleteNavigation($_GET['id']);
				break;
		}
	}
	$home->createFooter();