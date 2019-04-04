<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Consultar CEP via AJAX com jQuery</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
</head>
<body>
	<div class="container">
		<div class="page-header">
			<h1 class="text-center">Consultar CEP via Ajax com jQuery</h1>
		</div>
		<form class="form-horizontal">
			  <div class="form-group">
				<label for="cep">CEP</label>
				<input type="text" class="form-control" name="cep" placeholder="CEP" />
			  </div>
			  <div class="form-group">
				<label for="rua">Rua</label>
				<input type="text" class="form-control" name="rua" placeholder="Rua" />
			  </div>
			  
			  <div class="form-group">
				<label for="rua">Bairro</label>
				<input type="text" class="form-control" name="bairro" placeholder="Bairro" />
			  </div>
			  
			   <div class="form-group">
				<label for="cidade">Cidade</label>
				<input type="text" class="form-control" name="cidade" placeholder="Cidade" />
			  </div>
			  
			  <div class="form-group">
				<label for="uf">Estado (UF)</label>
				<input type="text" class="form-control" name="uf" placeholder="Estado" />
			  </div>		  
		</form>
	</div>	
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script type="text/javascript" src="js/cep.js"></script>	
</body>
</html>
<script>
	$(document).ready(function(){
	$("input[name=cep]").blur(function(){
		var cep = $(this).val().replace(/[^0-9]/, '');
		if(cep){
			var url = 'https://viacep.com.br/ws/'+cep+'/json/';
			$.ajax({
                    url: url,
                    dataType: 'json',
                    crossDomain: true,
                    contentType: "application/json",
					success : function(json){
						if(json.logradouro){
							$("input[name=rua]").val(json.logradouro);
							$("input[name=bairro]").val(json.bairro);
							$("input[name=cidade]").val(json.localidade);
							$("input[name=uf]").val(json.uf);
						}
					}
			});
		}					
	});	
});


</script>
