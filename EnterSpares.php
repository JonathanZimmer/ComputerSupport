<?php
  require_once "functions.php";
	require_once "config.php";
promptLogin(1);
    $g_link = mysql_connect('localhost', $g_username, $g_password); 
		mysql_select_db('stt', $g_link);//TODO use a persistant database connections
?>

<center>
	<div class="centeringDiv">
	<h2>
		Enter New Spare
	</h2>
  <form method="post" name="postIt">
    <table>
 
			
			<!-- student name input field -->
			<tr><td>Etch Number</td><td><textarea type="text" name="Etch" placeholder="Etch Number"></textarea></td></tr>
			
			<!-- student username input field -->
			<tr><td>Laptop Model</td><td><textarea type="text" name="LaptopBrand" placeholder="Laptop Model"></textarea></td></tr>

      
      <tr><td colspan="2" style="text-align:center;"><input type="submit"></td></tr>
    </table>
  </form>
		<?php
	 if ($_POST){
		 
		 $LaptopID=$_POST['Etch'];
		 
		 $LaptopBrand=$_POST['LaptopBrand'];
		 $Student="";

		 $EnterSpare = "INSERT INTO `Spares`(`Student`, `LaptopID`, `LaptopBrand`) VALUES (
			'".$Student."',
			'".$LaptopID."',
			'".$LaptopBrand."')";
		 //commence query
	
		 
		 
		 
		 
		 $rsp = mysql_query($EnterSpare);
		 
		 if($rsp) echo"Spare Entered :)";
		 else {
			echo "ERROR<br>";
    			die('Invalid query: ' . mysql_error());
		}
			echo "<br>";
		 mysql_close($g_link);
		 
		 //clear old variables
		 $_POST['Etch'] = "";
		 $_POST['LaptopBrand'] = "";
              
 }
		?>
	</div>
</center>
