
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

			<!-- ID Number input field -->
      <tr><td>Etch Number/Serial Number</td><td><input type="search" name="jID" placeholder="Etch Number/Serial Number" ></td></tr>
	      <tr><td colspan="2" style="text-align:center;"><input type="submit"></td></tr>
	</div>
		</table>
		</form>
		
		<?php

	if ($_POST){
		$ID = str_replace("'","",$_POST['jID']);
		//make query to add an incident
		$MainQuery = "SELECT `StudentOwner`, `LaptopID`, `Brand`, `TakeHome`, `GradYear` FROM inventory WHERE `StudentOwner=$ID";


	
		//commence query to add an incident
		$MainResult = mysql_query($MainQuery);


echo var_dump($ID);

while($row = mysql_fetch_array($MainResult)){   //Creates a loop to loop through results
echo "<tr><td> 
Student: " . $row['StudentOwner'] . "<br>
Etch Number: ". $row['LaptopID'] . "<br>";
echo "Brand: ";
		if($row['Brand'] ==1){
				echo "Lenovo<br>";
				}
		else if($row['Brand']==2){
				echo "Dell<br>";
				}
		else{
			echo "Samsung";
				}
		
	echo "Take Home: ";
	if($row['TakeHome'] ==1){
				echo "Yes<br>";
				}
		else{
				echo "No<br>";
				}
			echo "Graduation Year:  ". $row['GradYear'] . "</td></tr>" ;  //$row['index'] the index here is a field name

}
	}
	
?>
	</center>
