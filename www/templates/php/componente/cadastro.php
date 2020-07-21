<?php
    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $nome = $_POST["nome"];
    $hora = $_POST["hora"];
    $modulo = $_POST["modulo"];
    $local = $_POST['local'];
    

    mysqli_query($link, "insert into tb_componentecurricular (nm_componente, ds_duracaoComponente, ds_statusComponente, ds_restricaoModulo) values ('$nome', $hora, 'Ativado', '$modulo')");

    $id = mysqli_insert_id($link);

    mysqli_query($link, "insert into tb_componentecampoestagio (FK_cd_componente, FK_cd_campoEstagio) values ($id, $local)");

