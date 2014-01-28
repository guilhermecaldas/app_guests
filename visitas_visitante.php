<div class="semantic-content" id="modal-cad-visitas" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
    <div class="modal-inner">
        <header>
            <h2 id="modal-label">Visitas</h2>
        </header>

        <div class="modal-content">
            <ul id="lista-visitas">
            </ul>
        </div>

        <footer>
            
            	<form id="visita-form" onsubmit="return false;" class="pure-form">
            		<fieldset>
	            		<input id="visita_visitante_id" type="hidden" name="visitante_txt">
	            		<div class="pure-control-group pure-u-1-3">
	            			<label for="visita_data">Data:</label>
            				<input id="visita_data" type="text" name="data_txt" placeholder="xx/xx/xxxx">
            			</div>
            			<div class="pure-control-group pure-u-1-3">
            				<label for="visita_hora">Hora:</label>
            				<input id="visita_hora" type="text" name="hora_txt" placeholder="xx:xx">
            			</div>
            		</fieldset> 
                	<button id="btn-submit-visita" class="pure-button pure-button-primary" name="btn-cad">Registrar</button>
                	<button id="btn-cancel-visita" class="pure-button button-cancel" name="btn-cancel">Cancelar</button>
                </form>
            
        </footer>
    </div>

    <!-- Use Hash-Bang to maintain scroll position when closing modal -->
    <a href="#!" class="modal-close" title="Close this modal" data-dismiss="modal">&times;</a>
</div>

<script>
	function populateVisitas(){
		$.ajax({
			type: "post",
			url: "ws/index.php/get_visitas_by_visitante",
			data: $("#visita-form").serialize()
		}).done(function(data){
			var visitas=JSON.parse(data);
			var listaVisitas=$("#lista-visitas");
			listaVisitas.html("");
			if(visitas.length==0){
				$(listaVisitas).append($("<li />").text("Nenhuma visita registrada"));
			}
			$.each(visitas,function(){
				$(listaVisitas).append($("<li />").text("Data: "+this.data+" - Hora: "+this.hora+""));
			});
		}).fail(function(data){
			alert(data);
		});
	}
    function submitVisita() {
        $.ajax({
            type: "POST",
            url: "ws/index.php/cad_visita",
            data: $("#visita-form").serialize()
        }).done(function(data) {
            alert(data);
            populateVisitas();
        }).fail(function(data){
        	alert(data);
        });

    }
    function closeModalCadVisita(){
        window.location.hash = "!";
    }

    $("#visita_data").mask("99/99/9999");
    $("#visita_hora").mask("99:99");
    $("#btn-submit-visita").click(function() {
        submitVisita();
    });
    $("#btn-cancel-visita").click(function() {
        closeModalCadVisita();
    });
</script>