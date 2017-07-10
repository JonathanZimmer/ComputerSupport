<?php
	require_once "config.php";
	require_once "functions.php";
	$conn = mysql_connect("localhost", $g_username, $g_password);
	mysql_select_db('stt', $conn);
?>
<center>
	<div class="centeringDiv">
		<h2>
			Laptop History
		</h2>
		<form method="post" name="postIt">
			<table>
					<tr>
						<td>
							Etch Number/Serial Number
						</td>
						<td>
							<textarea name="jID" placeholder="Etch Number/Serial Number"></textarea>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="text-align:center;">
							<input type="submit">
						</td>
					</tr>
			</table>
		</form>
	</div>
<?php
	if ($_POST){
		$ID = str_replace("'","",$_POST['jID']);
		
		//make query to search
		$MainQuery = "SELECT `StudentOwner`, `DateRecieved`, `KeyboardReplaced`, 
    `LCDReplaced`, `WirelessCardReplaced`, `FanReplaced`, 
    `BezelReplaced`, `MotherBoardReplaced`, `UnitReplaced`, 
    `RepairNotes`, `LaptopID` FROM `LaptopHistory` WHERE `LaptopID` = $ID";
    
    
    
    
    $result = mysql_query("SELECT COUNT(*) FROM `LaptopHistory` WHERE `LaptopID` = $ID");
				if (!$result) {
					die(mysql_error());
				}
				else{
					"<br>";
				}
				if (mysql_result($result, 0, 0) > 0) {

		//commence query search
		$MainResult = mysql_query($MainQuery);
		while($row = mysql_fetch_array($MainResult)){   //Creates a loop to loop through results
			echo "<tr><td> 
			Student: " . $row['StudentOwner'] . "<br>
			Date Recieved: ". $row['DateRecieved'] . "<br>";
			if($row['KeyboardReplaced'] =='Yes'){
				echo "Keyboard has been replaced<br>";
			}
			if($row['LCDReplaced'] =='Yes'){
				echo "LCD has been replaced<br>";
			}
			if($row['WirelessCardReplaced'] =='Yes'){
				echo "Wireless card has been replaced<br>";
			}
			if($row['FanReplaced'] =='Yes'){
				echo "Fan has been replaced<br>";
			}
			if($row['BezelReplaced'] =='Yes'){
				echo "Bezel has been replaced<br>";
			}
			if($row['MotherBoardReplaced'] =='Yes'){
				echo "Motherboard has been replaced<br>";
			}
			if($row['UnitReplaced'] =='Yes'){
				echo "Unit has been replaced<br>";
			}
    }
		}
    else{
      echo "Laptop ID ".$ID." hasn't been in for repairs";
    }
	}
	$handle= printer_open("Tech Room Printer");
	$handle=printer_open();
?>
</center>
