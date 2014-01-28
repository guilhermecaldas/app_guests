<!DOCTYPE html>
<html>

<head>
    <?php 
        include 'head.php'; 
        include_once 'control/login.CTRL.php';
        LoginCTRL::redirect_if_not_logged("index.php");
    ?>
    <title>Atendimento</title>
</head>

<body>
    <div id="page-grid" class="pure-g-r">
        <div id="menu-lateral" class="pure-u">
            <div class="pure-menu pure-menu-open">
                <ul>
                    <li class="pure-menu-heading">Atendimento</li>
                    <li>
                        <a href="#modal-cad-visitante">Cadastro de visitante</a>
                    </li>
                    <li class="pure-menu-heading">Administração</li>
                    <li>
                        <a href="#">Configurações</a>
                    </li>
                    <li>
                        <a href="login.php?exit=1">Sair</a>
                    </li>
                </ul>
            </div>
        </div>

        <div id="page-content" class="pure-u-1">
			<?php
               	include 'list.php'; 
            ?>
        </div>
    </div>
    
    <?php 
    	include_once 'cadastro_visitante.php';
		include_once 'visitas_visitante.php';
    ?>
    <script src="js/modal.js"></script><!-- JS for Modal -->
</body>

</html>
