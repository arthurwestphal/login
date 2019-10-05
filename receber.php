<?php

if (isset($_GET['nome'])) {

    echo "\n<pre>\n";
    print_r($_GET);
    echo "\n</pre>\n";

    print("\n<br><strong>Nome: </strong>");
    print("$_GET[nome]");

    print("\n<br><strong>Email: </strong>");
    print("$_GET[email]");

    print("\n<br><strong>Senha: </strong>");
    print("$_GET[senha]");

    print("\n<br><strong>Data de Nascimento:</strong>");
    print("$_GET[DataNascimento]");
}
//verifica se o metodo POST esta enviando dados v
if (isset($_POST['nome'])) {

    echo "\n<pre>\n";
    print_r($_POST);
    echo "\n</pre>\n";

    print("\n<br><strong>Nome: </strong>");
    print("$_POST[nome]");

    print("\n<br><strong>Email: </strong>");
    print("$_POST[email]");

    print("\n<br><strong>Senha: </strong>");
    print("$_POST[senha]");

    print("\n<br><strong>Data de Nascimento:</strong>");
    print("$_POST[DataNascimento]");
}
