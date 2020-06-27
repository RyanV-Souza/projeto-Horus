<?php
    session_start();

    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $arquivo = $_FILES['file']['tmp_name'];
    $nome = $_FILES['file']['name'];
    $codigoModulo = $_SESSION['codigoModulo'];

    echo $codigoModulo;

    $ext = explode(".", $nome);

    $extensao = end($ext);

    if($extensao != "CSV"){
        echo "Extensão inválida";
    } else {
        $objeto = fopen($arquivo, 'r');

        while(($dados = fgetcsv($objeto, 1000, ';')) !== FALSE){
            
            $rm = utf8_encode($dados[0]);
            $nome = utf8_encode($dados[1]);
            $cpf = utf8_encode($dados[2]);

            $cpfLimpo = limpaCPF_CNPJ($cpf);

            $result = mysqli_query($link, "insert into tb_aluno (cd_rmAluno, nm_aluno, nr_cpf, ds_statusALuno, FK_cd_modulo ) values ($rm, '$nome', '$cpfLimpo', 'Ativado', $codigoModulo)");
        }

        if($result){
            
            Header("Location: /projeto-horus/www/modulo.php");
        } else {
            echo "Erro ao inserir os dados.";
        }
    }

    function limpaCPF_CNPJ($valor){
        $valor = preg_replace('/[^0-9]/', '', $valor);
           return $valor;
        }