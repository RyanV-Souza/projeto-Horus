<?php
session_start();
$link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

$codigoCronograma = $_SESSION['codigoCronograma'];

$query = "select tb_gruposala.nm_grupoSala, tb_datavalidacronograma.cd_dataValida, tb_datavalidacronograma.dt_inicioData, tb_datavalidacronograma.dt_fimData, tb_datavalidacronograma.ds_corBloco from tb_gruposala, tb_datavalidacronograma where tb_datavalidacronograma.FK_cd_grupoSala = tb_gruposala.cd_grupoSala and tb_datavalidacronograma.FK_cd_cronograma = $codigoCronograma;";

$result = mysqli_query($link, $query);

$registros = array ();

$i = 0;

while($linha = mysqli_fetch_assoc($result)){
    $registros[$i] = array(
        'id' => $linha['cd_dataValida'],
        'title' => $linha['nm_grupoSala'],
        'color' => $linha['ds_corBloco'],
        'start' => $linha['dt_inicioData'],
        'end' => $linha['dt_fimData']
    );

    $i++;
};

echo json_encode($registros);