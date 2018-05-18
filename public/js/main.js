$(document).ready(function(){
	$("#run").click(function(){
	$("#result").css("display", "none");
     $.ajax({
         url: '/main/run',
         type: 'GET',
		 beforeSend: function(){
			$("#spinner").fadeIn(200);
		 },
         success: function(res){
			$("#spinner").css('display', 'none');

			var result = '';
			if(res.success){
                result += '<strong>Success: </strong>' + res.success + '<br>';
			}
				
			if(res.error){
				result += '<strong>Error: </strong>' + res.error + '<br>';
			}

             if(res.time){
                 result += '<strong>Time: </strong>' + res.time + '<br>';
             }
             $(".alert-success").html(result);
			//console.log(res);
            $("#result").fadeIn(200);
         },
         error: function(){
			$("#spinner").css('display', 'none');
            alert('Сервер временно недоступен!');
         }
     });
	});
});
