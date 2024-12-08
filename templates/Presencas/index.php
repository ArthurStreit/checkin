<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Presenca> $presencas
 */
?>
<div class="presencas index content">
    <?= $this->Html->link(__('Nova Presenca'), ['action' => 'add'], ['class' => 'btn btn-success float-end mb-3']) ?>
    <h3><?= __('Presencas') ?></h3>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('inscricao_id') ?></th>
                    <th><?= $this->Paginator->sort('data_presenca') ?></th>
                    <th><?= $this->Paginator->sort('criado em') ?></th>
                    <th><?= $this->Paginator->sort('modificado em') ?></th>
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($presencas as $presenca): ?>
                <tr>
                    <td><?= $this->Number->format($presenca->id) ?></td>
                    <td><?= $presenca->has('inscrico') ? $this->Html->link($presenca->inscrico->id, ['controller' => 'Inscricoes', 'action' => 'view', $presenca->inscrico->id]) : '' ?></td>
                    <td><?= h($presenca->data_presenca) ?></td>
                    <td><?= h($presenca->created) ?></td>
                    <td><?= h($presenca->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $presenca->id], ['class' => 'btn btn-primary btn-sm']) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $presenca->id], ['class' => 'btn btn-warning btn-sm']) ?>
                        <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $presenca->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Tem certeza que quer deletar # {0}?', $presenca->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination justify-content-center">
            <?= $this->Paginator->first('<< ' . __('First')) ?>
            <?= $this->Paginator->prev('< ' . __('Previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Next') . ' >') ?>
            <?= $this->Paginator->last(__('Last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>