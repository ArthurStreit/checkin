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
    <tbody>
        <?php foreach ($eventos as $evento): ?>
            <tr>
                <td><?= h($evento->id) ?></td>
                <td><?= h($evento->nome) ?></td>
                <td><?= h($evento->descricao) ?></td>
                <td><?= h($evento->data_inicio) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
