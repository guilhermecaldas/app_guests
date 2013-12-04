<?php
	include_once "persistence/dbinit.php";
	
	function cad_user($nome,$senha,$nome_completo,$tipo){
		$con=get_connection();
		$query_string="insert into usuario values('".$nome."','".$senha."','".$nome_completo."',".$tipo.")";
		$result=mysql_query($con,$query_string);
		close_connection();
	}
?>
