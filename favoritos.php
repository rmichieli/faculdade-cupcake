<?php
    require_once("topo.php");
    
    $res = $con->query("select * 
                        from (select * from rpa_factory.favoritos where id_clientes = $id group by id_cupcake) a
                        inner join rpa_factory.cupcakes b on a.id_cupcake = b.id_cupcake");
?>

<body>
    <div class="container">
        <?php require_once("menu-superior.php"); ?>
        
        <form id="estante" action="#" method="post">
            <div class="m-5 row-produtos">
                <h1>Favoritos</h1>
            </div>
            <?php while($rs = $res->fetch_array()){ ?>
                <div class="m-5 row-produtos">
                    <div class="card-cupcake-fav">
                        <img class="img-produto-fav" src="img/<?php echo $rs[5] ?>">
                        <p class="nome-prod-fav"><?php echo $rs[3] ?> - R$ <?php echo $rs[4] ?></p>
                        <img class="img-add" src="img/add.png" onclick="addCart(<?php echo $rs[1] ?>)">
                    </div>
                </div>
            
            <?php }  ?>   
            
        </form>
        <?php    require_once("menu.php"); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/functions.js"></script>
  </body>

