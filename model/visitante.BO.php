<?php
class VisitanteBO{
	
	public static function save($nome,$rg,$cpf,$obs,$alerta){
		include ("persistence/connection.php");
		
		if (empty($rg)) $rg="NULL"; else $rg="'".$rg."'"; 
		if (empty($cpf)) $cpf="NULL"; else $cpf="'".$cpf."'";
		
		$query = "insert into visitante (nome,rg,cpf,obs,alerta) values(
		'".$nome."',
			".$rg.",
				".$cpf.",
					'".$obs."',
						".$alerta.")";
		
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
	
		$query="delete from visitante where id=".$id;
		$result= Connection::get_connection()->query($query);
	
		if($result){
			echo "Sucesso!";
		}else{
			echo "Erro! "+mysqli_errno(Connection::get_connection());
		}
		Connection::close_connection();
	}
	
	public static function update($nome,$rg,$cpf,$obs,$alerta,$id){
		include_once 'persistence/connection.php';
	
		$query="update visitante set nome='".$nome."', rg='".$rg."', cpf='".$cpf."', 
			obs='".$obs."', alerta=".$alerta." where id=".$id;
		
		$result= Connection::get_connection()->query($query);
	
		if($result){
			echo "Sucesso!";
		}else{
			echo "Erro! "+mysqli_errno(Connection::get_connection());
		}
		Connection::close_connection();
	}
	
	public static function findByKey($key){
		$query="select v.*, a.tipo 
			from visitante v left join alerta a on a.id=v.alerta 
			where v.nome like '%".$key."%' 
				or v.rg like '%".$key."%' 
				or v.cpf like '%".$key."%'
				or v.obs like '%".$key."%'";
		self::makeQuery($query);
	}
	
	public static function findAll(){
		$query="select v.*, a.tipo from visitante v left join alerta a on a.id=v.alerta";
		self::makeQuery($query);
	}
	
	private static function makeQuery($query) {
		include_once 'persistence/connection.php';
		
		Connection::get_connection()->query("set names utf8");
		$result= Connection::get_connection()->query($query);
		
		$result_array=array();
		
		while($row=mysqli_fetch_assoc($result)){
			$row_result=array(
				'id'=>$row['id'],
				'nome'=>$row['nome'],
				'rg'=>$row['rg'],
				'cpf'=>$row['cpf'],
				'obs'=>$row['obs'],
				'alerta'=>$row['alerta'],
				'tipo'=>$row['tipo']
			);
			array_push($result_array,$row_result);
		}
		
		echo json_encode($result_array);
		Connection::close_connection();
	}
}
?>