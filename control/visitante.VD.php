<?php

class VisitanteVD {

	public static $id;
	public static $nome;
	public static $rg;
	public static $cpf;
	public static $obs;
	public static $alerta;
	public static $key;
	
	public static function validate(){
		if (empty($_POST['nome_txt'])) throw new Exception("Nome não informado");
		if (empty($_POST['rg_txt'])&&empty($_POST['cpf_txt'])) 
			throw new Exception("RG ou CPF: Pelo menos um campo precisa ser informado");
		//if (!is_numeric($_POST['alerta_txt'])) throw new Exception("ID do alerta não é numérico");

		self::$nome=$_POST['nome_txt'];
		self::$rg=$_POST['rg_txt'];
		self::$cpf=$_POST['cpf_txt'];
		self::$obs=$_POST['obs_txt'];
		self::$alerta=$_POST['alerta_txt'];
	}
	
	public static function validateId(){
		if (empty($_POST['id_txt'])) throw new Exception("Id não informado");
		if (!is_numeric($_POST['id_txt'])) throw new Exception("Id inválido-não é numérico");
		
		self::$id=$_POST['id_txt'];
	}
	
	public static function validadeKey(){
		if(!isset($_POST['key_txt'])){ 
			self::$key="";
		}else{ 
			self::$key=$_POST['key_txt'];
		}
	}	
}

?>