<?php
session_start();
$link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

$codigoComponente = $_POST['codigoComponente'];
$codigoCampo = $_POST['codigoCampo'];
$codigoModulo = $_SESSION['codigoModulo'];


$result = mysqli_query($link, "select tb_usuario.nm_usuario, tb_usuario.cd_rmUsuario from tb_usuario, tb_componentecampoestagioprofessor_modulo, tb_componentecampoestagioprofessor, tb_componentecampoestagio where tb_componentecampoestagioprofessor_modulo.FK_cd_modulo = $codigoModulo 
AND tb_componentecampoestagioprofessor_modulo.FK_cd_componenteCampoEstagioProfessor = tb_componentecampoestagioprofessor.cd_componenteCampoEstagioProfessor 
AND tb_componentecampoestagioprofessor.FK_cd_professor = tb_usuario.cd_rmUsuario 
AND tb_componentecampoestagioprofessor.FK_cd_componentecampoestagio = tb_componentecampoestagio.cd_componentecampoestagio
AND tb_componentecampoestagio.FK_cd_campoestagio = $codigoCampo
AND tb_componentecampoestagio.FK_cd_componente = $codigoComponente
group by tb_usuario.nm_usuario, tb_usuario.cd_rmUsuario
order by tb_usuario.cd_rmUsuario;");


$registro = array (
    'usuario' => array()
    );

$i = 0;

while($linha = mysqli_fetch_assoc($result)){
    $registro['usuario'][$i] = array(
        'nome' => $linha['nm_usuario'],
        'codigo' => $linha['cd_rmUsuario']

    );

    $i++;
};

echo json_encode($registro);
