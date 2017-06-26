<?php
	require_once "config.php";
	require_once "functions.php";
	//start connection
	$conn = mysql_connect("localhost", $g_username, $g_password);
	//access correct database
	mysql_select_db('stt', $conn);
?>
<center>
	<div class="centeringDiv">
		<h2>
			Add to Inventory
		</h2>
			<form method="post" name="postIt">
				<table>
					<tr>
						<td>
							Student
						</td>
						<td>
							<textarea name="jStudent" placeholder="Student"></textarea>
						</td>
					</tr>
					<tr>
						<td>
							Serial/Etch Number of Laptop
						</td>
						<td>
							<textarea name="jLaptopID" placeholder="Laptop Serial/Etch Number"></textarea>
						</td>
					</tr>
					<tr>
						<td>
							Laptop Brand/Model
						</td>
						<td>
							<textarea name="jBrandModel" placeholder="Brand/Model"></textarea>
						</td>
					</tr>
					<tr>
						<td>
							Graduation Year of Student
						</td>
						<td>
							<textarea name="jGradYear" placeholder="Graduation Year"></textarea>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="text-align:center;">
							<input type="submit">
						</td>
					</tr>
				</table>
			</form>
		<?php
			if ($_POST){
				$StudentOwner = str_replace("'","",$_POST['jStudent']);
				$LaptopID = str_replace("'","",$_POST['jLaptopID']);
				$GradYear = str_replace("'","",$_POST['jGradYear']);
				$result = mysql_query("SELECT COUNT(*) FROM `inventory` WHERE `LaptopID` = $LaptopID");
				if (!$result) {
					die(mysql_error());
				}
				else{
					"<br>";
				}
				if (mysql_result($result, 0, 0) > 0) {
					$UpdateQuery = "UPDATE `inventory` SET `StudentOwner`='$StudentOwner', `GradYear`='$GradYear' WHERE `LaptopID`='$LaptopID'";
					if(mysql_query($UpdateQuery,$conn)){} 
					else {
						echo "ERROR: Could not able to execute $UpdateQuery. " . mysql_error($conn);
					}
					if ($_POST){
						$MainQuery = "SELECT `StudentOwner`, `LaptopID`, `Brand`, `GradYear` FROM inventory WHERE `LaptopID` = $LaptopID";
						$MainResult = mysql_query($MainQuery);
						while($row = mysql_fetch_array($MainResult)){   //Creates a loop to loop through results
							echo "<br><tr><td>
							Student: " . $row['StudentOwner'] . "<br>
							Serial/Etch Number: ". $LaptopID . "<br>
							Brand: ". $row['Brand']. "<br>
							Graduation Year:  ". $row['GradYear'] . "</td></tr>";
						}
					}	
				} 
				else {
					$InsertQuery="INSERT INTO `inventory`(`StudentOwner`, `LaptopID`, `Brand`, `GradYear`) VALUES 
					('".$StudentOwner."', '".$LaptopID."', '".$Brand."', '".$GradYear."')";
					$result = mysql_query($InsertQuery);
				if(!$result){
					echo(mysql_error());
					die(mysql_error());
				}
				else{
					if ($_POST){
						$MainQuery = "SELECT `StudentOwner`, `LaptopID`, `Brand`, `GradYear` FROM inventory WHERE `LaptopID` = $LaptopID";
						$MainResult = mysql_query($MainQuery);
							while($row = mysql_fetch_array($MainResult)){   //Creates a loop to loop through results
								echo "<tr><td>
								Student: " . $row['StudentOwner'] . "<br>
								Serial/Etch Number: ". $LaptopID . "<br>
								Brand: ". $row['Brand']. "<br>
								Graduation Year:  ". $row['GradYear'] . "</td></tr>";
							}
						}
					}
				}
				mysql_close($conn);
				$_POST['jStudent'] = "";
				$_POST['jLaptopID'] = "";
				$_POST['jBrand'] = "";
				$_POST['jGradYear'] = "";
			}
		?>
	</div>
</center>