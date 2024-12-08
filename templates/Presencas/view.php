<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Presenca $presenca
 */
?>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3><?= h($presenca->id) ?></h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th><?= __('Inscrito') ?></th>
                        <td><?= $presenca->has('inscrico') ? $this->Html->link($presenca->inscrico->id, ['controller' => 'Inscricoes', 'action' => 'view', $presenca->inscrico->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Data Presenca') ?></th>
                        <td><?= h($presenca->data_presenca) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Criado em') ?></th>
                        <td><?= h($presenca->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modificado em') ?></th>
                        <td><?= h($presenca->modified) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
    <aside class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h4><?= __('Actions') ?></h4>
            </div>
            <div class="list-group list-group-flush">
                <?= $this->Html->link(__('Editar Presença'), ['action' => 'edit', $presenca->id], ['class' => 'list-group-item']) ?>
                <?= $this->Form->postLink(__('Deletar Presença'), ['action' => 'delete', $presenca->id], ['confirm' => __('Tem certeza que quer deletar # {0}?', $presenca->id), 'class' => 'list-group-item']) ?>
                <?= $this->Html->link(__('Listar Presenças'), ['action' => 'index'], ['class' => 'list-group-item']) ?>
                <?= $this->Html->link(__('Nova Presença'), ['action' => 'add'], ['class' => 'list-group-item']) ?>
            </div>
        </div>
    </aside>
</div>