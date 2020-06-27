<?php
    session_start();

    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $codigo = $_SESSION['codigoModulo'];

    $query = "select * from tb_gruposala where FK_cd_modulo = $codigo";

    $result = mysqli_query($link, $query);

    $registros = array (
        'grupo' => array(
            "codigoModulo" => $codigo
        )
        );

    $i = 0;

    while($linha = mysqli_fetch_assoc($result)){
        $registros['grupo'][$i] = array(
            'sigla' => $linha['sg_grupoSala'],
            'codigo' => $linha['cd_grupoSala'],
            'nome' =>$linha['nm_grupoSala'],
            'status' =>$linha['ds_statusGrupo']
        );

        $i++;
    };

    echo json_encode($registros);