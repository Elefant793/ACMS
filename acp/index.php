<?php
	include_once "classes/adminpage.php";
	$home = new adminpage;
	
	if(isset($_GET['page']))
	{
		$page = $_GET['page'];
	}
	else
	{
		$page = "navigation";
	}
	
	$home->createHead();
	$home->createHeader();
	$home->createBody($page);
	$home->createFooter();