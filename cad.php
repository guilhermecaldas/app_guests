<div class="margin-container">
	<form id="visita-form" class="pure-form pure-form-aligned">
		<fieldset class="pure-u-1">
			<legend>Cadastro de visitante</legend>
			<div class="pure-control-group">
				<label for="name">Nome</label> 
				<input id="name" class="pure-input-1-3" name="nome_txt" type="text" required>
			</div>

			<div class="pure-control-group">
				<label for="rg">RG</label> 
				<input id="rg" class="pure-input-1-3" name="rg_txt" type="text" required>
			</div>

			<div class="pure-control-group">
				<label for="email">CPF</label> 
				<input id="cpf" class="pure-input-1-3" name="cpf_txt" type="text">
			</div>

			<div class="pure-control-group">
				<label for="observacao">Observação</label>
				<textarea id="observacao" class="pure-input-1-3" name="obs_txt">Obs</textarea>
			</div>
			<div class="pure-control-group">
				<button id="btn-submit" type="submit" class="pure-button pure-button-primary" name="btn-cad">Cadastrar</button>
				<button id="btn-cancel" class="pure-button button-cancel" name="btn-cancel">Cancelar</button>
			</div>
		</fieldset>
	</form>

	<script>
	function submit(){
		$.ajax({
			type: "POST",
			url: "http://localhost/app_atendimento/webservice.php",
			data: obj_form
		}).done(function(data){
			alert(data);
		});
	}
	
	$("#btn-submit").click(function(){submit();});
    </script>
</div>
