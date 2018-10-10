<?php
	include('SpeedTest.php');
?>

<?php

class BenchMark{
	
	public function hourly() {	

		$uploadSpeed= array();
		$downloadSpeed = array();
		$pingSpeed = array();

		$speedtest = new SpeedTest();
		
			$jsonData = file_get_contents('../jsondata.json'); 
			$data = json_decode($jsonData, true);
			// fclose($jsonData);

			$date = date("Y-m-d");	
			$isexit = false;

			for ($i=0; $i < sizeof($data); $i++) { 

				if($data[$i]['date'] == $date){

					array_push($data[$i]['downloadSpeed'], $speedtest->downloadSpeed()) ;
					array_push($data[$i]['uploadSpeed'], $speedtest->uploadSpeed()) ;
					array_push($data[$i]['pingSpeed'], $speedtest->pingSpeed()) ;

					$formattedData = json_encode($data);

					$handle = fopen('../jsondata.json','w+');

					fwrite($handle,$formattedData);
					fclose($handle);

					$isexit = true;

				}
			}

			if($isexit == false){

				array_push($downloadSpeed, $speedtest->downloadSpeed()) ;
				array_push($uploadSpeed, $speedtest->uploadSpeed()) ;
				array_push($pingSpeed, $speedtest->pingSpeed()) ;
				$date = date("Y-m-d");			

				$record = array(
					'uploadSpeed' => $uploadSpeed,
					'downloadSpeed' => $downloadSpeed,
					'pingSpeed' => $pingSpeed,
					'date' => $date
				);

				$WholeData = array();
				if(isset($data)){
					array_push($data, $record);
					$WholeData = $data;
				}
				else{
					array_push($WholeData, $record)	;
				}		

				$formattedData = json_encode($WholeData);

				$handle = fopen('../jsondata.json','w+');

				fwrite($handle,$formattedData);
				fclose($handle);
		
			}
	}

	


	function downloadAverage($date){

		$jsonData = file_get_contents('../jsondata.json'); 
		$data = json_decode($jsonData, true);

		$sum = 0;
		$len = 0;

		for ($i=0; $i < sizeof($data); $i++) { 
			$obj = $data[$i];
			if($obj["date"] == $date){
				for ($i=0; $i < sizeof($obj['downloadSpeed']); $i++) { 
					$sum += $obj['downloadSpeed'][$i];
					$len = $i;
				}
			}		
		}
		if ($len == 0) {
			return "Not Found!";
		}
		return $sum / $len;

	}

	 function uploadAverage($date){
		$jsonData = file_get_contents('../jsondata.json'); 
		$data = json_decode($jsonData, true);

		$sum = 0;
		$len = 0;

		for ($i=0; $i < sizeof($data); $i++) { 
			$obj = $data[$i];
			if($obj["date"] == $date){
				for ($i=0; $i < sizeof($obj['uploadSpeed']); $i++) { 
					$sum += $obj['uploadSpeed'][$i];
					$len = $i;
				}
			}	
		}
		if ($len == 0) {
			return "Not Found!";
		}
		return $sum / $len;
	 }

	 function pingAverage($date){
		$jsonData = file_get_contents('../jsondata.json'); 
		$data = json_decode($jsonData, true);

		$sum = 0;
		$len = 0;

		for ($i=0; $i < sizeof($data); $i++) { 
			$obj = $data[$i];
			if($obj["date"] == $date){
				for ($i=0; $i < sizeof($obj['pingSpeed']); $i++) { 
					$sum += $obj['pingSpeed'][$i];
					$len = $i;
				}
			}	
		}
		if ($len == 0) {
			return "Not Found!";
		}
		return $sum / $len;
	 }
	}

?>
 		