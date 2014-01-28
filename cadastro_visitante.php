<div class="semantic-content" id="modal-cad-visitante" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
    <div class="modal-inner">
        <header>
            <h2 id="modal-label">Cadastrar visitante</h2>
        </header>

        <div class="modal-content">
            <form id="visitante-form" onsubmit="return false;" class="pure-form pure-form-aligned">
                <fieldset class="pure-u-1">
                    <div class="pure-control-group">
                        <label for="nome">Nome</label>
                        <input id="nome" class="pure-input-1-3" name="nome_txt" type="text">
                    </div>

                    <div class="pure-control-group">
                        <label for="rg">RG</label>
                        <input id="rg" class="pure-input-1-3" name="rg_txt" type="text">
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
                        <label for="alerta">Alerta</label>
                        <select id="alerta" name="alerta_txt">
                        </select>
                    </div>
                </fieldset>
            </form>
        </div>

        <footer>
            <p>
                <button id="btn-submit-visitante" class="pure-button pure-button-primary" name="btn-cad">Cadastrar</button>
                <button id="btn-cancel-visitante" class="pure-button button-cancel" name="btn-cancel">Cancelar</button>
            </p>
        </footer>
    </div>

    <!-- Use Hash-Bang to maintain scroll position when closing modal -->
    <a href="#!" class="modal-close" title="Close this modal" data-dismiss="modal">&times;</a>
</div>

<script>
    function populateAlertas() {
        $.ajax("ws/index.php/get_alertas").done(function(data) {
            var alertasArray = JSON.parse(data);
            var options = '<option value="NULL">Nenhum</option>';

            $.each(alertasArray, function() {
                options = options + '\n<option value="' + this.id + '">' + this.tipo + '</option>';
            });
            $("#alerta").html(options);

        });
    }

    function submit() {
        $.ajax({
            type: "POST",
            url: "ws/index.php/cad_visitante",
            data: $("#visitante-form").serialize()
        }).done(function(data) {
            alert(data);
            closeModalCadVisitante();
            populateTable();
        });

    }
    function closeModalCadVisitante(){
        window.location.hash = "!";
    }
    populateAlertas();
    $("#btn-submit-visitante").click(function() {
        submit();
    });
    $("#btn-cancel-visitante").click(function() {
        closeModalCadVisitante();
    });
    $("#cpf").mask("999.999.999-99");
</script>