<div class="row">
    <aside class="col-md-3">
        <div class="card">
            <div class="card-header"><?= __('Actions') ?></div>
            <div class="list-group list-group-flush">
                <?= $this->Html->link(__('List Inscricoes'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $inscricao->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $inscricao->id), 'class' => 'list-group-item list-group-item-action text-danger']
                ) ?>
            </div>
        </div>
    </aside>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <h4><?= __('Edit Inscricao') ?></h4>
            </div>
            <div class="card-body">
                <?= $this->Form->create($inscricao) ?>
                <fieldset>
                    <legend><?= __('Inscricao Details') ?></legend>
                    <?= $this->Form->control('usuario_id', ['options' => $usuarios, 'class' => 'form-control']) ?>
                    <?= $this->Form->control('evento_id', ['options' => $eventos, 'class' => 'form-control']) ?>
                    <?= $this->Form->control('status', ['class' => 'form-control']) ?>
                </fieldset>
                <?= $this->Form->button(__('Save'), ['class' => 'btn btn-success mt-3']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>