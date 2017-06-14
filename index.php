<?php
	require_once "config.php";
	require_once "functions.php";
 
//	makeHeader("Incident Report", "Make an Incident Report", 2,"incident_report.php", '<link href="/css_files/create_jobs.css" rel="stylesheet">');
?>
 
<center>
	<div class="centeringDiv">
	<h2>
		Incident Report
	</h2>
  <form method="post" name="postIt">
    <table>
 
			<!-- Date Recieved input field -->
      <tr><td>Date Recieved</td><td><input type="date" name="jDate" placeholder="Date"
value="<?php
echo date("Y-m-d");
?>
"></td></tr>
			
      <!-- Owner input field -->
      <tr><td>Owner of Laptop</td><td><input type="text" name="jOwner" placeholder="Owner"></td></tr>
			
 
					<select name="whatsWrong" onChange="if(this.selectedIndex==6)document.getElementById('other').type='text'">
						<option value="1">Broken Screen</option>
						<option value="2">Does not turn on </option>
						<option value="3">Does not connect to wifi</option>
						<option value="4">Keyboard does not work</option>
						<option value="5">Mouse does not work</option>
						<option value="6">Unknown</option>
						<option value="7">Other:<br><input id='other' type="hidden" name="otherReason" placeholder="Other Reason"></option>
					</select>
        </td>
      </tr>
		
			<!-- Laptop serial input field -->
 			<tr><td>Serial Number of Laptop</td><td><textarea name="jLaptopNumber" placeholder="Laptop Serial Number" onChange="this.form.jLaptopTaken.selectedIndex=0"></textarea></td></tr>
			
			  <!-- Laptop taken input field -->		 
			<tr><td>Laptop taken from student?</td>
        <td>
          <select name="jLaptopTaken">
            <!-- replace options with a query later -->
            <option value="1">Yes</option>
            <option value="2" selected>No</option>
          </select>
        </td>
      </tr>
 
			
		  <!-- Charger serial input field -->
 			<tr><td>Serial Number of Charger</td><td><textarea name="jChargerNumber" placeholder="Charger Serial Number" onChange="this.form.jChargerTaken.selectedIndex=0"></textarea></td></tr>
		
 
	
			<!-- Charger taken input field -->		 
			<tr><td>Charger taken from student?</td>
        <td>
          <select name="jChargerTaken">
            <!-- replace options with a query later -->
            <option value="1">Yes</option>
            <option value="2" selected>No</option>
          </select>
        </td>
      </tr>
 
		
		  <!-- New Laptop input field -->
		  <tr><td>Did you give a new laptop or charger to the student?</td>
        <td>
          <select name="jNewLaptop" onChange="document.getElementById('lserialrow').style='display: table-row';document.getElementById('cserialrow').style='display: table-row'">
            <!-- replace options with a query later -->
            <option value="1">No loaner given to student</option>
            <option value="2">Loaner/Replacement given to student</option>
          </select>
        </td>
      </tr>
		
			<!-- Serial Number input field -->
			<tr id=lserialrow style="display:none"><td>Serial Number of new laptop</td><td><textarea name="jNewNumber" placeholder="New Serial Number"></textarea></td></tr>
		
		<!-- Serial Number input field -->
			<tr id=cserialrow style="display:none"><td>Serial Number of new laptop Charger</td><td><textarea name="jNewNumberCharger" placeholder="New Charger Serial Number"></textarea></td></tr>
		
			<!-- Explanation input field -->
			<tr><td>Explanation of incident</td><td><textarea name="jExplanation" placeholder="Explanation of incident"></textarea></td></tr>
 
 
      <tr><td colspan="2" style="text-align:center;"><input type="submit"></td></tr>
    
		</table>
  </form>
 
<?php
	//start connection
	$conn = mysql_connect("localhost", $g_username, $g_password);
	//access correct database
	mysql_select_db('stt', $conn);
	if ($_POST){
		$explanation = str_replace("'","",$_POST['jExplanation']);
		$otherReason = str_replace("'","",$_POST['otherReason']);
		//make query to add an incident
		$queryinsertincident = "INSERT INTO `incidents`
			(`date`, `owner`, `status`, `laptopserial`, `chargerserial`, `laptoptaken`, `chargertaken`, `newlaptop`, `newlaptopserial`, `newchargerserial`, `explanation`, `receviedby`) VALUES 
			('". $_POST['jDate'] ."','". $_POST['jOwner'] ."','". $_POST['jStatus'] ."','". $_POST['jLaptopNumber'] ."','". $_POST['jChargerNumber'] ."', ". $_POST['jLaptopTaken'] .", ". $_POST['jChargerTaken'] .", ". $_POST['jNewLaptop'] .",'". $_POST['jNewNumber'] . "', '". $_POST['jNewNumberCharger'] ."','". $explanation ."',' ".$personid."')";
	
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
		
 
			//make query to add to devices table
			$makeDevicesQuery = "INSERT INTO `devices`(`owner`, `assignedto_id`, `received`, `problem`, `resolution`, `notes`, `repaired`, `returned`, `last_update`, `receivedby_id`, `serial`, `status_id`) VALUES ('".$_POST['jOwner']."','','".date('Y-m-d H:i:s')."','".$jobMessage."','','".$notes."','','','','".$personid."','".$_POST['jLaptopNumber']."', '1')";
			//commence query and returns false if query failed
			$result = mysql_query($makeDevicesQuery);
			
			//announce whether a job was created and query was successful
			if (!$result){
				echo "Device Failed to be added to devices table<BR><BR>";
				die('Invalid query: ' . mysql_error());
				$deviceID = 0;
			}else{
				echo "Device added to devices table!<br>";
				$deviceID = mysql_insert_id();
			}
			
			
			
			
			//make a query to add a job
			$makeJobQuery = "INSERT INTO `jobs`(`name`, `description`, `skillcatid`, `status`, `repeatable`, `limitone`, `claimedby`, `priority`, `device_id`)
					                	VALUES ('".$jobName."','".$jobMessage."',".$jobSkill.",1,0,0,0,".$jobPriority.",".$requirement_id.",'".$deviceID."')";
			//commence query if it fails it returns false
			$result = mysql_query($makeJobQuery);
			
			//announce whether a job was created and query was successful
 
			
		}// end if laptop taken
		
 
?>
	</div>
</center>
 
<?php
  makeFooter("&#169; Copyright Cherokee Washington Highschool <a href='index.php'> Home Page<a/><a href='' onclick='initIt()'>About us</a> <style>#footer a{color:black; margin-left:3px;}#footer p{color:black; text-decoration:underlined;}</style>",0,"true");
	mysql_close($conn);
?>
 
