<?php
/**
 * Gera uma senha temporária aleatória.
 *
 * @param int $comprimento O número de caracteres da senha.
 * @return string A senha gerada.
 */
function gerarSenhaTemporaria($comprimento = 8) {
    // Caracteres que podem ser usados na senha
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $senha = '';
    $max = strlen($caracteres) - 1;

    for ($i = 0; $i < $comprimento; $i++) {
        $senha .= $caracteres[random_int(0, $max)];
    }

    return $senha;
}

/**
 * Simula o envio de um e-mail salvando as informações em um arquivo de texto.
 *
 * @param string $email O e-mail do destinatário.
 * @param string $senha A senha temporária a ser "enviada".
 */
function simularEnvioEmail($email, $senha) {
    $arquivo = 'emails_simulados.txt';
    $dataHora = date('Y-m-d H:i:s');
    
    // Formata a mensagem que será salva no arquivo
    $mensagem = "--------------------------------------------------\n";
    $mensagem .= "Data/Hora: " . $dataHora . "\n";
    $mensagem .= "Para: " . $email . "\n";
    $mensagem .= "Assunto: Sua Nova Senha Temporária\n";
    $mensagem .= "Mensagem: Olá, sua nova senha temporária é: " . $senha . "\n";
    $mensagem .= "--------------------------------------------------\n\n";

    // Adiciona a mensagem ao final do arquivo, sem apagar o conteúdo anterior
    // A função file_put_contents criará o arquivo se ele não existir
    file_put_contents($arquivo, $mensagem, FILE_APPEND);
}
?>