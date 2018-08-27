<?php
  require_once "functions.php";
	require_once "config.php";
promptLogin(1);
    $g_link = mysql_connect('localhost', $g_username, $g_password); 
		mysql_select_db('stt', $g_link);//TODO use a persistant database connections
		$query = "SELECT id FROM `students`";
		$result = mysql_query($query);
		$row = mysql_fetch_assoc($result);
		mysql_select_db('stt', $g_link);
?>

<center>
	<div class="centeringDiv">
	<h2>
		Create a Student
	</h2>
  <form method="post" name="postIt">
    <table>
 
			
			<!-- student name input field -->
			<tr><td>Student Name</td><td><textarea type="text" name="Name" placeholder="Student Name"></textarea></td></tr>
			
			<!-- student username input field -->
			<tr><td>Student Username</td><td><textarea type="text" name="Username" placeholder="Student Username"></textarea></td></tr>
			
			<!-- student password input fields-->
			<tr><td>Student Password</td><td><textarea type="password" name="Password" placeholder="Student Password"></textarea></td></tr>
			<tr><td>Please retype password</td><td><textarea type="password" name="Password2" placeholder="Retype Password"></textarea></td></tr>
			
			<!-- Graduation Year input field -->
      
      <tr><td colspan="2" style="text-align:center;"><input type="submit"></td></tr>
    </table>
  </form>
		<?php
	 if ($_POST){
		 $id=$row['id']+"1";
		 
		 $username=$_POST['Username'];
		 
//		 $password=$_POST['Password'];
//		 $password2=$_POST['Password2'];
		 $name=mysql_real_escape_string($_POST['Name']);
		 		 
		 $active="1";
		 
		 $admin="0";
		 //checking password
				if($password !== $password2) {
					
					echo "<script>alert('The passwords do not match! Please Re-enter your passwords and try again!');</script>";
					die;
				}-
		 //time to encript
		$cost = 10;
	
		$salt = sprintf("$2a$%02d$", $cost). $salt;
		$hash = crypt($password, $salt);
		 //make query
		 $CreateStudent = "INSERT INTO `students`(`username`, `password`, `name`, `active`, `admin`) VALUES (
			'".$username."',
			'".$hash."',
			'".$name."', 
			'".$active."', 
			'".$admin."')";
		 //commence query
	
		 
		 
		 
		 
		 $rsp = mysql_query($CreateStudent);
		 
		 if($rsp) echo"Student Created :)";
		 else {
			echo "ERROR";
    			die('Invalid query: ' . mysql_error());
		}
			echo "<br>";
		 echo $hash;
		 mysql_close($g_link);
		 
		 //clear old variables
		 $_POST['Username'] = "";
		 $_POST['Password'] = "";
		 $_POST['Name'] = "";
		 $_POST['GraduationYear'] = "";
	 }
	else if($_POST) {
		echo "ERROR: Student not created";
	}
		
		?>
	</div>
</center>
