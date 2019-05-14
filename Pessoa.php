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
if (isset($_GET['acao'])&&$_GET['acao'] == 'cadastrar'){
    cadastrarPessoa();
    header('Location: pessoa.php?acao=listar');
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
    <?php if(!isset($_GET['acao'])){ ?>
    <div style="margin-top: 200px; margin-left: 570px; width: 400px; border: solid 1px; padding: 20px; box-shadow: 1px 1px 3px brown; border-radius: 5px;">
        <form method="post" action="pessoa.php?acao=cadastrar">
            Nome:<input class="form-control" type="text" name="nome" id="nome" placeholder="Escreva seu nome"/><br/>
            Cpf:<input class="form-control" type="text" maxlength="14" name="cpf" id="cpf" placeholder="Digite seu cpf" /><br/>
            Data de Nacimento:<input class="form-control" type="date" name="nasc" id="nasc" /><br>
            Endereço:<input class="form-control" type="text" name="endereco" id="endereco" placeholder="Insira o seu endereço" /><br>
            <br>
            <button type="submit" class="btn btn-success" >Cadastrar</button>
            <a class="btn btn-primary" href="pessoa.php?acao=listar">Listar</a>
    </form>
    </div>
    <?php } else if($_GET['acao'] = 'cadastrar' || $_GET['acao'] = 'listar'){ ?>
    <div style="width: 60%; margin: 100px auto;">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Cpf</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Endereço</th>
                </tr>
            </thead>
            <tbody>
        <?php
        $pessoas = $_SESSION['pessoas'];
        foreach ($pessoas as $p){
            echo '<tr>';
            echo '<td>'.$p->getNome().'</td>';
            echo '<td>'.$p->getCpf().'</td>';
            echo '<td>'.$p->getNasc().'</td>';
            echo '<td>'.$p->getEndereco().'</td>';
            echo '</tr>';
        } ?>
            </tbody>
        </table>
        <a class="btn btn-success"role="button" href="Pessoa.php">Voltar</a>
    </div>
    
    <?php } ?>
</body>
</html>