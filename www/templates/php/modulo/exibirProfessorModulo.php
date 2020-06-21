<?php
    $link = mysqli_connect('localhost', 'root', 'usbw', 'horus');

    $codigo = $_POST['codigoModulo'];

    $result = mysqli_query($link, "select tb_usuario.nm_usuario, tb_componentecurricular.nm_componente, tb_campoestagio.nm_campoEstagio from tb_usuario, tb_componentecurricular, tb_componentecampoestagioprofessor, tb_componentecampoestagio, tb_componentecampoestagioprofessor_modulo, tb_campoestagio where
                                    tb_componentecampoestagioprofessor_modulo.FK_cd_modulo = $codigo and
                                    tb_componentecampoestagioprofessor_modulo.FK_cd_componenteCampoEstagioProfessor = tb_componentecampoestagioprofessor.cd_componenteCampoEstagioProfessor AND
                                    tb_componentecampoestagioprofessor.FK_cd_professor = tb_usuario.cd_rmUsuario AND
                                    tb_componentecampoestagioprofessor.FK_cd_componentecampoestagio = tb_componentecampoestagio.cd_componentecampoestagio AND
                                    tb_componentecampoestagio.FK_cd_componente = tb_componentecurricular.cd_componente AND
                                    tb_componentecampoestagio.FK_cd_campoestagio = tb_campoestagio.cd_campoEstagio;");

    $registros = array (
        'modulo' => array()
        );

    $i = 0;

    while($linha = mysqli_fetch_assoc($result)){
        $registros['modulo'][$i] = array(
            'nomeComponente' => $linha['nm_componente'],
            'nomeProfessor' => $linha['nm_usuario'],
            'nomeCampo' =>$linha['nm_campoEstagio']
        );

        $i++;
    };

    echo json_encode($registros);

