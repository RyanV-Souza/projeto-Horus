<?php
session_start();
$link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

$codigoGrupo = $_POST['codigoGrupo'];
$codigoModulo = $_SESSION['codigoModulo'];

$result = mysqli_query($link, "select * from tb_gruposala where FK_cd_modulo = $codigoModulo and cd_grupoSala != $codigoGrupo");


$registro = array (
    'grupo' => array()
    );

$i = 0;

while($linha = mysqli_fetch_assoc($result)){
    $registro['grupo'][$i] = array(
        'nome' => $linha['nm_grupoSala'],
        'codigo' => $linha['cd_grupoSala']

    );

    $i++;
};

echo json_encode($registro);
