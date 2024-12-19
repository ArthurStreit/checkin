<div class="container">
    <!-- Eventos Offline -->
    <h2>Eventos Offline</h2>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Data de Início</th>
            </tr>
        </thead>
        <tbody id="eventos-offline">
            <!-- Dados preenchidos via JavaScript -->
        </tbody>
    </table>

    <!-- Inscrições Offline -->
    <h2>Inscrições Offline</h2>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>Evento</th>
                <th>Status</th>
                <th>Check-in</th> <!-- Coluna Check-in adicionada -->
            </tr>
        </thead>
        <tbody id="inscricoes-offline">
            <!-- Dados preenchidos via JavaScript -->
        </tbody>
    </table>

    <!-- Botões principais -->
    <div class="mt-4">
        <button onclick="ativarModoOffline()" class="btn btn-danger">Modo Offline Ativo</button>
        <button onclick="sincronizarDados()" class="btn btn-success">Sincronizar Dados</button>
    </div>
</div>

<!-- Script JavaScript -->
<script>
    function listarDadosOffline() {
        console.log("Carregando dados offline...");

        // Recupera os dados de inscrições do PouchDB
        offline_db.get('inscricoes').then(doc => {
            const inscricoes = doc.data;
            let html = "";

            inscricoes.forEach(inscricao => {
                html += `
                    <tr>
                        <td>${inscricao.id}</td>
                        <td>${inscricao.usuario.nome}</td>
                        <td>${inscricao.evento.nome}</td>
                        <td>${inscricao.status}</td>
                        <td>
                            <button onclick="registrarCheckinOffline(${inscricao.id})" class="btn btn-secondary btn-sm">Salvar Offline</button>
                            <button onclick="sincronizarCheckins()" class="btn btn-success btn-sm">Sincronizar</button>
                        </td>
                    </tr>
                `;
            });

            // Insere o conteúdo na tabela de inscrições
            document.getElementById("inscricoes-offline").innerHTML = html;
        }).catch(err => {
            console.error("Erro ao carregar dados offline:", err);
            document.getElementById("inscricoes-offline").innerHTML = "<tr><td colspan='5'>Erro ao carregar dados offline.</td></tr>";
        });
    }

    // Chamando a função ao ativar o modo offline
    listarDadosOffline();
</script>