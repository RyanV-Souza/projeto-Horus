<?php

$link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

$codigoEvento = $_POST['codigoEvento'];
$codigoCorreto = $_POST['codigoCorreto'];
$codigoGrupo = $_POST['codigoGrupo'];
$dataInicio = $_POST['dataInicio'];
$dataFim = $_POST['dataFim'];

$data_start = str_replace('/', '-', $dataInicio);
$data_start_conv = date("Y-m-d H:i:s", strtotime($data_start));

$data_end = str_replace('/', '-', $dataFim);
$data_end_conv = date("Y-m-d H:i:s", strtotime($data_end));

$query = "update tb_datavalidacronograma set dt_inicioData = '$data_start_conv', dt_FimData = '$data_end_conv', FK_cd_componentecampoestagioprofessor_modulo = $codigoCorreto, FK_cd_gruposala = $codigoGrupo where cd_dataValida = $codigoEvento";

mysqli_query($link, $query);