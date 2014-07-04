<?php
include_once "classes/database.php";

class page
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
		<a name="top"></a>
		<!-- Static navbar -->
		<div class="container">
		  <div class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
			  <div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				  <span class="sr-only">Toggle navigation</span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Project name</a>
			  </div>
			  <div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
				<?php
					$db = new database;
					$links = $db->getNavbarItems();
					foreach ($links as $link)
					{
						echo "<li><a href='".$link['navitem_url']."'>".$link['navitem_name']."</a></li>";
					}				 				 
				?>
				<!--<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li class="divider"></li>
							<li class="dropdown-header">Nav header</li>
							<li><a href="#">Separated link</a></li>
							<li><a href="#">One more separated link</a></li>
						</ul>
				  </li> -->
				</ul>
			  </div><!--/.nav-collapse -->
			</div><!--/.container-fluid -->
		  </div>
		</div>
		<?php
	}
	
	public function createBody()
	{
		$db = new database;
		$components = $db->getComponents();
		echo "<body>
				";
		echo "<div class='container'>";
		echo "<div class='row'>";
		foreach($components as $comp)
		{			
			echo $this->createComponent($comp['comp_id'], $comp['comp_name'], $comp['comp_content'], $comp['comp_width']);			
		}
		echo " </div>";
		echo " </div>";
		echo "
			</body>";
	}
	
	public function createFooter()
	{
		?>		
			<div class="footer">
				<div class="container">
					<div class="footerInner">
						<a href="http://homepage.elophants.de">&copy; 2014 - <?php echo date('Y') ?> by Elephant Community Framwork</a>
						<div class="backTop">
							<a name="end" />
							<a href="index.php#top"><span class="glyphicon glyphicon-arrow-up"></span></a>				
						</div>
					</div>									
				</div>
			</div>		
		</html>
		<?php
	}
	
	public function createComponent($comp_id, $comp_name, $comp_content, $comp_width)
	{
		$e = "";
		$comp_content = str_replace("ö", "&ouml;", $comp_content);
		$comp_content = str_replace("ä", "&auml;", $comp_content);
		$comp_content = str_replace("ü", "&uuml;", $comp_content);		
		$comp_content = str_replace("Ö", "&Ouml;", $comp_content);
		$comp_content = str_replace("Ä", "&Auml;", $comp_content);
		$comp_content = str_replace("Ü", "&Uuml;", $comp_content);
		$comp_content = str_replace("ß", "&szlig;", $comp_content);
		
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

		$e .= "<div class='".$col."'><a name='".$comp_id."'></a><div class='colInner'><h3>".$comp_name."</h3>".$comp_content."</div></div>";
		
		return $e;
	}
}