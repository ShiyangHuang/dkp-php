<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="theme.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
	    <div class="jumbotron">
        <h1> Roads To Rome DKP Viewer </h1>
      </div>

</head>
<body>
<div style="width:500px; float:left;">
<div class="col-md-6">
          <table class="table">
            <thead>
              <tr>
                <th>Current DKP</th>
                <th>Name</th>
                <th>Current DKP</th>
              </tr>
            </thead>
            <tbody>
<?php
	
include('conn.php');
	$sql = "SELECT * FROM `dkp`;";
	$result = $con -> query($sql);
	$j=1;
	while($row = $result -> fetch_row())
	{
		echo '<tr><td>';
        echo $j++.'</td><td>'.$row[1]."</td><td>".$row[2];
		echo '</td></tr>';
	}
?>
			</tbody>
          </table>
        </div>
	</div>
<div style="width:700px; float:left;">
<table class="table">
            <thead>
              <tr>
                <th>DKP Useage</th>
                <th>Name</th>
                <th>Use DKP</th>
                <th>Item</th>
                <th>Time</th>
              </tr>
            </thead>
            <tbody>
<?php
	$sql4 = "SELECT * FROM `changedkp`;";
	$result = $con -> query($sql4);
	$i = 1;
	while($row = $result -> fetch_row())
	{
		$currentTime =strtotime ( date('Y-m-d H:i:s',time()));
		$lineTime = strtotime( $row[5] );
		if($currentTime-$lineTime<3600*24*7) {
		echo '<tr><td>'.$i++.'</td><td>';
	    echo $row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td><td>'.$row[5];
		echo '</td></tr>';
		}
	}
?>
			</tbody>
          </table>
        </div>
	</div>
</body>