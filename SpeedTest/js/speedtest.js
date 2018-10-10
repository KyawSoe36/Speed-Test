$(document).ready( function() { 

	processSpeed();

    var date = new Date();
	var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = year + "-" + month + "-" + day;       
    $("#date").attr("value", today);

 });


$("#speedtest").click(function(e) {

	var date = $("#date").val();
	console.log("ddate",date);
		  
	$.get("Controller/test.php?date=" + date, function(data, status) {
		
		console.log(JSON.parse(data));
		 var averageSpeed=JSON.parse(data);
		
		 if(averageSpeed.downloadAverage != "Not Found!"){
 			
 			$("#speedArea").css("display","block");
 			$("#notfoundArea").css("display","none");

 			$("#downloadAverage").text(parseFloat(averageSpeed.downloadAverage).toFixed(2));
			$("#uploadAverage").text(parseFloat(averageSpeed.uploadAverage).toFixed(2));
			$("#pingAverage").text(parseFloat(averageSpeed.pingAverage).toFixed(2));
		 }
		 else if(averageSpeed.downloadAverage == "Not Found!"){
		 	$("#speedArea").css("display","none");
		 	$("#notfoundArea").css("display","block");
		 }
						 
 	 });

});

 function processSpeed () {

 	 setInterval(function(){

 	 	console.log("calling hourly mehtod");
 	 	$.ajax({
            url:"Controller/Service.php", //the page containing php script
            type: "GET", //request type,
           
            success:function(result){
            	console.log("result from server",result);
            },
            error:function(result){
            	console.log(result	);
            }
           
         }); 
 	 }, 1000 * 60 );

}