<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Presenca $presenca
 * @var \Cake\Collection\CollectionInterface|string[] $inscricoes
 */
?>
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h3><?= __('Add Presenca') ?></h3>
            </div>
            <div class="card-body">
                <?= $this->Form->create($presenca) ?>
                <fieldset>
                    <?php
                        echo $this->Form->control('inscricao_id', ['options' => $inscricoes, 'class' => 'form-control']);
                        echo $this->Form->control('data_presenca', ['class' => 'form-control']);
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>