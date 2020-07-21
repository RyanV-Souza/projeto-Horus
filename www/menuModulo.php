<?php
  session_start();
  if(!$_SESSION['usuarioLogin']){
    header("Location: /projeto-horus/www/index.php");
    exit();
  }
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  


  <link rel="stylesheet" href="templates/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="templates/css/style.css" /> 
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap"rel="stylesheet"/>

  
  
</head>

<body >
  <div class="quadro">
      <div class="topo">
          <h4><img  src='galeria/icon/logolamp.png' class="img-responsive">MÓDULO<img  src='galeria/icon/logolamp.png' class="img-responsive"></h4>
      </div>
      <div class="centro">  
                                
      </div>

              

              
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

  <!--Modal Cadastro-->
  <div class="modal fade" id="modalCadastroModulo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                          <label for="">Semestre</label>
                          <select value="" class="form-control cadastrarSemestreModulo">
                              <option value="1">1°Semestre</option>
                              <option value="2"> 2°Semestre</option>
                          </select>
                          
                      </div>
                  </div>

                  

                  <div class="row">
                      <div class="col-md-12">
                          <label for="">Ano</label>
                          <input type="number" class="cadastrarAnoModulo form-control" placeholder="Ex: 2020">
                      </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                        <label for="">Sigla</label>
                        <input type="text" class="cadastrarSiglaModulo form-control" placeholder="Ex: 4ENF2">
                    </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                      <label for="">Módulo Correspondente</label>
                      <select name="" id="" class="cadastrarNumeroModulo form-control">
                        <option value="2">2 Módulo</option>
                        <option value="4">4 Módulo</option>

                      </select>
                  </div>
              </div>

              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btnEstilo btnCadastrarModulo">CADASTRAR MÓDULO</button>
          </div>
        </div>
      </div>
    </div>

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

<script src="templates/js/jquery-3.4.1.min.js"></script>
<script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>
<script src="templates/js/bootstrap.min.js"></script>
<script src="templates/js/index.js"></script>

<script>
  $(document).ready(function(){
    verificarLogin();
    listarTodosModulo();
    $(".cpfMask").mask("999.999.999-99");
  
  })
</script>


</body>
</html>