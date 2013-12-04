<?php

	include "persistence/dbinit.php";
	
	$con=get_connection();
	
	if(isset($_GET['action'])){
		
	}
	
	$query_string="select * from usuario";
	$results=mysqli_query($con,$query_string);
	
	$return_array = array();
	
	$arr = array(
		'nome' => $_POST["nome"],
		'senha' => "tu",
		'nome_completo' => "ele",
		'tipo' => "nós"
	);
	
	array_push($return_array,array_map(utf8_encode,$arr));
		
		
	while ($row = mysqli_fetch_array($results)) {
		$row_array = array(
			'nome' => $row['nome'],
			'senha' => $row['senha'],
			'nome_completo' => $row['nome_completo'],
			'tipo' => $row['tipo']
		);
			
		array_push($return_array,array_map(utf8_encode,$row_array));
	}
		
	echo json_encode($return_array);
?>
