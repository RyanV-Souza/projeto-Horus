<?php
    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $RM = $_POST['RM'];

    $result = mysqli_query($link, "select * from tb_usuario where cd_rmUsuario = $RM");

    $registros = array (
        'usuario' => array()
        );

    $i = 0;

    while($linha = mysqli_fetch_assoc($result)){
        $registros['usuario'][$i] = array(
            'nome' => $linha['nm_usuario'],
            'rm' => $linha['cd_rmUsuario'],
            'email' =>$linha['ds_emailUsuario'],
            'telefone' =>$linha['nr_telefoneUsuario']
        );

        $i++;
    };

    echo json_encode($registros);

