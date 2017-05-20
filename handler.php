<?php
	$error = false;
	/* если авторизация прошла успешно*/
	if($_SESSION['user_name'])
	{
		header("Location:index.php");
	}
	if ( $_POST['check'] )
	{
		header("Location:for_check.php");
	}
	else
	{
		$flag = false ;//процесс входа лили регистрации только при $flag == false
		if ( !$_POST['user_name'] )
		{
			if (  $_POST['user_name'] != '0' )
			{
				/* $error[] = "Имя не введено"; */
				$flag = true;////процесс входа лили регистрации запущен не будет
			}
			elseif ( $_POST ['check_enter']) //проверяем толко если данные получены от формы регистрации
			{
				$error[] = 'Имя - "0" не подходящее! ';
			}			
		}
		else
		{
			$user_name = $_POST['user_name'];
		}		
		if ( !$_POST['password'] )
		{
			if ( $_POST ['password'] != '0' ) 
			{
				/* $error[] = "Пароль не введён"; */
				$flag = true;////процесс входа лили регистрации запущен не будет
			}	
			elseif ( $_POST ['check_enter']) //проверяем толко если данные получены от формы регистрации
			{
				$error[] = 'Пароль - "0" не подходящий!';
			}			
		}
		else
		{
			$password = $_POST['password'];
		}
		/* если $flag == true то фиксируем это в $error[] */ 
		if ( $flag )
		{
			$error[] = "Все поля обязательны к заполнению";
		}
		/////////////////////////////////////////////////////////////////////////////////////////////////////
		/*в форму регистрации ввели данные*//////////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////////////////////////////////
		if ( $_POST ['check_enter'] )
		{
			$day = $_POST['day'];
			$month = $_POST['month'];	
			$year = $_POST['year'];				
			$age = calculate_age ($day, $month, $year);
			if ($age < 5)
			{
				$error[] = "Too young!";
			}
			if ($age > 150)
			{
				$error[] = "Too old!";
			}
			if ($age < 0)
			{
				$error[] = "Вы ещё даже не родились!";
			}
			if ( $age === false )
			{
				$error[] =  "Некоректно введена дата рождения!";
			}		
			if ( !$error  )
			{
				$_SESSION['user_id'] = check_user( $user_name, $password, $connect );		
				/* добавляем Нового пользователя, со щетчиком равным 0 */
				if ( !$_SESSION['user_id'] )
				{	
					$error[] = "Такой ник есть!";	
				}
				else
				{
					include "inquiry.php";
					$_SESSION['counter'] = $counter;
				}
			}		
		}
		if( $_POST ['entrance']  ) /* нажат ВХОД */
		{
			if( !$error )
			{
				$_SESSION['user_id'] = enterance( $user_name, $password, $connect);
			}
			/* сообщение появится только когда заполнены все поля, а авторизация == false */
			if ( !$_SESSION['user_id'] && !$flag)
			
			{
				$error[] = "Не верный логин или пароль!";	
			}
		}
		$_SESSION ['my_error'] = $error;
		header("Location:index.php");
	}
?>
