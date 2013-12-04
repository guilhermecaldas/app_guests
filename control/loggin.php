<?php
class Loggin{
	
	public static function execute_loggin(){
		include_once 'control/logginVD.php';
		include_once 'model/loggin.BO.php';
		
		LogginVD::validate();
		LogginBO::loggin(LogginVD::$user,LogginVD::$pass);
	}
	
	public static function execute_loggout(){
		include_once 'model/loggin.BO.php';
		LogginBO::loggout();
	}
	
	public static function lock_page($url){
		include_once 'model/loggin.BO.php';
		if(LogginBO::is_logged()){
			header('Location:'.$url);
		}else{
			header('Location: loggin.php');
		}
	}
}
?>