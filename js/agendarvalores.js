$(document).ready(function(){
    $("#cadastrar").click(function(e){
    	e.preventDefault();
    	var tarefavalor = $("#tarefa").val();
    	var descricaovalor = $("#descricao").val();
    	console.log(tarefavalor);
    	console.log(descricaovalor);
    	$.ajax({url: 'http://127.0.0.1:8080/gtarefamb2/cadastrar.php', 
    		data: {tarefas: tarefavalor, descricoes: descricaovalor},
    		type: 'POST',
    		dataType: 'json',
    		success: function(result){
    			//
    			if(result.status){
    				alert('Dados Cadastrados com sucesso !');
    				window.location.href='agendar.html';
    			} else{
    				alert('Os dados não foram cadastrados !');
    				window.location.href='agendar.html';
    			}
    		}
    		//
    	});
    });
    
    $("#tarefas").click(function(e){
    	e.preventDefault();
    	var valora = "a";
    	var valorb = "b";
    	console.log(valora);
    	console.log(valorb);
        $.ajax({url: 'http://127.0.0.1:8080/gtarefamb2/xml/gerar.php', 
            //data: {valoraa: valora, valorbb: valorbb},
            type: 'POST',
            dataType: 'json',
            success: function(result){
                console.log(result.status);
                if(result.status){
                    alert('xml gerado com sucesso!');
                    window.location.href='tabela.html';
                } else{
                    alert('Os dados não foram cadastrados !');
                    //window.location.href='agendar.html';
                }
            }
            //
        });
    });
});