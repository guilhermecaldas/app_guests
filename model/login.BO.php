<?php

class LoginBO {

	public static function save() {
		throw new Exception("Not implemented yet");
	}

	public static function login($user,$pass) {
		session_start();
		include ("persistence/connection.php");
		
		$query = "select * from usuario where username='" . $user . "'";
		$result = Connection::get_connection()->query($query);
		
		$row = $result->fetch_assoc();
		if ($user != $row['username']) throw new Exception("Usuário não existe");
		if ($pass != $row['senha']) throw new Exception("Senha inválida");
		
		$_SESSION['username'] = $row['username'];
		$_SESSION['nome'] = $row['nome'];
		$_SESSION['tipo'] = $row['tipo'];
	}

	public static function logout() {
		session_start();
		unset($_SESSION['username']);
		session_destroy();
	}

	public static function is_logged() {
		session_start();
		return isset($_SESSION['username']);
	}
}

?>