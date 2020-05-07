<?php
    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $query = 'select tb_usuario.nm_usuario, tb_usuario.cd_rmUsuario, tb_nivelacesso.nm_nivel, tb_usuario.ds_statusUsuario from tb_usuario, tb_nivelacesso  where tb_usuario.FK_cd_acesso = tb_nivelacesso.cd_acesso ORDER BY tb_usuario.nm_usuario ASC;';

    $result = mysqli_query($link, $query);

    $registros = array (
        'usuario' => array()
        );

    $i = 0;

    while($linha = mysqli_fetch_assoc($result)){
        $registros['usuario'][$i] = array(
            'nome' => $linha['nm_usuario'],
            'cargo' => $linha['nm_nivel'],
            'rm' => $linha['cd_rmUsuario'],
            'status' =>$linha['ds_statusUsuario']
        );

        $i++;
    };

    echo json_encode($registros);