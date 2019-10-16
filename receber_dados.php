<?php
//conexao com o DB
require_once 'configDB.php';
function verificar_entrada($entrada)
{
    $saida = htmlspecialchars($entrada);
    $saida = stripslashes($saida);
    $saida = trim($saida);
    return $saida; // retorna a saida limpa
}

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'cadastro') {
        #echo "\n<p>cadastro</p>\n";
        #echo "\n<pre>";
        #print_r($_POST);
        #echo "\n</pre>";
        $nomeCompleto = verificar_entrada($_POST['nomeCompleto']);
        $nome = verificar_entrada($_POST['nome']);
        $email = verificar_entrada($_POST['email']);
        $senha = verificar_entrada($_POST['senha']);
        $confirmarSenha = verificar_entrada($_POST['confirmarSenha']);
        $dataCriado = date("Y-m-d");

        //codificando as senha
        $senhaCodificada = sha1($senha);
        $senhaConfirmarCod = sha1($confirmarSenha);

        //teste de captura de dados
        // echo "<p>Nome Completo: $nomeCompleto </p>";
        // echo "<p>Nome de Usuario: $nome </p>";
        // echo "<p>Email: $email </p>";
        // echo "<p>Senha Codificada: $senhaCodificada </p>";
        // echo "<p>Data de Criação: $dataCriado </p>";
        if($senhaCodificada =/= $senhaConfirmarCod){
            echo "<p class='text-danger'>Senhas não conferem.</p>";
            exit();
        }else{
            //verifica se no banco de dados
            //existe no banco de dados
            $sql = $connect->prepare("SELECT nomeUsuario, emailUsuario FROM usuario WHERE nomeUsuario = ? OR emailUsuario = ?");
            $sql->bind_param("ss", $nome, $email);
            $sql->execute();
            $resultado = $sql->get_result();
            $linha = $resultado->fetch_array(MYSQLI_ASSOC);

            //verificando a existencia do usuario no banco
            if($linha['nome'] == $nome){
                echo "<p class='text-danger'>usuario indisponivel</p>";
            }elseif($linha['email'] == $email){
                echo"<p class='text-danger'> E-mail indisponivel </p>";
            }else{
                //Usuario pode ser cadastrado no banco de dados
                $sql = $connect->prepare("INSERT into usuario (nomeUsuario,nomeCompleto, emailUsuario, senhaUsuario, dataCriado)
                values(?, ?, ?, ?, ?");
                $sql->bind_param("sssss", $nome, $nomeCompleto, $email, $senhaCodificada,$dataCriado);
                if($sql->execute()){
                    echo "<p class='text-sucess'></p>";
                }else{
                    echo "<p class='text-danger'>Usuario nao Cadastrado</p>";
                }
                }
            }
        }
    } else if ($_POST['action'] == 'login') {
        echo "\n<p>login</p>\n";
        echo "\n<pre>";
        print_r($_POST);
        echo "\n</pre>";
    } else if ($_POST['action'] == 'senha') {
        echo "\n<p>senha</p>\n";
        echo "\n<pre>";
        print_r($_POST);
        echo "\n</pre>";
    } else {
        header("location:index.php");
    }
} else {
    header("location:index.php");
}