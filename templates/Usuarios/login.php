<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="usuarios form content mx-auto" style="max-width: 400px;">
    <?= $this->Form->create(null, ['class' => 'needs-validation']) ?>
    <fieldset class="border p-4 rounded">
        <legend class="text-center"><?= __('Login') ?></legend>
        <?= $this->Form->control('email', ['label' => 'Email', 'class' => 'form-control mb-3']) ?>
        <?= $this->Form->control('senha', ['type' => 'password', 'label' => 'Senha', 'class' => 'form-control mb-3']) ?>
    </fieldset>
    <div class="text-center mt-3">
        <?= $this->Form->button(__('Login'), ['class' => 'btn btn-primary w-100']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>