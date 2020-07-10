<?php
session_start();
$link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

$codigoEvento = $_POST['codigoEvento'];
$codigoCorreto = $_POST['codigoCorreto'];
$codigoGrupo = $_POST['codigoGrupo'];
$dataInicio = $_POST['dataInicio'];
$dataFim = $_POST['dataFim'];
$corEvento = $_POST['corEvento'];
$codigoCronograma = $_SESSION['codigoCronograma'];

$data_start = str_replace('/', '-', $dataInicio);
$data_start_conv = date("Y-m-d H:i:s", strtotime($data_start));

$data_end = str_replace('/', '-', $dataFim);
$data_end_conv = date("Y-m-d H:i:s", strtotime($data_end));

mysqli_query($link, "insert into tb_datavalidacronograma (`dt_inicioData`, `dt_fimData`, `ds_corBloco`, `FK_cd_componentecampoestagioprofessor_modulo`, `FK_cd_cronograma`, `FK_cd_grupoSala`) VALUES ('$data_start_conv', '$data_end_conv', '$corEvento', '$codigoCorreto', '$codigoCronograma', '$codigoGrupo')");