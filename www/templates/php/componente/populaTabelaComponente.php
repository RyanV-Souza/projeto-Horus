<?php
    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $query = 'select * from tb_componentecurricular order by nm_componente ASC;';

    $result = mysqli_query($link, $query);

    $registros = array (
        'componente' => array()
        );

    $i = 0;

    while($linha = mysqli_fetch_assoc($result)){
        $registros['componente'][$i] = array(
            'nome' => $linha['nm_componente'],
            'carga' => $linha['ds_duracaoComponente'],
            'modulo' => $linha['ds_restricaoModulo'],
            'status' => $linha['ds_statusComponente'],
            'codigo' => $linha['cd_componente']
        );

        $i++;
    };

    echo json_encode($registros);