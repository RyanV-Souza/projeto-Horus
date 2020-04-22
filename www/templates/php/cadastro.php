<?php
    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $nome = $_POST["nome"];
    $rm = $_POST["RM"];
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];
    $cargo = $_POST["cargo"];
    $telefone = $_POST["telefone"];


    mysqli_query($link, "insert into tb_usuario (nm_usuario, cd_rmUsuario, ds_emailUsuario, nr_cpf, FK_cd_acesso, nr_telefoneUsuario, ds_statusUsuario) values ('$nome', $rm, '$email', '$cpf', $cargo, '$telefone', 'Ativado')");

    echo 'Registro Feito';
