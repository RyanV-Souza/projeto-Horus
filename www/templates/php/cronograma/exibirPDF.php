<?php
session_start();
$link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

$codigoCronograma = $_SESSION['codigoCronograma'];
$codigoModulo = $_SESSION['codigoModulo'];


$result = mysqli_query($link, "select tb_gruposala.sg_grupoSala, tb_datavalidacronograma.dt_inicioData, tb_datavalidacronograma.ds_corBloco,tb_componentecurricular.nm_componente, tb_usuario.nm_usuario, tb_campoestagio.nm_campoEstagio from tb_gruposala, tb_datavalidacronograma, tb_componentecurricular, tb_usuario, tb_campoestagio, tb_cronograma, tb_componentecampoestagioprofessor_modulo, tb_componentecampoestagioprofessor, tb_componentecampoestagio where tb_datavalidacronograma.FK_cd_cronograma = $codigoCronograma and 
tb_datavalidacronograma.FK_cd_grupoSala = tb_gruposala.cd_grupoSala AND
tb_datavalidacronograma.FK_cd_componentecampoestagioprofessor_modulo = tb_componentecampoestagioprofessor_modulo.cd_componenteCampoEstagioProfessor_Modulo AND
tb_componentecampoestagioprofessor_modulo.FK_cd_modulo = $codigoModulo AND
tb_componentecampoestagioprofessor_modulo.FK_cd_componenteCampoEstagioProfessor = tb_componentecampoestagioprofessor.cd_componenteCampoEstagioProfessor  AND
tb_componentecampoestagioprofessor.FK_cd_professor = tb_usuario.cd_rmUsuario AND
tb_componentecampoestagioprofessor.FK_cd_componentecampoestagio = tb_componentecampoestagio.cd_componentecampoestagio AND
tb_componentecampoestagio.FK_cd_componente = tb_componentecurricular.cd_componente AND
tb_componentecampoestagio.FK_cd_campoestagio = tb_campoestagio.cd_campoEstagio
order by tb_gruposala.nm_grupoSala, tb_datavalidacronograma.dt_inicioData;");


$registro = array (
    'cronograma' => array()
    );

$i = 0;

while($linha = mysqli_fetch_assoc($result)){
    $registro['cronograma'][$i] = array(
        'siglaGrupo' => $linha['sg_grupoSala'],
        'data' => $linha['dt_inicioData'],
        'cor' => $linha['ds_corBloco'],
        'nomeComponente' => $linha['nm_componente'],
        'nomeProfessor' => $linha['nm_usuario'],
        'nomeCampo' =>$linha['nm_campoEstagio']
    );

    $i++;
};

echo json_encode($registro);
