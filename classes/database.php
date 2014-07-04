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
	
	public function getComponents()
	{
		$components = array();
		$con = $this->getConnection();
		$query = "SELECT * 
					FROM components
					WHERE comp_active = 1
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
	
	public function getNavbarItems()
	{
		$links = array();
		$con = $this->getConnection();
		$query = "SELECT * 
					FROM navigation
					WHERE navitem_active = 1
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
}