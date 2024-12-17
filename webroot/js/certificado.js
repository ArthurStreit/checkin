$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
    }
});

function emitirCertificado(inscricao_id) {
    console.log("Emitindo certificado para inscrição ID:", inscricao_id);

    $.ajax({
        url: "/certificados/emitir-certificado/" + inscricao_id,
        type: "POST",
        dataType: "html",
        success: function (response) {
            console.log("Resposta do servidor:", response);
            $("body").html(response);
        },
        error: function (xhr, status, error) {
            alert("Erro ao emitir o certificado. Por favor, tente novamente.");
            console.error("Erro na requisição AJAX:", {
                status: status,
                error: error,
                response: xhr.responseText,
            });
        },
    });
}

function validarCertificado() {
    const codigoValidacao = $('#codigo_validacao').val();

    console.log("Validando certificado com código:", codigoValidacao);

    $.ajax({
        url: "/certificados/validar-certificado",
        type: "POST",
        data: { codigo_validacao: codigoValidacao },
        dataType: "html",
        success: function (response) {
            console.log("Resposta da validação:", response);
            $("body").html(response);
        },
        error: function (xhr, status, error) {
            alert("Erro ao validar o certificado. Tente novamente.");
            console.error("Erro na validação AJAX:", {
                status: status,
                error: error,
                response: xhr.responseText,
            });
        },
    });
}