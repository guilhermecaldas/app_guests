<?php
	include_once 'model/login.BO.php';
	
	if(LoginBO::is_logged()){
		$opt = $_GET['opt'];
	
		if ($opt == 'cad_visita') {
			try{
				include_once 'control/visitante.CTRL.php';
				echo VisitanteCTRL::execute_save();
			}catch(Exception $err){
				echo $err->getMessage();
			}
		}else if($opt=='get_alertas'){
			include_once 'persistence/connection.php';
			$query="select * from alerta";
			$result=Connection::get_connection()->query($query);
			
			$array_results=array();
			while($row=mysqli_fetch_assoc($result)){
				$row_array=array(
					'id'=>$row['id'],
					'tipo'=>$row['tipo']
				);
				$array_results[$row['id']]=array_map('utf8_encode',$row_array);
			}		
			echo json_encode($array_results);
		}else if($opt='get_visitantes'){
			include_once 'control/visitante.CTRL.php';
			VisitanteCTRL::findAll();
		}else if($opt='get_visitante'){
			
		}
	}else{
		echo "{'id':'0','erro':'Usuário não está logado'}";
	}
?>
		
