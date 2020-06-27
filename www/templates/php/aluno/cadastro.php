<?php
    session_start();
    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $nome = $_POST["nome"];
    $rm = $_POST["rm"];
    $cpf = $_POST["cpf"];
    $codigoModulo = $_SESSION["codigoModulo"];
    $codigoGrupo = $_SESSION['codigoGrupo'];

    $cpfLimpo = limpaCPF_CNPJ($cpf);


    mysqli_query($link, "insert into tb_aluno(cd_rmAluno, nm_aluno, nr_cpf, ds_statusALuno, FK_cd_modulo, FK_cd_grupoSala) values ('$rm', '$nome', '$cpfLimpo', 'Ativado', $codigoModulo, $codigoGrupo)");

    echo 'Registro Feito';

    function limpaCPF_CNPJ($valor){
        $valor = preg_replace('/[^0-9]/', '', $valor);
           return $valor;
        }