<form class="pure-form search-form" onsubmit="return false;">
	<div class="search-box">
		<div class="bar">
			<input id="search-input" type="text" autocomplete="off" placeholder="Busque um visitante pelo nome, rg ou cpf">
		</div>
		<div class="bar">
			<button id="search-button" class="pure-button pure-button-primary">Buscar</button>
		</div>
	</div>
</form>
<table id="tabela-visitantes" class="pure-table pure-table-striped compact-table">
	<thead>
		<tr>
			<th>Nome</th>
			<th>CPF</th>
			<th>RG</th>
			<th>Observação</th>
			<th>Ações</th>
		</tr>
	</thead>

	<tbody id="tabela-visitantes-body">
	</tbody>
</table>
<script type="text/javascript">
	function visitsVisitante(id){
		$("#visita_visitante_id").val(id);
		populateVisitas();
		$("#visita_data").val(getCurrentDate());
		$("#visita_hora").val(getCurrentTime());
		window.location.hash="modal-cad-visitas";
	}

	function editVisitante(id){
		alert("Editando visitante "+id);
	}

	function removeVisitante(id){
		$.ajax({
			type: "post",
			url: "ws/index.php/remove_visitante",
			data: "id_txt="+id
		}).done(function(data){
			alert(data);
			$("#linha-"+id).remove();
		}).fail(function(error){
			alert("Erro ao encontrar servidor-"+error);
		});
	}
	
	function populateTable(comp){
		var key="";
		if(comp){
			key=$(comp).val();
		}

		$.ajax({
			type: "post",
			url: "ws/index.php/get_visitantes_by_key",
			data: "key_txt="+key
		}).done(function(data){
			try{
				resultArray=JSON.parse(data);
			}catch(err){
				alert("Erro: "+err.message);
				return null;
			}
			var tableContent=$("#tabela-visitantes-body");
			tableContent.html(null);
			$.each(resultArray,function(){
				var trObj=$("<tr />").attr("id","linha-"+this.id);
				trObj.append($("<td />").text(this.nome));
				trObj.append($("<td />").text(this.rg));
				trObj.append($("<td />").text(this.cpf));
				trObj.append($("<td />").text(this.obs));
           		trObj.append($("<td />")
                   		.append($("<button />").addClass("pure-button button-visit")
                           		.attr("onclick","visitsVisitante("+this.id+")")
                           		.attr("title","Visitas")
                           		)
                   		.append($("<button />").addClass("pure-button button-edit")
                   				.attr("onclick","editVisitante("+this.id+")")
                   				.attr("title","Editar visitante")
                           		)
                   		.append($("<button />")
                           		.addClass("pure-button button-remove")
                           		.attr("onclick","removeVisitante("+this.id+")")
                           		.attr("title","Remover visitante")
                           		));
				tableContent.append(trObj);
			});				
		}).fail(function(jqXHR, textStatus){
			alert("Erro: Não foi possível popular a tabela- Servidor não encontrado");
		});
	}
	$("#search-button").click(function(){
		populateTable($("#search-input"));
	});
	$("#search-input").keyup(function(object){
		populateTable(this);
	});
    populateTable();
</script>