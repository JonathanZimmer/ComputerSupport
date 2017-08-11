<center>
	<?php
		require_once "config.php";
		require_once "functions.php";
		makeHeader("Spares","Spare Laptops",3,"SparesPage.php");
		$conn = mysql_connect("localhost", $g_username, $g_password);
		mysql_select_db('stt', $conn);
		$None="";
		$CountOut= mysql_query("SELECT COUNT(*) FROM `Spares` WHERE `Student` != '' ");
		if (mysql_result($CountOut, 0, 0) > 0) {
			$Out=mysql_query("SELECT * FROM Spares WHERE Students != '' ");
		}
		else{
			echo "No spares are out<br>";
			echo $CountOut;
			
		}
	?>
</center>