<?php
	include('BenchMark.php');
?>


<?php
	$date=$_GET['date'];
	$benchmark=new BenchMark();
	
	// $benchmark->hourly();

	$downloadSpeedAverage = $benchmark->downloadAverage($date);
	$uploadSpeedAverage = $benchmark->uploadAverage($date);
	$pingSpeedAverage = $benchmark->pingAverage($date);

	$output = array(
		"downloadAverage"=>$downloadSpeedAverage,
		"uploadAverage"=>$uploadSpeedAverage,
		"pingAverage" => $pingSpeedAverage
		);
		
	echo json_encode($output);

?>
