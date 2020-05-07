<?php
    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $codigo = $_POST['codigo'];

    $result = mysqli_query($link, "select * from tb_campoestagio where cd_campoEstagio = $codigo");

    $registros = array (
        'campo' => array()
        );

    $i = 0;

    while($linha = mysqli_fetch_assoc($result)){
        $registros['campo'][$i] = array(
            'nome' => $linha['nm_campoEstagio'],
            'endereco' => $linha['ds_enderecoEstagio'],
            'sigla' =>$linha['sg_campoEstagio'],
            'codigo' =>$linha['cd_campoEstagio']
        );

        $i++;
    };

    echo json_encode($registros);

