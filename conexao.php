<?php

$style = "
	<style>
		.erro_conexao {
			background-color: #c9302c;
			position: fixed;
			left: 0px;
			right: 0;
			top: 0;
			z-index: 600;
			line-height: 30px;
			color: yellow;
			font-size: 17px;
			padding: 3px;
		}
	</style>
";

	$con = new mysqli("host", "user", "pass", "bd");
	$con->set_charset("utf8mb4");
	if ($con->connect_errno){
		echo $style;
		echo "<div class='erro_conexao'> -> ERRO SERVIDOR DB: host - $con->connect_errno -  $con->connect_error </div>";
	}

?>