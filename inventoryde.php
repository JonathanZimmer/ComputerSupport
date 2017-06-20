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
				<!-- Owner input field -->
				<tr>
					<td>
						Student
					</td>
					<td>
						<textarea name="jStudent" placeholder="Student">
						</textarea>
					</td>
				</tr>
				<!-- Laptop serial input field -->
				<tr>
					<td>
						Serial/Etch Number of Laptop
					</td>
						<td>
							<textarea name="jLaptopID" placeholder="Laptop Serial/Etch Number">
							</textarea>
						</td>
					</tr>
					<tr>
						<td>
							Laptop Brand/Model
						</td>
						<td>
							<textarea name="jBrandModel" placeholder="Brand/Model">
							</textarea>
						</td>
					</tr>
					<tr>
						<td>
							Graduation Year of Student
						</td>
						<td>
							<textarea name="jGradYear" placeholder="Graduation Year">
							</textarea>
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
				$Brand=str_replace($_POST['jBrandModel']);
				$GradYear = str_replace("'","",$_POST['jGradYear']);
				$DeleteQuery="DELETE FROM `inventory` WHERE `LaptopID='$LaptopID'";
				$InsertQuery="INSERT INTO `inventory`(`StudentOwner`, `LaptopID`, `Brand`, `GradYear`) VALUES 
				('".$StudentOwner."', '".$LaptopID."', '".$Brand."', '".$GradYear."')";
				//commence query to update inventory
				$result2=mysql_query($DeleteQuery);
				$result = mysql_query($InsertQuery);
				//announce if the incident was recorded
				if(!$result){
					echo"Inventory failed to update";
					die('Invalid query: ' . mysql_error());
					$fail = "True";
				}
				else{
					echo "Inventory updated";
				}
				mysql_close($conn);
				$_POST['jStudent'] = "";
				$_POST['jLaptopID'] = "";
				$_POST['jBrand'] = "";
				$_POST['jGradYear'] = "";
			}
			die;
		?>
	</div>
</center>