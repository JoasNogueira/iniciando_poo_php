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
    <title>Pessoa</title>
</head>
<body>
    <?php if(!isset($_POST['acao'])){ ?>
    <form method="post">
        <div>
            Nome:<input type="text" name="nome" id="nome" placeholder="Escreva seu nome"/><br/>
            Cpf:<input type="number" name="cpf" id="cpf" placeholder="Digite seu cpf" /><br/>
            Data de Nacimento:<input type="date" name="nasc" id="nasc" /><br>
            Endereço:<input type="text" name="endereco" id="endereco" placeholder="Insira o seu endereço" /><br>
            <input type="hidden" name="acao" id="acao" value="cadastrar" />
            <br>
            <button type="submit">Cadastrar</button>
        </div>
    </form>
    <?php } else if($_POST['acao'] = 'cadastrar' || $_POST['acao'] = 'listar'){ ?>
    <div>
        <ul>
        <?php
        $pessoas = $_SESSION['pessoas'];
        foreach ($pessoas as $p){
            echo '<li>'.$p->getNome().'<br>';
            echo $p->getCpf().'<br>';
            echo $p->getNasc().'<br>';
            echo $p->getEndereco().'</li>';
        } ?>
        </ul>
    </div>
    <?php } ?>
</body>
</html>