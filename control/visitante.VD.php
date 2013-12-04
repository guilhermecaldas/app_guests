<?php

class VisitanteVD {
	
	public static $id;
	public static $nome;
	public static $rg;
	public static $cpf;
	public static $obs;
	public static $alerta;
	
	public static function validate($id,$nome,$rg,$cpf,$obs,$alerta){
		if (empty($nome)) throw new Exception("Nome inválido");
		if (empty($rg)&&empty($cpf)) 
			throw new Exception("EG e CPF inválido: Pelo menos um campo deve ser preenchido");
		if (!is_numeric($alerta)) throw new Exception("Erro ao salvar alerta");
		
		self::$id=$id;
		self::$nome=$nome;
		self::$rg=$rg;
		self::$cpf=$cpf;
		self::$obs=$obs;
		self::$alerta=$alerta;
	}
	
	
}

?>