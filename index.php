<?php
	require_once "config.php";
	require_once "functions.php";
	if(!isset($_GET['kiosk'])){}
	//start connection
	$conn = mysql_connect("localhost", $g_username, $g_password);
	//access correct database
	mysql_select_db('stt', $conn);
?>
<center>
	<div class="centeringDiv">
		<h2>
			Incident Report
		</h2>
			<form method="post" name="postIt">
				<table>
					<!-- Date Recieved input field -->
					<tr>
						<td>
							Date Recieved
						</td>
						<td>
							<input type="date" name="jDate" placeholder="Date" value="<?php echo date(" Y-m-d ");?>">
						</td>
					</tr>
					<tr>
						<!-- Owner input field -->
						<td>
							Owner of Laptop
						</td>
						<td>
							<input type="text" name="jOwner" placeholder="Owner">
						</td>
					</tr>
					<tr>
						<!-- Laptop serial input field -->
						<td>
							Serial Number of Laptop
						</td>
						<td>
							<textarea name="jLaptopNumber" placeholder="Laptop Serial Number" onChange="this.form.jLaptopTaken.selectedIndex=0">
							</textarea>
						</td>
					</tr>
					<tr>
						<!-- Laptop taken input field -->
						<td>
							Laptop taken from student?
						</td>
						<td>
							<select name="jLaptopTaken" onChange="document.getElementById('lserialrow').style='display: table-row'">
								<option value="1">
									Yes
								</option>
								<option value="2" selected>
									No
								</option>
							</select>
						</td>
					</tr>
					<!-- New Laptop Serial Number input field -->
					<tr id=lserialrow style="display:none">
						<td>
							Serial Number of new laptop
						</td>
						<td>
							<textarea name="jNewNumber" placeholder="New Serial Number">
							</textarea>
						</td>
					</tr>
					<!-- Charger serial input field -->
					<tr>
						<td>
							Serial Number of Charger
						</td>
						<td>
							<textarea name="jChargerNumber" placeholder="Charger Serial Number" onChange="this.form.jChargerTaken.selectedIndex=0">
							</textarea>
						</td>
					</tr>
					<!-- Charger taken input field -->
					<tr>
						<td>
							Charger taken from student?
						</td>
						<td>
							<select name="jChargerTaken" onChange="document.getElementById('cserialrow').style='display: table-row'">
								<!-- replace options with a query later -->
								<option value="1">
									Yes
								</option>
								<option value="2" selected>
									No
								</option>
							</select>
						</td>
					</tr>
					<!-- Serial Number input field -->
					<tr id=cserialrow style="display:none">
						<td>
							Serial Number of new laptop Charger
						</td>
						<td>
							<textarea name="jNewNumberCharger" placeholder="New Charger Serial Number">
							</textarea>
						</td>
					</tr>
					<!-- Laptop incident input field -->
					<tr>
						<td>
							What's wrong with it?
						</td>
						<td>
							<textarea name="jIssue" placeholder="Problem" onChange="this.form.jLaptopTaken.selectedIndex=0">
							</textarea>
						</td>
					</tr>
					<?php
						if(!isset($_GET['kiosk'])){
							echo "<tr><td>Who should get the points?</td><td><select name='personid'>";
							echo "<option value='14'>-----</option>";
							$query = "SELECT name, id FROM students WHERE active=1";
							$resul = mysql_query($query);
							while ($ro = mysql_fetch_assoc($resul)) {
								echo "<option value='".$ro['id']."'>".$ro['name']."</option>";
							}
						}
						echo "</option>";
					?>
					<tr>
						<td colspan="2" style="text-align:center;"><input type="submit"></td>
					</tr>
				</table>
			</form>
		<?php
			if ($_POST){
				$personid = str_replace("'","",$_POST['personid']);
				$problem = str_replace("'","",$_POST['jIssue']);
				//make query to add an incident
				$queryinsertincident = "INSERT INTO `incidents`
					(`date`, `owner`, `laptopserial`, `chargerserial`, `laptoptaken`, `chargertaken`, `newlaptop`, `newlaptopserial`, `newchargerserial`, `explanation`, `receviedby`) 
					VALUES ('"
					. $_POST['jDate'] ."','"
					. $_POST['jOwner'] ."','"
					. $_POST['jLaptopNumber'] ."','"
					. $_POST['jChargerNumber'] ."', "
					. $_POST['jLaptopTaken'] .", "
					. $_POST['jChargerTaken'] .", "
					. $_POST['jNewLaptop'] .",'"
					. $_POST['jNewNumber'] . "', '"
					. $_POST['jNewNumberCharger'] ."', '"
					.$problem."', '"
					.$personid."')";
					//commence query to add an incident
					$result = mysql_query($queryinsertincident);
					//announce if the incident was recorded
					if(!$result){
						echo"Incident failed to report";
						die('Invalid query: ' . mysql_error());
						$fail = "True";
					}else{}	
				}// end if laptop taken	
		mysql_close($conn);
		?>
	</div>
</center>