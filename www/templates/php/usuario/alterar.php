<?php

    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $nome = $_POST['nome'];
    $rm = $_POST['rm'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $telefone = $_POST['telefone'];
    $cargo = $_POST['cargo'];

    mysqli_query($link, "update tb_usuario set nm_usuario = '$nome', FK_cd_acesso = $cargo, ds_emailUsuario = '$email', nr_telefoneUsuario = '$telefone', ds_statusUsuario = '$status' where cd_rmUsuario = $rm");
