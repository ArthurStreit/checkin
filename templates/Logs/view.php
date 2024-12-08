<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Log $log
 */
?>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <h3><?= h($log->rota) ?></h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th><?= __('Rota') ?></th>
                        <td><?= h($log->rota) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Metodo') ?></th>
                        <td><?= h($log->metodo) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= $this->Number->format($log->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Criado') ?></th>
                        <td><?= h($log->created) ?></td>
                    </tr>
                </table>
                <div class="mb-3">
                    <strong><?= __('Payload') ?></strong>
                    <blockquote class="blockquote">
                        <p class="mb-0"><?= h($log->payload) ?></p>
                    </blockquote>
                </div>
                <div>
                    <strong><?= __('Resposta') ?></strong>
                    <blockquote class="blockquote">
                        <p class="mb-0"><?= h($log->resposta) ?></p>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    <aside class="col-md-3">
        <div class="list-group">
            <?= $this->Html->link(__('Editar Log'), ['action' => 'edit', $log->id], ['class' => 'list-group-item list-group-item-action']) ?>
            <?= $this->Form->postLink(__('Deletar Log'), ['action' => 'delete', $log->id], ['confirm' => __('Tem certeza que quer deletar # {0}?', $log->id), 'class' => 'list-group-item list-group-item-action']) ?>
            <?= $this->Html->link(__('Listar Logs'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
            <?= $this->Html->link(__('Novo Log'), ['action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
        </div>
    </aside>
</div>