<?php
    require_once("topo.php");
    /*$erro = $_GET['erro'];
    if($erro == 500){
        echo "<script>alert('Erro ao cadastrar.Tente novamente.')</script>";
    }*/
    
    $res = $con->query("select * from rpa_factory.historico where id_clientes = $id order by dtPedido desc limit 5");
    
    /*while($rs = $res->fetch_array()){ 
        $res2 = $con->query("select * from rpa_factory.cupcakes where id_cupcake in ($rs[1])");
        
    }*/

?>

<body>
    <div class="container">
        <?php require_once("menu-superior.php"); ?>
        <form id="estante" action="#" method="post">
            <div class="m-5 row-busca row-hist-title">
                <h2 class="label-hist">Histórico de Pedidos</h2>
            </div>
            <?php  while($rs = $res->fetch_array()){ 
                $prods = $rs[1];
                $res2 = $con->query("select * from rpa_factory.cupcakes where id_cupcake in ($prods)");
            ?>
            <div class="m-5 row-hist">
                <p class="label-hist">Pedido</p>
                <button type="button" class="btn btn-primary repetir-hist" onclick="repetirPedido('<?php echo $prods ?>')" aria-label="repetir pedido">Repetir</button>
                <?php  while($rs2 = $res2->fetch_array()){ ?>
                    <div class="card-hist">
                        <img class="img-hist" src="img/<?php echo $rs2[3] ?>">
                        <p class="nome-hist"><?php echo $rs2[1] ?></p>
                    </div>
                <?php } ?>
                
            </div>
            <?php } ?>
            
        </form>
        <?php    require_once("menu.php"); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/functions.js"></script>
  </body>