var test;
$(function() {	//jquery

  $("#newForm").submit(function(e) {  //once id:submit clicked, do ~~      //#: put html id name behind
   	e.preventDefault();
	$.ajax({	//ajax
		url:"creat_message.php", 
		type: "POST",
		data: $("#newForm").serialize(),   //inside {} is jquery.  val:   //name: is the thing that will be saved in POST
		//how to print time?

		//is it writen like this?
		success: function(msg) {	//"msg" is all the string ajax return
		console.log(msg); 	//js, save data
		msg = $.parseJSON(msg);
		test = msg;
		console.log(msg); 	//js, save data
		console.log(msg.Time);
     		 }
	});
     });	
});