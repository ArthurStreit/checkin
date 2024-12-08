<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Evento $evento
 */
?>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3><?= h($evento->nome) ?></h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th><?= __('Nome') ?></th>
                        <td><?= h($evento->nome) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Descrição') ?></th>
                        <td><?= $this->Text->autoParagraph(h($evento->descricao)); ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Data Início') ?></th>
                        <td><?= h($evento->data_inicio) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Data Fim') ?></th>
                        <td><?= h($evento->data_fim) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Criado') ?></th>
                        <td><?= h($evento->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modificado') ?></th>
                        <td><?= h($evento->modified) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
    <aside class="col-md-3">
        <div class="list-group">
            <h4 class="list-group-item list-group-item-dark"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Editar Evento'), ['action' => 'edit', $evento->id], ['class' => 'list-group-item']) ?>
            <?= $this->Form->postLink(__('Deletar Evento'), ['action' => 'delete', $evento->id], ['confirm' => __('Tem certeza que deseja deletar o evento #{0}?', $evento->id), 'class' => 'list-group-item list-group-item-danger']) ?>
            <?= $this->Html->link(__('Listar Eventos'), ['action' => 'index'], ['class' => 'list-group-item']) ?>
        </div>
    </aside>
</div>