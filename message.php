<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

	

include('conn.php');
//perform SQL query
if(isset($_POST["content"])) {
    $input_content = $_POST["content"];
	$input_name = $_POST["name"];
	$sql = "INSERT INTO `db562916345`.`messages` (`name`, `msg`) VALUES ('".$input_name."', '".$input_content."');";
	$con -> query($sql);
	echo "Success!";
}
else {
    echo "ERROR\n";
}
?>

<meta http-equiv="refresh" content=1;url=index.php"> 
</head>
</html>