	<?php 
	require_once "session-variables.php"; # database connection

	// SOME FUNCTIONS TO BE USED


	function runQuery($link,$query) {
		$result = mysqli_query($link,$query);
		if($result)
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;

	}
	
	function numRows($link,$query) {
		$result  = mysqli_query($link,$query);
		if($result)
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}

	?>