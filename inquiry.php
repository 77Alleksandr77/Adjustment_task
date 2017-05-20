<?php
	$counter = get_counter ($_SESSION['user_id'], $connect); /* плучаем показания счетчика */
	if ( !$counter )
	{
		$counter = 0;
	}
	if ( $_POST['press'] ) /* если нажата кнопка +1 */
	{
		unset ( $_POST['press'] );
		$counter++;
		eneter_counter($_SESSION['user_id'], $counter, $connect); /* записываем показания счетчика */
	}
?>
