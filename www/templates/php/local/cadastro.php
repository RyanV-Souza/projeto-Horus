<?php

    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $nome = $_POST["nome"];
    $endereco = $_POST["endereco"];
    $sigla = $_POST["sigla"];
    

    mysqli_query($link, "insert into tb_campoestagio (nm_campoEstagio, sg_campoEstagio, ds_enderecoEstagio, ds_statusCampoEstagio) values ('$nome', '$sigla', '$endereco', 'Ativado')");

