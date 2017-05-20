<?php	
	include "html_top.html" ;
	if ($_POST['exit']) /* была нажата кнопка ВЫЙТИ */
	{
		header("Location:index.php");		
	}
	if ( $_POST ['check_enter'] )/* пришли данные от формы регистрации */
	{		
		include 'handler.php';			
	}
	/*ещё не сделан выбор вход - регистрация  или авторизация дала фолс*/
	if ( !$_POST['entrance'] && !$_POST['check'] && !$_SESSION['user_id'])
	{
		include 'result_error.php';
		include "for_.html";
		include 'for_entrance.html';
	}
	if ( $_POST['check'] && !$_SESSION['user_id']) /* выбор сделан - регистрация*/
	{
		include 'handler.php';
	}
	if( $_POST['entrance'] ) /* нажат ВХОД */
	{		
		include 'handler.php';		
	}
	if( $_SESSION['user_id'] ) /* осуществлен вход в систему */
	{
		if ( $_POST['press'] )
		{
			include 'handler.php';
		}		 
		if ( !$_SESSION['counter'] )
		{				
			include "inquiry.php";	
			echo "<h2>".htmlspecialchars($counter)."</h2>";	
		}
		if ( $_SESSION['counter'] )
		{
			$counter = htmlspecialchars( $_SESSION['counter'] );
			echo "<h2>$counter</h2>";
		}
		?>
			<form  action="" method="post">			
			Нажмите на кнопу<br>
			<button name='press' value='1'>+1</button><br>			
			<button name='exit' value='1'>выход</button>
			</form>
		<?php
	}
include "html_bottom.html";	
?>
