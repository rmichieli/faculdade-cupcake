<?php
    require_once("topo.php");
    /*$erro = $_GET['erro'];
    if($erro == 500){
        echo "<script>alert('Erro ao cadastrar.Tente novamente.')</script>";
    }*/
    
    $res = $con->query("select * from rpa_factory.cupcakes");
    $quebraLinha = 0;
?>

<body>
    <div class="container">
        <?php require_once("menu-superior.php"); ?>
        <form id="estante" action="pagamento.php?id=<?php echo $id ?>" method="post">
            <div class="m-5 row-produtos">
                <h1>Cesta</h1>
            </div>
            <?php while($rs = $res->fetch_array()){ ?>
            
                <div class="m-5 row-produtos esconder" id="div-<?php echo $rs[0] ?>" >
                    <div class="card-cupcake-fav">
                        <img class="img-produto-fav" src="img/<?php echo $rs[3] ?>">
                        <p class="nome-prod-fav"><?php echo $rs[1] ?></p>
                        <spam id="valor"><?php echo $rs[2] ?></spam>
                        <spam>  Qtd:  </spam>
                        <spam class="qtdProd" id="<?php echo $rs[0] ?>"></spam>
                        <img class="img-add" src="img/add.png" onclick="addCart(<?php echo $rs[0] ?>)">
                        <img class="img-add" src="img/remove.png" onclick="removeCart(<?php echo $rs[0] ?>)">
                    </div>
                </div>
            <?php } ?>   
            <div class="m-5 row-produtos">
                <p>Total:         </p>
                <spam id="total"></spam>
                <input type="hidden" id="totalInput" name="total">
                <input type="hidden" id="produtos" name="produtos">
            </div>
            <div class="m-5 row-produtos">
                <button type="submit" id="finalizar" class="btn btn-primary" disabled>Finalizar Compra</button>
            </div>
        </form>
        <?php    require_once("menu.php"); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/functions.js"></script>
</body>