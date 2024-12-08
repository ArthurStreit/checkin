<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Evento $evento
 */
?>
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h3><?= __('Adicionar Evento') ?></h3>
            </div>
            <div class="card-body">
                <?= $this->Form->create($evento) ?>
                <div class="mb-3">
                    <?= $this->Form->control('nome', ['class' => 'form-control']) ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->control('descricao', ['type' => 'textarea', 'class' => 'form-control']) ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->control('data_inicio', ['type' => 'datetime-local', 'class' => 'form-control']) ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->control('data_fim', ['type' => 'datetime-local', 'class' => 'form-control']) ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->control('template_certificado', ['class' => 'form-control']) ?>
                </div>
                <?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-success']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>