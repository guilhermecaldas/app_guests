<!DOCTYPE html>
<html>
<head>
    <?php
    include 'head.php';
    ?>
    <title>Visita - Login</title>
<link rel="stylesheet" href="css/pure-min.css">
<link rel="stylesheet" href="css/layout.css">
</head>

<body>
	<div class="pure-g-r">
		<div class="pure-phone-hidden pure-u-1-3"></div>
		<div class="pure-u-1-3 center-box">
			<form class="pure-form pure-form-stacked centered-form" method="post"
				action="login.php">
				<legend>Login</legend>
                <?php
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                try {
                    if (isset($_GET['exit']) && $_GET['exit'] == "1"){
                        include_once 'control/login.CTRL.php';
                        LoginCTRL::execute_logout();
                        LoginCTRL::redirect_if_not_logged("index.php");
                   	}
                    if (isset($_POST['sub'])){
                        include_once 'control/login.CTRL.php';
                        LoginCTRL::execute_login();
                        LoginCTRL::redirect_if_logged("index.php");
                    }
                } catch (Exception $err) {
                    echo $err->getMessage();
                }
                ?>
                <input type='text' class="pure-input-1" name="txt_user"
					placeholder="usuário" required> <input type='password'
					class="pure-input-1" name="txt_pass" placeholder="senha" required>
				<button type="submit" class="pure-button pure-button-primary"
					name="sub">Entrar</button>
			</form>
		</div>
	</div>
</body>
</html>
