<?php
    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $nome = $_POST["nome"];
    $rm = $_POST["RM"];
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];
    $cargo = $_POST["cargo"];

    $cpfLimpo = limpaCPF_CNPJ($cpf);

    mysqli_query($link, "insert into tb_usuario (nm_usuario, cd_rmUsuario, ds_emailUsuario, nr_cpf, FK_cd_acesso, ds_statusUsuario, ds_senha) values ('$nome', $rm, '$email', '$cpfLimpo', $cargo,'Ativado', MD5('etec123'));");

    echo 'Registro Feito';


    
    function limpaCPF_CNPJ($valor){
        $valor = preg_replace('/[^0-9]/', '', $valor);
           return $valor;
        }