var cont = 0
var tabela = document.getElementById("example1");
var linhas = tabela.getElementsByTagName("tr");
for (var i = 0; i < linhas.length; i++) {
    var linha = linhas[i];
    linha.addEventListener("click", function () {
        //Adicionar ao atual
        selLinha(this, false); //Selecione apenas um
        //selLinha(this, true); //Selecione quantos quiser
    });
}


function myFunction() {
    var ano = document.getElementById('myInput').value
    const urlParams = new URLSearchParams(window.location.search);

    urlParams.set('year', ano);

    window.location.search = urlParams;

    


}

function selLinha(linha, multiplos) {
    if (!multiplos) {
        var linhas = linha.parentElement.getElementsByTagName("tr");
        for (var i = 0; i < linhas.length; i++) {
            var linha_ = linhas[i];
            linha_.classList.remove("selecionado");
        }
    }
    linha.classList.toggle("selecionado");
    modal();
}

function modal() {
    var selecionados = tabela.getElementsByClassName("selecionado");
    var idVar = "";
    var dataDocumentoVar = "";
    var dataRecebimentoVar = "";
    var dataRealizacaoPericiaVar = "";
    var tipoPericiaVar = "";
    var exameVar = "";
    var descricaoVar = "";
    var nDocVar = "";
    var boVar = "";
    var ipVar = "";
    var outrosProcVar = "";
    var escrivaoVar = "";
    var delegaciaVar = "";
    var autoridadeRequisitanteVar = "";
    var tipoEnderecoVar = "";
    var logradouroVar = "";
    var numeroCasaVar = "";
    var bairroVar = "";
    var cidadeVar = "";
    var NumerolaudosExpedidosVar = "";
    var numeroOficioVar = "";
    var usuarioResponsavelVar = "";
    var descricaoOficioVar = "";
    var observacoesVar = "";
    var vitimasVar = "";
    var marcaVar = "";
    var placaVar = "";
    var corVar = "";
    var idCarroVar = "";
    var tipoVeiculoVar = "";

    for (var i = 0; i < selecionados.length; i++) {
        var selecionado = selecionados[i];
        selecionado = selecionado.getElementsByTagName("td");
    }
    boasvindas(selecionado);
}

function boasvindas(selecionado) {
    idVar = selecionado[0].innerHTML;
    dataDocumentoVar = selecionado[1].innerHTML;
    usuarioResponsavelVar = selecionado[2].innerHTML;
    numeroOficioVar = selecionado[3].innerHTML;
    boVar = selecionado[4].innerHTML;
    tipoPericiaVar = selecionado[5].innerHTML;
    exameVar = selecionado[6].innerHTML;
    descricaoVar = selecionado[8].innerHTML;
    nDocVar = selecionado[9].innerHTML;
    dataRealizacaoPericiaVar = selecionado[10].innerHTML;
    ipVar = selecionado[11].innerHTML;
    outrosProcVar = selecionado[12].innerHTML;
    escrivaoVar = selecionado[13].innerHTML;
    delegaciaVar = selecionado[14].innerHTML;
    autoridadeRequisitanteVar = selecionado[15].innerHTML;
    tipoEnderecoVar = selecionado[16].innerHTML;
    logradouroVar = selecionado[17].innerHTML;
    numeroCasaVar = selecionado[18].innerHTML;
    bairroVar = selecionado[19].innerHTML;
    cidadeVar = selecionado[20].innerHTML;
    NumerolaudosExpedidosVar = selecionado[21].innerHTML;
    dataRecebimentoVar = selecionado[22].innerHTML;
    descricaoOficioVar = selecionado[23].innerHTML;
    observacoesVar = selecionado[24].innerHTML;
    vitimasVar = selecionado[25].innerHTML;
    marcaVar = selecionado[26].innerHTML;
    placaVar = selecionado[27].innerHTML;
    corVar = selecionado[28].innerHTML;
    idCarroVar = selecionado[29].innerHTML;
    tipoVeiculoVar = selecionado[30].innerHTML;

    document.getElementById("id").innerHTML = idVar;
    document.getElementById("dataDocumento").innerHTML = dataDocumentoVar;
    document.getElementById("dataRecebimento").innerHTML = dataRecebimentoVar;
    document.getElementById("dataRealizacaoPericia").innerHTML = dataRealizacaoPericiaVar;
    document.getElementById("tipoPericia").innerHTML = tipoPericiaVar;
    document.getElementById("exame").innerHTML = exameVar;
    document.getElementById("descricao").innerHTML = descricaoVar;
    document.getElementById("nDoc").innerHTML = nDocVar;
    document.getElementById("bo").innerHTML = boVar;
    document.getElementById("ip").innerHTML = ipVar;
    document.getElementById("outrosProc").innerHTML = outrosProcVar;
    document.getElementById("escrivao").innerHTML = escrivaoVar;
    document.getElementById("delegacia").innerHTML = delegaciaVar;
    document.getElementById("autoridadeRequisitante").innerHTML = autoridadeRequisitanteVar;
    document.getElementById("tipoEndereco").innerHTML = tipoEnderecoVar;
    document.getElementById("logradouro").innerHTML = logradouroVar;
    document.getElementById("numeroCasa").innerHTML = numeroCasaVar;
    document.getElementById("bairro").innerHTML = bairroVar;
    document.getElementById("cidade").innerHTML = cidadeVar;
    document.getElementById("NumerolaudosExpedidos").innerHTML = NumerolaudosExpedidosVar;
    document.getElementById("numeroOficio").innerHTML = numeroOficioVar;
    document.getElementById("usuarioResponsavel").innerHTML = usuarioResponsavelVar;
    document.getElementById("descricaoOficio").innerHTML = descricaoOficioVar;
    document.getElementById("observacoes").innerHTML = observacoesVar;
    var vitimasVar = vitimasVar.split("#");
    vitimasVar.shift();
    document.getElementById("vitimas").innerHTML = vitimasVar;
    var marcaVar = marcaVar.split("#");
    var placaVar = placaVar.split("#");
    var corVar = corVar.split("#");
    var idCarroVar = idCarroVar.split("#");
    var tipoVeiculoVar = tipoVeiculoVar.split("#");

    maiorId = idCarroVar.length;
    $("tr.car").remove();
    cont = maiorId
    for (var i = 1; i < cont; i++) {
        $("#carros").append("<tr class='car'><td>" + i + "</td><td>" + marcaVar[i] + "</td><td>" + placaVar[i] + "</td><td>" + corVar[i] + "</td><td>" + tipoVeiculoVar[i] + "</td></tr>"
        )
    }
}