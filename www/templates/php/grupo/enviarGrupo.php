<?php

    session_start();

    $codigoGrupo = $_POST['codigoGrupo'];
    $_SESSION['codigoGrupo'] = $codigoGrupo;