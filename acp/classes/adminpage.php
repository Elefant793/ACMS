<?php
include_once "classes/database.php";

class adminPage
{
	public function createHead()
	{
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			
			<title>Artist Page</title>
			
			<link href="style/css/bootstrap.css" rel="stylesheet">			
			<link href="style/css/style.css" rel="stylesheet">	
			
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>				
		</head>
		<?php
	}
	
	public function createHeader()
	{
		?>
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php?page=navbar">Artistpage</a>
				</div>
			</div>
		</div>


		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3 col-md-2 sidebar">
					<ul class="nav nav-sidebar">
						<li class=""><a href="index.php?page=navbar"><h4>Navigation</h4></a></li>
					</ul>
					<ul class="nav nav-sidebar">
						<li class=""><a href="index.php?page=components"><h4>Komponenten</h4></a></li>
					</ul>
				</div>
			</div>
		</div>
		<?php
	}
	
	public function createBody($page)
	{
		$db = new database;		
		$e = "";
		switch($page)
		{
			case 'components':
				$components = $db->getComponentsList();
				?>
				<body>
					<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<h1 class="page-header">Komponenten</h1>
						<?php $this->createAddComponentModal(); ?>
						<table class="table table-striped" width = 100%>
							<tr>
								<th width=150px>Aktionen</th>
								<th>Name</th>
								<th>Position</th>
								<th>Breite</th>					
								<th>Status</th>					
							</tr>
							<?php
							foreach ($components as $comp)
							{
								switch($comp['comp_width'])
								{
									case 1:
										$width = "8,33%";
										break;
									case 2:
										$width = "16,66%";
										break;
									case 3:
										$width = "25,00%";
										break;
									case 4:
										$width = "33,33%";
										break;
									case 5:
										$width = "41,66%";
										break;
									case 6:
										$width = "50,00%";
										break;
									case 7:
										$width = "58,33%";
										break;
									case 8:
										$width = "66,66%";
										break;
									case 9:
										$width = "75,00%";
										break;
									case 10:
										$width = "83,33%";
										break;
									case 11:
										$width = "91,66%";
										break;
									case 12:
										$width = "100%";
										break;
								}
								
								if ($comp['comp_active'] == 1)
								{
									$activity = "<span style='color: green;' class='glyphicon glyphicon-ok'></span>";
								}
								else
								{
									$activity = "<span style='color: red;' class='glyphicon glyphicon-remove'></span>";
								}
								
								$e .= "<tr>";
								$e .= "<td><a href='component.php?action=delete&id=".$comp['comp_id']."' title='L&ouml;schen' class='glyphicon glyphicon-trash'></a> / <a href='component.php?action=edit&id=".$comp['comp_id']."' title='Bearbeiten' class='glyphicon glyphicon-pencil'></a></td>";
								$e .= "<td>".$comp['comp_name']."</td>";
								$e .= "<td>".$comp['comp_position']."</td>";
								$e .= "<td>".$width."</td>";
								$e .= "<td>".$activity."</td>";
								$e .= "</tr>";
							}
							echo $e;
							?>
						</table>						
					</div>
				</body>	  
				<?php
				break;
			
			case 'navbar':
				$navigation = $db->getNavigationList();
				?>
				<body>
					<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
						<h1 class="page-header">Navigation</h1>
						<p><a class="btn btn-primary" href="navigation.php?action=add">Hinzuf&uuml;gen</a></p>			
						<table class="table table-striped" width = 100%>
							<tr>
								<th width=150px>Aktionen</th>
								<th>Name</th>
								<th>Position</th>
								<th>Link</th>					
								<th>Status</th>					
							</tr>
							<?php
							foreach ($navigation as $nav)
							{								
								if ($nav['navitem_active'] == 1)
								{
									$activity = "<span style='color: green;' class='glyphicon glyphicon-ok'></span>";
								}
								else
								{
									$activity = "<span style='color: red;' class='glyphicon glyphicon-remove'></span>";
								}
								
								$e .= "<tr>";
								$e .= "<td><a href='navigation.php?action=delete&id=".$nav['navitem_id']."' title='L&ouml;schen' class='glyphicon glyphicon-trash'></a> / <a href='navigation.php?action=edit&id=".$nav['navitem_id']."' title='Bearbeiten' class='glyphicon glyphicon-pencil'></a></td>";
								$e .= "<td>".$nav['navitem_name']."</td>";
								$e .= "<td>".$nav['navitem_position']."</td>";
								$e .= "<td>".$nav['navitem_url']."</td>";
								$e .= "<td>".$activity."</td>";
								$e .= "</tr>";
							}
							echo $e;
							?>
						</table>
						<p><a class="btn btn-primary" href="navigation.php?action=add">Hinzuf&uuml;gen</a></p>
					</div>
				</body>
				<?php
				break;
		}
	}
	
	public function createAddComponentModal()
	{
		?>	
		<script type="text/javascript">   
			window.onload = function() 	{       
				$('#name').attr("disabled",true)      				
				$('#usePredifined').attr("checked", true)
				
				$('.cbox').change(function() 
				{       
					$('#compList').attr('disabled', 
					$('.cbox:checked').length == 0);    
					$('#name').attr('disabled', 
					$('.cbox:checked').length == 1);
				});   
			};
		</script> 	
		<!-- Button trigger modal -->
		<p><button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
		  Hinzuf&uuml;gen
		</button></p>

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Art der Komponente ausw&auml;hlen</h4>
			  </div>
			  <div class="modal-body">
				<form action="component.php?action=add" method="post" role="form">
					<div class="checkbox">
						<label>
							<input type="checkbox" checked="checked" class="cbox" name="usePredifined"> <b>Vorgefertigte Komponente erstellen</b>
						</label>
					</div>
					<div class="form-group">
						<select name="compList" id="compList" class="form-control">
							<option value="jumbotron">Jumbotron</option>
							<option value="contact">Kontakt</option>
							<option value="carousel">Slideshow</option>
						</select>
					</div>
					<div class="form-group">
						<label>Eigene Komponente erstellen</label>
						<input type="text" name="name" id="name" class="form-control" placeholder="Name der Komponente" />
					</div>
					<p><button type="submit" class="btn btn-primary" href="component.php?action=add">Weiter</button></p>
				</form>
			  </div>
			</div>
		  </div>
		</div>
		<?php
	}
	
	public function createAddComponent()
	{
		?>
		<body>
		<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h1 class="page-header">Komponente hinzuf&uuml;gen</h1>
				<form action="action.php?action=add&item=component" method="post" role="form">
					<div class="form-group">
						<label for="exampleInputHeadline">&Uuml;berschrift</label>
						<input type="text" class="form-control" id="exampleInputHeadline" placeholder="&Uuml;berschrift" name="name">
					</div>
					<div class="form-group">
						<label for="exampleInputPosition">Position</label>
						<input type="text" class="form-control" id="exampleInputPosition" placeholder="Position" name="position">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Breite</label>
						<select class="form-control" id="exampleInputPosition" name="width">
							<option value="1">08,33%  || 1/12</option>
							<option value="2">16,66%  || 1/6</option>
							<option value="3">25,00%  || 1/4</option>
							<option value="4">33,33%  || 1/3</option>
							<option value="5">41,66%  || 5/12</option>
							<option value="6">50,00%  || 1/2</option>
							<option value="7">58,66%  || 7/12</option>
							<option value="8">66,66%  || 2/3</option>
							<option value="9">75,00%  || 3/4</option>
							<option value="10">83,33% || 5/6</option>
							<option value="11">91,66% || 11/12</option>
							<option value="12">100,0% || 1</option>
						</select>
					</div>
					<div class="form-group">
						<label for="editor1">Inhalt</label>
						<p><textarea id="editor1" name="content"></textarea></p>
					</div>
					<script type="text/javascript">
						CKEDITOR.replace( 'editor1' );
					</script>
					<div class="checkbox">
						<label>
							<input type="checkbox" id="activity" name="activity" /> Komponente aktivieren?
						</label>
					</div>
					<p><button type="submit" class="btn btn-default">Submit</button></p>
				</form>
			</div>
		</body>
		<?php
	}
	
	public function createEditComponent($comp_id)
	{
		$db = new database;
		$components = $db->getComponentSingle($comp_id);
		foreach ($components as $comp)
		{
			$comp_width = $comp['comp_width'];
			switch($comp_width)
			{
				case '1':
					$col = 'col-md-1';
					break;
				case '2':
					$col = 'col-md-2';
					break;
				case '3':
					$col = 'col-md-3';
					break;
				case '4':
					$col = 'col-md-4';
					break;
				case '5':
					$col = 'col-md-5';
					break;
				case '6':
					$col = 'col-md-6';
					break;
				case '7':
					$col = 'col-md-7';
					break;
				case '8':
					$col = 'col-md-8';
					break;
				case '9':
					$col = 'col-md-9';
					break;
				case '10':
					$col = 'col-md-10';
					break;
				case '11':
					$col = 'col-md-11';
					break;
				case '12':
					$col = 'col-md-12';
					break;				
			}
			$comp_name = $comp['comp_name'];
			$comp_content = $comp['comp_content'];
			$comp_content = str_replace("�", "&ouml;", $comp_content);
			$comp_content = str_replace("�", "&auml;", $comp_content);
			$comp_content = str_replace("�", "&uuml;", $comp_content);		
			$comp_content = str_replace("�", "&Ouml;", $comp_content);
			$comp_content = str_replace("�", "&Auml;", $comp_content);
			$comp_content = str_replace("�", "&Uuml;", $comp_content);
			$comp_content = str_replace("�", "&szlig;", $comp_content);
			?>
			<body>
			<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h1 class="page-header">Komponente bearbeiten</h1>
			<h3 class="page-header">Vorschau</h3>
				<?php
					// Show current component
					echo "<div><h3>".$comp_name."</h3>".$comp_content."</div>";
				?>
			<hr>
			<h3 class="page-header">Bearbeiten</h3>
				<?php
					// Show editing formular
					echo"
					<form action='action.php?action=edit&item=component' method='post' role='form'>
					<div class='form-group'>
						<label for='exampleInputHeadline'>&Uuml;berschrift</label>
						<input type='text' class='form-control' id='exampleInputHeadline' placeholder='&Uuml;berschrift' name='name' value='".$comp_name."'>
					</div>
					<div class='form-group'>
						<label for='exampleInputPosition'>Position</label>
						<input type='text' class='form-control' id='exampleInputPosition' placeholder='Position' name='position' value='".$comp['comp_position']."'>
					</div>
					<div class='form-group'>
						<label for='exampleInputPassword1'>Breite</label>
						<select class='form-control' id='exampleInputPosition' name='width'>
							<option value='1'>08,33%  || 1/12</option>
							<option value='2'>16,66%  || 1/6</option>
							<option value='3'>25,00%  || 1/4</option>
							<option value='4'>33,33%  || 1/3</option>
							<option value='5'>41,66%  || 5/12</option>
							<option value='6'>50,00%  || 1/2</option>
							<option value='7'>58,66%  || 7/12</option>
							<option value='8'>66,66%  || 2/3</option>
							<option value='9'>75,00%  || 3/4</option>
							<option value='10'>83,33% || 5/6</option>
							<option value='11'>91,66% || 11/12</option>
							<option value='12'>100,0% || 1</option>
						</select>
					</div>
					<div class='form-group'>
						<label for='editor1'>Inhalt</label>
						<p><textarea id='editor2' name='content'>".$comp_content."</textarea></p>
					</div>
					<script type='text/javascript'>
						CKEDITOR.replace( 'editor2' );
					</script>

					<div class='checkbox'>
						<label>
							<input type='checkbox' checked='checked' id='activity' name='activity' /> Komponente aktivieren?
						</label>
					</div>
					<input type='hidden' value='".$_GET['id']."' name='id'/>
					<p><button type='submit' class='btn btn-default'>Submit</button></p>
				</form>
				";
				?>
			</div>
			</body>
			<?php
		}
	}
	
	public function createDeleteComponent($comp_id)
	{
	$db = new database;
		$components = $db->getComponentSingle($comp_id);
		foreach ($components as $comp)
		{
			$comp_width = $comp['comp_width'];
			switch($comp_width)
			{
				case '1':
					$col = 'col-md-1';
					break;
				case '2':
					$col = 'col-md-2';
					break;
				case '3':
					$col = 'col-md-3';
					break;
				case '4':
					$col = 'col-md-4';
					break;
				case '5':
					$col = 'col-md-5';
					break;
				case '6':
					$col = 'col-md-6';
					break;
				case '7':
					$col = 'col-md-7';
					break;
				case '8':
					$col = 'col-md-8';
					break;
				case '9':
					$col = 'col-md-9';
					break;
				case '10':
					$col = 'col-md-10';
					break;
				case '11':
					$col = 'col-md-11';
					break;
				case '12':
					$col = 'col-md-12';
					break;				
			}
			$comp_name = $comp['comp_name'];
			$comp_content = $comp['comp_content'];
			$comp_content = str_replace("�", "&ouml;", $comp_content);
			$comp_content = str_replace("�", "&auml;", $comp_content);
			$comp_content = str_replace("�", "&uuml;", $comp_content);		
			$comp_content = str_replace("�", "&Ouml;", $comp_content);
			$comp_content = str_replace("�", "&Auml;", $comp_content);
			$comp_content = str_replace("�", "&Uuml;", $comp_content);
			$comp_content = str_replace("�", "&szlig;", $comp_content);
			?>
			<body>
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h1 class="page-header">Komponente entfernen</h1>
			<h3 class="page-header">Vorschau</h3>
				<?php
					// Show current component
					echo "<div><h3>".$comp_name."</h3>".$comp_content."</div>";
				?>
			<hr>
			<?php
			echo "<a class='btn btn-danger btn-lg' href='action.php?action=delete&item=component&id=".$_GET['id']."'>Komponente entfernen</a>";
			
		}
	}
	
	public function createAddJumbotron()
	{
		?>
		<body>
		<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<h1 class="page-header">Jumbotron hinzuf&uuml;gen</h1>
				<h3 class="page-header">Vorschau</h3>			
					<div class="jumbotron">
						<div class="container">
							<h1>Hello, world!</h1>
							<p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
						</div>
					</div>
				<hr>
				
				<h3 class="page-header">Felder bef&uuml;llen</h3>
				<form action="action.php?action=add&item=jumbotron" method="post" role="form">
					<div class="form-group">
						<label>&Uuml;berschrift</label>
						<input type="text" class="form-control" name="name" placeholder="&Uuml;berschrift" />
					</div>
					<div class="form-group">
						<label for="exampleInputPosition">Position</label>
						<input type="text" class="form-control" id="exampleInputPosition" placeholder="Position" name="position">
					</div>		
					<div class="form-group">
						<label for="editor1">Inhalt</label>
						<p><textarea id="editor1" name="content"></textarea></p>
					</div>
					<script type="text/javascript">
						CKEDITOR.replace( 'editor1' );
					</script>
					<div class="checkbox">
						<label>
							<input type="checkbox" id="activity" name="activity" /> Komponente aktivieren?
						</label>
					</div>
					<p><button type="submit" class="btn btn-default">Submit</button></p>
				</form>
			</div>
		<?php
	}
	
	public function createAddContact()
	{
		
	}
	
	public function createAddCarousel()
	{
		?>
		<body>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h1 class="page-header">Slideshow hinzuf&uuml;gen</h1>
				<form action="action.php?action=add&item=carousel" method="post" role="form">
					<div class="form-group">
						
					</div>
					<div class="form-group">
						
					</div>
					<div class="form-group">
						
					</div>				
					<div class="checkbox">
						
					</div>
					<p><button type="submit" class="btn btn-default">Submit</button></p>
				</form>
			</div>
		</body>
		<?php
	}
	
	public function createAddNavigation()
	{
		?>
		<body>
		<script type="text/javascript">   
			window.onload = function() 	{       
				$('#inputExtPage').attr("disabled",true)      
				$('#inputCompList').attr("disabled",false);
				
				$('.cbox').change(function() 
				{       
					$('#inputExtPage').attr('disabled', 
					$('.cbox:checked').length == 0);    
					$('#inputCompList').attr('disabled', 
					$('.cbox:checked').length == 1);
				});   
			};
		</script> 		
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h1 class="page-header">Navigationsitem hinzuf&uuml;gen</h1>
				<form action="action.php?action=add&item=navigation" method="post" role="form">
					<div class="form-group">
						<label for="exampleInputHeadline">Name</label>
						<input type="text" class="form-control" id="exampleInputHeadline" placeholder="Name" name="name">
					</div>
					<div class="form-group">
						<div class="checkbox">
							<label>
								<input class="cbox" type="checkbox" id="useExtPage" name="useExtPage" /> Externe Seite benutzen
							</label>
							<div class="alert alert-info">	Bei einem Link auf eine Komponente wird ein Anker zu einer Komponente auf der Startseite erstellt mit dem auf der Startseite gescrollt wird. <br />
								Bei einem Link zu einer externen Seite geben Sie Bitte die GESAMTE URL zur Seite an. <br />
								Zum Beispiel: <code>http://www.google.de</code> 
							</div>						
						<div class="form-group">
							<?php
								$db = new database;
								$comps = $db->getComponentsList();
								$e = "<label for='inputCompList'><b>Komponente w&auml;hlen</b></label>";
								$e .= "<select class='form-control' id='inputCompList' name='comp_id'>";
								foreach($comps as $comp)
								{
									$e .= "<option value='".$comp['comp_id']."'>".$comp['comp_name']."</option>";
								}
								$e .= "</select>";
								echo $e;
							?>							
								<label for="inputExtPage"><b>Externe Seite</b></label>
								<input type="text" class="form-control" id="inputExtPage" placeholder="Externe Seite" name="urlExtPage">
						</div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputPosition">Position</label>
						<input type="text" class="form-control" id="exampleInputPosition" placeholder="Position" name="position">
					</div>				
					<div class="checkbox">
						<label>
							<input type="checkbox" id="activity" name="activity" /> Navigationsitem aktivieren?
						</label>
					</div>
					<p><button type="submit" class="btn btn-default">Submit</button></p>
				</form>
			</div>
		</body>
		<?php
	}
	
	public function createEditNavigation($id)
	{		
		$db = new database;
		$links = $db->getNavbarItem($id);
		?>
			<body>
			<script type="text/javascript">   
			window.onload = function() 	{       
				$('#inputExtPage').attr("disabled",true)      
				$('#inputCompList').attr("disabled",false);
				
				$('.cbox').change(function() 
				{       
					$('#inputExtPage').attr('disabled', 
					$('.cbox:checked').length == 0);    
					$('#inputCompList').attr('disabled', 
					$('.cbox:checked').length == 1);
				});   
			};
			</script> 
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h1 class="page-header">Men&uuml;punkt bearbeiten</h1>
			<h3 class="page-header">Bearbeiten</h3>
		<?php		
			foreach($links as $link)
			{
				$e = "";
				$e .="
					<form action='action.php?action=edit&item=navigation' method='post' role='form'>
						<div class='form-group'>
							<label for='exampleInputHeadline'>Name</label>
							<input type='text' class='form-control' id='exampleInputHeadline' placeholder='Name' name='name' value='".$link['navitem_name']."'>
						</div>
						<div class='form-group'>
							<div class='checkbox'>
								<label> 
									<input class='cbox' type='checkbox' id='useExtPage' name='useExtPage' /> Externe Seite benutzen
								</label>
								<div class='alert alert-info'>	Bei einem Link auf eine Komponente wird ein Anker zu einer Komponente auf der Startseite erstellt mit dem auf der Startseite gescrollt wird. <br />
									Bei einem Link zu einer externen Seite geben Sie Bitte die GESAMTE URL zur Seite an. <br />
									Zum Beispiel: <code>http://www.google.de</code> 
								</div>						
							<div class='form-group'>";															
									$e .= "<label for='inputCompList'><b>Komponente w&auml;hlen</b></label>";
									$e .= "<select class='form-control' id='inputCompList' name='comp_id'>";
									$comps = $db->getComponentsList();
									foreach($comps as $comp)
									{
										$e .= "<option value='".$comp['comp_id']."'>".$comp['comp_name']."</option>";
									}
									$e .= "</select>";															
				$e .="
									<label for='inputExtPage'><b>Externe Seite</b></label>
									<input type='text' class='form-control' id='inputExtPage' placeholder='Externe Seite' name='urlExtPage'>
							</div>
							</div>
						</div>
						<div class='form-group'>
							<label for='exampleInputPosition'>Position</label>
							<input type='text' class='form-control' id='exampleInputPosition' placeholder='Position' name='position' value='".$link['navitem_position']."'>
						</div>				
						<div class='checkbox'>
							<label> ";
							if($link['navitem_active'] == 1)
							{
								$e .= "<input checked='checked' type='checkbox' id='activity' name='activity' /> Navigationsitem aktivieren?";
							}
							else
							{
								$e .= "<input type='checkbox' id='activity' name='activity' /> Navigationsitem aktivieren?";
							}
				$e .= "		</label>
						</div>
						<input type='hidden' value='".$_GET['id']."' name='id'/>
						<p><button type='submit' class='btn btn-default'>Submit</button></p>
					</form
				</div>
					";
			}
		echo $e;
	}
	
	public function createDeleteNavigation($id)
	{
		$db = new database;
		$links = $db->getNavbarItem($id);		
		?>
		<body>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<h1 class="page-header">Men&uuml;punkt entfernen</h1>
		<h3 class="page-header">Vorschau</h3>
			<?php
				// Show current component
				foreach($links as $link)
				{
					echo "<div><h4>".$link['navitem_name']."</h4> -> ".$link['navitem_url']."</div>";	
				}
			?>
		<hr>
		<?php
		echo "<a class='btn btn-danger btn-lg' href='action.php?action=delete&item=navigation&id=".$_GET['id']."'>Men&uuml;punkt entfernen</a>";
	}
	
	public function createFooter()
	{
		?>
	  </body>
	</html>

		<?php
	}
	
}
