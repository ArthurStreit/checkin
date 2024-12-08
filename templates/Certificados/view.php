    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <h4><?= h($certificado->codigo_validacao) ?></h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th><?= __('Inscricao') ?></th>
                        <td><?= $certificado->has('inscrico') ? $this->Html->link($certificado->inscrico->id, ['controller' => 'Inscricoes', 'action' => 'view', $certificado->inscrico->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Codigo Validacao') ?></th>
                        <td><?= h($certificado->codigo_validacao) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Url Validacao') ?></th>
                        <td><?= h($certificado->url_validacao) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Criado em') ?></th>
                        <td><?= h($certificado->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modificado em') ?></th>
                        <td><?= h($certificado->modified) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
    <aside class="col-md-3">
        <div class="card">
            <div class="card-header"><?= __('Actions') ?></div>
            <div class="list-group list-group-flush">
                <?= $this->Html->link(__('Editar Certificado'), ['action' => 'edit', $certificado->id], ['class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Form->postLink(__('Deletar Certificado'), ['action' => 'delete', $certificado->id], ['confirm' => __('Tem certeza que quer deletar # {0}?', $certificado->id), 'class' => 'list-group-item list-group-item-action text-danger']) ?>
                <?= $this->Html->link(__('Listar Certificados'), ['action' => 'index'], ['class' => 'list-group-item list-group-item-action']) ?>
                <?= $this->Html->link(__('Novo Certificado'), ['action' => 'add'], ['class' => 'list-group-item list-group-item-action']) ?>
            </div>
        </div>
    </aside>
</div>