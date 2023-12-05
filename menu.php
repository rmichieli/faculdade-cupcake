
<div class="modal" id="modalMenu" tabindex="-1">
    <div class="modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Menu</h5>
            <button type="button" class="btn-close" onclick="fecharMenu()" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="m-4">
                    <a href="favoritos.php?id=<?php echo $id ?>"><h1>Favoritos</h1></a>
                </div>
                <div class="m-4">
                    <a href="estante.php?id=<?php echo $id ?>"><h1>Estante</h1></a>
                </div>
                <div class="m-4">
                    <a href="cad-completo.php?id=<?php echo $id ?>"><h1>Cadastro</h1></a>
                </div>
                <div class="m-4">
                    <a href="hist.php?id=<?php echo $id ?>"><h1>Histórico de Pedidos</h1></a>
                </div>
                <div class="m-4">
                    <a href="sugestoes.php?id=<?php echo $id ?>"><h1>Sugerir Sabores</h1></a>
                </div>
            </div>
        </div>
    </div>
</div>