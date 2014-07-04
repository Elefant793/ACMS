<?php

class database
{
	public function getConnection()
	{
		$con = mysqli_connect("localhost", "root", "", "artistpage");
		
		// Check connection
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		return $con;
	}
	
	public function getComponentsList()
	{
		$components = array();
		$con = $this->getConnection();
		$query = "SELECT * 
					FROM components					
					ORDER BY comp_position ASC
					";
		if($result = $con->query($query))
		{
			while($row = $result->fetch_assoc())
			{
				$components[] = $row;
			}
		}
		
		mysqli_free_result($result);
		mysqli_close($con);
		return $components;
	}
	
	public function getNavigationList()
	{
		$navigation = array();
		$con = $this->getConnection();
		$query = "SELECT * 
					FROM navigation
					ORDER BY navitem_position ASC
					";
		if($result = $con->query($query))
		{
			while($row = $result->fetch_assoc())
			{
				$navigation[] = $row;
			}
		}
		
		mysqli_free_result($result);
		mysqli_close($con);
		return $navigation;
	}	
	
	public function getComponentSingle($comp_id)
	{
		$components = array();
		$con = $this->getConnection();
		$query = "SELECT * 
					FROM components
					WHERE comp_id = '".$comp_id."'					
					";
		if($result = $con->query($query))
		{
			while($row = $result->fetch_assoc())
			{
				$components[] = $row;
			}
		}
		
		mysqli_free_result($result);
		mysqli_close($con);
		return $components;
	}
	
	public function addComponent($headline, $activity, $position, $width, $content)
	{
		$msgs = array();
		$con = $this->getConnection();
		$query = "INSERT INTO components
					(comp_name, comp_active, comp_position, comp_width, comp_content)
					VALUES
					('".$headline."', '".$activity."', '".$position."', '".$width."', '".$content."')";
		if($con->query($query))
		{
			$msgs[] = "Die Komponente wurde erfolgreich erstellt";
		}
		else
		{
			$msgs[] = "Die Komponente konnte nicht erstellt werden";
		}			
		mysqli_close($con);
		return $msgs;
	}
	
	public function editComponent($id, $headline, $activity, $position, $width, $content)
	{
		$msgs = array();
		$con = $this->getConnection();
		$query = "UPDATE components
					SET comp_name = '".$headline."', 
						comp_active = '".$activity."',
						comp_position = '".$position."', 
						comp_width = '".$width."',
						comp_content = '".$content."'
					WHERE comp_id = '".$id."'";
		if($con->query($query))
		{
			$msgs[] = "Die Komponente wurde erfolgreich bearbeitet";
		}
		else
		{
			$msgs[] = "Die Komponente konnte nicht bearbeitet werden";
		}			
		mysqli_close($con);
		return $msgs;
	}
	
	public function deleteComponent($id)
	{
		$msgs = array();
		$con = $this->getConnection();
		$query = "DELETE FROM components					
					WHERE comp_id = '".$id."'";
		if($con->query($query))
		{
			$msgs[] = "Die Komponente wurde erfolgreich entfernt";
		}
		else
		{
			$msgs[] = "Die Komponente konnte nicht entfernt werden";
		}			
		mysqli_close($con);
		return $msgs;
	}
	
	public function getNavbarItem($id)
	{
		$links = array();
		$con = $this->getConnection();
		$query = "SELECT * 
					FROM navigation
					WHERE navitem_active = 1
					AND navitem_id = '".$id."'
					ORDER BY navitem_position ASC
					";
		if($result = $con->query($query))
		{
			while($row = $result->fetch_assoc())
			{
				$links[] = $row;
			}
		}
		
		mysqli_free_result($result);
		mysqli_close($con);
		return $links;
	}
	
	public function addNavigationItem($name, $url, $position, $activity)
	{
		$msgs = array();
		$con = $this->getConnection();
		$query = "INSERT INTO navigation
					(navitem_name, navitem_url, navitem_position, navitem_active)
					VALUES
					('".$name."', '".$url."', '".$position."', '".$activity."')";
		if($con->query($query))
		{
			$msgs[] = "Der Men&uuml;punkt wurde erfolgreich erstellt";
		}
		else
		{
			$msgs[] = "Der Men&uuml;punkt konnte nicht erstellt werden";
		}			
		mysqli_close($con);
		return $msgs;
	}
	
	public function editNavigationItem($id, $name, $url, $position, $activity)
	{
		$msgs = array();
		$con = $this->getConnection();
		$query = "UPDATE navigation
					SET navitem_name = '".$name."', 
						navitem_active = '".$activity."',
						navitem_position = '".$position."', 
						navitem_url = '".$url."'
					WHERE navitem_id = '".$id."'";
		if($con->query($query))
		{
			$msgs[] = "Der Men&uuml;punkt wurde erfolgreich bearbeitet";
		}
		else
		{
			$msgs[] = "Der Men&uuml;punkt konnte nicht bearbeitet werden";
		}			
		mysqli_close($con);
		return $msgs;
	}
	
	public function deleteNavigationItem($id)
	{
		$msgs = array();
		$con = $this->getConnection();
		$query = "DELETE FROM navigation
					WHERE navitem_id = '".$id."'";
		if($con->query($query))
		{
			$msgs[] = "Der Men&uuml;punkt wurde erfolgreich entfernt";
		}
		else
		{
			$msgs[] = "Der Men&uuml;punkt konnte nicht entfernt werden";
		}			
		mysqli_close($con);
		return $msgs;
	}
	
	public function addJumbotron($name, $position, $content, $activity)
	{
		$content = "<div class=\"jumbotron\">
						<div class=\"container\">
							<h1>".$name."</h1>
							<p>".$content."</p>
						</div>
					</div>
					";
		$msgs = array();
		$con = $this->getConnection();
		$query = "INSERT INTO components
					(comp_active, comp_position, comp_width, comp_content)
					VALUES
					('".$activity."', '".$position."', '12', '".$content."')";
		if($con->query($query))
		{
			$msgs[] = "Das Jumbotron wurde erfolgreich erstellt";
		}
		else
		{
			$msgs[] = "Das Jumbotron konnte nicht erstellt werden";
		}			
		mysqli_close($con);
		return $msgs;
	}
}