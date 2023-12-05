<?php
	require_once("conexao.php");
	
	$id = $_POST['id'];
	$produto = $_POST['produto'];

    $res = $con->query("insert into rpa_factory.favoritos (id_clientes, id_cupcake) values ($id, $produto)");
    if($res){
        echo json_encode(array('status' => 200));
    }else{
        echo json_encode(array('status' => 403));
    }
?>

	

