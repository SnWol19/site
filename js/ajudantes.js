$(function() {
	$('#enviar').click(function(e){
		e.preventDefault();
		var  usuariovalor = $('#usuario').val();
		var senhavalor = $('#senha').val();
		console.log(usuariovalor);
		console.log(senhavalor);
		$.ajax({url: 'http://127.0.0.1:8080/gtarefamb2/login.php', 
			data: {usuarios: usuariovalor, senhas: senhavalor},
			type: 'POST',
			dataType: 'json',
			beforeSend: function() {
                  // This callback function will trigger before data is sent
                  //$.mobile.showPageLoadingMsg(true); // This will show ajax spinner
            },
            complete: function() {
                  // This callback function will trigger on data sent/received complete
                  //$.mobile.hidePageLoadingMsg(); // This will hide ajax spinner
            }, 
		    success: function(result) {
				//alert("Data: " + data);
				if(result.status){
					console.log('Agendar Pagina');
					$.mobile.changePage("agendar.html", {transition: "slideup", changeHash: false });
					//correto
				} else{
					alert('Login invalido !');
					window.location.href='agendar.html';
				}
			},
			error: function (request,error) {
                  // This callback function will trigger on unsuccessful action                
                  alert('Network error has occurred please try again!');
            }
		});
	}); 
});

