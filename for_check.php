<?php
include "html_top.html" ;
include "for_.html";
?>
			Дата рождения:
		</td>
		<td>
			<table>
			<tr>
				<td>день:</td><td>месяц:</td><td>год:</td>
			</tr>
				<td>
					<select name ='day'  size = '1'> 
					<?php 
						for( $i=1 ; $i<=31 ; $i++)
						{
							echo "<option value='$i'>$i</option>";
						}
					?>
					</select>
				-</td>
				<td>
					<select name = 'month' size = '1'>
					<option value='1'>Январь</option>
					<option value='2'>Февраль</option>
					<option value='3'>Март</option>
					<option value='4'>Апрель</option>
					<option value='5'>Май</option>
					<option value='6'>Июнь</option>
					<option value='7'>Июль</option>
					<option value='8'>Август</option>
					<option value='9'>Сентярь</option>
					<option value='10'>Октябрь</option>
					<option value='11'>Ноябрь</option>
					<option value='12'>Декабрь</option>
					</select>
				-</td>
				<td>
					<select name = 'year' size = '1'>
					<?php 
						for( $i = date('Y') ; $i>1000 ; $i--)
						{
							echo "<option value='$i'>$i</option>";
						}
					?>					
				</td>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			
		</td>
		<td>
			<input type="submit" name="check_enter" value="Зарегистрироваться!"/>
		</td>		
	</tr>	
	</table>
</form>
<?php
	include "html_bottom.html";	
?>
