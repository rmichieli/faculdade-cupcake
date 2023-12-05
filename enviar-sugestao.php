<?php
	require_once("conexao.php");
	
	$id = $_POST['id'];
	$sugestao = $_POST['sugestoes'];

    $res = $con->query("insert into rpa_factory.sugestoes (id_clientes, sugestao) values ($id, '$sugestao')");
    if($res){
        echo "<script>window.open('estante.php?id=". $id ."', '_self')</script>";    
    }else{
        echo "<script>window.open('sugestoes.php?erro=500', '_self')</script>";
    }
?>

	

