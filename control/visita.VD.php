<?php

class VisitaVD {

	public static $visitante;
	public static $data;

	public static function validate() {
		self::validateVisitante();
		
		if (empty($_POST['data_txt'])) throw new Exception("Data não informada");
		if (empty($_POST['hora_txt'])) throw new Exception("Hora não informada");
		if (!self::validateDate($_POST['data_txt'], "d/m/Y")) throw new Exception("Data inválida");
		if (!self::validateDate($_POST['hora_txt'], "H:i")) throw new Exception("Hora inválida");
		
		$temp_date = date_create_from_format("d/m/Y H:i",$_POST['data_txt']." ".$_POST['hora_txt']);
		
		self::$data = strtotime(date_format($temp_date,"Y-m-d H:i"));
	}

	public static function validateVisitante() {
		if (empty($_POST['visitante_txt'])) throw new Exception("Id de visitante não informado");
		self::$visitante = $_POST['visitante_txt'];
	}

	public static function validateId() {
		if (empty($_POST['visitante_txt'])) throw new Exception("ID não informado");
		self::$visitante = $_POST['visitante_txt'];
	}

	private function validateDate($date,$format = 'Y-m-d H:i:s') {
		$d = date_create_from_format($format, $date);
		return $d && $d->format($format) == $date;
	}
}

?>