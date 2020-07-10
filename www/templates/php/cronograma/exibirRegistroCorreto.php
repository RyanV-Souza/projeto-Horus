<?php
session_start();
$link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

$codigoCampo = $_POST['codigoCampo'];
$codigoComponente = $_POST['codigoComponente'];
$codigoProfessor = $_POST['codigoProfessor'];
$codigoModulo = $_SESSION['codigoModulo'];


$result = mysqli_query($link, "select tb_componentecampoestagioprofessor_modulo.cd_componenteCampoEstagioProfessor_Modulo from tb_componentecampoestagioprofessor_modulo, tb_componentecampoestagioprofessor, tb_componentecampoestagio where tb_componentecampoestagioprofessor_modulo.FK_cd_modulo = $codigoModulo and
tb_componentecampoestagioprofessor_modulo.FK_cd_componenteCampoEstagioProfessor = tb_componentecampoestagioprofessor.cd_componenteCampoEstagioProfessor and tb_componentecampoestagioprofessor.FK_cd_professor = $codigoProfessor and tb_componentecampoestagioprofessor.FK_cd_componentecampoestagio = tb_componentecampoestagio.cd_componentecampoestagio and tb_componentecampoestagio.FK_cd_componente = $codigoComponente and tb_componentecampoestagio.FK_cd_campoestagio = $codigoCampo;");


$registro = array (
    'id' => array()
    );

$i = 0;

while($linha = mysqli_fetch_assoc($result)){
    $registro['id'][$i] = array(
        'codigo' => $linha['cd_componenteCampoEstagioProfessor_Modulo']

    );

    $i++;
};

echo json_encode($registro);
