<?php

    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $nome = $_POST['nome'];
    $rm = $_POST['rm'];
    $grupo = $_POST['grupo'];
    $status = $_POST['status'];

    mysqli_query($link, "update tb_aluno set nm_aluno = '$nome', FK_cd_grupoSala = $grupo, ds_statusALuno = '$status' where cd_rmAluno = $rm");
