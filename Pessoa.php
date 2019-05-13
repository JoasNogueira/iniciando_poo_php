<?php
require_once 'classes/Pessoa.php';
session_start();



    function cadastrarPessoa(){
        $pessoa = new Pessoa();
        
        if (isset($_POST['nome'])){
            $pessoa->setNome($_POST['nome']);
        }
        if (isset($_POST['nasc'])) {
            $pessoa->setNasc($_POST['nasc']);
        }
        if (isset($_POST['endereco'])) {
            $pessoa->setEndereco($_POST['endereco']);
        }
        if (isset($_POST['cpf'])) {
            $pessoa->setCpf($_POST['cpf']);
        }
        
        if (isset($_SESSION['pessoas'])){
            $pessoas = $_SESSION['pessoas'];
            $pessoas[] = $pessoa;
            $_SESSION['pessoas'] = $pessoas;
        }else {
            $pessoas = array();
            $pessoas[] = $pessoa;
            $_SESSION['pessoas'] = $pessoas;
        }
    }
if (isset($_POST['acao'])&&$_POST['acao'] = 'cadastrar'){
    cadastrarPessoa();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <title>Pessoa</title>
</head>
<body>
    <?php if(!isset($_POST['acao'])){ ?>
    <form method="post">
        <div style="margin-top: 200px; margin-left: 570px;">
            Nome:<input class="form-group" type="text" name="nome" id="nome" placeholder="Escreva seu nome"/><br/>
            Cpf:<input class="form-group" type="number" name="cpf" id="cpf" placeholder="Digite seu cpf" /><br/>
            Data de Nacimento:<input class="form-group" type="date" name="nasc" id="nasc" /><br>
            Endereço:<input class="form-group" type="text" name="endereco" id="endereco" placeholder="Insira o seu endereço" /><br>
            <input class="form-group" type="hidden" name="acao" id="acao" value="cadastrar" />
            <br>
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </div>
    </form>
    <?php } else if($_POST['acao'] = 'cadastrar' || $_POST['acao'] = 'listar'){ ?>
    <div>
        <tr>
        <?php
        $pessoas = $_SESSION['pessoas'];
        foreach ($pessoas as $p){
            echo '<td>'.$p->getNome().'<br>';
            echo $p->getCpf().'<br>';
            echo $p->getNasc().'<br>';
            echo $p->getEndereco().'</td>';
        } ?>
        </tr>
    </div>
    <a class="btn btn-success"role="button" href="http://localhost/iniciando_poo_php/Pessoa.php">Voltar</a>
    <?php } ?>
</body>
</html>