<?php
	require_once("conexao.php");
	$usuario = $_POST['user'];
	$senha = $_POST['pass'];
	//echo "SELECT usuario FROM rpa_factory.clientes where usuario = '$usuario'";
    $res = $con->query("SELECT cd_clientes FROM rpa_factory.clientes where usuario = '$usuario' and senha = '$senha'");
    if($res->num_rows == 0){
        echo "<script>window.open('login.php?erro=403', '_self')</script>";
    }else{
        $rs = $res->fetch_array();
        echo "<script>window.open('estante.php?id=". $rs[0] ."', '_self')</script>";
    }
?>

	

