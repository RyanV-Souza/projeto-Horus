<?php
    session_start();

    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $codigoModulo = $_POST['codigoModulo'];
    $codigoProfessor = $_POST['codigoProfessor'];
    $codigoTabela = $_SESSION['codigoComponente'];

    $result = mysqli_query($link, "insert into tb_componentecampoestagioprofessor  (FK_cd_professor, FK_cd_componentecampoestagio) values  ($codigoProfessor, $codigoTabela)");
    
    $id = mysqli_insert_id($link);

    mysqli_query($link, "insert into tb_componentecampoestagioprofessor_modulo (FK_cd_componenteCampoEstagioProfessor, FK_cd_modulo) values ($id, $codigoModulo);");
    

    
    echo 'Registro Feito';
