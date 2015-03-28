//jquery
$(function() {	

  $("#newForm").submit(function(e) {  
   	e.preventDefault();
	$.ajax({	//ajax
		url:"create_message.php", 
		type: "POST",
		data: $("#newForm").serialize(), //is saved into a string

		success: function(msg) {	//"msg" is all the string ajax return
		msg = $.parseJSON(msg);		//change msg from string to object
		$("#messages").append(
			"<div><h3>Name:"+msg.Name+"</h3>"+
			  	  "<h3>Time:"+msg.Time+"</h3>"+
				  "<h5>Content:"+msg.Content+"</h5>"+
			"</div><hr>");
     		 }
	});
     });	
});