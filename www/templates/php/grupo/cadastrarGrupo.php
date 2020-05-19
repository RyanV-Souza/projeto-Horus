<?php
    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $codigo = $_POST['codigoModulo'];
    $rmAlunos = $_POST['rmAlunos'];
    $nomeGrupo = $_POST['nomeGrupo'];
    $siglaGrupo = $_POST['siglaGrupo'];

    $rmAlunos2 = implode(',', $rmAlunos);

    mysqli_query($link, "insert into tb_grupoSala (sg_grupoSala, FK_cd_modulo, nm_grupoSala, ds_statusGrupo) values ('$siglaGrupo', $codigo, '$nomeGrupo', 'Ativado')");

    $id = mysqli_insert_id($link);
    var_dump($id);
    
    $arrayAluno = explode(",", $rmAlunos2);

    $tamanhoArray = count($arrayAluno);
    $x = 0;
    $query = '';

    for($x; $x < $tamanhoArray; $x++){
        $query .= "update tb_aluno set FK_cd_grupoSala = $id where cd_rmAluno =". $arrayAluno[$x] . ";";
    }

    mysqli_multi_query($link, $query);




    