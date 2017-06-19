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
      <tr><td>Laptop Etch Number/Serial Number</td><td><input type="text" name="jLaptopID" placeholder="Etch Number/Serial Number" ></td></tr>
			
<?php
if(!isset($_GET['kiosk'])){
	echo "<tr><td>Brand</td><td><select name='Brand'>";
	echo "<option value='14'>-----</option>";
	$query = "SELECT name, id FROM LaptopBrand";
	$resul = mysql_query($query);
	while ($ro = mysql_fetch_assoc($resul)) {
		echo "<option value='".$ro['id']."'>".$ro['name']."</option>";
	}	
}
echo "</option>";
?>
		<tr><td>Student Name</td><td><input type="text" name="jStudent" placeholder="Student" ></td></tr>
			
		<tr><td>Charger Etch Number/Serial Number</td><td><input type="text" name="jChargerID" placeholder="Etch Number/Serial Number" ></td></tr>

<?php
if(!isset($_GET['kiosk'])){
	echo "<tr><td>Take Home?</td><td><select name='TakeHome'>";
	echo "<option value='14'>-----</option>";
	$query2 = "SELECT answer, id FROM TakeHome";
	$resul2 = mysql_query($query2);
	while ($ro2 = mysql_fetch_assoc($resul2)) {
		echo "<option value='".$ro2['id']."'>".$ro2['answer']."</option>";
	}	
}
echo "</option>";
?>
		</table>
		</form>