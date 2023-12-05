<?php
	require_once("conexao.php");
	$usuario = $_POST['user'];
	//echo "SELECT usuario FROM rpa_factory.clientes where usuario = '$usuario'";
    $res = $con->query("SELECT usuario FROM rpa_factory.clientes where usuario = '$usuario'");
    if($res->num_rows == 0){
        echo json_encode(array('status' => 200));
    }else{
        echo json_encode(array('status' => 403));
    }
?>

	

