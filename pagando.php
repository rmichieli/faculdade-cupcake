<?php
	require_once("conexao.php");
	$id = $_GET['id'];
	
	$produtos = $_POST['produtos'];
    $res = $con->query("insert into rpa_factory.historico (id_clientes, produtos, dtPedido) values ($id, '$produtos 0', now())");
   
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loja de cupcakes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  </head>



<body>
    <div class="container">
        <div class="m-5 menu-row menu-row-fix">
            <img class="img-estante menu-icon" src="img/menu.png" alt="menu" onclick="abrirMenu()">
            <img class="img-estante" src="img/logo.jpg" alt="logo">
            <img class="img-estante-transparente" src="img/transparente.png">
            
        </div>
        <form class='form-sug' id="estante" action="pagando.html" method="post">
            <div class="m-5 row-sug">
                <h1 class="label-sug">Seu pedido está sendo registrado</h1>
            </div>
            <div class="m-5 row-sug">
                <h1 class="label-sug esconder" id="pagamentoConf">Pagamento confirmado!</h1>
            </div>
            <div class="m-5 row-sug">
                <h1 class="label-sug esconder"  id="registrado">Pedido registrado com sucesso!</h1>
            </div>
            <div class="mt-4 cad-btn">
                
            </div>
        </form>
    </div>
    <script>
        function pagando(){
            localStorage.clear();
            let x = document.getElementById("pagamentoConf");
            let y = document.getElementById("registrado");
            setTimeout(function(){ x.classList.remove('esconder') }, 1000);
            setTimeout(function(){ y.classList.remove('esconder') }, 2000);
            setTimeout(function(){ window.open("estante.php?id=<?php echo $id ?>", "_self") }, 3000);
        }
        window.addEventListener("load", pagando);
    </script>
</body

	

