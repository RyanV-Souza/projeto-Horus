<?php
    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $nome = $_POST["nome"];
    $rm = $_POST["rm"];
    $cpf = $_POST["cpf"];
    $codigo = $_POST["codigoModulo"];


    mysqli_query($link, "insert into tb_aluno(cd_rmAluno, nm_aluno, nr_cpf, ds_statusALuno, FK_cd_modulo) values ('$rm', '$nome', '$cpf', 'Ativado', $codigo)");

    echo 'Registro Feito';
