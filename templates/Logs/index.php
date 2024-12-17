<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Log> $logs
 */
?>
<div class="logs index content">
    <?= $this->Html->link(__('Novo Log'), ['action' => 'add'], ['class' => 'btn btn-primary float-end']) ?>
    <h3><?= __('Logs') ?></h3>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('rota') ?></th>
                <th><?= $this->Paginator->sort('metodo') ?></th>
                <th><?= __('Payload') ?></th>
                <th><?= __('Resposta') ?></th>
                <th><?= $this->Paginator->sort('criado em') ?></th>
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($logs as $log): ?>
            <tr>
                <td><?= $this->Number->format($log->id) ?></td>
                <td><?= h($log->rota) ?></td>
                <td><?= h($log->metodo) ?></td>
                <td><?= h($log->payload) ?></td>
                <td><?= h($log->resposta) ?></td>
                <td><?= h($log->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $log->id], ['class' => 'btn btn-info btn-sm']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $log->id], ['class' => 'btn btn-warning btn-sm']) ?>
                    <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $log->id], ['confirm' => __('Tem certeza que quer deletar # {0}?', $log->id), 'class' => 'btn btn-danger btn-sm']) ?>
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