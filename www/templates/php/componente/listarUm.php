<?php
    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $codigo = $_POST['codigo'];

    $result = mysqli_query($link, "select * from tb_componentecurricular where cd_componente = $codigo");

    $registros = array (
        'componente' => array()
        );

    $i = 0;

    while($linha = mysqli_fetch_assoc($result)){
        $registros['componente'][$i] = array(
            'nome' => $linha['nm_componente'],
            'hora' => $linha['ds_duracaoComponente'],
            'modulo' =>$linha['ds_restricaoModulo'],
            'codigo' =>$linha['cd_componente']
        );

        $i++;
    };

    echo json_encode($registros);

