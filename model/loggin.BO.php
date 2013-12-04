<?php
class LogginBO{
	
	public static function save(){
		throw new Exception("Not implemented yet");
	}
	
	public static function loggin($user,$pass){
		include ("persistence/dbinit.php");
		
		$res = Connection::get_connection()->query("select count(*) from usuario where nome='".$user."'");
		
		$res->data_seek(0);
		while ($row = $res->fetch_assoc()) {
			if($row['count(*)']==0) throw new Exception("Usuário não existe!");
		}
		
		$res = get_connection()->query("select count(*) from usuario where nome='".$user."' and senha='".$pass."'");
		
		while ($row= $res->fetch_assoc()) {
			if($row['count(*)']==0) throw new Exception("Senha incorreta");
		}
		
		
	}
	
	public static function loggout(){
		unset($_SESSION['user']);
		session_destroy();
	}
	
	public static function is_logged() {
		return isset($_SESSION['user']);
	}
}

?>