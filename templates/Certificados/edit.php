<div class="row">
    <aside class="col-md-3">
        <div class="card">
            <div class="card-header"><?= __('Actions') ?></div>
            <div class="list-group list-group-flush">
                <?= $this->Html->link(__('List Certificados'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $certificado->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $certificado->id), 'class' => 'list-group-item list-group-item-action text-danger']
                ) ?>
            </div>
        </div>
    </aside>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <h4><?= __('Edit Certificado') ?></h4>
            </div>
            <div class="card-body">
                <?= $this->Form->create($certificado) ?>
                <fieldset>
                    <legend><?= __('Certificado Details') ?></legend>
                    <?= $this->Form->control('inscricao_id', ['options' => $inscricoes, 'class' => 'form-control']) ?>
                    <?= $this->Form->control('codigo_validacao', ['class' => 'form-control']) ?>
                    <?= $this->Form->control('url_validacao', ['class' => 'form-control']) ?>
                </fieldset>
                <?= $this->Form->button(__('Save'), ['class' => 'btn btn-success mt-3']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>