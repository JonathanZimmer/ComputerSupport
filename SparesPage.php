<center>
	<?php
		require_once "config.php";
		require_once "functions.php";
		makeHeader("Spares","Spare Laptops",3,"SparesPage.php","<style>td{color:black;}</style>");
		$url1=$_SERVER['REQUEST_URI'];
    header("Refresh: 15; URL=$url1");
		$conn = mysql_connect("localhost", $g_username, $g_password);
		mysql_select_db('stt', $conn);
		echo "<h2>Spares Out</h2>";
		$CountOut= mysql_query("SELECT COUNT(*) FROM `Spares` WHERE `Student` != 'NoStudent' ");
		if (mysql_result($CountOut, 0, 0) > 0) {
			$MainQuery=mysql_query("SELECT * FROM Spares WHERE Student != 'NoStudent' ");
			echo "<table><tr><td>Student Name</td><td>Laptop Etch Number</td><td>Laptop Model</td></tr>";
			while($row = mysql_fetch_array($MainQuery)){
				echo "<tr><td>".$row['Student']."</td><td>".$row['LaptopID']."</td><td>".$row['LaptopBrand']."</td></tr>";
			}
		}
		else{
			echo "No spares are out<br>";
		}
		echo "</table>";

    echo "<br><h2>Spares In</h2>";
 		$CountIn=mysql_query("SELECT COUNT(*) FROM `Spares` WHERE `Student` = 'NoStudent' ");
		if (mysql_result($CountIn, 0, 0) > 0) {
			$SideQuery=mysql_query("SELECT * FROM Spares WHERE Student = 'NoStudent' ");
			echo "<table><tr><td>Laptop Etch Number</td><td>Laptop Model</td></tr>";
			while($row = mysql_fetch_array($SideQuery)){
				echo "<tr><td>".$row['LaptopID']."</td><td>".$row['LaptopBrand']."</td></tr>"; 
      }
      echo "</table>";
    }
	else{
		echo "We have no spares. Get more fixed";
	}
	echo "</table>";
  
		
	?>
</center>
</center>

