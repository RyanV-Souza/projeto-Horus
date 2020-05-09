<?php
    session_start();

    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $codigo = $_SESSION['codigo'];

    $result = mysqli_query($link, "select * from tb_modulo where cd_modulo = $codigo");

    $registros = array (
        'modulo' => array()
        );

    $i = 0;

    while($linha = mysqli_fetch_assoc($result)){
        $registros['modulo'][$i] = array(
            'numero' => $linha['ds_numeroModulo'],
            'codigo' =>$linha['cd_modulo']
        );

        $i++;
    };

    echo json_encode($registros);

