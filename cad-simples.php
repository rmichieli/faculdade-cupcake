<?php
    require_once("topo.php");
    $erro = $_GET['erro'];
    if($erro == 500){
        echo "<script>alert('Erro ao cadastrar.Tente novamente.')</script>";
    }
?>
<body>
    <div class="container">
        <form action="cadastrar.php" method="post">
            <div class="m-4">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Informe seu nome..." required>
            </div>
            <div class="m-4">
                <label for="cpf" class="form-label">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Informe seu CPF..." maxlength="11" required>
            </div>
            <div class="m-4">
                <label for="dtNasc" class="form-label">Data de nascimento</label>
                <input type="date" class="form-control" id="dtNasc" name="dtNasc" required>
            </div>
            <div class="m-4">
                <label for="user" class="form-label">Usuário</label>
                <input type="text" class="form-control" id="user" name="user" placeholder="Informe um usuário..." required onchange="validarUsuario(this)">
            </div>
            <div class="m-4">
                <label for="pass" class="form-label">Senha</label>
                <input type="password" class="form-control" id="pass" name="pass" placeholder="Informe uma senha..." required>
            </div>
            <div class="mt-4 cad-btn">
                <button type="submit" id="logar" class="btn btn-primary" disabled>Cadastrar</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>