<?php
	include_once "classes/database.php";
	include_once "classes/adminpage.php";
	$db = new database;
	$page = new adminpage;
	
	$page->createHead();
	$page->createHeader();
	
	if(isset($_GET['action']) && isset($_GET['item']))
	{
		$action = $_GET['action'];
		$item = $_GET['item'];
		
		switch ($item)
		{
			case 'component':
				switch ($action)
				{
					case 'add':
						if(isset($_POST['activity']))
						{
							$activity = 1;
						}
						else
						{
							$activity = 0;
						}
						$msgs = $db->addComponent($_POST['name'], $activity, $_POST['position'], $_POST['width'], $_POST['content']);
						break;
						
					case 'edit':
						if(isset($_POST['activity']))
						{
							$activity = 1;
						}
						else
						{
							$activity = 0;
						}
						$msgs = $db->editComponent($_POST['id'], $_POST['name'], $activity, $_POST['position'], $_POST['width'], $_POST['content']);
						break;
						
					case 'delete':
						$msgs = $db->deleteComponent($_GET['id']);
						break;				
				}
				echo "<div class='col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'>";
				foreach($msgs as $msg)
				{
					echo "<div class='alert alert-info' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>".$msg."<br /><a href='index.php?page=components' class='alert-link'>Zur&uuml;ck</a></div>";
				}
				echo "</div>";
				break;
			
			case 'navigation':
				switch ($action)
				{
					case 'add':
						if(isset($_POST['activity']))
						{
							$activity = 1;
						}
						else
						{
							$activity = 0;
						}
						
						if(!isset($_POST['useExtPage']))
						{
							$url = "index.php#".$_POST['comp_id'];
						}
						else
						{
							$url = $_POST['urlExtPage'];
						}
						
						$msgs = $db->addNavigationItem($_POST['name'], $url, $_POST['position'], $activity);
						break;
						
					case 'edit':
						if(isset($_POST['activity']))
						{
							$activity = 1;
						}
						else
						{
							$activity = 0;
						}
						
						if(!isset($_POST['useExtPage']))
						{
							$url = "index.php#".$_POST['comp_id'];
						}
						else
						{
							$url = $_POST['urlExtPage'];
						}
						
						$msgs = $db->editNavigationItem($_POST['id'], $_POST['name'], $url, $_POST['position'], $activity);
						break;
						
					case 'delete':
						$msgs = $db->deleteNavigationItem($_GET['id']);
						break;				
				}
				echo "<div class='col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'>";
				foreach($msgs as $msg)
				{
					echo "<div class='alert alert-info' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>".$msg."<br /><a href='index.php?page=navbar' class='alert-link'>Zur&uuml;ck</a></div>";
				}
				echo "</div>";
				break;
				
			case 'jumbotron':
				switch($action)
				{
					case'add':
						if(isset($_POST['activity']))
						{
							$activity = 1;
						}
						else
						{
							$activity = 0;
						}
						$msgs = $db->addJumbotron($_POST['name'], $_POST['position'], $_POST['content'], $activity);
						break;
					case 'edit':
						if(isset($_POST['activity']))
						{
							$activity = 1;
						}
						else
						{
							$activity = 0;
						}
						//funktionsaufruf einbauen
						break;
					case 'delete':
						//funktionsaufruf einbauen
						break;						
				}
				echo "<div class='col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'>";
				foreach($msgs as $msg)
				{
					echo "<div class='alert alert-info' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>".$msg."<br /><a href='index.php?page=components' class='alert-link'>Zur&uuml;ck</a></div>";
				}
				echo "</div>";
				break;
		}
	}
	
	$page->createFooter();