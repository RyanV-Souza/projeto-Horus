<?php
    session_start();

    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $codigoModulo = $_POST['codigoModulo'];
    $codigoProfessor = $_POST['codigoProfessor'];
    $codigoTabela = $_SESSION['codigoComponente'];

    $result = mysqli_multi_query($link, "update tb_componentecampoestagioprofessor set FK_cd_professor = $codigoProfessor where cd_componentecampoestagioprofessor = $codigoTabela;insert into tb_componentecampoestagioprofessor_modulo (FK_cd_componenteCampoEstagioProfessor, FK_cd_modulo) values ($codigoTabela, $codigoModulo)");
    
    

    
    echo 'Registro Feito';
