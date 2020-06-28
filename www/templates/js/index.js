//Validar CPF

$(document).on("blur", ".cpfMask", function(){
  validarCPF($(this).val());
});


function validarCPF(cpf) {	
	cpf = cpf.replace(/[^\d]+/g,'');	
	if(cpf == '') return false;	
	// Elimina CPFs invalidos conhecidos	
	if (cpf.length != 11 || 
		cpf == "00000000000" || 
		cpf == "11111111111" || 
		cpf == "22222222222" || 
		cpf == "33333333333" || 
		cpf == "44444444444" || 
		cpf == "55555555555" || 
		cpf == "66666666666" || 
		cpf == "77777777777" || 
		cpf == "88888888888" || 
		cpf == "99999999999"){
      $(".cpfMask").css("box-shadow", "0px 0px 9px 0px rgba(255,5,5,0.52)");
      $(".btnCadastrarUsuario").attr("disabled", true);  
			return alert("CPF Inválido");	
    }
					
	// Valida 1o digito	
	add = 0;	
	for (i=0; i < 9; i ++)		
		add += parseInt(cpf.charAt(i)) * (10 - i);	
		rev = 11 - (add % 11);	
		if (rev == 10 || rev == 11)		
			rev = 0;	
    if (rev != parseInt(cpf.charAt(9))){
      $(".cpfMask").css("box-shadow", "0px 0px 9px 0px rgba(255,5,5,0.52)");
      $(".btnCadastrarUsuario").attr("disabled", true);  
			return alert("CPF Inválido");	
    }
      
	// Valida 2o digito	
	add = 0;	
	for (i = 0; i < 10; i ++)		
		add += parseInt(cpf.charAt(i)) * (11 - i);	
	rev = 11 - (add % 11);	
	if (rev == 10 || rev == 11)	
		rev = 0;	
	if (rev != parseInt(cpf.charAt(10))){
    $(".cpfMask").css("box-shadow", "0px 0px 9px 0px rgba(255,5,5,0.52)");
    $(".btnCadastrarUsuario").attr("disabled", true);  
			return alert("CPF Inválido");	
  }

  $('.cpfMask').css("box-shadow", "0px 0px 9px 0px rgba(64,204,29,1)");
  $(".btnCadastrarUsuario").attr("disabled", false);   
	return true;
}



$(document).on("mouseover", ".sidebar", function(){
    $(".fundo").show();

    $(".fundo").css("background", "rgba(0,0,0,0.85)");
    $(".fundo").css("position", "fixed");
    $(".fundo").css("right", "0");
    $(".fundo").css("left", "0");
    $(".fundo").css("bottom", "0");
    $(".fundo").css("top", "0");

    $(".fundo").css("transition", "600ms");
  });


  $(document).on("mouseout", ".sidebar", function(){

    $(".fundo").css("background", "rgba(0,0,0,0)");
    $(".fundo").css("transition", "600ms");
    $(".fundo").css("position", "");


  });

  $(document).on("click", ".cadastrarUsuario", function(){
      $("#modalCadastroUsuario").modal('show');
  });

  $(document).on("click", ".cadastrarComponente", function(){
    $("#modalCadastroComponente").modal('show');
    acumularOptionLocal();
  });

  $(document).on("click", ".cadastrarLocal", function(){
    $("#modalCadastroLocal").modal('show');
  });

  $(document).on("click", ".cadastrarModulo", function(){
    $("#modalCadastroModulo").modal('show');
  });

//Abrir modal de perfil//
  $(document).on("click", ".exibirPerfil", function(){
    $("#modalExibirPerfil").modal('show');
  });

  $(document).on("click", ".cadastrarAlunoCSV", function(){
    $("#modalCadastroAlunoCSV").modal('show');
  })

  $(document).on("click", ".cadastrarAlunoGrupo ", function(){
    $("#modalCadastroAluno").modal('show');
  })
//------------------------------------------------------------//
  const cadastrarProfessor = (codigo) =>{
    $("#modalCadastroCorpoDocente").modal('show');
    populaModalOptionComponente();
    populaModalOptionProfessor();
    $('.btnCadastrarCorpoDocente').attr('onClick', `confirmarCadastroProfessor(${codigo})`);

   }

   const cadastrarGrupo = (codigo) =>{
     $("#modalCadastroGrupo").modal('show');
     exibirAlunosDisponiveis(codigo);
     $('.btnCadastrarGrupo').attr('onClick', `confirmarCadastroGrupo(${codigo})`);
   }

   const exibirAlunosDisponiveis = (codigo) =>{
      var parametros = {
        codigoModulo: codigo
      }

      $.ajax({
        type:"post",
        url:"./templates/php/grupo/exibirAlunoDisponivel.php",
        data: parametros,
        dataType:"JSON",
        success: function(data){
          var itemlista = "";

          $.each(data.aluno, function(i, dados){
              itemlista += `<div class="divisaoGrupoAluno">
                              <input type="checkbox" name="" id="" value="${dados.codigo}"> <label for="">${dados.nome}</label>
                            </div>`
          });

          $(".blocoAlunos").html(itemlista);
        },
        error: function(data){
          alert("Erro;")
        }
      })
   }
   const exibirGrupos = (codigo) =>{
      var parametros = {
        codigoModulo:codigo
      };

      $.ajax({
        type:"post",
        url: "./templates/php/grupo/criarSession.php",
        data:parametros,
        success: function(data){
            $(location).attr('href', 'grupoEstagio.php');
        },
        error: function(data){
          alert("Erro");
        }
      })


   }



  //BTN - Cadastro
  const confirmarCadastroGrupo = (codigo) =>{
    var rmAlunos = [];

    $("input:checked").each(function(){
        rmAlunos.push($(this).val());
    });

    var parametros = {
      codigoModulo:codigo,
      rmAlunos:rmAlunos,
      nomeGrupo:$(".cadastrarNmGrupo").val(),
      siglaGrupo:$(".cadastrarSiglaGrupo").val()
    }

    $.ajax({
        type:"post",
        url:"./templates/php/grupo/cadastrarGrupo.php",
        data:parametros,
        success: function(data){
            
            document.location.reload(true);
        },
        error: function(data){
            alert('Erro');
        }

    });

  }
  const confirmarCadastroAluno = () =>{
      var parametros = {
        nome:$('.cadastrarNmAluno').val(),
        rm:$('.cadastrarRmAluno').val(),
        cpf:$('.cadastrarCPFAluno').val()
      }


      $.ajax({
        type: "POST",
        url: "./templates/php/aluno/cadastro.php",
        data: parametros,
        success: function(data){
 
          document.location.reload(true);
        },
        error: function(data){
          alert('Erro');
        }
      })
  }
  const confirmarCadastroProfessor = (codigo) =>{
      var parametros = {
        codigoModulo:codigo,
        codigoProfessor:$(".cadastrarProfessorDisponivel").val()
      }


      $.ajax({
          type: "POST",
          url: "./templates/php/modulo/cadastrarCorpoDocente.php",
          data:parametros,
          success: function(data){

              document.location.reload(true);
          },
          error: function(data){
            alert("Erro");
          }
      })
  }
  $(document).on("click", ".btnCadastrarUsuario", function(){
    
    var parametros = {
      nome:$('#cadastrarNmUsuario').val(),
      RM:$('#cadastrarRmUsuario').val(),
      email:$('#cadastrarEmailUsuario').val(),
      cpf:$("#cadastrarCPFUsuario").val(),
      cargo:$("#cadastrarCargoUsuario").val(),
 
    }


    $.ajax({
      type: "POST",
      url: "./templates/php/usuario/cadastro.php",
      data:parametros,
      success: function(data){

        document.location.reload(true);
      },
      error: function(request, status, erro){
        alert('Problema: ' + status + ' Descrição: ' + erro);
      }
    });

  });

  $(document).on("click", ".btnCadastrarLocal", function(){

    var parametros = {
      nome:$('.cadastrarNmLocal').val(),
      endereco:$('.cadastrarEnderecoLocal').val(),
      sigla:$('.cadastrarSiglaLocal').val()

    }

    $.ajax({
      type: "POST",
      url: "./templates/php/local/cadastro.php",
      data:parametros,
      success: function(data){

        document.location.reload(true);
      },
      error: function(request, status, erro){
        alert('Problema: ' + status + ' Descrição: ' + erro);
      }
    });

  });

  $(document).on("click", ".btnCadastrarComponente", function(){

    var parametros = {
      nome:$('.cadastrarNmComponente').val(),
      hora:$('.cadastrarCargaComponente').val(),
      modulo:$('.cadastrarModuloComponente').val(),
      local:$('.cadastrarLocalComponente').val()


    }

    $.ajax({
      type: "POST",
      url: "./templates/php/componente/cadastro.php",
      data:parametros,
      success: function(data){

        document.location.reload(true);
      },
      error: function(request, status, erro){
        alert('Problema: ' + status + ' Descrição: ' + erro);
      }
    });

  });

  $(document).on("click", ".btnCadastrarAluno", function(){
 
    var parametros = {
      nome:$("#cadastrarNmAluno").val(),
      rm:$("#cadastrarRmAluno").val(),
      cpf:$("#cadastrarCPFAluno").val()
    }

    $.ajax({
      type: "POST",
      url: "./templates/php/aluno/cadastro.php",
      data: parametros,
      success: function(data){
        document.location.reload(true);
      },
      error: function(data){
        alert("Erro");
      }
    })
  });

  $(document).on("click", ".btnCadastrarModulo", function(){

    var parametros = {
      nome:$('.cadastrarNmComponente').val(),
      ano:$('.cadastrarAnoModulo').val(),
      semestre:$('.cadastrarSemestreModulo').val(),
      sigla:$('.cadastrarSiglaModulo').val(),
      numeroModulo:$(".cadastrarNumeroModulo").val()


    }

    $.ajax({
      type: "POST",
      url: "./templates/php/modulo/cadastro.php",
      data:parametros,
      success: function(data){

        document.location.reload(true);
      },
      error: function(request, status, erro){
        alert('Problema: ' + status + ' Descrição: ' + erro);
      }
    });

  });





  //BTN - Alterar

  $(document).on("click", ".btnAlterarUsuario", function(){
      var parametros = {
        nome:$("#alterarNmUsuario").val(),
        rm:$("#alterarRmUsuario").val(),
        email:$("#alterarEmailUsuario").val(),
        status:$("#alterarStatusUsuario").val(),

        cargo:$("#alterarCargoUsuario").val()
      }

      $.ajax({
        type: "post",
        url: "./templates/php/usuario/alterar.php",
        data: parametros,
        success: function(data){
          alert("Alterado com sucesso!");
          document.location.reload(true);
        },
        error: function(request, data, erro){

        }
      })
  });

  $(document).on("click", ".btnAlterarLocal", function(){
    var parametros = {
      nome:$(".alterarNmLocal").val(),
      endereco:$(".alterarEnderecoLocal").val(),
      sigla:$(".alterarSiglaLocal").val(),
      codigo:$(".alterarCodigoLocal").val(),
      status:$("#alterarStatusLocal").val()
    }


    $.ajax({
      type: "post",
      url: "./templates/php/local/alterar.php",
      data: parametros,
      success: function(data){
        alert("Alterado com sucesso!");
        document.location.reload(true);
      },
      error: function(request, data, erro){

      }
    })
});

$(document).on("click", ".btnAlterarComponente", function(){
  var parametros = {
    nome:$(".alterarNmComponente").val(),
    modulo:$(".alterarModuloComponente").val(),
    hora:$(".alterarCargaComponente").val(),
    codigo:$(".alterarCodigoComponente").val(),
    status:$("#alterarStatusComponente").val(),
    local:$(".alterarLocalComponente").val()
  }


  $.ajax({
    type: "post",
    url: "./templates/php/componente/alterar.php",
    data: parametros,
    success: function(data){
      alert("Alterado com sucesso!");
      document.location.reload(true);
    },
    error: function(request, data, erro){
        alert('erro');
    }
  });
});

  //Function - Listar

  const listarTodosUsuario = () =>{
    $.ajax({
      type: "post",
      url: "./templates/php/usuario/populaTabelaUsuario.php",
      dataType:"json",
      success: function(data){
        var itemlista = "";

        $.each(data.usuario, function(i, dados){
            itemlista += `  <tr>
                                  <td> <span class="${dados.status}"> ${dados.status} </span> </td>
                                  <td>${dados.nome}</td>
                                  <td>${dados.cargo}</td>
                                  <td>${dados.rm}</td>
                                  <td><img src="galeria/icon/writing.png" class="icon2" onClick="buscarDadosUsuario(${dados.rm})"></td>
                                  <td> <span> </span> </td>
                            </tr>`
        });

        $(".tbodyUsuario").html(itemlista);

      },
    error: function(data, status, erro){
      alert("Status: " + status + " Descrição: " + erro);
      alert(data);
    }
  });
  }

  const listarTodosCampo = () =>{
    $.ajax({
      type: "post",
      url: "./templates/php/local/populaTabelaLocal.php",
      dataType:"json",
      success: function(data){
  
        var itemlista = "";

        $.each(data.campo, function(i, dados){
            itemlista += `  <tr>
                                <td><span class="${dados.status}"> ${dados.status}</span></td>
                                <td>${dados.nome}</td>
                                <td>${dados.sigla}</td>
                                <td><span > <img src="galeria/icon/writing.png" alt="Editar" class= "icon2" onClick="buscarDadosCampo(${dados.codigo})"></span></td>
                                <td><span ></span></td>
                            </tr>`
        });

        $(".tbodyCampo").html(itemlista);

      },
    error: function(data, status, erro){
      alert("Status: " + status + " Descrição: " + erro);
      alert(data);
    }
  });
  }

  const listarTodosComponente = () =>{
    $.ajax({
      type: "post",
      url: "./templates/php/componente/populaTabelaComponente.php",
      dataType:"json",
      success: function(data){
        var itemlista = "";

        $.each(data.componente, function(i, dados){
            itemlista += `  <tr>
                                <td><span class="${dados.status}"> ${dados.status}</span></td>
                                <td>${dados.nome}</td>
                                <td>${dados.carga}</td>
                                <td>${dados.modulo}</td>
                                <td><span > <img src="galeria/icon/writing.png" alt="Editar" class= "icon2" onClick="buscarDadosComponente(${dados.codigo})"></span></td>
                                <td><span ></span></td>
                            </tr>`
        });

        $(".tbodyComponente").html(itemlista);

      },
    error: function(data, status, erro){
      alert("Status: " + status + " Descrição: " + erro);
      alert(data);
    }
  });
  }

  const listarTodosModulo = () =>{
    $.ajax({
      type: "post",
      url: "./templates/php/modulo/populaQuadroModulo.php",
      dataType:"json",
      success: function(data){
        var itemlista = "";

        $.each(data.modulo, function(i, dados){
          if(dados.status == 'Ativado'){
                  itemlista += ` <div class="quadroModulo moduloAtivo" style="background: #58D6AB" onClick="enviarModulo(${dados.codigo})">
                                    <span class="numeroModulo">${dados.numeroModulo}°Módulo</span>
                                    <span class="siglaModulo">${dados.sigla}</span>
                                    <span class="anoModulo">${dados.ano}</span>
                                    <span class="semestreModulo">${dados.semestre}° Semestre</span>
                                  </div> `
          } else if(dados.status =='Desativado'){
            itemlista += ` <div class="quadroModulo moduloAtivo" style="background: #FF6565" onClick="enviarModulo(${dados.codigo})">
                                    <span class="numeroModulo">${dados.numeroModulo}°Módulo</span>
                                    <span class="siglaModulo">${dados.sigla}</span>
                                    <span class="anoModulo">${dados.ano}</span>
                                    <span class="semestreModulo">${dados.semestre}° Semestre</span>
                                  </div> `
          }


        });

        $(".centro").html(`<div class="quadroModulo cadastrarModulo">
                                <img src="galeria/icon/iconeCruz.png" alt="">
                                <span class="tituloAdicionar">Adicionar Módulo</span>
                          </div>  ` + itemlista);

      },
    error: function(data, status, erro){
      alert("Status: " + status + " Descrição: " + erro);
      alert(data);
    }
  });
  }

  const listarTodosGrupo = () =>{

    $.ajax({
      type: "post",
      url: "./templates/php/grupo/populaQuadroGrupo.php",
      dataType:"json",
      success: function(data){
        var itemlista = "";
        $.each(data.grupo, function(i, dados){
          if(dados.status == 'Ativado'){
                  itemlista += ` <div class="quadroGrupo " style="background: #58D6AB" onClick="enviarGrupo(${dados.codigo})">

                                    <span class="nomeGrupo"> ${dados.nome} </span>
                                    <span class="siglaGrupo">${dados.sigla}</span>
                                    <br>
                                  </div> `
          } else if(dados.status =='Desativado'){
            itemlista += ` <div class="quadroGrupo " style="background: #FF6565" onClick="enviarGrupo(${dados.codigo})">
                                    <span class="nomeGrupo">${dados.nome}</span>
                                    <span class="siglaGrupo">${dados.sigla}</span>
                                    <br>

                                  </div> `
          }


        });

        $(".centro").html(`<div class="quadroGrupo " onClick="cadastrarGrupo(${data.grupo.codigoModulo})">
                                <img src="galeria/icon/iconeCruz.png" alt="">
                                <span class="tituloAdicionar">Adicionar Grupo</span>
                          </div>  ` + itemlista);

      },
    error: function(data, status, erro){
      alert("Status: " + status + " Descrição: " + erro);
      alert(data);
    }
  });
  }

  const enviarGrupo = (codigo) =>{
    var parametro = {
      'codigoGrupo':codigo
    }
    $.ajax({
      type: "post",
      url: "./templates/php/grupo/enviarGrupo.php",
      data: parametro,
      success: function(data){
        $(location).attr("href", "menuAluno.php");
      },
      error: function(data){
        alert("Erro");
      }
    })
  }

  $(document).on("change", '.cadastrarComponenteDisponivel', function(){

    var parametros = {
      'codigo':$(this).val()
    }
    $.ajax({
        type: "post",
        url: "./templates/php/modulo/inserirCampoEstagio.php",
        data: parametros,
        dataType:"json",
        success: function(data){
          $.each(data.campo, function(i, dados){
              $('.cadastrarCampoDisponivel').val(dados.nome);
          });

        },
        error: function(data){
          alert("Erro");
        }
    });
  })


  const acumularOptionLocal = () =>{
    $.ajax({
      type: "post",
      url: "./templates/php/local/populaTabelaLocal.php",
      dataType:"json",
      success: function(data){
        var itemlista = "";
        $.each(data.campo, function(i, dados){
            itemlista += `<option value="${dados.codigo}"> ${dados.nome} </option> `
        });

        $(".optionLocalComponente").html(itemlista);

      },
    error: function(data, status, erro){
      alert("Status: " + status + " Descrição: " + erro);
      alert(data);
    }
  });
  }

  //Function - Listar Um
  const buscarDadosUsuario = (RM) =>{
      var parametros ={
        RM:RM
      }

      $.ajax({
        type: "post",
        url: "./templates/php/usuario/listarUm.php",
        data: parametros,
        dataType:"JSON",
        success: function(data){
          $.each(data.usuario, function(i, dados){
              $("#alterarNmUsuario").val(dados.nome);
              $("#alterarRmUsuario").val(dados.rm);
              $("#alterarEmailUsuario").val(dados.email);
              $("#alterarCPFUsuario").val(dados.cpf);

          });

          $("#modalAlterarUsuario").modal('show');
        },
        error: function(request, status, erro){
          alert("Problema" + status + " Descrição " + erro);
        }

      });
}

const buscarDadosCampo = (codigo) =>{
  var parametros ={
    codigo:codigo
  }


  $.ajax({
    type: "post",
    url: "./templates/php/local/listarUm.php",
    data: parametros,
    dataType:"JSON",
    success: function(data){
      $.each(data.campo, function(i, dados){
          $(".alterarNmLocal").val(dados.nome);
          $(".alterarEnderecoLocal").val(dados.endereco);
          $(".alterarSiglaLocal").val(dados.sigla);
          $(".alterarCodigoLocal").val(dados.codigo);

      });

      $("#modalAlterarLocal").modal('show');
    },
    error: function(request, status, erro){
      alert("Problema" + status + " Descrição " + erro);
    }

  });
}

const buscarDadosComponente = (codigo) =>{
  var parametros ={
    codigo:codigo
  }


  $.ajax({
    type: "post",
    url: "./templates/php/componente/listarUm.php",
    data: parametros,
    dataType:"JSON",
    success: function(data){
      $.each(data.componente, function(i, dados){
          $(".alterarNmComponente").val(dados.nome);
          $(".alterarCargaComponente").val(dados.hora);
          $(".alterarCodigoComponente").val(dados.codigo);

      });
      acumularOptionLocal();
      $("#modalAlterarComponente").modal('show');
    },
    error: function(request, status, erro){
      alert("Problema" + status + " Descrição " + erro);
    }

  });
}


 const enviarModulo = (codigo) =>{
  var parametros = {
    codigo:codigo
  }



  $.ajax({
    type: "post",
    url: "./templates/php/modulo/criarSession.php",
    data: parametros,
    success: function(data){
      $(location).attr('href', 'modulo.php');
    },
    error: function(request, status, erro){
      alert("Problema" + status + " Descrição " + erro);
    }

  });

 }

 const exibirModulo = () =>{

   $.ajax({
     type:"post",
     url: "./templates/php/modulo/exibirModulo.php",
     dataType: "JSON",
     success: function(data){
        $.each(data.modulo, function(i, dados){
          $(".cadastrarProfessor").attr('onClick', `cadastrarProfessor(${dados.codigo})`);
          $(".cadastrarGrupoEstagio").attr("onClick", `exibirGrupos(${dados.codigo})`);
          $('h4').text(`${dados.numero} MÓDULO`);
          exibirCorpoDocente(dados.codigo);
          exibirAlunos(dados.codigo);
        });
     },
     error: function(request, status, erro){
       alert("Problema " + status + " Descrição " + erro);
     }
   })
 }

 const exibirAlunos = (codigo) =>{
   var parametros = {
     codigoModulo:codigo
   }

   $.ajax({
     type: "post",
     url: "./templates/php/aluno/exibirAlunoModulo.php",
     data: parametros,
     dataType: "JSON",
     success: function(data){
       var itemlista = "";
       $.each(data.aluno, function(i, dados){
            itemlista += `<tr>
                              <td> ${dados.nome} </td>
                          </tr>`
       });

       $('.tbodyAluno').html(itemlista);
     },
     error: function(data){
       alert("Erro");
     }
   })
 }
 const exibirCorpoDocente = (codigo) =>{
    var parametros = {
      codigoModulo:codigo
    }


    $.ajax({
      type: "post",
      url: "./templates/php/modulo/exibirProfessorModulo.php",
      data: parametros,
      dataType:"json",
      success: function(data){
          var itemlista = "";
          $.each(data.modulo, function(i, dados){
              itemlista+= `<tr>
                            <td> ${dados.nomeProfessor}</td>
                            <td>${dados.nomeComponente} </td>
                            <td>${dados.nomeCampo} </td>

                            </tr>`
          });

          $(".tbodyProfessor").html(` <tr>
                                          <th>Nome</th>
                                          <th>Componente</th>
                                          <th>Local</th>
                                      </tr> ` + itemlista)
      },
      error: function(data){
        alert("Erro")
      }
    })
 }

 const populaModalOptionComponente = () => {
    $.ajax({
      type:"post",
      url: "./templates/php/componente/populaTabelaComponente.php",
      dataType: "JSON",
      success: function(data){
        var itemlista = "";
        $.each(data.componente, function(i, dados){
            itemlista+= `<option value="${dados.codigo}"> ${dados.nome}</option>`

        });

        $(".cadastrarComponenteDisponivel").html(itemlista);
      },
      error: function(request, status, erro){
        alert("Problema " + status + " Descrição " + erro);
      }
    })
 }

 const populaModalOptionProfessor = () => {
  $.ajax({
    type:"post",
    url: "./templates/php/usuario/populaTabelaUsuario.php",
    dataType: "JSON",
    success: function(data){
      var itemlista = "";
      $.each(data.usuario, function(i, dados){
          itemlista+= `<option value="${dados.rm}"> ${dados.nome}</option>`

      });

      $(".cadastrarProfessorDisponivel").html(itemlista);
    },
    error: function(request, status, erro){
      alert("Problema " + status + " Descrição " + erro);
    }
  })
}

//Alunos -----------------------------------------------------
const populaTabelaAlunoGrupo = () =>{
  $.ajax({
    type: "post",
    url: "./templates/php/aluno/exibirAlunoGrupoModulo.php",
    dataType: "JSON",
    success: function(data){
      var itemlista = "";
      $.each(data.aluno, function(i, dados){
        itemlista+= `<tr>
                        <td><span class="${dados.status}"> ${dados.status}</span></td>
                        <td>${dados.nome}</td>
                        <td>${dados.nomeGrupo}</td>
                        <td>${dados.rm}</td>
                        <td><span > <img src="galeria/icon/writing.png" alt="Editar" class= "icon2" onClick="buscarDadosAluno(${dados.rm})"></span></td>
                        <td><span ></span></td>
                    </tr>`

      });

      $(".tbodyAlunosGrupo").html(itemlista);
    },
    error: function(data){
      alert("erro");
    }
  })
}

const buscarDadosAluno = (codigo) => {
    var parametros = {
      "codigo":codigo
    }
    $.ajax({
      type: "post",
      url: "./templates/php/aluno/listarUm.php",
      data: parametros,
      dataType: "JSON",
      success: function(data){
          $.each(data.aluno, function(i, dados){
            $("#alterarNmAluno").val(dados.nome);
            $("#alterarRmAluno").val(dados.rm);
          });
          populaModalGrupoAluno();
          $("#modalAlterarAluno").modal('show');
          
      },
      error: function(data){
        alert("Erro");
      }
    });
}

const populaModalGrupoAluno = () =>{

  $.ajax({
    type: "post",
    url: "./templates/php/grupo/populaModalGrupoAluno.php",
    dataType: "JSON",
    success: function(data){

      var itemlista = "";

      $.each(data.grupo, function(i, dados){
        itemlista += `<option value="${dados.codigo}"> ${dados.nome} </option>`;
      });

      $("#alterarGrupoAluno").html(itemlista);
    },
    error: function(data){
      alert('Erro');
    }
  })
}

$(document).on("click", ".btnAlterarAluno", function(){
  var parametros = {
    nome:$("#alterarNmAluno").val(),
    rm:$("#alterarRmAluno").val(),
    status:$("#alterarStatusAluno").val(),
    grupo:$("#alterarGrupoAluno").val()
  }

  $.ajax({
    type: "post",
    url: "./templates/php/aluno/atualizarAluno.php",
    data: parametros,
    success: function(data){
      document.location.reload(true);
    },
    error: function(data){
      alert("Erro");
    }
  });
});

//Perfil-----------------------

const verificarLogin = () =>{
  $.ajax({
    type: "post",
    url: "./templates/php/perfil/exibirPerfil.php",
    dataType: "json",
    success: function(data){
      $.each(data.perfil, function(i, dados){
        $("#nomePerfil").text(dados.nome);
        $(".alterarEmailPerfil").val(dados.email);
        $(".alterarRMPerfil").val(dados.rm);
        $(".alterarCPFPerfil").val(dados.cpf);
        $(".alterarSenhaPerfil").val(dados.senha);
      });
      $(".btnEditarPerfil").show();
      $(".btnConfirmarEdicaoPerfil").hide();
      $(".cancelarAlteracaoPerfil").hide();
    },
    error: function(data){
      alert('Erro');
    }
  })
};

$(document).on("click",".btnEditarPerfil", function(){
        $(".alterarEmailPerfil").prop("readonly", false);
        $(".alterarCPFPerfil").prop("readonly", false);
        $(".alterarSenhaPerfil").prop("readonly", false);
        $(".btnConfirmarEdicaoPerfil").show();
        $(".cancelarAlteracaoPerfil").show();
        $(this).hide();
});

$(document).on("click", ".cancelarAlteracaoPerfil", function(){
        $(".alterarEmailPerfil").prop("readonly", true);
        $(".alterarCPFPerfil").prop("readonly", true);
        $(".alterarSenhaPerfil").prop("readonly", true);
        verificarLogin();
});

$(document).on("click", ".btnConfirmarEdicaoPerfil", function(){
  var parametros = {
        email:$(".alterarEmailPerfil").val(),
        rm:$(".alterarRMPerfil").val(),
        cpf:$(".alterarCPFPerfil").val(),
        senha:$(".alterarSenhaPerfil").val()
  }
  alert(parametros);
  $.ajax({
    type: "post",
    url: "./templates/php/perfil/alterarPerfil.php",
    data: parametros,
    success: function(data){
      document.location.reload(true);
    },
    error: function(data){
      alert("Erro");
    }
  });
})

