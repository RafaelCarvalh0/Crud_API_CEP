<?php

require 'config.php';
require 'assets.php';

$info = [];
$id = filter_input(INPUT_GET, 'id');

if($id) {

$sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
$sql->bindValue(':id', $id);
$sql->execute();

if($sql->rowCount() > 0) {
    $info = $sql->fetch(PDO::FETCH_ASSOC);
}

else {
    header("Location: visualizar.php");
    exit;
}

}

else{
    header("Location: visualizar.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= $css; ?>">
    <script src="<?= $js; ?>"></script>
    <title>Cadastro de Usuários</title>
</head>

<body style="background: url('<?= $background_fundo; ?>') no-repeat; background-size: cover;" >

    <div id="layout" class="container-fluid">

        <div id="campos" class="row p-0">

            <div style="background: url('<?= $background_form; ?>') no-repeat; background-size: cover;" id="header" class="col col-md-12">
                <h2>Alterar Usuário</h2>
            </div>

            <form style="background: url('<?= $background_form; ?>') no-repeat; background-size: cover;" method="POST" action="editar_action.php?id=<?=$info['id']; ?>">
                <label>Nome: &nbsp;</label>
                <input size="27" type="text" name="nome" value="<?= $info['nome']; ?>"><br>

                <label>Idade: &nbsp;</label>
                <input style="width: 30px;" type="number" onKeypress="if(this.value.length==2) return false;"  name="idade" value="<?= $info['idade']; ?>"> anos <br>

                <label>Sexo: &nbsp;</label>

                <input type="radio" name="sexo" <?php if($info['sexo'] == 'Feminino') {?> checked  <?php } ?> value="Feminino">
                <label>Fem &nbsp;</label>

                <input type="radio" name="sexo" <?php if($info['sexo'] == 'Masculino') {?> checked  <?php } ?> value="Masculino">
                <label>Masc</label>
                <br>

                <label>Profissão: &nbsp;</label>
                <input size="27" type="text" name="profissao" value="<?= $info['profissao']; ?>">
                <br><br>

                <label>Estado civil: &nbsp;</label>
                <select name="estado_civil">

                    <option <?php if($info['estado_civil'] == 'Solteiro(a)') {?> selected <?php } ?> value="Solteiro(a)">Solteiro(a)</option>

                    <option <?php if($info['estado_civil'] == 'Casado(a)') {?> selected  <?php } ?> value="Casado(a)">Casado(a)</option>

                    <option <?php if($info['estado_civil'] == 'Divorciado(a)') {?> selected  <?php } ?> value="Divorciado(a)">Divorciado(a)</option>

                    <option <?php if($info['estado_civil'] == 'Namorando') {?> selected  <?php } ?> value="Namorando">Namorando</option>

                    <option <?php if($info['estado_civil'] == 'Enrolado(a)') {?> selected  <?php } ?> value="Enrolado(a)">Enrolado(a)</option>

                    <option <?php if($info['estado_civil'] == 'Outros') {?> selected  <?php } ?> value="Outros">Outros</option>

                </select>
                <br><br>

                <label>Cep: &nbsp;</label><br>
                <input type="number" onKeypress="if(this.value.length==8) return false;" id="cep" min="-999999999" max="999999999" name="cep" value="<?= $info['cep']; ?>"> 

                <input id="btn-consultar" style="padding: 2px;" type="button" onclick="consultaCep()" value="Consultar">

                <div name="endereco" style="padding: 15px 0px;" id="return"></div>

                <input id="btn-salvar" type="submit" name="salvar" value="Salvar">

                <a id="btn-voltar" href="cadastros.php">
                    Voltar
                </a>

            </form>

        </div>

    </div>

</body>

</html>