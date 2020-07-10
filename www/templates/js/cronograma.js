document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'pt-br',
        plugins: ['interaction', 'dayGrid', 'interactionPlugin'],
        //defaultDate: '2019-04-12',
        selectable: true,
        eventLimit: true,
        editable: false,
        events: './templates/php/cronograma/listarEventos.php',
        extraParams: function () {
            return {
                cachebuster: new Date().valueOf()
            };
        },
        
        eventClick: function(info) {
            $('#modalAlterarDia').modal('show');
            $(".cancelarAlteracaoEvento").hide();
            $(".confirmarAlteracaoEvento").hide();
            $(".btnAlterarEvento").show();
            $(".btnExcluirEvento").show();
            $("#alterarGrupoEvento").prop("disabled", true);
            $("#alterarCampoEvento").prop("disabled", true);
            $("#alterarComponenteEvento").prop("disabled", true);
            $("#alterarInicioEvento").prop("disabled", true);
            $("#alterarProfessorEvento").prop("disabled", true);
            $("#alterarFimEvento").prop("disabled", true);
            exibirEvento(info.event.id,info.event.start.toLocaleString(), info.event.end.toLocaleString());
            
        },
        select: function(info){
            //alert('Inicio ' + info.start.toLocaleString()   );
            $("#modalCadastrarDia").modal('show');
            $("#cadastrarInicioEvento").val(info.start.toLocaleString());
            $("#cadastrarFimEvento").val(info.end.toLocaleString());
            exibirDadosGrupoEventoCadastro(0);
            exibirDadosComponenteEventoCadastro(0);
        }
    });

    calendar.render();
});

//Mascara para o campo data e hora
function DataHora(evento, objeto) {
    var keypress = (window.event) ? event.keyCode : evento.which;
    campo = eval(objeto);
    if (campo.value == '00/00/0000 00:00:00') {
        campo.value = "";
    }

    caracteres = '0123456789';
    separacao1 = '/';
    separacao2 = ' ';
    separacao3 = ':';
    conjunto1 = 2;
    conjunto2 = 5;
    conjunto3 = 10;
    conjunto4 = 13;
    conjunto5 = 16;
    if ((caracteres.search(String.fromCharCode(keypress)) != -1) && campo.value.length < (19)) {
        if (campo.value.length == conjunto1)
            campo.value = campo.value + separacao1;
        else if (campo.value.length == conjunto2)
            campo.value = campo.value + separacao1;
        else if (campo.value.length == conjunto3)
            campo.value = campo.value + separacao2;
        else if (campo.value.length == conjunto4)
            campo.value = campo.value + separacao3;
        else if (campo.value.length == conjunto5)
            campo.value = campo.value + separacao3;
    } else {
        event.returnValue = false;
    }
}

const exibirEvento = (codigo, dataInicio, dataFinal) =>{
    var parametros = {
        codigo:codigo
    }

    $.ajax({
        type: "post",
        url: "./templates/php/cronograma/exibirEvento.php",
        data: parametros,
        dataType: "JSON",
        success: function(data){
            $.each(data.evento, function(i, dados){
                $("#alterarCodigoEvento").val(parametros.codigo);
                $("#alterarGrupoEvento").html(`<option value='${dados.codigoGrupo}'> ${dados.grupo} </option>`);
                $("#alterarComponenteEvento").html(`<option value='${dados.codigoComponente}'> ${dados.nomeComponente} </option>`);
                $("#alterarCampoEvento").html(`<option value='${dados.codigoCampo}'> ${dados.nomeCampo} </option>`);
                $("#alterarProfessorEvento").html(`<option value='${dados.rmUsuario}'> ${dados.nomeUsuario} </option>`);
                $("#alterarInicioEvento").val(dataInicio);
                $("#alterarFimEvento").val(dataFinal);
            });

            
        },
        error: function(data){
            alert("Erro");
        }

    });
}

$(document).on("click", ".btnAlterarEvento", function(){
    $(this).hide();
    $(".btnExcluirEvento").hide();
    $(".confirmarAlteracaoEvento").show();
    $(".cancelarAlteracaoEvento").show();
    $("#alterarGrupoEvento").prop("disabled", false);
    $("#alterarCampoEvento").prop("disabled", false);
    $("#alterarComponenteEvento").prop("disabled", false);
    $("#alterarInicioEvento").prop("disabled", false);
    $("#alterarProfessorEvento").prop("disabled", false);
    $("#alterarFimEvento").prop("disabled", false);
    exibirDadosGrupoEvento($("#alterarGrupoEvento").val());
    exibirDadosComponenteEvento($("#alterarComponenteEvento").val());
    
});

$(document).on("click", ".cancelarAlteracaoEvento", function(){
    $(".cancelarAlteracaoEvento").hide();
    $(".confirmarAlteracaoEvento").hide();
    $(".btnAlterarEvento").show();
    $(".btnExcluirEvento").show();
    $("#alterarGrupoEvento").prop("disabled", true);
    $("#alterarCampoEvento").prop("disabled", true);
    $("#alterarComponenteEvento").prop("disabled", true);
    $("#alterarInicioEvento").prop("disabled", true);
    $("#alterarProfessorEvento").prop("disabled", true);
    $("#alterarFimEvento").prop("disabled", true);
    exibirEvento($("#alterarCodigoEvento").val(), $("#alterarInicioEvento").val(), $("#alterarFimEvento").val());
});

const exibirDadosGrupoEvento = (codigoGrupo) => {
    var parametros = {
        codigoGrupo:codigoGrupo
    }
    $.ajax({
        type: "post",
        url: "./templates/php/cronograma/exibirDadosGrupoEvento.php",
        data: parametros,
        dataType: "json",
        success: function(data){
            var itemlista = '';

            $.each(data.grupo, function(i, dados){
                itemlista += `<option value="${dados.codigo}"> ${dados.nome} </option> `;
            });

            $("#alterarGrupoEvento").html($("#alterarGrupoEvento").html() + itemlista);
        },
        error: function(data){
            alert("Erro");
        }
    });
}

const exibirDadosGrupoEventoCadastro = (codigoGrupo) => {
    var parametros = {
        codigoGrupo:codigoGrupo
    }
    $.ajax({
        type: "post",
        url: "./templates/php/cronograma/exibirDadosGrupoEvento.php",
        data: parametros,
        dataType: "json",
        success: function(data){
            var itemlista = '';

            $.each(data.grupo, function(i, dados){
                itemlista += `<option value="${dados.codigo}"> ${dados.nome} </option> `;
            });

            $("#cadastrarGrupoEvento").html(itemlista);
        },
        error: function(data){
            alert("Erro");
        }
    });
}

const exibirDadosComponenteEvento = (codigoComponente) => {
    var parametros = {
        codigoComponente:codigoComponente
    }
    $.ajax({
        type: "post",
        url: "./templates/php/cronograma/exibirDadosComponenteEvento.php",
        data: parametros,
        dataType: "json",
        success: function(data){
            var itemlista = '';

            $.each(data.componente, function(i, dados){
                itemlista += `<option value="${dados.codigo}"> ${dados.nome} </option> `;
            });

            $("#alterarComponenteEvento").html($("#alterarComponenteEvento").html() + itemlista);
        },
        error: function(data){
            alert("Erro");
        }
    });
}

const exibirDadosComponenteEventoCadastro = (codigoComponente) => {
    var parametros = {
        codigoComponente:codigoComponente
    }
    $.ajax({
        type: "post",
        url: "./templates/php/cronograma/exibirDadosComponenteEvento.php",
        data: parametros,
        dataType: "json",
        success: function(data){
            var itemlista = '';

            $.each(data.componente, function(i, dados){
                itemlista += `<option value="${dados.codigo}"> ${dados.nome} </option> `;
            });

            $("#cadastrarComponenteEvento").html(itemlista);
        },
        error: function(data){
            alert("Erro");
        }
    });
}

$(document).on("change", "#alterarComponenteEvento", function(){
    var parametros = {
        codigoComponente:$(this).val()
    }

    $.ajax({
        type:"post",
        url:"./templates/php/cronograma/exibirDadosCampoEvento.php",
        data: parametros,
        dataType: "json",
        success: function(data){
            var itemlista = '';

            $.each(data.campo, function(i, dados){
                itemlista += `<option value="${dados.codigo}"> ${dados.nome} </option> `;
            });

            $("#alterarCampoEvento").html(itemlista);
            exibirDadosProfessorEvento();
        },
        error: function(data){
            alert('erro')
        }
    })

});

$(document).on("change", "#cadastrarComponenteEvento", function(){
    var parametros = {
        codigoComponente:$(this).val()
    }

    $.ajax({
        type:"post",
        url:"./templates/php/cronograma/exibirDadosCampoEvento.php",
        data: parametros,
        dataType: "json",
        success: function(data){
            var itemlista = '';

            $.each(data.campo, function(i, dados){
                itemlista += `<option value="${dados.codigo}"> ${dados.nome} </option> `;
            });

            $("#cadastrarCampoEvento").html(itemlista);
            exibirDadosProfessorEventoCadastro();
        },
        error: function(data){
            alert('erro')
        }
    })

});

const exibirDadosProfessorEvento = () =>{
    var parametros = {
        codigoComponente:$("#alterarComponenteEvento").val(),
        codigoCampo:$("#alterarCampoEvento").val()
    }



   
    $.ajax({
        type: "post",
        url: "./templates/php/cronograma/exibirDadosProfessorEvento.php",
        data: parametros,
        dataType: "json",
        success: function(data){
            var itemlista = '';

            $.each(data.usuario, function(i, dados){
                itemlista += `<option value="${dados.codigo}"> ${dados.nome} </option> `;
            });

            $("#alterarProfessorEvento").html(itemlista);
            
            
        },
        error: function(data){
            alert('erro');
        }
    });
}

const exibirDadosProfessorEventoCadastro = () =>{
    var parametros = {
        codigoComponente:$("#cadastrarComponenteEvento").val(),
        codigoCampo:$("#cadastrarCampoEvento").val()
    }



   
    $.ajax({
        type: "post",
        url: "./templates/php/cronograma/exibirDadosProfessorEvento.php",
        data: parametros,
        dataType: "json",
        success: function(data){
            var itemlista = '';

            $.each(data.usuario, function(i, dados){
                itemlista += `<option value="${dados.codigo}"> ${dados.nome} </option> `;
            });

            $("#cadastrarProfessorEvento").html(itemlista);
            
            exibirDadosCampoEvento(parametros.codigoComponente);
        },
        error: function(data){
            alert('erro');
        }
    });
}

$(document).on("click", '.confirmarAlteracaoEvento', function(){

    var parametros = {
        codigoEvento:$("#alterarCodigoEvento").val(),
        codigoComponente:$("#alterarComponenteEvento").val(),
        codigoCampo:$("#alterarCampoEvento").val(),
        codigoGrupo:$("#alterarGrupoEvento").val(),
        codigoProfessor:$("#alterarProfessorEvento").val(),
        dataInicio:$("#alterarInicioEvento").val(),
        dataFim:$("#alterarFimEvento").val()
    }

 
    $.ajax({
        type: "post",
        url: "./templates/php/cronograma/exibirRegistroCorreto.php",
        data: parametros,
        dataType: "json",
        success: function(data){
            $.each(data.id, function(i, dados){
                atualizarEvento(dados.codigo)
            });
        },
        error: function(data){
            alert('erro');
        }
    })
})

$(document).on("click", ".btnCadastrarEvento", function(){
    var parametros = {
        codigoComponente:$("#cadastrarComponenteEvento").val(),
        codigoCampo:$("#cadastrarCampoEvento").val(),
        codigoProfessor:$("#cadastrarProfessorEvento").val()
    }

 
    $.ajax({
        type: "post",
        url: "./templates/php/cronograma/exibirRegistroCorreto.php",
        data: parametros,
        dataType: "json",
        success: function(data){
            $.each(data.id, function(i, dados){
                cadastrarEvento(dados.codigo)
            });
        },
        error: function(data){
            alert('erro');
        }
    })
});

const atualizarEvento = (codigoCorreto) =>{
    var parametros = {
        codigoEvento:$("#alterarCodigoEvento").val(),
        dataInicio:$("#alterarInicioEvento").val(),
        dataFim:$("#alterarFimEvento").val(),
        codigoCorreto:codigoCorreto,
        codigoGrupo:$("#alterarGrupoEvento").val()
    }

    
   $.ajax({
       type:"post",
       url: "./templates/php/cronograma/atualizarEvento.php",
       data: parametros,
       success: function(data){
            document.location.reload(true);
       },
       error: function(data){
           alert("Erro");
       }
   })

    
}

const cadastrarEvento = (codigoCorreto) =>{
    var parametros = {
        dataInicio:$("#cadastrarInicioEvento").val(),
        dataFim:$("#cadastrarFimEvento").val(),
        codigoCorreto:codigoCorreto,
        codigoGrupo:$("#cadastrarGrupoEvento").val(),
        corEvento:$("#cadastrarCorEvento").val(),
    }

    
   $.ajax({
       type:"post",
       url: "./templates/php/cronograma/cadastrarEvento.php",
       data: parametros,
       success: function(data){
            document.location.reload(true);
       },
       error: function(data){
           alert("Erro");
       }
   })

    
}

$(document).on("click", ".btnExcluirEvento", function(){
    if(confirm('Deseja apagar esse registro?')){
        var parametros = {
            codigoEvento:$("#alterarCodigoEvento").val()
        }

        $.ajax({
            type:"post",
            url:"./templates/php/cronograma/deletarEvento.php",
            data:parametros,
            success: function(data){
                document.location.reload(true);
            },
            error: function(data){
                alert("Erro");
            }
        });
    }
});

$(document).on("click", ".exibirPDF", function(){
    $("#modalExibirPDF").modal('show');
    exibirInformacaoPDF();
});

const exibirInformacaoPDF = () =>{
    $.ajax({
        type: "post",
        url: "./templates/php/cronograma/exibirPDF.php",
        dataType: "json",
        success: function(data){
            var itemlista = '';

            $.each(data.cronograma, function(i, dados){
                itemlista += `<tr style="background: ${dados.cor}; font-weight: bold">
                                    <td> ${dados.siglaGrupo}</td>
                                    <td> ${formatarData(dados.data)}</td>
                                    <td> ${dados.nomeComponente}</td>
                                    <td> ${dados.nomeProfessor}</td>
                                    <td> ${dados.nomeCampo}</td>
                              </tr>`
            });

            $(".tbodyPDF").html(itemlista);
        },
        error: function(data){
            alert("Erro");
        }
    });
}

const formatarData = (data) =>{
    var arrayData = data.split('-');
    var arrayDia = arrayData[2].split(' ');
    var diaCorreto = arrayDia[0];
    var dataCorreta = `${diaCorreto}/${arrayData[1]}/${arrayData[0]}`;
    return dataCorreta;
}

(function($){
    $.fn.createPdf = function(parametros) {
        
        var config = {              
            'fileName':'html-to-pdf'
        };
        
        if (parametros){
            $.extend(config, parametros);
        }                            

        var quotes = document.getElementById($(this).attr('id'));

        html2canvas(quotes, {
            onrendered: function(canvas) {
                var pdf = new jsPDF('p', 'pt', 'letter');

                
                for (var i = 0; i <= quotes.clientHeight/980; i++) {
                    var srcImg  = canvas;
                    var sX      = 0;
                    var sY      = 980*i;
                    var sWidth  = 900;
                    var sHeight = 980;
                    var dX      = 0;
                    var dY      = 0;
                    var dWidth  = 900;
                    var dHeight = 980;

                    window.onePageCanvas = document.createElement("canvas");
                    onePageCanvas.setAttribute('width', 900);
                    onePageCanvas.setAttribute('height', 980);
                    var ctx = onePageCanvas.getContext('2d');
                    ctx.webkitImageSmoothingEnabled = false; //Webkit/Safari/Chrome
                    ctx.mozImageSmoothingEnabled = false;    //Firefox/Gecko
                    ctx.imageSmoothingEnabled = false;       //Outros navegadores
                    ctx.drawImage(srcImg,sX,sY,sWidth,sHeight,dX,dY,dWidth,dHeight);
                    

                    var canvasDataURL = onePageCanvas.toDataURL("image/png", 1.0);
                    var width         = onePageCanvas.width;
                    var height        = onePageCanvas.clientHeight;

                    if (i > 0) {
                        pdf.addPage(612, 791);
                    }

                    pdf.setPage(i+1);
                    pdf.addImage(canvasDataURL, 'PNG', 20, 40, (width*.62), (height*.62));
                }

                pdf.save(config.fileName);
            }
        });
    };
})(jQuery);
 

function createPDF() {
    $('#renderPDF').createPdf({
        'fileName' : 'testePDF'
    });
}

