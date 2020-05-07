<?php
    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $query = 'select * from tb_campoestagio order by nm_campoEstagio ASC;';

    $result = mysqli_query($link, $query);

    $registros = array (
        'campo' => array()
        );

    $i = 0;

    while($linha = mysqli_fetch_assoc($result)){
        $registros['campo'][$i] = array(
            'nome' => $linha['nm_campoEstagio'],
            'sigla' => $linha['sg_campoEstagio'],
            'status' => $linha['ds_statusCampoEstagio'],
            'codigo' => $linha['cd_campoEstagio']
        );

        $i++;
    };

    echo json_encode($registros);