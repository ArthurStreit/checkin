<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Log $log
 */
?>
<div class="row">
    <aside class="col-md-3">
        <div class="list-group">
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $log->id], ['confirm' => __('Are you sure you want to delete # {0}?', $log->id), 'class' => 'list-group-item list-group-item-action']) ?>
            <?= $this->Html->link(__('List Logs'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
        </div>
    </aside>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <h3><?= __('Edit Log') ?></h3>
            </div>
            <div class="card-body">
                <?= $this->Form->create($log) ?>
                <fieldset>
                    <div class="mb-3">
                        <?= $this->Form->control('rota', ['class' => 'form-control']) ?>
                    </div>
                    <div class="mb-3">
                        <?= $this->Form->control('metodo', ['class' => 'form-control']) ?>
                    </div>
                    <div class="mb-3">
                        <?= $this->Form->control('payload', ['class' => 'form-control']) ?>
                    </div>
                    <div class="mb-3">
                        <?= $this->Form->control('resposta', ['class' => 'form-control']) ?>
                    </div>
                </fieldset>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>