<div class="certificados index content">
    <?= $this->Html->link(__('Novo Certificado'), ['action' => 'add'], ['class' => 'btn btn-primary float-end mb-3']) ?>
    <h3><?= __('Certificados') ?></h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('inscricao_id') ?></th>
                    <th><?= $this->Paginator->sort('codigo_validacao') ?></th>
                    <th><?= $this->Paginator->sort('criado em') ?></th>
                    <th><?= $this->Paginator->sort('modificado em') ?></th>
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($certificados as $certificado): ?>
                <tr>
                    <td><?= $this->Number->format($certificado->id) ?></td>
                    <td><?= $certificado->has('inscrico') ? $this->Html->link($certificado->inscrico->id, ['controller' => 'Inscricoes', 'action' => 'view', $certificado->inscrico->id]) : '' ?></td>
                    <td><?= h($certificado->codigo_validacao) ?></td>
                    <td><?= h($certificado->created) ?></td>
                    <td><?= h($certificado->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $certificado->id], ['class' => 'btn btn-sm btn-info']) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $certificado->id], ['class' => 'btn btn-sm btn-warning']) ?>
                        <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $certificado->id], ['confirm' => __('Tem certeza que quer deletar # {0}?', $certificado->id), 'class' => 'btn btn-sm btn-danger']) ?>
                    </td>
                    <td>
                    <button onclick="emitirCertificado(<?= $certificado->inscricao_id ?>)" class="btn btn-success">Emitir Certificado</button>
                    <button onclick="window.location.href='/certificados/validar-certificado'" class="btn btn-info">Validar Certificado</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>