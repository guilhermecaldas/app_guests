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
				action="loggin.php">
				<legend>Loggin</legend>
                <?php
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                try {
                    if (isset($_GET['opt']) && $_GET['opt'] == "0"){
                        include_once 'control/loggin.php';
                        Loggin::execute_loggout();
                   	}
                    if (isset($_POST['sub'])){
                        include_once 'control/loggin.php';
                        Loggin::execute_loggin();
                        Loggin::lock_page("index.php");
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
