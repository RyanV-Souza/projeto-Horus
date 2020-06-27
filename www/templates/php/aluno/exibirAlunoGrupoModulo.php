<?php
    session_start();
    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $codigoModulo = $_SESSION['codigoModulo'];
    $codigoGrupo = $_SESSION['codigoGrupo'];

    $query = "select tb_aluno.nm_aluno, tb_aluno.cd_rmAluno, tb_aluno.ds_statusALuno, tb_gruposala.nm_grupoSala from tb_aluno, tb_gruposala where tb_aluno.FK_cd_modulo = $codigoModulo and tb_aluno.FK_cd_grupoSala = $codigoGrupo and tb_aluno.FK_cd_grupoSala = tb_gruposala.cd_grupoSala;";

    $result = mysqli_query($link, $query);

    $registros = array (
        'aluno' => array()
        );

    $i = 0;

    while($linha = mysqli_fetch_assoc($result)){
        $registros['aluno'][$i] = array(
            'nome' => $linha['nm_aluno'],
            'rm' => $linha['cd_rmAluno'],
            'status' => $linha['ds_statusALuno'],
            'nomeGrupo' => $linha['nm_grupoSala'],
        );

        $i++;
    };

    echo json_encode($registros);