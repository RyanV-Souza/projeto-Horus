<?php

    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $cpf = limpaCPF_CNPJ($_POST['cpf']);
    $rm = $_POST['rm'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];



    mysqli_query($link, "update tb_usuario set  ds_emailUsuario = '$email', ds_senha = MD5('$senha'), nr_cpf = '$cpf' where cd_rmUsuario = $rm");


    function limpaCPF_CNPJ($valor){
        $valor = preg_replace('/[^0-9]/', '', $valor);
           return $valor;
        }