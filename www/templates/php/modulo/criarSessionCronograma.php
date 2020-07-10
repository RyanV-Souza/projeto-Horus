<?php
    session_start();
    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $codigoModulo = $_POST['codigoModulo'];
    
    $result = mysqli_query($link, "select FK_cd_cronograma from tb_modulo where cd_modulo = $codigoModulo");

    while($linha = mysqli_fetch_assoc($result)){
        $_SESSION['codigoCronograma'] = $linha['FK_cd_cronograma'];
    };