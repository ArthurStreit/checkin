<h2>Inscrições Offline</h2>
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>Evento</th>
                <th>Status</th>
                <th>Check-in</th> <!-- Coluna de Check-in adicionada -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($inscricoes as $inscricao): ?>
                <tr>
                    <td><?= h($inscricao->id) ?></td>
                    <td><?= h($inscricao->usuario->nome) ?></td>
                    <td><?= h($inscricao->evento->nome) ?></td>
                    <td><?= h($inscricao->status) ?></td>
                    <td>
                        <!-- Botões de Check-in Offline -->
                        <button onclick="registrarCheckinOffline(<?= $inscricao->id ?>)" class="btn btn-secondary btn-sm">
                            Salvar Offline
                        </button>
                        <button onclick="sincronizarCheckins()" class="btn btn-success btn-sm">
                            Sincronizar
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Importação do PouchDB e Script Offline -->
<script src="https://cdn.jsdelivr.net/npm/pouchdb@7.3.0/dist/pouchdb.min.js"></script>
<?= $this->Html->script('offline'); ?>