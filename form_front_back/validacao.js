// Executar mascaras
function mascaras(o, f) {
    const objeto = o;
    const funcao = f;
    setTimeout(() => {
        objeto.value = funcao(objeto.value);
    }, 1);
}

function formatarCNPJ(valor) {
    // Remove caracteres não numéricos
    valor = valor.replace(/\D/g, "");   
    if (valor.length <= 14) {
        // Coloca ponto entre o segundo e o terceiro dígitos
        valor = valor.replace(/^(\d{2})(\d)/, "$1.$2");

        // Coloca ponto entre o quinto e o sexto dígitos
        valor = valor.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3");

        // Coloca uma barra entre o oitavo e o nono dígitos
        valor = valor.replace(/\.(\d{3})(\d)/, ".$1/$2");

        // Coloca um hífen depois do bloco de quatro dígitos
        valor = valor.replace(/(\d{4})(\d)/, "$1-$2");
    }
    return valor;
}

function telefone(variavel){
    variavel = variavel.replace(/\D/g,"")
    variavel = variavel.replace(/^(\d\d)(\d)/g,"($1) $2") // ADICIONA PARENTESES EM VOLTA DOS DOIS PRIMEIROS DIGITOS
    variavel = variavel.replace(/(\d{4})(\d)/g,"$1-$2") // ADICIONA HIFEM ENTRE O QUARTO E QUINTO DIGITO
    return variavel

}

function executaMascara() {
    objeto.value = funcao(objeto.value)
}

function catjogo(variavel) {
    variavel = variavel.replace(/\d/g, "")
    return variavel
}