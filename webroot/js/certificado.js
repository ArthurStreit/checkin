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