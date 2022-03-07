<?php
require 'assets.php';
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

<body style="background: url('<?= $background_fundo; ?>') no-repeat; background-size: cover;">

    <div id="layout" class="container-fluid">

        <div id="campos" class="row p-0">
    
            <div style="background: url('<?= $background_form; ?>') no-repeat; background-size: cover;" id="header" class="col col-md-12">
                <h2>Cadastro de Usuários</h2>
            </div>

            <form style="background: url('<?= $background_form; ?>') no-repeat; background-size: cover;" method="POST" action="cadastrar_action.php">

                <label>Nome: &nbsp;</label>
                <input size="27" type="text" name="nome"> <br>

                <label>Idade: &nbsp;</label>
                <input style="width: 30px;" type="number" onKeypress="if(this.value.length==2) return false;" name="idade"> anos <br>

                <label>Sexo: &nbsp;</label>

                <input type="radio" name="sexo" value="Feminino">
                <label>Fem &nbsp;</label>

                <input type="radio" name="sexo" value="Masculino">
                <label>Masc</label>
                <br>

                <label>Profissão: &nbsp;</label>
                <input size="27" type="text" name="profissao">
                <br><br>

                <label>Estado civil: &nbsp;</label>
                <select name="estado_civil">
                    <option value="Solteiro">Solteiro(a)</option>
                    <option value="Casado(a)">Casado(a)</option>
                    <option value="Divorciado(a)">Divorciado(a)</option>
                    <option value="Namorando">Namorando</option>
                    <option value="Enrolado(a)">Enrolado(a)</option>
                    <option value="Outros">Outros</option>
                </select>
                <br><br>

                <label>Cep: &nbsp;</label><br>
                <input type="number" onKeypress="if(this.value.length==8) return false;" id="cep" min="-999999999" max="999999999" name="cep">

                <input id="btn-consultar" style="padding: 2px;" type="button" onclick="consultaCep()" value="Consultar">

                <div name="endereco" style="padding: 15px 0px;" id="return"></div>

                <input id="btn-cadastrar" type="submit" name="cadastrar" value="Cadastrar">

                <a id="btn-visualizar" href="cadastros.php">
                    Visualizar
                </a>

            </form>

        </div>

    </div>

</body>

</html>