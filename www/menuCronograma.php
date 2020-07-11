<?php
  session_start();
  if(!$_SESSION['usuarioLogin']){
    header("Location: /projeto-horus/www/index.php");
    exit();
  }
?>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">


  <link rel="stylesheet" href="templates/css/bootstrap.min.css" rel="stylesheet">
  <link href='templates/css/core/main.min.css' rel='stylesheet' />
  <link href='templates/css/daygrid/main.min.css' rel='stylesheet'/>
  <link rel="stylesheet" href="templates/css/cronograma.css" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap"rel="stylesheet"/>
  

  <style>

        

        
  </style>

</head>

<body >
          
      <div class="quadro">
          
          <div class="centro">

            <div id='calendar' ></div>
          </div>
          <div class="areaBotoes">
            <button class="btnEstilo exibirPDF" style="text-align: center; width: 30%; margin-top: 1%; background: white; color: rgb(88, 214, 171)">Exibir Prévia do PDF</button>
          </div>
          
      </div>


 


  <div class="fundo"></div>


  <nav class="sidebar">
    <ul class="side-nav">
      <li class="logo">
        <a href="#" class="side-link">
          <span class="link-text logo-text exibirPerfil">Perfil</span>
          <svg
            aria-hidden="true"
            focusable="false"
            data-prefix="fad"
            data-icon="angle-double-right"
            role="img"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 448 512"
            class="svg-inline--fa fa-angle-double-right fa-w-14 fa-5x"
          >
            <g class="fa-group">
              <path
                fill="currentColor"
                d="M224 273L88.37 409a23.78 23.78 0 0 1-33.8 0L32 386.36a23.94 23.94 0 0 1 0-33.89l96.13-96.37L32 159.73a23.94 23.94 0 0 1 0-33.89l22.44-22.79a23.78 23.78 0 0 1 33.8 0L223.88 239a23.94 23.94 0 0 1 .1 34z"
                class="fa-secondary"
              ></path>
              <path
                fill="currentColor"
                d="M415.89 273L280.34 409a23.77 23.77 0 0 1-33.79 0L224 386.26a23.94 23.94 0 0 1 0-33.89L320.11 256l-96-96.47a23.94 23.94 0 0 1 0-33.89l22.52-22.59a23.77 23.77 0 0 1 33.79 0L416 239a24 24 0 0 1-.11 34z"
                class="fa-primary"
              ></path>
            </g>
          </svg>
        </a>
      </li>

      <li class="side-item">
        <a href="menuUsuario.php" class="side-link">

        <img  src='galeria/navbar/ICON USER.png' class="icon" >   <span class="link-text" >Usuario</span>
        </a>
      </li>

      <li class="side-item">
        <a href="menuModulo.php" class="side-link">
        <img  src='galeria/navbar/grup.png' class="icon" > <span class="link-text" >Módulos</span>
        </a>
      </li>
      <li class="side-item">
        <a href="menuComponente.php" class="side-link">
        <img  src='galeria/navbar/materia.png' class="icon" > <span class="link-text" >Componentes</span>
        </a>
      </li>

      <li class="side-item">
        <a href="menuLocal.php" class="side-link">
        <img  src='galeria/navbar/local.png' class="icon" > <span class="link-text" >Locais</span>
        </a>
      </li>




      <li class="side-item" id="themeButton">
        <a href="./templates/php/login/logout.php" class="side-link">
          <img  src='galeria/navbar/sair.png' class="icon" > <span class="link-text" >Sair</span>
        </a>
      </li>
    </ul>
  </nav>


  <!-- Modal Perfil -->

  <div class="modal fade" id="modalExibirPerfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" id="modal-contentPerfil">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">

              <div class="row">
                  <div class="col-md-12">
                    <img src="galeria/icon/user.png" alt="" id="imgPerfil">
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-12">
                    <span id="nomePerfil">Thiago F.Franco</span>
                  </div>
              </div>

                <div class="row">
                    <div class="col-md-12">
                        <label for="">E-Mail</label>
                        <input type="text" class="alterarEmailPerfil form-control"   readonly="true">
                    </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-12">
                      <label for="">RM</label>
                      <input type="tel" class="alterarRMPerfil form-control" readonly="true">
                  </div>
              </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">CPF</label>
                        <input type="text" class=" form-control alterarCPFPerfil cpfMask" readonly="true">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Senha</label>
                        <input type="password" class=" form-control alterarSenhaPerfil" readonly="true">
                    </div>
                </div>

            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btnEstilo btnEditarPerfil">Editar</button>
          <button type="button" class="btnEstilo btnConfirmarEdicaoPerfil">Confirmar Alteração</button>
          <button type="button" style="background: #FF6565" class="btnEstilo cancelarAlteracaoPerfil">Cancelar</button>
        </div>
      </div>
    </div>
  </div>

    <!--Modal Cadastro-->
   <div class="modal fade" id="modalCadastrarDia" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="form-group">

                  <div class="row">
                      <div class="col-md-12">
                          <label for="">Grupo de Estágio</label>
                          <select value="" id="cadastrarGrupoEvento" class="form-control" ></select>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-12">
                          <label for="">Componente Curricular</label>
                          <select value="" id="cadastrarComponenteEvento" class="form-control" ></select>
                      </div>
                  </div>
                  
                  <div class="row">
                      <div class="col-md-12">
                          <label for="">Campo de Estágio</label>
                          <select value="" id="cadastrarCampoEvento" class="form-control" ></select>
                      </div>
                  </div>


                  <div class="row">
                      <div class="col-md-12">
                          <label for="">Professor</label>
                          <select value="" id="cadastrarProfessorEvento" class="form-control" ></select>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-12">
                          <label for="">Escolha a cor do evento</label>
                          <input type="color" id="cadastrarCorEvento" class="form-control" >
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-12">
                          <label for="">Início do Evento</label>
                          <input value="" type="text" id="cadastrarInicioEvento" class="form-control"  >
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-12">
                          <label for="">Fim do Evento</label>
                          <input value="" type="text" id="cadastrarFimEvento" class="form-control" >
                      </div>
                  </div>
                </div>
                
                
          </div>
          <div class="modal-footer" >
            <button type="button" class="btnEstilo btnCadastrarEvento">CADASTRAR EVENTO</button>

          </div>
        </div>
      </div>
    </div>

   <!--Modal Cadastro-->
   <div class="modal fade" id="modalAlterarDia" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="form-group">
                  <div class="row">
                      <div class="col-md-12">
                          <label for="">Código do Evento</label>
                          <input type="text" id="alterarCodigoEvento" class="form-control" disabled="true">
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-12">
                          <label for="">Grupo de Estágio</label>
                          <select value="" id="alterarGrupoEvento" class="form-control" disabled="true"></select>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-12">
                          <label for="">Componente Curricular</label>
                          <select value="" id="alterarComponenteEvento" class="form-control" disabled="true"></select>
                      </div>
                  </div>
                  
                  <div class="row">
                      <div class="col-md-12">
                          <label for="">Campo de Estágio</label>
                          <select value="" id="alterarCampoEvento" class="form-control" disabled="true"></select>
                      </div>
                  </div>


                  <div class="row">
                      <div class="col-md-12">
                          <label for="">Professor</label>
                          <select value="" id="alterarProfessorEvento" class="form-control" disabled="true"></select>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-12">
                          <label for="">Início do Evento</label>
                          <input value="" type="text" id="alterarInicioEvento" class="form-control" disabled="true" >
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-12">
                          <label for="">Fim do Evento</label>
                          <input value="" type="text" id="alterarFimEvento" class="form-control" disabled="true" >
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer" >
            <button type="button" class="btnEstilo btnAlterarEvento">ALTERAR EVENTO</button>
            <button type="button" style="background: #FF6565" class="btnEstilo btnExcluirEvento">EXCLUIR EVENTO</button>
            <button type="button" class="btnEstilo confirmarAlteracaoEvento">CONFIRMAR</button>
            <button type="button" style="background: #FF6565" class="btnEstilo cancelarAlteracaoEvento">CANCELAR</button>

          </div>
        </div>
      </div>
    </div>

     <!--Modal PDF-->
   <div class="modal fade" id="modalExibirPDF" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="width: 100%">
        <div class="modal-content" style="width: 100%">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div id="renderPDF">
                  <table class="tabelaPDF table table-bordered" style="border-color:black" >
                      <thead>
                        <tr>
                          <th>Grupo</th>
                          <th>Data</th>
                          <th>Componente</th>
                          <th>Professor</th>
                          <th>Campo de Estágio</th>
                        </tr>
                      </thead>
                      <tbody class="tbodyPDF">

                      </tbody>
                  </table>
              </div>
          </div>
          <div class="modal-footer" >
            <button type="button" class="btnEstilo btnImprimirPDF" onClick="createPDF();">IMPRIMIR PDF</button>
          </div>
        </div>
      </div>
    </div>



<script src="./templates/js/jquery-3.4.1.min.js"></script>
<script src='./templates/js/moment-with-locales.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>
<script src="./templates/js/bootstrap.min.js"></script>
<script src='./templates/js/core/main.min.js'></script>
<script src='./templates/js/interaction/main.min.js'></script>
<script src='./templates/js/daygrid/main.min.js'></script>
<script src='./templates/js/core/locales/pt-br.js'></script>

<script src="./templates/js/index.js"></script>
<script src="./templates/js/cronograma.js"></script>

<script>
  $(document).ready(function(){
    moment.locale('pt-BR');
    verificarLogin();
    $(".cancelarAlteracaoEvento").hide();
    $(".confirmarAlteracaoEvento").hide();
    $(".cpfMask").mask("999.999.999-99");
    moment.locale('pt');
    
  

});



</script>

</body>
</html>
