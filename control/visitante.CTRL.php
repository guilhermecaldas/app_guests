<?php
class VisitanteCTRL{
	
	public static function execute_save(){
		date_default_timezone_set("America/Sao_Paulo");
		
		include_once 'control/visitante.VD.php';
		VisitanteVD::validate();
		include_once 'model/visitante.BO.php';
		VisitanteBO::save(VisitanteVD::$nome,VisitanteVD::$rg,VisitanteVD::$cpf,
			VisitanteVD::$obs,VisitanteVD::$alerta);
	}
	
	public static function remove(){
		date_default_timezone_set("America/Sao_Paulo");
		
		include_once 'control/visitante.VD.php';
		VisitanteVD::validateId();
		include_once 'model/visitante.BO.php';
		VisitanteBO::remove(VisitanteVD::$id);
	}
	
	public static function findAll(){
		date_default_timezone_set("America/Sao_Paulo");
		
		include_once 'model/visitante.BO.php';
		VisitanteBO::findAll();
	}
	
	public static function findByKey(){
		date_default_timezone_set("America/Sao_Paulo");
		
		include_once 'control/visitante.VD.php';
		VisitanteVD::validadeKey();
		include_once 'model/visitante.BO.php';
		VisitanteBO::findByKey(VisitanteVD::$key);
	}
}
?>