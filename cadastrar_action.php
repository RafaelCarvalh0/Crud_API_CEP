<?php

require 'config.php';

$nome = filter_input(INPUT_POST, 'nome');
$idade = filter_input(INPUT_POST, 'idade');
$sexo = filter_input(INPUT_POST, 'sexo');
$profissao = filter_input(INPUT_POST, 'profissao');
$estado_civil = filter_input(INPUT_POST, 'estado_civil');
$cep = filter_input(INPUT_POST, 'cep');
$data_cadastro = date('Y-m-d');

if (isset($_POST["cadastrar"])) {

    if (!empty($nome) && !empty($idade) && !empty($sexo) && !empty($profissao) && !empty($estado_civil) && !empty($cep)) {

                $sql = $pdo->prepare("INSERT INTO usuarios (
        nome, idade, sexo, profissao, estado_civil, cep, data_cadastro
        ) VALUES (
            :nome, :idade, :sexo, :profissao, :estado_civil, :cep, :data_cadastro)");

                $sql->bindValue(':nome', $nome);
                $sql->bindValue(':idade', $idade);
                $sql->bindValue(':sexo', $sexo);
                $sql->bindValue(':profissao', $profissao);
                $sql->bindValue(':estado_civil', $estado_civil);
                $sql->bindValue(':cep', $cep);
                $sql->bindValue(':data_cadastro', $data_cadastro);
                $sql->execute();

                header("Location: cadastros.php");
                exit;

    } else {

        header("Location: index.php");
    }
}

?>