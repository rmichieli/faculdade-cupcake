function abrirModal(tipoModal){
    if(tipoModal=="endereco") document.querySelector('#modalEndereco').classList.add("exibir-modal");
    if(tipoModal=="cartao") document.querySelector('#modalCartao').classList.add("exibir-modal");
}

function fecharModal(tipoModal){
    if(tipoModal=="endereco") document.querySelector('#modalEndereco').classList.remove("exibir-modal");
    if(tipoModal=="cartao") document.querySelector('#modalCartao').classList.remove("exibir-modal");
}

function abrirMenu(){
    document.querySelector('#modalMenu').classList.add("exibir-menu");
    document.querySelector('#estante').classList.add("esconder");
}

function fecharMenu(){
    document.querySelector('#modalMenu').classList.remove("exibir-menu");
    document.querySelector('#estante').classList.remove("esconder");
}

function addEndereco(){
    const end = document.querySelector('#logradouro').value + ';' +
                document.querySelector('#num-end').value + ';' + 
                document.querySelector('#complemento').value + ';' +
                document.querySelector('#cidade').value + ';' +
                document.querySelector('#uf').value
    ;
    let contEnd = parseInt(document.querySelector('#contEnd').value);
    let enderecoElement = document.createElement('input');
    enderecoElement.setAttribute('type', 'hidden');
    enderecoElement.setAttribute('name', 'endereco' + contEnd);
    enderecoElement.value = end;
    document.querySelector('#formulario').appendChild(enderecoElement);
    contEnd += 1;
    document.querySelector('#contEnd').value = contEnd;
    limparCampos();
    fecharModal('endereco');
}

function addCartao(){
    const card = document.querySelector('#nrCartao').value + ';' +
                document.querySelector('#nomeCartao').value + ';' + 
                document.querySelector('#venciCartao').value + ';' +
                document.querySelector('#cvc').value 
    ;
    let contCard = parseInt(document.querySelector('#contCard').value);
    let cartaoElement = document.createElement('input');
    cartaoElement.setAttribute('type', 'hidden');
    cartaoElement.setAttribute('name', 'cartao' + contCard);
    cartaoElement.value = card;
    document.querySelector('#formulario').appendChild(cartaoElement);
    contCard += 1;
    document.querySelector('#contCard').value = contCard;
    limparCampos();
    fecharModal('cartao'); 
}

function limparCampos(){
    document.querySelector('#logradouro').value = '';
    document.querySelector('#num-end').value = '';
    document.querySelector('#complemento').value = '';
    document.querySelector('#cidade').value = '';
    document.querySelector('#uf').value = '';
    document.querySelector('#nrCartao').value = '';
    document.querySelector('#nomeCartao').value = '';
    document.querySelector('#venciCartao').value = '';
    document.querySelector('#cvc').value = '';
}

function qtdPorProdutoCart(){
    let produtos = '';
    let total = 0;
    keys = Object.keys(localStorage),
    i = keys.length;
    while ( i-- ) {
        if(document.getElementById(keys[i])) {
            document.getElementById(keys[i]).innerHTML = localStorage.getItem(keys[i]);
            if(localStorage.getItem(keys[i]) > 0) {
                document.getElementById('div-'+keys[i]).classList.remove('esconder');
                produtos += keys[i] + ",";
            }
        }
    }
    let x = document.querySelectorAll('.qtdProd');
    x.forEach(
        y => {
            let vl = parseFloat(y.parentElement.childNodes[5].innerHTML);
            let vlTotal = vl * parseInt(y.innerHTML);
            if(vlTotal > 0) total += vlTotal;
        }
    )
    if(isNaN(total)) total = 0;
    if(total === 0){
        document.querySelector('#finalizar').disabled = true;
    }else{
        document.querySelector('#finalizar').disabled = false;
    }
    if(document.querySelector('#total')) document.querySelector('#total').innerHTML = total.toFixed(2);
    if(document.querySelector('#totalInput')) document.querySelector('#totalInput').value = total.toFixed(2);
    if(document.querySelector('#produtos')) document.querySelector('#produtos').value = produtos;
}

function somarTotalCart(){
    var values = 0,
    keys = Object.keys(localStorage),
    i = keys.length;
    while ( i-- ) {
        values = values + parseInt(localStorage.getItem(keys[i]));
    }
    document.querySelector('#totalCart').innerHTML = values;
    qtdPorProdutoCart();
}


function addCart(produto){
    //adiciona novo item ou soma qtd de mesmo produto
    let qtd = parseInt(localStorage.getItem(produto));
    if(isNaN(qtd)) qtd = 0;
    localStorage.setItem(produto, qtd + 1);
    somarTotalCart();
}
function removeCart(produto){
    //adiciona novo item ou soma qtd de mesmo produto
    let qtd = parseInt(localStorage.getItem(produto));
    if(isNaN(qtd)) qtd = 0;
    if(qtd > 0) localStorage.setItem(produto, qtd - 1);
    somarTotalCart();
}

function limpartCart(){
    localStorage.clear();
}

function pesquisar(){
    let termo = document.querySelector('#pesquisa').value;
    if(termo==='') return;
    console.log(termo);
}

function favoritar(idProduto){
    //insert na tabela de produtos
    let dados = idProduto.split(";");
    let id = dados[0];
    let produto = dados[1];
    $.post( "favoritar.php", { id: id, produto: produto })
    .done(function( data ) {
        alert("Produto favoritado.");
    });
}

function validarPagBtn(){
    if(document.querySelector('#enderecoPag').value !== 0
    && document.querySelector('#cartaoPag').value !== 0){
        document.querySelector('#btnPag').disabled = false;
    }    
}

function validarUsuario(element){
    $.post( "consultaUsuario.php", { user: element.value })
    .done(function( data ) {
        let resp = JSON.parse(data);
            if(resp.status !== 200){
                alert("Usuário inválido!");
                document.querySelector('#logar').disabled = true;
            }else{
                document.querySelector('#logar').disabled = false;
            }
    });
}

function validarUsuarioLogin(element){
    $.post( "consultaUsuario.php", { user: element.value })
    .done(function( data ) {
        let resp = JSON.parse(data);
            if(resp.status == 200){
                alert("Usuário inválido!");
                document.querySelector('#logar').disabled = true;
            }else{
                document.querySelector('#logar').disabled = false;
            }
    });
}

function repetirPedido(produtos){
    let prods = produtos.split(',');
    prods.forEach(p => { 
        let pi = parseInt(p);
        if(pi != 0) addCart(pi);
    });
}
window.addEventListener("load", somarTotalCart);
