<?php
class VisitaBO{
	
	public static function save($visitante,$data){
		include ("persistence/connection.php");
		
		$query = "insert into visita (visitante,data) values(".$visitante.",".$data.")";
		
		Connection::get_connection()->query("set names utf8");
		$result = Connection::get_connection()->query($query);
		if($result){
			echo "Sucesso!";
		}else{
			echo "Erro! "+mysqli_errno(Connection::get_connection());
		}
		Connection::close_connection();
	} 
	
	public static function remove($id){
		include_once 'persistence/connection.php';
	
		$query="delete from visita where id=".$id;
		$result= Connection::get_connection()->query($query);
	
		if($result){
			echo "Sucesso!";
		}else{
			echo "Erro! "+mysqli_errno(Connection::get_connection());
		}
		Connection::close_connection();
	}
	
	public static function update($visitante,$data,$id){
		include_once 'persistence/connection.php';
	
		$query="update visita set visitante=".$visitante.", data=".$data." where id=".$id;
		
		$result= Connection::get_connection()->query($query);
	
		if($result){
			echo "Sucesso!";
		}else{
			echo "Erro! "+mysqli_errno(Connection::get_connection());
		}
		Connection::close_connection();
	}
	
	public static function findByVisitante($visitante) {
		include_once 'persistence/connection.php';
		
		$query="select * from visita where visitante=".$visitante;
		$result= Connection::get_connection()->query($query);
		
		$result_array=array();
		
		while($row=mysqli_fetch_assoc($result)){
			$row_result=array(
				'id'=>$row['id'],
				'data'=>date("d/m/Y",$row['data']),
				'hora'=>date("H:i",$row['data'])				
			);
			array_push($result_array,array_map("utf8_encode",$row_result));
		}
		
		echo json_encode($result_array);
		Connection::close_connection();
	}
}
?>