$(function() {	//jquery

  $("#submit").on("click", function() {  //once id:submit clicked, do ~~      //#: put html id name behind
   
	$.ajax({	//ajax
		url:"../message_board.php", 
		type: "POST",
		data: {time: $("").val() , content: $("#content").val()},   //inside {} is jquery.  val:   //name: is the thing that will be saved in POST
		//how to print time?

		//is it writen like this?
		success: function(msg) {	//"msg" is all the string ajax return
		console.log(msg); 	//js, save data
		$(".message").append("
			<h3>Name:<?= $m->name ?></h3>
			<h3>Time:<?= $m->time ?></h3>
			<h5>Content:<?= $m->content ?></h5>
			<hr>");  //append: add in the back
     		 }
	});
     });	
});