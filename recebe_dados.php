<?php
//iniciando a sessão
session_start();

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
        $urlImagemPerfil = verificar_entrada($_POST['urlImagemPerfil']);

        //codificando as senha
        $senhaCodificada = sha1($senha);
        $senhaConfirmarCod = sha1($confirmarSenha);

        if ($senhaCodificada != $senhaConfirmarCod) {
            echo "<p class='text-danger'>Senhas não conferem</p>";
            exit();
        } else {
            //verifica se verifica no banco de dados
            $sql = $connect->prepare("SELECT nomeUsuario, emailUsuario FROM usuario WHERE nomeUsuario = ? OR emailUsuario = ?");
            $sql->bind_param("ss", $nome, $email);
            $sql->execute();
            $resultado = $sql->get_result();
            $linha = $resultado->fetch_array(MYSQLI_ASSOC);

            //verifica a existencia do usuario no banco
            if ($linha['nome'] == $nome) {
                echo "<p class='text-danger'>Usuario indisponivel</p>";
            } elseif ($linha['email'] == $email) {
                echo "<p class='text-danger'>Email indisponivel</p>";
            } else {
                $sql = $connect->prepare("INSERT into usuario (nomeUsuario, nomeCompleto, emailUsuario, senhaUsuario, dataCriado, urlImagemPerfil)
                values(?, ?, ?, ?, ?, ?)");
                $sql->bind_param("ssssss", $nome, $nomeCompleto, $email, $senhaCodificada, $dataCriado, $urlImagemPerfil);
                if ($sql->execute()) {
                    echo "<p class='text-success'>Usuario cadastrado</p>";
                } else {
                    echo "<p class='text-danger'>Usuario nao cadastrado</p>";
                    echo "<p class='text-danger'>Algo deu errado</p>";
                }
            }
        }
    } else if ($_POST['action'] == 'login') {
        $nomeUsuario = verificar_entrada($_POST['nomeUsuario']);
        $senhaUsuario = verificar_entrada($_POST['senhaUsuario']);
        $senha = sha1($senhaUsuario);
        $sql = $connect->prepare("SELECT * FROM usuario WHERE senhaUsuario = ? AND nomeUsuario = ?");
        $sql->bind_param("ss", $senha, $nomeUsuario);
        $sql->execute();
        $busca = $sql->fetch();

        if ($busca != null) {
            $_SESSION['nomeUsuario'] = $nomeUsuario;

            if (!empty($_POST['lembrar'])) { //se lebrar nao estiver vazaio
                setcookie("nomeUsuario", $nomeUsuario, time() + (60 * 60 * 24 * 30));
                setcookie("senhaUsuario", $senhaUsuario, time() + (60 * 60 * 24 * 30));
            } else { //a pessoa quer ser lembrada
                setcookie("nomeUsuario", "");
                setcookie("senhaUsuario", "");
            }
            echo "ok";
        } else {
            echo "<p class='text-danger'>";
            echo "Falhou o Login. Nome ou senha invalidos.";
            echo "</p>";
            exit();
        }
    } else if ($_POST['action'] == 'senha') {
        $email = verificar_entrada($_POST['emailGerarSenha']);
        $sql = $connect->prepare("SELECT idUsuario FROM usuario WHERE emailUsuario = ?");
        $sql->bind_param("s", $email);
        $sql->execute();
        $resposta = $sql->get_result();
        if ($resposta->num_rows > 0) {
            //echo "Email encontrado";
            $frase = "a1s2d3f4g5h6j7k8l9p0zxcvbnmqwertyuio";
            $palavra_secreta = str_shuffle($frase);
            $token = substr($palavra_secreta, 0, 10);
            //echo "Toke: $token";
            $sql = $connect->prepare("UPDATE usuario SET token=?, tempoDeVida=DATE_ADD(NOW(), INTERVAL 5 MINUTE) WHERE emailUsuario =?");
            $sql->bind_param("ss", $token, $email);
            $sql->execute();
            $link = "<a href='gerarSenha.php?email=$email&token=$token'>Clique Aqui para Gerar Nova Senha</a>";
            echo $link;
        } else {
            header("location:index.php");
        }
    }
}