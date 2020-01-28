<?php

//Capturar CNPJ
if (isset($_POST["cnpj"])) {
    $cnpj = $_POST["cnpj"];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.receitaws.com.br/v1/cnpj/".$cnpj);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $retorno = curl_exec($ch);
    curl_close($ch);

    $retorno = json_decode($retorno);

}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="src/css/bootstrap.css">

</head>
<body>
    <div class="container pt-5 forms">
        <form action="cadastro_empresa.php" method="post">
            <div class="form-row mb-3">
                <div class="col-md-3 ">
                    <input type="text" placeholder="Pesquisar empresa - CNPJ" class="form-control " name="cnpj">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success">buscar</button>
                </div>
            </div>
        </form>


        <form action="" method="post">

            <div class="form-row">
                <div class="col-md-5 mb-3">
                    <label>Nome empresa</label>
                    <input type="text" class="form-control" name="nome_empresa" placeholder="Nome" required value="<?php if (isset($retorno)) { echo $retorno->nome;}  ?>">
                </div>
                <div class="col-md-3 mb-3">
                    <label>CNPJ</label>
                    <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="CNPJ" value="<?php if (isset($retorno)) { echo $retorno->cnpj;}  ?>" required>
                </div>
               
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label>Endereço</label>
                    <input type="text" class="form-control" name="endereco" placeholder="Endereço" value="<?php if (isset($retorno)) { echo $retorno->logradouro;}  ?>" required>
                </div>
                <div class="col-md-1 mb-3">
                    <label>Número</label>
                    <input type="text" class="form-control" name="numero" placeholder="Número" value="<?php if (isset($retorno)) { echo $retorno->numero;}  ?>" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label>Bairro</label>
                    <input type="text" class="form-control" name="bairro" placeholder="Bairro" value="<?php if (isset($retorno)) { echo $retorno->bairro;}  ?>" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label>Cidade</label>
                    <input type="text" class="form-control" name="cidade" placeholder="Cidade" value="<?php if (isset($retorno)) { echo $retorno->municipio;}  ?>" required>
                </div>
                <div class="col-md-1 mb-3">
                    <label>Estado</label>
                    <input type="text" class="form-control" name="estado" placeholder="Estado" value="<?php if (isset($retorno)) { echo $retorno->uf;}  ?>" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label>CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" value="<?php if (isset($retorno)) { echo $retorno->cep;}  ?>" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label>Telefone</label>
                    <input type="text" class="form-control" name="telefone" placeholder="Telefone" value="<?php if (isset($retorno)) { echo $retorno->telefone;}  ?>" >
                </div>
                <div class="col-md-4 mb-3">
                    <label>E-mail</label>
                    <input type="text" class="form-control" name="email" placeholder="E-mail" value="<?php if (isset($retorno)) { echo $retorno->email;}  ?>" >
                </div>

            </div>
           
            <button class="btn btn-primary" name="insertemp" type="submit">Cadastrar</button>
        </form>
    </div>
    <script src="src/js/jquery.js"></script>
    <script src="src/js/jquery.maskedinput.js"></script>
    <script src="src/js/main.js"></script>
</body>
</html>

