<?php

    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $nome = $_POST["nome"];
    $hora = $_POST["hora"];
    $modulo = $_POST["local"];
    

    mysqli_query($link, "insert into tb_campoestagio (nm_campoEstagio, sg_campoEstagio, ds_enderecoEstagio, ds_statusCampoEstagio) values ('$nome', '$sigla', '$endereco', 'Ativado')");

