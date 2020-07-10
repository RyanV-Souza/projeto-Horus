<?php
$link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

$codigoEvento = $_POST['codigoEvento'];

mysqli_query($link, "delete from tb_datavalidacronograma where cd_dataValida = $codigoEvento");