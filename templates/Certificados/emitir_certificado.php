<div class="certificados emitido">
    <h1>Certificado Emitido com Sucesso</h1>
    <p>
        O certificado para a inscrição no evento <strong><?= h($inscricao->evento->nome) ?></strong> foi emitido com sucesso.<br>
        O código de validação é: <strong><?= h($certificado->codigo_validacao) ?></strong>.
    </p>
    <p>O certificado foi enviado para o e-mail: <strong><?= h($inscricao->usuario->email) ?></strong>.</p>
    <p>
        <a href="<?= $this->Url->build(['action' => 'index']) ?>" class="btn btn-primary">Voltar para Certificados</a>
    </p>
</div>
