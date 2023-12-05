<?php
    require_once("topo.php");
    $erro = $_GET['erro'];
    if($erro == 500){
        echo "<script>alert('Erro ao enviar sugestão.Tente novamente.')</script>";
    }
?>
<body>
    <div class="container">
        <div class="m-5 menu-row menu-row-fix">
            <img class="img-estante menu-icon" src="img/menu.png" alt="menu" onclick="abrirMenu()">
            <img class="img-estante" src="img/logo.jpg" alt="logo">
            <a href="cart.html"><img class="img-estante cart-icon" src="img/cart.jpg" alt="cesta"></a>
            <spam id="totalCart">0</spam>
        </div>
        <form class='form-sug' id="estante" action="enviar-sugestao.php" method="post">
            <div class="m-5 row-sug">
                <h1 class="label-sug">Envie sua sugestão de sabor</h1>
                <textarea class="form-control text-sug" id="sugestoes" name="sugestoes" required></textarea>
            </div>
            <div class="mt-4 cad-btn">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
            <input type="hidden" name="id" value="<?php echo $id ?>">
        </form>
        <?php  require_once("menu.php"); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/functions.js"></script>
</body>
