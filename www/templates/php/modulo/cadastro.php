<?php
    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $sigla = $_POST["sigla"];
    $dataInicial = $_POST["dataInicial"];
    $dataFinal = $_POST["dataFinal"];
    $numeroModulo = $_POST['numeroModulo'];
    
    mysqli_query($link, "insert into tb_modulo (sg_modulo, dt_inicial, dt_final, ds_statusModulo, ds_numeroModulo) values ('$sigla', '$dataFinal', '$dataFinal', 'Ativado', '$numeroModulo')");

    echo 'Registro Feito';
