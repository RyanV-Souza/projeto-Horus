<?php
session_start();
$link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

$codigoComponente = $_POST['codigoComponente'];
$codigoModulo = $_SESSION['codigoModulo'];


$result = mysqli_query($link, "select tb_campoestagio.nm_campoEstagio, tb_campoestagio.cd_campoEstagio from tb_campoestagio, tb_componentecampoestagioprofessor_modulo, tb_componentecampoestagioprofessor, tb_componentecampoestagio where tb_componentecampoestagioprofessor_modulo.FK_cd_modulo = $codigoModulo 
AND tb_componentecampoestagioprofessor_modulo.FK_cd_componenteCampoEstagioProfessor = tb_componentecampoestagioprofessor.cd_componenteCampoEstagioProfessor 
AND tb_componentecampoestagio.FK_cd_componente = $codigoComponente
AND tb_componentecampoestagio.FK_cd_campoestagio = tb_campoestagio.cd_campoEstagio
group by tb_campoestagio.nm_campoEstagio, tb_campoestagio.cd_campoEstagio
order by tb_campoestagio.cd_campoEstagio;");


$registro = array (
    'campo' => array()
    );

$i = 0;

while($linha = mysqli_fetch_assoc($result)){
    $registro['campo'][$i] = array(
        'nome' => $linha['nm_campoEstagio'],
        'codigo' => $linha['cd_campoEstagio']

    );

    $i++;
};

echo json_encode($registro);
