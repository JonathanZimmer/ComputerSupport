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
 			<tr><td>Student</td><td><input type="text" name="jStudent" placeholder="Student"></td></tr>
			<!-- Laptop serial input field -->
 			<tr><td>Serial/Etch Number of Laptop</td><td><textarea name="jLaptopID" placeholder="Laptop Serial/Etch Number"></textarea></td></tr>
			
			<!-- Laptop Brand input field -->
			<tr><td>Laptop Brand</td>
        <td>
          <select name="jLaptopBrand" placeholder="Laptop Brand">
            <!-- replace options with a query later -->
            <option value="1">Lenovo</option>
            <option value="2">Dell</option>
            <option value="3">Samsung</option>
          </select>
        </td>
      </tr>
      
 			<tr><td>Graduation Year of Student</td><td><textarea name="jGradYear" placeholder="Graduation Year"></textarea></td></tr>

      
      <tr><td colspan="2" style="text-align:center;"><input type="submit"></td></tr>
    
		</table>
  </form>

<?php

	if ($_POST){
    
	}
		
?>
	</div>
</center>

<?php
	mysql_close($conn);
?>