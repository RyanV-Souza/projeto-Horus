<?php
    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $sigla = $_POST["sigla"];
    $dataInicial = $_POST["dataInicial"];
    $dataFinal = $_POST["dataFinal"];
    
    mysqli_query($link, "insert into tb_modulo (sg_modulo, dt_inicial, dt_final, ds_statusModulo) values ('$nome', '$dataFinal', '$dataFinal', 'Ativado')");

    echo 'Registro Feito';
