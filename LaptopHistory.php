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
						Grade or Person?
					</td>
					<td>
						<select name="Selecter">
							<option value="Grade">
								Full class
							</option>
							<option value="Person">
								Single person
							</option>
							<option value="------" selected>
								--------
							</option>
						</select>
					</td>
				</tr>
					<tr>
						<td>
							Lookup ID
						</td>
						<td>
							<textarea name="jID" placeholder="Lookup ID"></textarea>
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
		$selector=str_replace("'","",$_POST['Selecter']);
		
		if ($selector=="Person") {
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
//	$handle= printer_open("Tech Room Printer");
//	$handle=printer_open();
	
	else if ($selector=="Grade"){
		$GradeQuery= "SELECT * FROM LaptopHistory WHERE GradYear=$ID";
		$count = mysql_query("SELECT COUNT(*) FROM `LaptopHistory` WHERE `GradYear` = $ID");
				if (!$count) {
					die(mysql_error());
				}
				else{
					"<br>";
				}
		if (mysql_result($count, 0, 0) > 0) {
		$GradeResult = mysql_query($GradeQuery);
		while($row2 = mysql_fetch_array($GradeResult)){   //Creates a loop to loop through results
			echo "<tr><td> 
			Student: " . $row2['StudentOwner'] . "<br>
			Date Recieved: ". $row2['DateRecieved'] . "<br>";
			if($row2['KeyboardReplaced'] =='Yes'){
				echo "Keyboard has been replaced<br>";
			}
			if($row2['LCDReplaced'] =='Yes'){
				echo "LCD has been replaced<br>";
			}
			if($row2['WirelessCardReplaced'] =='Yes'){
				echo "Wireless card has been replaced<br>";
			}
			if($row2['FanReplaced'] =='Yes'){
				echo "Fan has been replaced<br>";
			}
			if($row2['BezelReplaced'] =='Yes'){
				echo "Bezel has been replaced<br>";
			}
			if($row2['MotherBoardReplaced'] =='Yes'){
				echo "Motherboard has been replaced<br>";
			}
			if($row2['UnitReplaced'] =='Yes'){
				echo "Unit has been replaced<br>";
			}
		}
		}
		else{
			echo "No students graduating in " .$ID." have had their computers in";
		}
		echo "<br>";
		
	}
		else{
			echo "You failed to select anything";
		}
	}
?>
</center>
