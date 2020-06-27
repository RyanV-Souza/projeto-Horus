<?php
    session_start();
    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $codigo = $_POST['codigoModulo'];
    $_SESSION['codigoModulo'] = $codigo;