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
        data: {
            "enviarEmail": true
        },
        success: function (response) {
            if (response.success) {
                alert(response.message || "Check-in realizado com sucesso!");
                window.location.reload();
            } else {
                alert("Erro ao realizar o check-in: " + (response.message || "Erro desconhecido."));
            }
        },
        error: function () {
            alert("Erro ao realizar o check-in. Por favor, tente novamente.");
        }
    });
}

function cancelarCheckin(inscricao_id) {
    console.log("Iniciando cancelamento de check-in para inscrição ID:", inscricao_id);

    $.ajax({
        url: "/inscricoes/cancel-checkin/" + inscricao_id,
        type: "POST",
        data: {
            "enviarEmail": true
        },
        success: function (response) {
            if (response.success) {
                alert(response.message || "Check-in cancelado com sucesso!");
                window.location.reload();
            } else {
                alert("Erro ao cancelar o check-in: " + (response.message || "Erro desconhecido."));
            }
        },
        error: function () {
            alert("Erro ao cancelar o check-in. Por favor, tente novamente.");
        }
    });
}