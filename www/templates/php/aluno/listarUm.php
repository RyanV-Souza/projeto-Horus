<?php

    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $codigo = $_POST['codigo'];

    $query = "select * from tb_aluno where cd_rmAluno = $codigo";

    $result = mysqli_query($link, $query);

    $registros = array (
        'aluno' => array()
        );

    $i = 0;

    while($linha = mysqli_fetch_assoc($result)){
        $registros['aluno'][$i] = array(
            'nome' => $linha['nm_aluno'],
            'rm' => $linha['cd_rmAluno']

        );

        $i++;
    };

    echo json_encode($registros);