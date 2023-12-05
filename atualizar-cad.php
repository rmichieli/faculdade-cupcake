<?php
	require_once("topo.php");
	
	$nome = $_POST['nome'];
	$cpf = $_POST['cpf'];
	$dtNasc = $_POST['dtNasc'];
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$endereco0 = explode(";", $_POST['endereco0']);
	$endereco1 = explode(";", $_POST['endereco1']);
	$endereco2 = explode(";", $_POST['endereco2']);
	$endereco3 = explode(";", $_POST['endereco3']);
	$endereco4 = explode(";", $_POST['endereco4']);
	$cartao0 = explode(";", $_POST['cartao0']);
	$cartao1 = explode(";", $_POST['cartao1']);
	$cartao2 = explode(";", $_POST['cartao2']);
	$cartao3 = explode(";", $_POST['cartao3']);
	$cartao4 = explode(";", $_POST['cartao4']);
	

    $res = $con->query("update rpa_factory.clientes
                        set nome = '$nome',
                        cpf = $cpf,
                        data_nascimento = '$dtNasc',
                        senha = '$pass'
                        where cd_clientes = $id");
    $res2 = $con->query("select cd_clientes from rpa_factory.clientes where cd_clientes = $id");
    while($rs = $res2->fetch_array()){
        if($endereco0) $con->query("insert into rpa_factory.enderecos(cd_clientes, logradouro, numEnd, complemento, cidade, uf) values($rs[0], '$endereco0[0]', $endereco0[1], '$endereco0[2]', '$endereco0[3]', '$endereco0[4]')");
        if($endereco1) $con->query("insert into rpa_factory.enderecos(cd_clientes, logradouro, numEnd, complemento, cidade, uf) values($rs[0], '$endereco1[0]', $endereco1[1], '$endereco1[2]', '$endereco1[3]', '$endereco1[4]')");
        if($endereco2) $con->query("insert into rpa_factory.enderecos(cd_clientes, logradouro, numEnd, complemento, cidade, uf) values($rs[0], '$endereco2[0]', $endereco2[1], '$endereco2[2]', '$endereco2[3]', '$endereco2[4]')");
        if($endereco3) $con->query("insert into rpa_factory.enderecos(cd_clientes, logradouro, numEnd, complemento, cidade, uf) values($rs[0], '$endereco3[0]', $endereco3[1], '$endereco3[2]', '$endereco3[3]', '$endereco3[4]')");
        if($endereco4) $con->query("insert into rpa_factory.enderecos(cd_clientes, logradouro, numEnd, complemento, cidade, uf) values($rs[0], '$endereco4[0]', $endereco4[1], '$endereco4[2]', '$endereco4[3]', '$endereco4[4]')");

        if($cartao0) $con->query("insert into rpa_factory.cartoes(cd_clientes, numCartao, nomeCartao, vencCartao, codSeg) values ($rs[0], $cartao0[0], '$cartao0[1]', '$cartao0[2]', $cartao0[3])");
        if($cartao1) $con->query("insert into rpa_factory.cartoes(cd_clientes, numCartao, nomeCartao, vencCartao, codSeg) values ($rs[0], $cartao1[0], '$cartao1[1]', '$cartao1[2]', $cartao1[3])");
        if($cartao2) $con->query("insert into rpa_factory.cartoes(cd_clientes, numCartao, nomeCartao, vencCartao, codSeg) values ($rs[0], $cartao2[0], '$cartao2[1]', '$cartao2[2]', $cartao2[3])");
        if($cartao3) $con->query("insert into rpa_factory.cartoes(cd_clientes, numCartao, nomeCartao, vencCartao, codSeg) values ($rs[0], $cartao3[0], '$cartao3[1]', '$cartao3[2]', $cartao3[3])");
        if($cartao4) $con->query("insert into rpa_factory.cartoes(cd_clientes, numCartao, nomeCartao, vencCartao, codSeg) values ($rs[0], $cartao4[0], '$cartao4[1]', '$cartao4[2]', $cartao4[3])");
        
        echo "<script>window.open('estante.php?id=". $rs[0] ."', '_self')</script>";    
    }
?>

	

