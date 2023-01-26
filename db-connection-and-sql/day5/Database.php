<?php
class DBOperations
{
private $ServerCon;
private $DbCon;
private $ttttt;
	function __construct()
	{
	$this->Connect_to_DB();
	}
	public function Connect_to_DB()
	{
	$this->ServerCon = mysqli_connect("localhost","root","");
	if (!$this->ServerCon)
		  {
		  die('Could not connect: ' . mysqli_error());
		  }
	  else
		  {
			$this->DbCon =mysqli_select_db( $this->ServerCon,"election");
			if (!$this->DbCon)
			  {
			  die('DB Error: ' . mysqli_error());
			  }
		  }  
	} 
	public function Disconnect_from_DB()
	{
				if(isset($this->ServerCon))
				{
					mysqli_close($this->ServerCon);
					unset($this->ServerCon);
				}
	}
	public function Exe_Qry($query)
	{
		$this->ttttt=$query;
			$result = mysqli_query($this->ServerCon,$query);
				if(!$result)
				{
					die('DB Error: ' . mysqli_error(). " <br/>" .$query);
					echo '<script> alert ("'. mysqli_error() .'"); </script>';
					/*echo '<script> alert ("This Record is Already Added or Something is Wrong with Your Values"); </script>';*/
				} 
				else 
				{ 
					return $result;
				}
	}
	
	public function Exe_MultiQry($query)
	{
		$this->ttttt=$query;
		$count = 1;
		
		
		
		
		if (mysqli_multi_query($this->ServerCon,$query))
		{
		  do
			{
			// Store first result set
			if ($result=mysqli_store_result($this->ServerCon)) {
			  // Fetch one and one row
			  
			  if($count==2)
			  {
				 return $result; 
			  }
			  // Free result set
			  mysqli_free_result($result);
			  }
			  $count++;
			}
		  while (mysqli_next_result($this->ServerCon));
		}
		
	}
	public function Next_Record($result)
	{
		
			return mysqli_fetch_array($result,MYSQLI_BOTH);
	}
	public function Row_Count($result)
	{
		return mysqli_num_rows($result);
	}
	
	public function Row_Affec()
	{
			return mysqli_affected_rows($this->ServerCon);
	}

	public function check_input($data){
		$data1=trim($data);
		$data1=stripcslashes($data1);
		$data1=htmlspecialchars($data1);
		return $data1;
	}
}
?>
