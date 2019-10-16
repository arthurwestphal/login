<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
    <title>Sistema de Login</title>

    <style>
        #alerta,
        #caixaSenha,
        #caixaRegistro {
            display: none;
        }
    </style>
</head>

<body class="bg-dark">
    <main class="container mt-4">
        <section class="row">
            <div class="col-lg-4 offset-lg-4" id="alerta">
                <div class="alert alert-success text-center">
                    <strong class="resultado">

                    </strong>
                </div>
            </div>
        </section>

        <!-- Formulário de login v -->
        <section calss="row">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" name="caixaLogin" id="caixaLogin">
                <h2 class="text-center mt-2">
                    Entrar no Sistema
                </h2>

                <form action="#" method="post" class="p-2" id="formLogin">
                    <div class="form-group">
                        <input type="text" name="nomeUsuario" id="nomeUsuario" placeholder="Nome de Usuário" class="form-control" required minlength="5">
                    </div>

                    <div class="form-group">
                        <input type="password" name="senhaUsuario" id="senhaUsuario" id="senhaUsuario" placeholder="Senha" class="form-control" required minlength="6">
                    </div>

                    <div class="form-group mt-4">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="lembrar" id="lembrar" class="custom-control-input">
                            <label for="lembrar" class="custom-control-label">Lembre-se de mim</label>
                            <a href="#" class="float-right" id="btnEsqueci">Esqueci a senha</a>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Entrar" name="btnEntrar" id="btnEntrar" class="btn btn-primary btn-block">
                    </div>

                    <div class="form-group">
                        <p clas="text-center">Novo usuário? <a href="#" id="btnRegistrarNovo">Registre-se aqui</a></p>
                    </div>
                </form>
            </div>
        </section>
        <!-- Formulário de login ^ -->

        <!-- Formulário de recuperação de senha v -->
        <section class="row mt-5">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" name="caixaSenha" id="caixaSenha">
                <h2 class="text-center mt-2">Gerar Nova Senha</h2>

                <form action="#" method="post" id="formSenha" class="p-2">
                    <div class="form-group">
                        <small class="text-muted">Para gerar uma nova senha digite o seu email. Clique no link gerado.</small>
                    </div>

                    <div class="form-group">
                        <input type="email" name="emailGerarSenha" id="emailGerarSenha" class="form-control" placeholder="Email de recuperação de senha" required>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Gerar" name="btnGerar" id="btnGerar" class="btn btn-primary btn-block">
                    </div>

                    <div class="form-group">
                        <p class="text-center">Já registrado? <a href="#" id="btnJaRegistrado">Entrar por aqui</a></p>
                    </div>
                </form>
            </div>
        </section>
        <!-- Formulário de recuperação de senha ^ -->

        <!-- Formulario de cadastro de novos usuarios v -->
        <section class="row mt-5">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="caixaRegistro">
                <h2 class="text-center mt-2">Registre-se aqui</h2>
                <form action="#" method="post" class="p-2" id="formRegistro">
                    <div class="form-group">
                        <input type="text" name="nomeCompleto" id="nomeCompleto" class="form-control" placeholder="Nome Completo" required minlength="6">
                    </div>
                    <div class="form-group">
                        <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome de Usuário" required minlength="5">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" required minlength="6">
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirmarSenha" id="confirmarSenha" class="form-control" placeholder="Confirmar senha" required minlength="6">
                    </div>
                    <div class="form-group mt-4">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="concordar" id="concordar" class="custom-control-input">
                            <label for="concordar" class="custom-control-label">Eu concordo com os <a href="#">termos e condições.</a></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Registrar" name="btnRegistrar" id="btnRegistrar" class="btn btn-primary btn-block">
                    </div>
                    <div class="form-group">
                        <p class="text-center">Já registrado? <a href="#" id="btnJaRegistrado2">Entrar por aqui</a></p>
                    </div>
                </form>
            </div>
        </section>
        <!-- Formulario de cadastro de novos usuarios ^ -->

    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script>
        $(function() {
            //Validação de fromularios v
            jQuery.validator.setDefaults({
                success: "valid"
            });
            $("#formRegistro").validate({
                rules: {
                    senha: "required",
                    confirmarSenha: {
                        equalTo: "#senha"
                    }
                }
            });

            $("#formLogin").validate();
            $("#formSenha").validate();
            //Validação de fromularios ^

            //jQuery para mostrar e ocultar formulários v
            $("#btnEsqueci").click(function() {
                $("#caixaLogin").hide();
                $("#caixaSenha").show();
            });

            $("#btnRegistrarNovo").click(function() {
                $("#caixaLogin").hide();
                $("#caixaRegistro").show();
            });

            $("#btnJaRegistrado").click(function() {
                $("#caixaSenha").hide();
                $("#caixaLogin").show();
            });

            $("#btnJaRegistrado2").click(function() {
                $("#caixaRegistro").hide();
                $("#caixaLogin").show();
            });

            //Cadastro de novo usuario
            $("#btnRegistrar").click(function(e) {
                if (document.querySelector("#formRegistro").checkValidity()) {
                    e.preventDefault(); //não abrir outra pagina
                    $.ajax({ //envio dos dados via ajax
                        url: 'recebe_dados.php',
                        method: 'post',
                        data: $("#formRegistro").serialize() + '&action=cadastro',
                        success: function(resposta) {
                            $("#alerta").show();
                            $(".resultado").html(resposta);
                        }
                    });
                }
                return true;
            });

            //Login
            $("#btnEntrar").click(function(e) {
                if (document.querySelector("#formLogin").checkValidity()) {
                    e.preventDefault(); //não abrir outra pagina
                    $.ajax({ //envio dos dados via ajax
                        url: 'recebe_dados.php',
                        method: 'post',
                        data: $("#formLogin").serialize() + '&action=login',
                        success: function(resposta) {
                            $("#alerta").show();
                            $(".resultado").html(resposta);
                        }
                    });
                }
                return true;
            });

            //Recuperacao de senha
            $("#btnGerar").click(function(e) {
                if (document.querySelector("#formSenha").checkValidity()) {
                    e.preventDefault(); //não abrir outra pagina
                    $.ajax({ //envio dos dados via ajax
                        url: 'recebe_dados.php',
                        method: 'post',
                        data: $("#formSenha").serialize() + '&action=senha',
                        success: function(resposta) {
                            $("#alerta").show();
                            $(".resultado").html(resposta);
                        }
                    });
                }
                return true;
            });

        });
        //jQuery para mostrar e ocultar formulários ^

        jQuery.extend(jQuery.validator.messages, {
            required: "Este campo &eacute; requerido.",
            remote: "Por favor, corrija este campo.",
            email: "Por favor, forne&ccedil;a um endere&ccedil;o eletr&ocirc;nico v&aacute;lido.",
            url: "Por favor, forne&ccedil;a uma URL v&aacute;lida.",
            date: "Por favor, forne&ccedil;a uma data v&aacute;lida.",
            dateISO: "Por favor, forne&ccedil;a uma data v&aacute;lida (ISO).",
            number: "Por favor, forne&ccedil;a um n&uacute;mero v&aacute;lido.",
            digits: "Por favor, forne&ccedil;a somente d&iacute;gitos.",
            creditcard: "Por favor, forne&ccedil;a um cart&atilde;o de cr&eacute;dito v&aacute;lido.",
            equalTo: "Por favor, forne&ccedil;a o mesmo valor novamente.",
            accept: "Por favor, forne&ccedil;a um valor com uma extens&atilde;o v&aacute;lida.",
            maxlength: jQuery.validator.format("Por favor, forne&ccedil;a n&atilde;o mais que {0} caracteres."),
            minlength: jQuery.validator.format("Por favor, forne&ccedil;a ao menos {0} caracteres."),
            rangelength: jQuery.validator.format("Por favor, forne&ccedil;a um valor entre {0} e {1} caracteres de comprimento."),
            range: jQuery.validator.format("Por favor, forne&ccedil;a um valor entre {0} e {1}."),
            max: jQuery.validator.format("Por favor, forne&ccedil;a um valor menor ou igual a {0}."),
            min: jQuery.validator.format("Por favor, forne&ccedil;a um valor maior ou igual a {0}.")
        });
    </script>
</body>


</html>