<?php
session_start();
$link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

$codigoComponente = $_POST['codigoComponente'];
$codigoModulo = $_SESSION['codigoModulo'];

$result = mysqli_query($link, "select tb_componentecurricular.nm_componente, tb_componentecurricular.cd_componente from  tb_componentecurricular, tb_componentecampoestagioprofessor_modulo, tb_componentecampoestagioprofessor, tb_componentecampoestagio where tb_componentecampoestagioprofessor_modulo.FK_cd_modulo = $codigoModulo and tb_componentecampoestagioprofessor_modulo.FK_cd_componenteCampoEstagioProfessor = tb_componentecampoestagioprofessor.cd_componenteCampoEstagioProfessor and tb_componentecampoestagioprofessor.FK_cd_componentecampoestagio = tb_componentecampoestagio.cd_componentecampoestagio and tb_componentecampoestagio.FK_cd_componente = tb_componentecurricular.cd_componente and tb_componentecurricular.cd_componente != $codigoComponente 
group by tb_componentecurricular.nm_componente, tb_componentecurricular.cd_componente
order by tb_componentecurricular.cd_componente;");


$registro = array (
    'componente' => array()
    );

$i = 0;

while($linha = mysqli_fetch_assoc($result)){
    $registro['componente'][$i] = array(
        'nome' => $linha['nm_componente'],
        'codigo' => $linha['cd_componente']

    );

    $i++;
};

echo json_encode($registro);
