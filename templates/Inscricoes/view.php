    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <h4><?= h($inscricao->id) ?></h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th><?= __('Usuario') ?></th>
                        <td><?= $inscricao->has('usuario') ? $this->Html->link($inscricao->usuario->nome, ['controller' => 'Usuarios', 'action' => 'view', $inscricao->usuario->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Evento') ?></th>
                        <td><?= $inscricao->has('evento') ? $this->Html->link($inscricao->evento->nome, ['controller' => 'Eventos', 'action' => 'view', $inscricao->evento->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Status') ?></th>
                        <td><?= h($inscricao->status) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Criado em') ?></th>
                        <td><?= h($inscricao->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modificado em') ?></th>
                        <td><?= h($inscricao->modified) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
    <aside class="col-md-3">
        <div class="card">
            <div class="card-header"><?= __('Actions') ?></div>
            <div class="list-group list-group-flush">
                <?= $this->Html->link(__('Editar Inscricao'), ['action' => 'edit', $inscricao->id], ['class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Form->postLink(__('Deletar Inscricao'), ['action' => 'delete', $inscricao->id], ['confirm' => __('Tem certeza que quer deletar # {0}?', $inscricao->id), 'class' => 'list-group-item list-group-item-action text-danger']) ?>
                <?= $this->Html->link(__('Listar Inscricoes'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Html->link(__('Nova Inscricao'), ['action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
            </div>
        </div>
    </aside>
</div>