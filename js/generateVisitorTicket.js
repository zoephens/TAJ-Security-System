$(document).ready(function() {
	$("#search-visitor").click(function() { //Searching if a visitor Exists and sending a confirmation message
		console.log(":D")
		if ($("#search-query").val()) {
			var search_id = $("#search-query").val();
			$.post("http://localhost/TAJSystem1.0/includes/generateVisitorTicket.php", {btn1 : `Hello`, search_id : `${search_id}`})
				.done(function(data) {
					alert(data);
			});
		}
	});
	
	$("#new-visitor").click(function() {
		var fname = $("#fname").val();
		var lname = $("#lname").val();
		var id = $("#ID_num").val();
		var floorNum = $("#floorNumber").val();
		if (fname && lname && id && floorNum) {
			$("#fname").val('');
			$("#lname").val('');
			$("#ID_num").val('');
			$("#floorNumber").val('');
			$.post("http://localhost/TAJSystem1.0/includes/generateVisitorTicket.php", {btn2 : `Hello`, fname : `${fname}`, lname : `${lname}`, id : `${id}`, floorNum : `${floorNum}`,})
				.done(function(data) {
					$("body").html(data);
			});
		}
	});
	
	$("#existing-visitor").click(function() {
		var id = $("#exist_ID").val();
		var floorNum = $("#exist_floorNum").val();
		if (fname && lname && id && floorNum) {
			$("#exist_ID").val('');
			$("#exist_floorNum").val('');
			$.post("http://localhost/TAJSystem1.0/includes/generateVisitorTicket.php", {btn3 : `Hello`, id : `${id}`, floorNum : `${floorNum}`,})
				.done(function(data) {
					$("body").html(data);
			});
		}
	});
});