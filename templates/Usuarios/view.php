<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
?>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3><?= h($usuario->nome) ?></h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th><?= __('Nome') ?></th>
                        <td><?= h($usuario->nome) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Email') ?></th>
                        <td><?= h($usuario->email) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Criado em') ?></th>
                        <td><?= h($usuario->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modificado em') ?></th>
                        <td><?= h($usuario->modified) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-md-4">
        <div class="list-group">
            <?= $this->Html->link(__('Editar Usuario'), ['action' => 'edit', $usuario->id], ['class' => 'list-group-item list-group-item-action']) ?>
            <?= $this->Form->postLink(__('Deletar Usuario'), ['action' => 'delete', $usuario->id], ['confirm' => __('Tem certeza que quer deletar # {0}?', $usuario->id), 'class' => 'list-group-item list-group-item-action text-danger']) ?>
            <?= $this->Html->link(__('Listar Usuarios'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
            <?= $this->Html->link(__('Novo Usuario'), ['action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
        </div>
    </div>
</div>