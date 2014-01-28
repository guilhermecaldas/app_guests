<?php
// teste de autenticação
include_once 'model/login.BO.php';

if (! LoginBO::is_logged()) throw new Exception("Falha de autenticação");

require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

$app->post("/cad_visitante", "cadVisitante");
$app->post("/remove_visitante","removeVisitante");
$app->post("/get_visitantes", "getVisitantes");
$app->post("/get_visitantes_by_key","getVisitantesByKey");
$app->post("/get_visitas_by_visitante","getVisitasByVisitante");
$app->post("/cad_visita","cadVisita");
$app->get("/get_alertas", "getAlertas");

function cadVisitante() {
	try {
		include_once 'control/visitante.CTRL.php';
		echo VisitanteCTRL::execute_save();
	} catch (Exception $err) {
		echo $err->getMessage();
	}
}

function removeVisitante(){
	try{
		include_once 'control/visitante.CTRL.php';
		VisitanteCTRL::remove();
	}catch(Exception $err){
		echo $err->getMessage();
	}
}

function getAlertas() {
	try {
		include_once 'persistence/connection.php';
		$query = "select * from alerta";
		$result = Connection::get_connection()->query($query);
		
		$array_results = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$row_array = array('id' => $row['id'],'tipo' => $row['tipo']);
			$array_results[$row['id']] = array_map('utf8_encode', $row_array);
		}
		echo json_encode($array_results);
	} catch (Exception $err) {
		echo $err->getMessage();
	}
}

function getVisitantes() {
	try{
		include_once 'control/visitante.CTRL.php';
		VisitanteCTRL::findAll();
	}catch(Exception $err){
		echo $err->getMessage();
	}
}

function getVisitantesByKey() {
	try{
		include_once 'control/visitante.CTRL.php';
		VisitanteCTRL::findByKey();
	}catch(Exception $err){
		echo $err->getMessage();
	}
}

function getVisitasByVisitante(){
	try{
		include_once 'control/visita.CTRL.php';
		VisitaCTRL::findByVisitante();
	}catch(Exception $err){
		echo $err->getMessage();
	}
}

function cadVisita(){
	try{
		include_once 'control/visita.CTRL.php';
		VisitaCTRL::execute_save();
	}catch(Exception $err){
		echo $err->getMessage();
	}
}

$app->run();
