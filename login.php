<?php
    require_once("topo.php");
    $erro = $_GET['erro'];
    if($erro == 403){
        echo "<script>alert('Usuário ou senha incorretos.')</script>";
    }
?>

<body>
<div class="container">
        <img class="logo-principal" src="img/logo.jpg">
        <form action="autenticar.php" method="post">
            <div class="m-5">
                <label for="user" class="form-label">Usuário</label>
                <input type="text" class="form-control" id="user" name="user" placeholder="Informe um usuário..." onchange="validarUsuarioLogin(this)" required>
            </div>
            <div class="m-5">
                <label for="pass" class="form-label">Senha</label>
                <input type="password" class="form-control" id="pass" name="pass" placeholder="Informe sua senha..." required>
            </div>
            <div class="mt-4 cad-btn">
                <button type="submit" id="logar" class="btn btn-primary" disabled>Logar</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>