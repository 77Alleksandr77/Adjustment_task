<?php	
	function calculate_age($day, $month, $year) /* получить возраст */
	{
		$age = checkdate ( $month, $day, $year );
		if( !$age )
		{
			return false;
		}
		else
		{		
			$age = date('Y') - $year;
			if ( date('m') < $month ) 
			{
				$age--;
			}
			if ( date('m') == $month ) 
			{
				if ( date('d') < $day )
				{
					$age--;
				}
			}
		}
		return $age;
	}	
	function connectDB() /* подключиться к БД */
	{
		global $mysqli;
		$mysqli=new mysqli("","","","");
		$mysqli->set_charset('UTF8');
		if (!$mysqli)
		{
			echo "соединение с БД не удалось<br>";
			return false;
		}
		else return $mysqli;
	}
	function check_user( $user_name, $password, $connect ) /* добавить пользователя и счетчек = 0 */
	{
		$table = 'counter';
		$count = 0;
		$user_name = mysqli_real_escape_string($connect, $user_name);
		$password = password_hash($password, PASSWORD_DEFAULT);
		$success = mysqli_query( $connect, "INSERT INTO  `$table`(`name` ,`pass` ,`count`)
		VALUES ('$user_name','$password','$count')");
		if ( $success )
		{
			if ( $user_id = mysqli_insert_id ( $connect ))// получаем id последнего запроса
			{
				return $user_id;
			}
			else
			{
				return false;
			}			
		}
		else 
		{
			return false;
		}
	}
	function get_counter ( $user_id, $connect ) /* получить счетчек */
	{
		$table = 'counter';
		$result_set =  mysqli_query( $connect, " SELECT `count` FROM `$table` WHERE `id` = '$user_id' ");
		$count = $result_set->fetch_assoc();		
		if($count)
		{
			return $count["count"];
		}
		else
		{
			return false;
		}		
	}
	function eneter_counter($user_id, $connect) /* изменить значение счетчика */
	{
		$table = 'counter';
		$success = mysqli_query ( $connect, " UPDATE `$table` SET `count` = `count`+1
		WHERE `id` = '$user_id' " );
	}
	function enterance( $user_name, $user_password, $connect) /* вход в аккаунт */
	{
		$table = 'counter';
		$user_name = mysqli_real_escape_string($connect, $user_name);
		$result_set = mysqli_query ($connect, " SELECT `id`, `pass` FROM `$table` 
		WHERE `name`='$user_name' "); 		
		if( $received_pass_array = $result_set->fetch_assoc() ) 
		{			
			$pass = $received_pass_array ['pass'];			
			if (password_verify($user_password, $pass))
			{
				return $received_pass_array ['id'];
			}
			else 
			{
				return false;
			}
		}
		else 
		{
			return false;
		}
	}	
?>
