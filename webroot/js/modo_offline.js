const offline_db = new PouchDB('checkin_system_offline');

// Função para sincronizar dados do servidor para o PouchDB
function sincronizarDados() {
    console.log("Iniciando sincronização...");

    // Usando AJAX para buscar views PHP do servidor
    $.when(
        $.ajax({ url: '/eventos/offline', type: 'GET', dataType: 'html' }),
        $.ajax({ url: '/inscricoes/offline', type: 'GET', dataType: 'html' })
    ).done((eventos, inscricoes) => {
        // Salva os dados das views PHP no banco local (PouchDB)
        Promise.all([
            offline_db.put({ _id: 'eventos', data: eventos }).catch(err => console.error("Erro ao sincronizar eventos:", err)),
            offline_db.put({ _id: 'inscricoes', data: inscricoes }).catch(err => console.error("Erro ao sincronizar inscrições:", err)),
        ]).then(() => {
            alert("Dados sincronizados com sucesso!");
            console.log("Sincronização concluída!");
        }).catch(err => {
            console.error("Erro ao salvar dados no PouchDB:", err);
        });
    }).fail((error) => {
        console.error("Erro ao buscar dados do servidor:", error);
        alert("Erro ao sincronizar dados. Verifique a conexão com o servidor.");
    });
}

// Função para listar dados offline e renderizar na página
function listarDadosOffline() {
    console.log("Carregando dados offline...");

    let container = document.querySelector(".container");
    let html = "";

    offline_db.get('eventos').then(doc => {
        console.log("Eventos offline carregados.");
        html += `<div class="eventos">${doc.data}</div>`;
        return offline_db.get('inscricoes');
    }).then(doc => {
        console.log("Inscrições offline carregadas.");
        html += `<div class="inscricoes">${doc.data}</div>`;
        container.innerHTML = html; // Renderiza os dados no container
    }).catch(err => {
        console.error("Erro ao recuperar dados do modo offline:", err);
        container.innerHTML = "<p>Erro ao carregar dados offline. Tente sincronizar novamente.</p>";
    });
}

// Estado do modo offline
let modoOffline = false;

// Alternar modo offline
window.toggleModoOffline = function () {
    modoOffline = !modoOffline;

    const botao = document.getElementById("toggleOfflineMode");

    if (modoOffline) {
        botao.textContent = "Modo Offline Ativo";
        botao.classList.remove("btn-warning");
        botao.classList.add("btn-danger");
        alert("Você está no modo offline. Os dados exibidos são armazenados localmente.");
        listarDadosOffline();
    } else {
        botao.textContent = "Ativar Modo Offline";
        botao.classList.remove("btn-danger");
        botao.classList.add("btn-warning");
        location.reload(); // Recarrega a página para voltar ao modo online
    }
};