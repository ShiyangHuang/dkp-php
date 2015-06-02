<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<body>
	<?php
include('conn.php');
	$sql = "SELECT * FROM `dkp`;";
	$result = $con -> query($sql);
	$ppl = array();
	$i = 0;
	?>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"><br>
	<?php
	while($row = $result -> fetch_row())
	{
	$ppl[$i] = $row[0];
	$rdkp[$i] = $row[2];
	$i++;
	echo '<input type="checkbox" name="'.$row[0].'" />'.$row[0].' - '.$row[1].'	current dkp:  '.$row[2].'<br>';
	}
	echo '<input type="text" name="dkp" placeholder="get dkp" />';
	echo '<input type="submit" value="Submit"/>';
	echo "</form>";
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$dkp = $_POST["dkp"];
		while($i>=0)
		{
			$i--;
			if(!empty($_POST[$ppl[$i]]))
			{
			//echo $ppl[$i];
			$con2 = new mysqli($host_name, $user_name, $password, $database);
			$newdkp = $rdkp[$i]+$dkp;
			$sql2 = 'UPDATE `db562916345`.`dkp` SET `dkp` = '.$newdkp.' WHERE `dkp`.`num` = '.$ppl[$i].';';
			//echo $sql2;
			$con2 -> query($sql2);
			}
		}
		
		echo '<meta http-equiv="refresh" content=1;url=manage.php"> ';
	}
	
	
?>

	<form role="form" action="addperson.php" method="POST">
		<p>添加新成员</p>
        <input type="text" name="name" class="form-control" placeholder="Name" required autofocus>
		<input type="text" name="dkp" class="form-control" placeholder="Default Dkp" required autofocus>
        <input class="btn btn-lg btn-primary btn-block" type="submit" value="Submit"/>
	</form>
	
	
	<p>DKP使用记录</p>
<?php

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
	echo '<input type="text" name="comment" placeholder="拿啥了" />';
	echo '<input type="text" name="dkp" placeholder="use dkp" />';
	echo '<input type="submit" value="Submit"/>';
	echo "</form>";
	if ($_SERVER["REQUEST_METHOD"] == "POST"&&$_POST["comment"]){
		$pname = $_POST["people"];
		$dkp = $_POST["dkp"];
		$comment = $_POST["comment"];
			//echo $ppl[$i];
			$con2 = new mysqli($host_name, $user_name, $password, $database);
			$con3 = new mysqli($host_name, $user_name, $password, $database);
		    $con2 -> query("SET NAMES UTF8");
		    $con2 -> query("set character_set_client=utf8");
		    $con2 -> query("set character_set_results=utf8");
		    $con3 -> query("SET NAMES UTF8");
		    $con3 -> query("set character_set_client=utf8");
		    $con3 -> query("set character_set_results=utf8");
			$newdkp = $rdkp[$pname]-$dkp;
			$sql2 = 'UPDATE `db562916345`.`dkp` SET `dkp` = '.$newdkp.' WHERE `dkp`.`num` = '.$pname.';';
			$sql3 = "INSERT INTO `db562916345`.`changedkp` (`num`, `index`, `name`, `change`, `note`) VALUES (NULL, '".$pname."', '".$pplname[$pname]."', '".$dkp."', '".$comment."');";
			//echo $sql2;
			$con2 -> query($sql2);
			$con3 -> query($sql3);
		echo '<meta http-equiv="refresh" content=1;url=manage.php"> ';
	}
?>

	<p>List of How PPL Used DKP</p>
<?php
	$sql4 = "SELECT * FROM `changedkp`;";
	$result = $con -> query($sql4);
	while($row = $result -> fetch_row())
	{
	    echo $row[2].' use '.$row[3].' dkp by '.$row[4].' at: '.$row[5].'<br>';
	}
?>
</body>
</html>