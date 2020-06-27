<?php
    session_start();
    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    
        $rm = $_SESSION['usuarioLogin'];

        $result = mysqli_query($link, "select * from tb_usuario where cd_rmUsuario = $rm");

        $registros = array (
            'perfil' => array()
            );

        $i = 0;

        while($linha = mysqli_fetch_assoc($result)){
            $registros['perfil'][$i] = array(
                'nome' => $linha['nm_usuario'],
                'rm' => $linha['cd_rmUsuario'],
                'cpf' => $linha['nr_cpf'],
                'email' => $linha['ds_emailUsuario'],
                'senha' => $linha['ds_senha']

            );

            $i++;
        };

        echo json_encode($registros);
    

    