<?php
	require_once "config.php";
	require_once "functions.php";
	$conn = mysql_connect("localhost", $g_username, $g_password);
	mysql_select_db('stt', $conn);
?>
<center>
	<div class="centeringDiv">
		<h2>
			Inventory
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
		$MainQuery = "SELECT `StudentOwner`, `LaptopID`, `Brand`, `GradYear` FROM inventory WHERE `LaptopID` = $ID";
		
		//commence query search
		$MainResult = mysql_query($MainQuery);
		while($row = mysql_fetch_array($MainResult)){   //Creates a loop to loop through results
			echo "<tr><td> 
			Student: " . $row['StudentOwner'] . "<br>
			Serial/Etch Number: ". $row['LaptopID'] . "<br>
			Brand: ". $row['Brand'] . "<br>
			Graduation Year: ".$row['GradYear'] . "<br></td></tr>";
		}
	}
?>
</center>
