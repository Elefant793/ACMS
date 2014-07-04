<?php
	include_once "classes/page.php";
	$home = new page;
	
	$home->createHead();
	$home->createHeader();
	$home->createBody();
	$home->createFooter();