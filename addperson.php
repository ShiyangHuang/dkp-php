<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

include('conn.php');
//perform SQL query
if(isset($_POST["name"])) {
	if(isset($_POST["dkp"]))
        $input_dkp = $_POST["dkp"];
	else
		$input_dkp = 0;
	$input_name = $_POST["name"];
	$sql = "INSERT INTO `db562916345`.`dkp` (`name`, `dkp`) VALUES ('".$input_name."', '".$input_dkp."');";
	$con -> query($sql);
	echo "Success!";
}
else {
    echo "ERROR\n";
}
?>

<meta http-equiv="refresh" content=1;url=index.html"> 
</head>
</html>