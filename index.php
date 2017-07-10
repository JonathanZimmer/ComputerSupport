<?php
	require_once "config.php";
	require_once "functions.php";
	$conn = mysql_connect("localhost", $g_username, $g_password);
	mysql_select_db('stt', $conn);
	$sql="SELECT id FROM LaptopHistory ORDER BY id";
	if ($result=mysql_query($sql,$conn)){
 		// Return the number of rows in result set
		$rowcount=mysql_num_rows($result);
	}
	$rowcount=$rowcount+1;
?>
<center>
	<div class="centeringDiv">
		<form method="post" name="postIt">
			<h2>
				Incident Report
			</h2>
			<br>

			<table>
					<tr>
						<td>
							Etch Number/Serial Number
						</td>
						<td>
							<textarea name="jID" placeholder="Etch Number/Serial Number"></textarea>
						</td>
					</tr>
			</table>
			<table>
					<tr>
						<td style="text-align:center;">
							<br>
							Incident Number
						</td>
						<td>
							<br>
							Date Recieved
						</td>
						<td style="text-align:center;">
							<br>
							Problem
						</td>
					</tr>
					<tr>
						<td style="text-align:center;">
							<?php
								echo $rowcount;
							?>
						</td>
						<td>
							<input type="date" name="DateRecieved" placeholder="Date" value="<?php echo date(" Y-m-d ");?>">
						</td>
						<td>
							<textarea name="Problem" placeholder="Problem"></textarea>
						</td>
					</tr>
			</table>
			<br>
			<table>
				
					<?php
						if(!isset($_GET['kiosk'])){
							echo "<tr><td>Who recieved it?</td><td><select name='RecievedBy'>";
							echo "<option value='14'>-----</option>";
							$query = "SELECT name, id FROM students WHERE active=1";
							$resul = mysql_query($query);
							while ($ro = mysql_fetch_assoc($resul)) {
								echo "<option value='".$ro['id']."'>".$ro['name']."</option><br>";
							}
						}
					?>
					<tr>
						<td>
							<br>
							Were these parts used?
						</td>
					</tr>
			</table>
			<table>
				<tr>
					<td>
						Keyboard
					</td>
					<td>
						<select name="KeyboardReplaced">
							<option value="Yes">
								Yes
							</option>
							<option value="No" selected>
								No
							</option>
						</select>
					</td>
					<td>
						Bezel
					</td>
					<td>
						<select name="BezelReplaced">
							<option value="Yes">
									Yes
								</option>
								<option value="No" selected>
									No
								</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							LCD
						</td>
						<td>
							<select name="LCDReplaced">
								<option value="Yes">
									Yes
								</option>
								<option value="No" selected>
									No
								</option>
							</select>
						</td>
						<td>
							Motherboard
						</td>
						<td>
							<select name="MotherboardReplaced">
								<option value="Yes">
									Yes
								</option>
								<option value="No" selected>
									No
								</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							Wireless Card
						</td>
						<td>
							<select name="WirelessCardReplaced">
								<option value="Yes">
									Yes
								</option>
								<option value="No" selected>
									No
								</option>
							</select>
						</td>
						<td>
							Unit itself
						</td>
						<td>
							<select name="UnitReplaced">
								<option value="Yes">
									Yes
								</option>
								<option value="No" selected>
									No
								</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							Fan
						</td>
						<td>
							<select name="FanReplaced">
								<option value="Yes">
									Yes
								</option>
								<option value="No" selected>
									No
								</option>
							</select>
						</td>
						<td>
							Screws
						</td>
						<td>
							<select name="ScrewsUsed">
								<option value="Yes">
									Yes
								</option>
								<option value="No" selected>
									No
								</option>
							</select>
						</td>
					</tr>
				</div>
		</table>
			<tr>
				<td>
					<h2>
						<br>
						Repair Process
						</h2>
					</td>
				</tr>
			<table>
				<div style="text-align:center">
					<tr>
						<td>
							Repair Notes
						</td>
						<td>
							<textarea name="RepairNotes" placeholder="Repair Notes"></textarea>
						</td>
					</tr>
					<br>
					<?php
						if(!isset($_GET['kiosk'])){
							echo "<tr><td>Who fixed it?</td><td><select name='FixedBy'>";
							echo "<option value='14'>-----</option>";
							$query = "SELECT name, id FROM students WHERE active=1";
							$resul = mysql_query($query);
							while ($ro = mysql_fetch_assoc($resul)) {
								echo "<option value='".$ro['id']."'>".$ro['name']."</option><br>";
							}
						}
					?>
					<tr>
						<td>
							Date Repaired
						</td>
						<td>
							<input type="date" name="DateRepaired" placeholder="Date" value="<?php echo date(" Y-m-d ");?>">
						</td>
					</tr>
				</div>
					<tr>
						<td colspan="2" style="text-align:center;">
							<br>
							<input type="submit">
						</td>
					</tr>
			</table>
		</form>
	<?php
		if ($_POST){
			$ID = str_replace("'","",$_POST['jID']);
			$MainQuery = "SELECT `StudentOwner`, `LaptopID`, `Brand`, `GradYear` FROM inventory WHERE `LaptopID` = $ID";
			$MainResult = mysql_query($MainQuery);
			while($row = mysql_fetch_array($MainResult)){   //Creates a loop to loop through results
				$GradYear=$row['GradYear'];
				$LaptopID=$row['LaptopID'];
				$StudentOwner=$row['StudentOwner'];
	?>
	</div>

		<?php
			if ($_POST){
				$DateRecieved=str_replace("'","",$_POST['DateRecieved']);
				$RecievedBy=str_replace("'","",$_POST['RecievedBy']);
				$Problem=str_replace("'","",$_POST['Problem']);
				$KeyboardReplaced=str_replace("'","",$_POST['KeyboardReplaced']);
				$BezelReplaced=str_replace("'","",$_POST['BezelReplaced']);
				$LCDReplaced=str_replace("'","",$_POST['LCDReplaced']);
				$MotherboardReplaced=str_replace("'","",$_POST['MotherboardReplaced']);
				$WirelessCardReplaced=str_replace("'","",$_POST['WirelessCardReplaced']);
				$UnitReplaced=str_replace("'","",$_POST['UnitReplaced']);
				$FanReplaced=str_replace("'","",$_POST['FanReplaced']);
				$ScrewsUsed=str_replace("'","",$_POST['ScrewsUsed']);
				$RepairNotes=str_replace("'","",$_POST['RepairNotes']);
				$FixedBy=str_replace("'","",$_POST['FixedBy']);
				$DateRepaired=str_replace("'","",$_POST['DateRepaired']);
				
				//make query to add an incident
				$queryinsertincident = "INSERT INTO `LaptopHistory`(
				`LaptopID`, `GradYear`, `StudentOwner`, 
				`id`, `DateRecieved`, `RecievedBy`, 
				`Problem`, `KeyboardReplaced`, `LCDReplaced`, 
				`WirelessCardReplaced`, `FanReplaced`, `BezelReplaced`, 
				`MotherboardReplaced`, `UnitReplaced`, `ScrewsUsed`, 
				`RepairNotes`, `RepairedBy`, `DateRepaired`) VALUES
						('"
					.$ID."', '".$GradYear."', '".$StudentOwner."', '"
					.$rowcount."', '".$DateRecieved."', '".$RecievedBy."', '"
					.$Problem."', '".$KeyboardReplaced."', '".$LCDReplaced."', '"
					.$WirelessCardReplaced."', '".$FanReplaced."', '".$BezelReplaced."', '"
					.$MotherboardReplaced."', '".$UnitReplaced."', '".$ScrewsUsed."', '"
					.$RepairNotes."', '".$FixedBy."', '".$DateRepaired."')";
	





				
				
				//commence query to add an incident
					$result = mysql_query($queryinsertincident);
					//announce if the incident was recorded
					if(!$result){
						echo"Incident failed to report<br>";
						die('Invalid query: ' . mysql_error());
					}
					else{}
				}// end if laptop taken	
			}
			}
			mysql_close($conn);
		
		
		?>
	</div>
</center>