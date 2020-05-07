<?php

    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $sigla = $_POST['sigla'];
    $status = $_POST['status'];
    $codigo = $_POST['codigo'];

    mysqli_query($link, "update tb_campoestagio set nm_campoEstagio = '$nome', sg_campoEstagio = '$sigla', ds_enderecoEstagio = '$endereco', ds_statusCampoEstagio = '$status' where cd_campoEstagio = $codigo");
