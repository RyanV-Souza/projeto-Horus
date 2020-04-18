//Funções de Cadastro
$(document).on("click", ".btnCadastrarModulo", function(){
    $(".centro").append(`<div class="quadroModulo moduloAtivo">
                            <span class="numeroModulo">4°Módulo</span>
                            <span class="siglaModulo">4ENF2</span>
                            <span class="anoModulo">2020</span>
                         </div> `)
});

$(document).on("click", ".moduloAtivo", function(){
    $(location).attr("href", "modulo.html");
})