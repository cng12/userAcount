<?php
include 'database.php'; 
include 'school.php';
?>
<html>
<head>

</head>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="width:600px; background-color:#ccffdd; text-align:left;">
<p style="color:blue; text-align:center; font-size:20px;">You can update, delete and display user data by selecting one of the buttons at bottom of the form<br><br></p>
Firstname: <input type="text" name="firstname" ><br><br>
Lastname:  <input type="text" name="lastname" ><br><br>
School:    <select name="school" id="school" >
	<?php
	$obj->displayschools();
	?>
	</select><br><br>
Email:   <input type="text" name="email" ><br><br>

	<table style="background-color:white;"><tr style="text-align:center;">
	<td style="width:200px;"><a href="submit.php"><input type="button" name="home" value="Home" style="border-radius:50px; background-color: #4CAF50; width:120px;"></a></td>
	<td width="200px"><input type="submit" name="update" value="Update" onclick="return confirm('Are you sure!');"></td>
	<td width="200px"><input type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure!');" style="background-color: #f44336; "></td>
	<td width="200px"><input type="submit" name="display" value="Display"></td>
	</tr></table>
	</form>
<?php
	
if(isset($_POST['update']))
{
	mysqli_query($conn, "UPDATE `myguests` SET `firstname`='$_POST[firstname]',`lastname`='$_POST[lastname]',`school`='$_POST[school]',`email`='$_POST[email]' WHERE `firstname`='$_POST[firstname]'");
}
if(isset($_POST['delete']))
{
	mysqli_query($conn, "DELETE FROM `myguests` WHERE `firstname`='$_POST[firstname]'");
}
if(isset($_POST['display']))
{
	$res=mysqli_query($conn, "SELECT * FROM myguests");
	echo "<table border=1>";
				echo "<tr>";
                echo "<th>"; echo "First Name"; echo "</th>";
                echo "<th>"; echo "Last Name"; echo "</th>";
                echo "<th>"; echo "School"; echo "</th>";
				 echo "<th>"; echo "Email"; echo "</th>";
                echo "</tr>";
	 while($row = mysqli_fetch_array($res))
	 {
               echo "<tr>";
               echo "<td>"; echo $row["firstname"]; echo"</td>";
			   echo "<td>"; echo $row["lastname"]; echo"</td>";
			   echo "<td>"; echo $row["school"]; echo"</td>";
			   echo "<td>"; echo $row["email"]; echo"</td>";
               echo "</tr>";
	 }
               echo "<?php endwhile;?>";
      echo "</table>";

}
?>
  </body>
</html>  
