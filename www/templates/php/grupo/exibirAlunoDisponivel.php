<?php
    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $codigo = $_POST['codigoModulo'];

    $query = "select * from tb_aluno where FK_cd_modulo = $codigo and FK_cd_grupoSala is null";

    $result = mysqli_query($link, $query);

    $registros = array (
        'aluno' => array()
        );

    $i = 0;

    while($linha = mysqli_fetch_assoc($result)){
        $registros['aluno'][$i] = array(
            'nome' => $linha['nm_aluno'],
            'codigo' =>$linha['cd_rmAluno']
        );

        $i++;
    };

    echo json_encode($registros);