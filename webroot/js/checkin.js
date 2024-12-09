$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
    }
});

function realizarCheckin(inscricao_id) {
    console.log("Iniciando check-in para inscrição ID:", inscricao_id);

    $.ajax({
        url: "/inscricoes/checkin/" + inscricao_id,
        type: "POST",
        dataType: "html",
        data: {
            "enviarEmail": true
        },
        success: function (response) {
            console.log("Resposta HTML recebida do servidor:", response);

            $("body").html(response);
        },
        error: function (xhr, status, error) {
            alert("Erro ao realizar o check-in. Por favor, tente novamente.");
            console.error("Erro na requisição AJAX:", {
                status: status,
                error: error,
                response: xhr.responseText,
            });
        },
    });
}

function cancelarCheckin(inscricao_id) {
    console.log("Iniciando cancelamento de check-in para inscrição ID:", inscricao_id);

    $.ajax({
        url: "/inscricoes/cancel-checkin/" + inscricao_id,
        type: "POST",
        dataType: "html",
        data: {
            "enviarEmail": true
        },
        success: function (response) {
            console.log("Resposta HTML recebida do servidor:", response);

            $("body").html(response);
        },
        error: function (xhr, status, error) {
            alert("Erro ao cancelar o check-in. Por favor, tente novamente.");
            console.error("Erro na requisição AJAX:", {
                status: status,
                error: error,
                response: xhr.responseText,
            });
        },
    });
}