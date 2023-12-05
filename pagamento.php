<?php
    require_once("topo.php");
    /*$erro = $_GET['erro'];
    if($erro == 500){
        echo "<script>alert('Erro ao cadastrar.Tente novamente.')</script>";
    }*/
    $valor = number_format($_POST['total'], 2);
    
    $produtos =  $_POST['produtos'];
    
    $res = $con->query("select * from rpa_factory.enderecos where cd_clientes = $id");
    $res2 = $con->query("select * from rpa_factory.cartoes where cd_clientes = $id");
 ?>
<body>
    <div class="container">
        <div class="m-5 menu-row menu-row-fix">
            <img class="img-estante menu-icon" src="img/menu.png" alt="menu" onclick="abrirMenu()">
            <img class="img-estante" src="img/logo.jpg" alt="logo">
            <img class="img-estante-transparente" src="img/transparente.png">
        </div>
        
        <form class='form-sug' id="estante" action="pagando.php?id=<?php echo $id ?>" method="post">
            <div class="m-5 row-sug">
                <h1 class="label-sug">Efetuar pagamento</h1>
            </div>
            <div class="m-5 row-sug">
                <label for="enderecoPag">Escolha o endereço:</label><br>
                <select class="form-control" name="enderecoPag" id="enderecoPag" onchange="validarPagBtn()">
                    <option value="0"></option>
                    <?php while($rs = $res->fetch_array()){ ?>
                        <option value="1"><?php echo $rs[1] ?>, nº <?php echo $rs[2] ?>, <?php echo $rs[4] ?> - <?php echo $rs[5] ?></option>
                    <? } ?>
                </select>
            </div>
            <div class="m-5 row-sug">
                <label for="cartaoPag">Escolha o cartão:</label><br>
                <select class="form-control" name="cartaoPag" id="cartaoPag" onchange="validarPagBtn()">
                    <option value="0"></option>
                    <?php while($rs2 = $res2->fetch_array()){ ?>
                        <option value="1"><?php echo $rs2[1] ?> - <?php echo $rs2[3] ?></option>
                    <? } ?>
                </select>
            </div>
            <div class="m-5 row-sug">
                Total a pagar: R$ <?php echo $valor ?>
            </div>
            <input type="hidden" id="produtos" name="produtos" value="<?php echo $produtos ?>">
            <div class="mt-4 cad-btn">
                <button type="submit" id="btnPag" class="btn btn-primary" disabled="true">Efetuar pagamento</button>
            </div>
        </form>
        <?php    require_once("menu.php"); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/functions.js"></script>
</body>