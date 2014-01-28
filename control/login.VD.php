<?php
class LoginVD{
    public static $user;
    public static $pass;

    public static function validate(){
        if(!isset($_POST['txt_user'])) throw new Exception("Usuário inválido!");
        if(empty($_POST['txt_user'])) throw new Exception("Usuário inválido!");
        
        if(!isset($_POST['txt_pass'])) throw new Exception("Senha inválida!");
        if(empty($_POST['txt_pass'])) throw new Exception("Senha inválida!");
        
        self::$user=$_POST['txt_user'];
        self::$pass=$_POST['txt_pass'];
    }
}
?>