<?php
// Escolha uma senha
$senhaPlana = '123456'; 

// Gera o hash
$hash = password_hash($senhaPlana, PASSWORD_DEFAULT);

// Exibe o hash
echo "Senha para colar no banco de dados: <br>";
echo $hash;
?>