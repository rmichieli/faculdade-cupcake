<?php
    require_once("topo.php");
    /*$erro = $_GET['erro'];
    if($erro == 500){
        echo "<script>alert('Erro ao cadastrar.Tente novamente.')</script>";
    }*/
    
    $res = $con->query("select * from rpa_factory.cupcakes order by nomeCupacake");
    $quebraLinha = 0;
?>
<body>
    <div class="container">
        <?php require_once("menu-superior.php"); ?>
        
        <form id="estante" action="#" method="post">
            <div class="m-5 row-busca">
                <input type="text" class="form-control busca" id="pesquisa" name="pesquisa" placeholder="Buscar..." >
                <img class="lupa" src="img/search.png" alt="cesta" onclick="pesquisar()">
            </div>
            <?php while($rs = $res->fetch_array()){ 
                if($quebraLinha % 2 == 0){
                    echo "<div class='m-5 row-produtos'>";  
                } 
            ?>
                <div class="card-cupcake">
                    <img class="img-fav" src="img/fav.png" onclick="favoritar('<?php echo $id . ";" . $rs[0] ?>')">
                    <img class="img-produto" src="img/<?php echo $rs[3] ?>" onclick="addCart(<?php echo $rs[0] ?>)">
                    <p class="nome-prod"><?php echo $rs[1] ?> - R$ <?php echo $rs[2] ?></p>
                </div>
            <?php 
                    $quebraLinha += 1;
                    if ($quebraLinha % 2 == 0) echo "</div>";
                }  
            ?>        
        </form>
        <?php    require_once("menu.php"); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/functions.js"></script>
  </body>