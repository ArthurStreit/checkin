<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Evento> $eventos
 */
?>
<div class="eventos index content">
    <?= $this->Html->link(__('Novo Evento'), ['action' => 'add'], ['class' => 'btn btn-primary float-end']) ?>
    <h3><?= __('Eventos') ?></h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('data_inicio') ?></th>
                    <th><?= $this->Paginator->sort('data_fim') ?></th>
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($eventos as $evento): ?>
                <tr>
                    <td><?= $this->Number->format($evento->id) ?></td>
                    <td><?= h($evento->nome) ?></td>
                    <td><?= h($evento->data_inicio) ?></td>
                    <td><?= h($evento->data_fim) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $evento->id], ['class' => 'btn btn-info btn-sm']) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $evento->id], ['class' => 'btn btn-warning btn-sm']) ?>
                        <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $evento->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Tem certeza que deseja deletar o evento #{0}?', $evento->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination justify-content-center">
            <?= $this->Paginator->first('<< ' . __('Primeira')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Próxima') . ' >') ?>
            <?= $this->Paginator->last(__('Última') . ' >>') ?>
        </ul>
        <p class="text-center"><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, exibindo {{current}} registro(s) de {{count}} no total')) ?></p>
    </div>
</div>