<?php
    session_start();
    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $codigo = $_POST['codigo'];

    $query = "select tb_campoestagio.nm_campoEstagio, tb_componentecampoestagioprofessor.cd_componentecampoestagioprofessor from tb_componentecampoestagioprofessor, tb_campoestagio where tb_componentecampoestagioprofessor.FK_cd_componente = $codigo and tb_componentecampoestagioprofessor.FK_cd_campoEstagio = tb_campoestagio.cd_campoEstagio";

    $result = mysqli_query($link, $query);

    $registros = array (
        'campo' => array()
        );

    $i = 0;

    while($linha = mysqli_fetch_assoc($result)){
        $registros['campo'][$i] = array(
            'nome' => $linha['nm_campoEstagio'],
            'codigo' => $linha['cd_componentecampoestagioprofessor']
            
        );
        
        $i++;
    };

    $_SESSION['codigoComponente'] = $registros['campo'][0]['codigo'];
    
    echo json_encode($registros);