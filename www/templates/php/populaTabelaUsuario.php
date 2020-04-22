<?php
    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $query = 'select * from tb_usuario';

    $result = mysqli_query($link, $query);

    $registros = array (
        'usuario' => array()
        );

    $i = 0;

    while($linha = mysqli_fetch_assoc($result)){
        $registros['usuario'][$i] = array(
            'nome' => $linha['nm_usuario'],
            'cargo' => $linha['FK_cd_acesso'],
            'rm' => $linha['cd_rmUsuario']
        );

        $i++;
    };

    echo json_encode($registros);