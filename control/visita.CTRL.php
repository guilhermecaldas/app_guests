<?php
class VisitaCTRL{
	
	public static function execute_save(){
		date_default_timezone_set("America/Sao_Paulo");
		
		include_once 'control/visita.VD.php';
		VisitaVD::validate();
		include_once 'model/visita.BO.php';
		VisitaBO::save(VisitaVD::$visitante,VisitaVD::$data);
	}
	
	public static function findByVisitante(){
		date_default_timezone_set("America/Sao_Paulo");
		
		include_once 'control/visita.VD.php';
		VisitaVD::validateId();
		include_once 'model/visita.BO.php';
		VisitaBO::findByVisitante(VisitaVD::$visitante);
	}
}
?>