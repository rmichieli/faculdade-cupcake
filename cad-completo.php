<?php
    require_once("topo.php");
    $erro = $_GET['erro'];
    if($erro == 500){
        echo "<script>alert('Erro ao cadastrar.Tente novamente.')</script>";
    }
    
    $nome = '';
    $cpf = '';
    $dtNasc = '';
    $user = '';
    $userDisabled = '';
    $pass = '';
    
    $validarUser = 'validarUsuario(this)';
    $validarUserDisabled = 'disabled'; 
    
    $atualizar = 'cadastrar.php';
    
    if($id){
        $res = $con->query("select * from rpa_factory.clientes where cd_clientes = $id");
        while($rs = $res->fetch_array()){
            $nome = $rs[1];
            $cpf = $rs[2];
            $dtNasc = $rs[3];
            $user = $rs[4];
            $userDisabled = 'disabled';
            $pass = $rs[5];
            $validarUser = '';
            $validarUserDisabled = ''; 
            $atualizar = 'atualizar-cad.php?id=' . $id;
        }
    }

?>
 <body>
    <div class="container">
        <form action="<?php echo $atualizar ?>" id="formulario" method="post">
            <div class="m-4">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Informe seu nome..." value="<?php echo $nome ?>" required>
            </div>
            <div class="m-4">
                <label for="cpf" class="form-label">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Informe seu CPF..." maxlength="11" value="<?php echo $cpf ?>" required>
            </div>
            <div class="m-4">
                <label for="dtNasc" class="form-label">Data de nascimento</label>
                <input type="date" class="form-control" id="dtNasc" name="dtNasc" value="<?php echo $dtNasc ?>" required>
            </div>
            <div class="m-2 cad-btn">
                <button type="button" class="btn btn-primary" onclick="abrirModal('endereco')">Adicionar Endereço</button>
                <button type="button" class="btn btn-primary" onclick="abrirModal('cartao')">Adicionar Cartão</button>
            </div>
            <div class="m-4">
                <label for="user" class="form-label">Usuário</label>
                <input type="text" class="form-control" id="user" name="user" placeholder="Informe um usuário..." onchange="<?php echo $validarUser ?>" value="<?php echo $user ?>" <?php echo $userDisabled ?> required>
            </div>
            <div class="m-4">
                <label for="pass" class="form-label">Senha</label>
                <input type="password" class="form-control" id="pass" name="pass" placeholder="Informe uma senha..." value="<?php echo $pass ?>" required>
            </div>
            <div class="mt-4 cad-btn">
                <button type="submit" id="logar" class="btn btn-primary" <?php echo $validarUserDisabled ?>>Cadastrar</button>
            </div>
            <input type="hidden" id="contEnd" value="0">
            <input type="hidden" id="contCard" value="0">
        </form> 



        <div class="modal" id="modalEndereco" tabindex="-1">
            <div class="modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">Adicionar Endereço</h5>
                    <button type="button" class="btn-close" onclick="fecharModal('endereco')" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="m-4">
                            <label for="logradouro" class="form-label">Endereço</label>
                            <input type="text" class="form-control" id="logradouro" placeholder="Informe seu endereço..." required>
                        </div>
                        <div class="m-4">
                            <label for="num-end" class="form-label">Número:</label>
                            <input type="text" class="form-control" id="num-end" placeholder="Informe o número..." required>
                        </div>
                        <div class="m-4">
                            <label for="complemento" class="form-label">Complemento</label>
                            <input type="text" class="form-control" id="complemento" placeholder="Informe o complemento..." >
                        </div>
                        <div class="m-4">
                            <label for="cidade" class="form-label">Cidade</label>
                            <input type="text" class="form-control" id="cidade" placeholder="Informe a cidade..." required>
                        </div>
                        <div class="m-4">
                            <label for="uf" class="form-label">UF:</label>
                            <input type="text" class="form-control" id="uf" placeholder="Informe o Estado..." maxlength="2" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="addEndereco()">Adicionar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="modalCartao" tabindex="-1">
            <div class="modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">Adicionar Cartão</h5>
                    <button type="button" class="btn-close" onclick="fecharModal('cartao')" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="m-4">
                            <label for="nrCartao" class="form-label">Número do cartão</label>
                            <input type="text" class="form-control" id="nrCartao" placeholder="0000 0000 0000 0000" pattern="[0-9]{1,16}" maxlength="16"  required>
                        </div>
                        <div class="m-4">
                            <label for="nomeCartao" class="form-label">Nome no Cartão:</label>
                            <input type="text" class="form-control" id="nomeCartao" placeholder="Informe o nome como está no cartão..." required>
                        </div>
                        <div class="m-4">
                            <label for="venciCartao" class="form-label">Vencimento</label>
                            <input type="month" class="form-control" id="venciCartao" required>
                        </div>
                        <div class="m-4">
                            <label for="cvc" class="form-label">Código de Verificação - CVC</label>
                            <input type="text" class="form-control" id="cvc" placeholder="000" pattern="[0-9]{1,3}" maxlength="3" required>
                        </div>
                        <div class="m-4 espaco"></div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="addCartao()">Adicionar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>