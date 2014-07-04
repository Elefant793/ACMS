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
				if(isset($_POST['usePredifined']))
				{
					$comp = $_POST['compList'];
					switch($comp)
					{
						case 'jumbotron':
							$home->createAddJumbotron();
							break;
						case 'contact':
							$home->createAddContact();
							break;
						case 'carousel':
							$home->createAddCarousel();
							break;
					}
				}
				else
				{
					$home->createAddComponent();
				}				
				break;
			case 'edit':
				$home->createEditComponent($_GET['id']);
				break;
			case 'delete':
				$home->createDeleteComponent($_GET['id']);
				break;
		}
	}
	$home->createFooter();