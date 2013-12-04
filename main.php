<!DOCTYPE html>
<html>

<head>
    <?php 
        include 'head.php'; 
        include 'utils.php';
        protector();
    ?>
    <title>Atendimento</title>
    <link rel="stylesheet" href="css/pure-min.css">
    <link rel="stylesheet" href="css/layout.css">
</head>

<body>
    <div id="page-grid" class="pure-g-r">
        <div id="menu-lateral" class="pure-u">
            <div class="pure-menu pure-menu-open">
                <ul>
                    <li class="pure-menu-heading">Atendimento</li>
                    <li>
                        <a href="main.php?id=list">Lista de visitantes</a>
                    </li>
                    <li>
                        <a href="main.php?id=cad">Cadastro de visitante</a>
                    </li>
                    <li class="pure-menu-heading">Administração</li>
                    <li>
                        <a href="#">Configurações</a>
                    </li>
                    <li>
                        <a href="loggin.php?opt=0">Sair</a>
                    </li>
                </ul>
            </div>
        </div>

        <div id="page-content" class="pure-u-1">
                <?php 
                    if(isset($_GET['id'])){ 
                        if($_GET['id']=="cad" ){ 
                            include 'cad.php'; 
                        }else if($_GET[ 'id']=="list" ){ 
                            include 'list.php'; 
                        }
                    }else{ 
                        include 'list.php'; 
                    } 
                ?>
        </div>
    </div>
</body>

</html>
