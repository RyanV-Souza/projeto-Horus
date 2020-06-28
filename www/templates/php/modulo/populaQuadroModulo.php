<?php
    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $query = 'select * from tb_modulo';

    $result = mysqli_query($link, $query);

    $registros = array (
        'modulo' => array()
        );

    $i = 0;

    while($linha = mysqli_fetch_assoc($result)){
        $registros['modulo'][$i] = array(
            'sigla' => $linha['sg_modulo'],
            'numeroModulo' => $linha['ds_numeroModulo'],
            'codigo' => $linha['cd_modulo'],
            'status' =>$linha['ds_statusModulo'],
            'semestre' => $linha['ds_semestre'],
            'ano' => $linha['dt_ano']
            
        );

        $i++;
    };

    echo json_encode($registros);