<?php

    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $nome = $_POST['nome'];
    $modulo = $_POST['modulo'];
    $hora = $_POST['hora'];
    $status = $_POST['status'];
    $codigo = $_POST['codigo'];
    $local = $_POST['local'];

    mysqli_multi_query($link, "update tb_componentecurricular set nm_componente = '$nome', ds_duracaoComponente = '$hora', ds_statusComponente = '$status', ds_restricaoModulo = '$modulo' where cd_componente = $codigo; update  tb_componentecampoestagiocronograma set FK_cd_campoEstagio = $local where FK_cd_componente = $codigo");