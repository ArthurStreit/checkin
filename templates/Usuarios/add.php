<div class="col-md-8 mx-auto">
    <div class="card">
        <div class="card-header">
            <h4><?= __('Add Usuario') ?></h4>
        </div>
        <div class="card-body">
            <?= $this->Form->create($usuario) ?>
            <fieldset>
                <?php
                    echo $this->Form->control('nome', ['class' => 'form-control mb-3']);
                    echo $this->Form->control('email', ['class' => 'form-control mb-3']);
                    echo $this->Form->control('senha', ['class' => 'form-control mb-3']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>