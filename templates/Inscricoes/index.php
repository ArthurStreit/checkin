<div class="inscricoes index content">
    <?= $this->Html->link(__('Nova Inscricao'), ['action' => 'add'], ['class' => 'btn btn-primary float-end mb-3']) ?>
    <h3><?= __('Inscricoes') ?></h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('usuario_id') ?></th>
                    <th><?= $this->Paginator->sort('evento_id') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('criado em') ?></th>
                    <th><?= $this->Paginator->sort('modificado em') ?></th>
                    <th class="actions"><?= __('Ações') ?></th>
                    <th><?= __('Check-in') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($inscricoes as $inscricao): ?>
                <tr>
                    <td><?= $this->Number->format($inscricao->id) ?></td>
                    <td><?= $inscricao->has('usuario') ? $this->Html->link($inscricao->usuario->nome, ['controller' => 'Usuarios', 'action' => 'view', $inscricao->usuario->id]) : '' ?></td>
                    <td><?= $inscricao->has('evento') ? $this->Html->link($inscricao->evento->nome, ['controller' => 'Eventos', 'action' => 'view', $inscricao->evento->id]) : '' ?></td>
                    <td><?= h($inscricao->status) ?></td>
                    <td><?= h($inscricao->created) ?></td>
                    <td><?= h($inscricao->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $inscricao->id], ['class' => 'btn btn-sm btn-info']) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $inscricao->id], ['class' => 'btn btn-sm btn-warning']) ?>
                        <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $inscricao->id], ['confirm' => __('Tem certeza que quer deletar # {0}?', $inscricao->id), 'class' => 'btn btn-sm btn-danger']) ?>
                    </td>
                    <td>
                        <button onclick="realizarCheckin(<?= $inscricao->id ?>)" class="btn btn-primary btn-sm">Check-in</button>
                        <button onclick="cancelarCheckin(<?= $inscricao->id ?>)" class="btn btn-danger">Cancelar Check-in</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>