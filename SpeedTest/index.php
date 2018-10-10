
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.min.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

		<title>
			Report for Speed
		</title>
	</head>

<body>

	<div class="col-sm-4"></div>

	<div class="col-sm-4" style="margin-top: 30px;">
	
		<div class="panel panel-primary" style="height:400px;border-color: gray;">
			<div class="panel-heading" class="col-sm-4">
				<h3 class="panel-title" style="text-align: center;">
					Report for Speed
				</h3>
			</div>
	
		<div class="panel-body">
			<div >
		 		<div class="form-group">
		            <input type='date' id="date" class="form-control" />
				</div>

				<input type="button" class="btn btn-primary" value = "Get Report" name="speedtest" id="speedtest">
				
				<div style="line-height: 12px;display: none;" id="speedArea" >
					<h4>
							DownloadSpeed 
							<span style="margin-right: 4px;">:</span>
							<span id= "downloadAverage"></span> KBPS
					</h4>
	
					<h4>
							UploadSpeed   <span style="margin-left: 23px;">: </span>
							<span id= "uploadAverage"></span> KBPS
					</h4>
					
					<h4>
							PingSpeed    <span style="margin-left: 45px;"> : </span>
							<span id= "pingAverage"></span> KBPS
					</h4>
				</div>
	
					<div id= "notfoundArea" style="display: none;">
						Sorry, we don't have the data on this date.
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
	
	<div class="col-sm-4"></div>

<script src="js/speedtest.js"></script>
</body>
</html>
