<?php
	$search = $sql_search = '';
	if (isset($_REQUEST['page'])) 
	{
		if (isset($_GET['keyword_search']))
		{
			$search = addslashes($_GET['keyword_search']);
		    if($search != '') 
		    {
		    	if ($search[0] != '#') 
		    	{
		    		$sql_search = 'SELECT * FROM product WHERE `Status` = 1 AND `ProductName` LIKE "%'.$search.'%"; ';		
		    	} 
		    	else 
		    	{
		    		$sql_search = str_replace('#', '', $sql_search);
		    		$sql_s;
		    		$sql_search = 'SELECT * FROM orders WHERE `OrderID` LIKE '.$sql_search;
		    	}
		    }
		}
	}
?>