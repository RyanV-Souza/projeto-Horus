<?php
session_start();
$link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

$codigoEvento = $_POST['codigo'];
$codigoModulo = $_SESSION['codigoModulo'];

$query = "select tb_usuario.nm_usuario, tb_usuario.cd_rmUsuario, tb_gruposala.nm_grupoSala, tb_gruposala.cd_grupoSala, tb_componentecurricular.nm_componente, tb_componentecurricular.cd_componente, tb_campoestagio.cd_campoEstagio, tb_campoestagio.nm_campoEstagio, tb_datavalidacronograma.dt_inicioData, tb_datavalidacronograma.dt_fimData  from tb_usuario, tb_gruposala, tb_componentecurricular, tb_campoestagio, tb_datavalidacronograma,tb_componentecampoestagioprofessor, tb_componentecampoestagio, tb_componentecampoestagioprofessor_modulo where  tb_datavalidacronograma.FK_cd_grupoSala = tb_gruposala.cd_grupoSala and
tb_datavalidacronograma.FK_cd_componentecampoestagioprofessor_modulo = tb_componentecampoestagioprofessor_modulo.cd_componenteCampoEstagioProfessor_Modulo and 
tb_componentecampoestagioprofessor_modulo.FK_cd_componenteCampoEstagioProfessor = tb_componentecampoestagioprofessor.cd_componenteCampoEstagioProfessor AND
tb_componentecampoestagioprofessor_modulo.FK_cd_modulo = $codigoModulo AND
tb_componentecampoestagioprofessor.FK_cd_componentecampoestagio = tb_componentecampoestagio.cd_componentecampoestagio AND
tb_componentecampoestagioprofessor.FK_cd_professor = tb_usuario.cd_rmUsuario AND
tb_componentecampoestagio.FK_cd_componente = tb_componentecurricular.cd_componente AND
tb_componentecampoestagio.FK_cd_campoestagio = tb_campoestagio.cd_campoEstagio AND
tb_datavalidacronograma.cd_dataValida = $codigoEvento;";

$result = mysqli_query($link, $query);

$registros = array (
    'evento' => array(

    )
);

$i = 0;

while($linha = mysqli_fetch_assoc($result)){
    $registros['evento'][$i] = array(
        'nomeUsuario' => $linha['nm_usuario'],
        'rmUsuario' => $linha['cd_rmUsuario'],
        'grupo' => $linha['nm_grupoSala'],
        'codigoGrupo' => $linha['cd_grupoSala'],
        'nomeComponente' => $linha['nm_componente'],
        'codigoComponente' => $linha['cd_componente'],
        'nomeCampo' => $linha['nm_campoEstagio'],
        'codigoCampo' => $linha['cd_campoEstagio'],
        'inicioData' => $linha['dt_inicioData'],
        'fimData' => $linha['dt_fimData']
    );

    $i++;
};

echo json_encode($registros);