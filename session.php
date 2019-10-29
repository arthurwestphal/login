<?php
session_start();
require_once "configDB.php";

if (isset($_SESSION['nomeUsuario'])) { //logado
    $usuario = $_SESSION['nomeUsuario'];
    $sql = $connect->prepare("SELECT * FROM usuario WHERE nomeUsuario = ?");
    $sql->bind_param("s", $usuario);
    $sql->execute();
    $resultado = $sql->get_result();
    $linha = $resultado->fetch_array(MYSQLI_ASSOC);

    $nomeUsuario = $linha['nomeUsuario'];
    $nomeCompleto = $linha['nomeCompleto'];
    $emailUsuario = $linha['emailUsuario'];
    $dataCriado = $linha['dataCriado'];

    $dataCriado = date('d/m/Y', strtotime($dataCriado));
} else { //se não estiver logado redirecionar para index
    header("location: index.php");
}
