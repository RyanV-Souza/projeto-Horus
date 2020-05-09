


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

  
  $(document).on("click", "#btnLogin", function(){
    $(location).attr("href", "menuUsuario.html");
  })
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

  const cadastrarProfessor = (codigo) =>{
    $("#modalCadastroCorpoDocente").modal('show');
    populaModalOptionComponente();
    populaModalOptionProfessor();
    $('.btnCadastrarCorpoDocente').attr('onClick', `confirmarCadastroProfessor(${codigo})`);

   }

  

  //BTN - Cadastro
  
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
              alert("Cadastrado com Sucesso!");
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
      telefone:$("#cadastrarTelefoneUsuario").val()
    }

    
    $.ajax({
      type: "POST",
      url: "./templates/php/usuario/cadastro.php",
      data:parametros,
      success: function(data){
        alert('Cadastrado com sucesso');
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
        alert('Cadastrado com sucesso');
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
        alert('Cadastrado com sucesso');
        document.location.reload(true);
      },
      error: function(request, status, erro){
        alert('Problema: ' + status + ' Descrição: ' + erro);
      }
    });

  });

  $(document).on("click", ".btnCadastrarModulo", function(){

    var parametros = {
      nome:$('.cadastrarNmComponente').val(),
      dataInicial:$('.cadastrarDataInicialModulo').val(),
      dataFinal:$('.cadastrarDataFinalModulo').val(),
      sigla:$('.cadastrarSiglaModulo').val(),
      numeroModulo:$(".cadastrarNumeroModulo").val()

      
    }

    $.ajax({
      type: "POST",
      url: "./templates/php/modulo/cadastro.php",
      data:parametros,
      success: function(data){
        alert('Cadastrado com sucesso');
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
        telefone:$("#alterarTelefoneUsuario").val(),
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
                                    <span class="anoModulo">2020</span>
                                  </div> `
          } else if(dados.status =='Desativado'){
            itemlista += ` <div class="quadroModulo moduloAtivo" style="background: #FF6565" onClick="enviarModulo(${dados.codigo})">
                                    <span class="numeroModulo">${dados.numeroModulo}°Módulo</span>
                                    <span class="siglaModulo">${dados.sigla}</span>
                                    <span class="anoModulo">2020</span>
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
              $("#alterarTelefoneUsuario").val(dados.telefone);
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
      $(location).attr('href', 'modulo.html');
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
          $(".cadastrarAluno").attr('onClick', `cadastrarAluno(${dados.codigo})`);
          $('h4').text(`${dados.numero} MÓDULO`);
          exibirCorpoDocente(dados.codigo);
        });
     },
     error: function(request, status, erro){
       alert("Problema " + status + " Descrição " + erro);
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


 