<?php
    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $sigla = $_POST["sigla"];
    $semestre = $_POST["semestre"];
    $ano = $_POST["ano"];
    $numeroModulo = $_POST['numeroModulo'];

    mysqli_query($link, "insert into tb_cronograma (cd_cronograma, ds_diretorioArquivo) values (null, null)");
    $id = mysqli_insert_id($link);
    mysqli_query($link, "insert into tb_modulo (sg_modulo, dt_ano, ds_semestre, ds_statusModulo, ds_numeroModulo, FK_cd_cronograma) values ('$sigla', '$ano', '$semestre', 'Ativado', '$numeroModulo', $id)");

    echo 'Registro Feito';
