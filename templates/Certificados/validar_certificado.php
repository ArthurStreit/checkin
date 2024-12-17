<div class="certificados validar">
    <h1>Validação de Certificado</h1>

    <form id="form-validar-certificado" onsubmit="event.preventDefault(); validarCertificado();">
        <div class="form-group">
            <label for="codigo_validacao">Código de Validação:</label>
            <input type="text" name="codigo_validacao" id="codigo_validacao" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Validar</button>
    </form>
</div>