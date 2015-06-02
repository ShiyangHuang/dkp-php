	
	
<?php
	
include('conn.php');
	$sql = "SELECT * FROM `dkp`;";
	$result = $con -> query($sql);
	$ppl = array();
	$i = 1;
	?>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"><br>
	<select name="people">
	<?php
	while($row = $result -> fetch_row())
	{
	$ppl[$i] = $row[0];
	$pplname[$i] = $row[1];
	$rdkp[$i] = $row[2];
	$i++;
	echo '<option value="'.$row[0].'">'.$row[1].'</option>';
	}
	echo '</select>';
	echo '<input type="text" name="comment" placeholder="comment" />';
	echo '<input type="text" name="dkp" placeholder="min dkp" />';
	echo '<input type="submit" value="Submit"/>';
	echo "</form>";
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$pname = $_POST["people"];
		$dkp = $_POST["dkp"];
		$comment = $_POST["comment"];
			//echo $ppl[$i];
			$con2 = new mysqli($host_name, $user_name, $password, $database);
			$con3 = new mysqli($host_name, $user_name, $password, $database);
			$newdkp = $rdkp[$pname]-$dkp;
			$sql2 = 'UPDATE `db562916345`.`dkp` SET `dkp` = '.$newdkp.' WHERE `dkp`.`num` = '.$pname.';';
			$sql3 = "INSERT INTO `db562916345`.`changedkp` (`num`, `index`, `name`, `change`, `note`) VALUES (NULL, '".$pname."', '".$pplname[$pname]."', '".$dkp."', '".$comment."');";
			//echo $sql2;
			$con2 -> query($sql2);
			$con3 -> query($sql3);
		echo '<meta http-equiv="refresh" content=1;url=getarm.php"> ';
	}
?>


<?php
	$sql4 = "SELECT * FROM `changedkp`;";
	$result = $con -> query($sql4);
	while($row = $result -> fetch_row())
	{
	    echo $row[2].' use '.$row[3].' dkp by '.$row[4].' at: '.$row[5].'<br>';
	}
?>