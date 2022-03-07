<?php

require_once 'config.php';

$id = filter_input(INPUT_GET, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$idade = filter_input(INPUT_POST, 'idade');
$sexo = filter_input(INPUT_POST, 'sexo');
$profissao = filter_input(INPUT_POST, 'profissao');
$estado_civil = filter_input(INPUT_POST, 'estado_civil');
$cep = filter_input(INPUT_POST, 'cep');

if ($nome && $idade && $sexo && $profissao && $estado_civil && $cep) {

    $sql = $pdo->prepare("UPDATE usuarios SET nome = :nome, idade = :idade, sexo = :sexo, profissao = :profissao, estado_civil = :estado_civil, cep = :cep WHERE id = :id");

    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':idade', $idade);
    $sql->bindValue(':sexo', $sexo);
    $sql->bindValue(':profissao', $profissao);
    $sql->bindValue(':estado_civil', $estado_civil);
    $sql->bindValue(':cep', $cep);
    $sql->bindValue(':id', $id);
    $sql->execute();

    header("Location: cadastros.php");
    exit;
} else {
    echo '<h1>Este usuário já existe!</h1>';
}

?>