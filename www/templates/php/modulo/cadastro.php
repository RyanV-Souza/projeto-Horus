<?php
    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $sigla = $_POST["sigla"];
    $semestre = $_POST["semestre"];
    $ano = $_POST["ano"];
    $numeroModulo = $_POST['numeroModulo'];
    
    mysqli_query($link, "insert into tb_modulo (sg_modulo, dt_ano, ds_semestre, ds_statusModulo, ds_numeroModulo) values ('$sigla', '$ano', '$semestre', 'Ativado', '$numeroModulo')");

    echo 'Registro Feito';
