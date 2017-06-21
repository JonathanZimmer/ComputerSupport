<?php
	require_once "config.php";
	require_once "functions.php";
?>
<center>
	<div class="centeringDiv">
	<h2>
		Incident Report
	</h2>
  <form method="post" name="postIt">
    <table>

			<!-- Date Recieved input field -->
      <tr><td>Date Recieved</td><td><input type="date" name="Date" placeholder="Date" value="<?php echo date("Y-m-d");?>"></td></tr>
			
      <!-- Owner input field -->
      <tr><td>Owner of Laptop</td><td><input type="text" name="Owner" placeholder="Owner"></td></tr>
			
		
			<!-- Laptop serial input field -->
 			<tr><td>Serial Number of Laptop</td><td><textarea name="LaptopSerial" placeholder="Laptop Serial Number"></textarea></td></tr>
			
			  <!-- Laptop taken input field -->
			<tr><td>Laptop taken from student?</td>
        <td>
          <select name="LaptopTaken" onChange="document.getElementById('LaptopReplacement').style='display: table-row'">
            <!-- replace options with a query later -->
            <option value="No" selected>No</option>
            <option value="Yes">Yes</option>
          </select>
        </td>
      </tr>
					  <!-- New Laptop input field -->
		  <tr id=LaptopReplacement style="display:none"><td>Laptop Replacement Given/Loaned?</td>
        <td>
          <select name="NewLaptop" onChange="document.getElementById('LaptopSerialNew').style='display: table-row'">
            <!-- replace options with a query later -->
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select>
        </td>
      </tr>
			<!-- Serial Number input field -->
			<tr id=LaptopSerialNew style="display:none"><td>Serial Number of new laptop</td><td><textarea name="NewLaptopSerial" placeholder="New Laptop Serial Number"></textarea></td></tr>


			
			
						<!-- Laptop serial input field -->
 			<tr><td>Serial Number of Charger</td><td><textarea name="ChargerSerial" placeholder="Charger Serial Number"></textarea></td></tr>
			
			  <!-- Laptop taken input field -->
			<tr><td>Charger taken from student?</td>
        <td>
          <select name="ChargerTaken" onChange="document.getElementById('ChargerReplacement').style='display: table-row'">
            <!-- replace options with a query later -->
            <option value="No" selected>No</option>
            <option value="Yes">Yes</option>
          </select>
        </td>
      </tr>
					  <!-- New Laptop input field -->
		  <tr id=ChargerReplacement style="display:none"><td>Charger Replacement Given/Loaned?</td>
        <td>
          <select name="NewCharger" onChange="document.getElementById('ChargerSerialNew').style='display: table-row'">
            <!-- replace options with a query later -->
            <option value="No" selected>No</option>
            <option value="Yes">Yes</option>
          </select>
        </td>
      </tr>
			<!-- Serial Number input field -->
			<tr id=ChargerSerialNew style="display:none"><td>Serial Number of New Charger</td><td><textarea name="NewChargerSerial" placeholder="New Charger Serial Number"></textarea></td></tr>
		
			<!-- Explanation input field -->
			<tr><td>Problem</td><td><textarea name="Problem" placeholder="Problem With Laptop"></textarea></td></tr>
<?php
if(!isset($_GET['kiosk'])){
	echo "<tr><td>Who recieved the laptop?</td><td><select name='RecievedBy'>";
	echo "<option value='14'>-----</option>";
	$StudentQuery = "SELECT name, id FROM students WHERE active=1";
	$StudentResult = mysql_query($StudentQuery);
	while ($ro = mysql_fetch_assoc($StudentResult)) {
		echo "<option value='".$ro['id']."'>".$ro['name']."</option>";
	}	
}
echo "</option>";
?>
      <tr><td colspan="2" style="text-align:center;"><input type="submit"></td></tr>
    
		</table>
  </form>

<?php
	//start connection
	$conn = mysql_connect("localhost", $g_username, $g_password);
	//access correct database
	mysql_select_db('stt', $conn);
	if ($_POST){

		$Date = str_replace("'","",$_POST['Date']);
		$Owner = str_replace("'","",$_POST['Owner']);
		$LaptopSerial = str_replace("'","",$_POST['LaptopSerial']);
		$ChargerSerial = str_replace("'","",$_POST['ChargerSerial']);
		$LaptopTaken = str_replace("'","",$_POST['LaptopTaken']);
		$ChargerTaken = str_replace("'","",$_POST['ChargerTaken']);
		$NewLaptopSerial = str_replace("'","",$_POST['NewLaptopSerial']);
		$NewChargerSerial = str_replace("'","",$_POST['NewChargerSerial']);
		$Problem = str_replace("'","",$_POST['Problem']);
		$RecievedBy = str_replace("'","",$_POST['RecievedBy']);
		//make query to add an incident
		$queryinsertincident = "INSERT INTO `incidents`(
		`date`, `owner`, `laptopserial`, `chargerserial`, `laptoptaken`, 
		`chargertaken`, `newlaptopserial`, `newchargerserial`, `problem`, `receviedby`) VALUES ('"
			. $Date ."','"
			. $Owner ."','"
			. $LaptopSerial ."','"
			. $ChargerSerial ."', "
			. $LaptopTaken .", "
			. $ChargerTaken .", "
			. $NewLaptopSerial . "', '"
			. $NewChargerSerial ."','"
			. $Problem ."',' "
			. $RecievedBy."')";
	
		//commence query to add an incident
		 $result = mysql_query($queryinsertincident);
		
		//announce if the incident was recorded
		if(!$result){
			echo"Incident failed to report";
			die('Invalid query: ' . mysql_error());
			$fail = "True";
		}else{
			echo "New Incident Reported!<br>";
			$fail = "False";
		}

			
		}// end if laptop taken
		
	 // end if post
?>
	</div>
</center>

<?php
  makeFooter("&#169; Copyright Cherokee Washington Highschool <a href='index.php'> Home Page<a/><a href='' onclick='initIt()'>About us</a> <style>#footer a{color:black; margin-left:3px;}#footer p{color:black; text-decoration:underlined;}</style>",0,"true");
	mysql_close($conn);
?>