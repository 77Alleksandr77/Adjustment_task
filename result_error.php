<?php
	$error = $_SESSION ['my_error'] ;
	if ( $error )
	{
		foreach( $error as $val )
		{
			echo " $val <br><hr color='#057733'/>";
		}

	}	
?>
