<?php
	require_once("conexao.php");
	$id = $_GET['id'];
    if($id){
        /*$res = $con->query("select cd_clientes, nome, usuario from rpa_factory.clientes where cd_clientes = $id");
        while($rs = $res->fetch_array()){
            $rs[0];
        }*/
    }

?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loja de cupcakes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/functions.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  </head>
