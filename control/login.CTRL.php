<?php
class LoginCTRL{
	
	public static function execute_login(){
		include_once 'control/login.VD.php';
		include_once 'model/login.BO.php';
		
		LoginVD::validate();
		LoginBO::login(LoginVD::$user,LoginVD::$pass);
	}
	
	public static function execute_logout(){
		include_once 'model/login.BO.php';
		LoginBO::logout();
	}
	
	public static function redirect_if_logged($url){
		include_once 'model/login.BO.php';
		if(LoginBO::is_logged()){
			header('Location:'.$url);
		}
	}
	
	public static function redirect_if_not_logged($url){
		include_once 'model/login.BO.php';
		if(!LoginBO::is_logged()){
			header('Location:'.$url);
		}
	}
}
?>