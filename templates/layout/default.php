<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'Checkin Management System';
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="<?= $this->request->getAttribute('csrfToken') ?>">
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>Checkin</span> Sistema</a>
        </div>
        <div class="top-nav-links">
            <button id="toggleOfflineMode" class="btn btn-warning" onclick="toggleModoOffline()">Ativar Modo Offline</button>
            <button id="syncOfflineData" class="btn btn-success" onclick="sincronizarDados()">Sincronizar Dados</button>
        </div>
        <div class="top-nav-links">
            <a href="<?= $this->Url->build(['controller' => 'Eventos', 'action' => 'index']) ?>">Eventos</a>
            <a href="<?= $this->Url->build(['controller' => 'Inscricoes', 'action' => 'index']) ?>">Inscrições</a>
            <a href="<?= $this->Url->build(['controller' => 'Certificados', 'action' => 'index']) ?>">Certificados</a>
            <a href="<?= $this->Url->build(['controller' => 'Logs', 'action' => 'index']) ?>">Logs</a>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <?= $this->Html->script('https://code.jquery.com/jquery-3.6.0.min.js') ?>
    <script src="https://cdn.jsdelivr.net/npm/pouchdb@7.3.0/dist/pouchdb.min.js"></script>
    <?= $this->Html->script('checkin') ?>
    <?= $this->Html->script('modo_offline') ?>
    <?php if ($this->fetch('title') === 'Certificados'): ?>
    <?= $this->Html->script('certificado.js') ?>
    <?php else: ?>
    <?= $this->Html->script('offline.js') ?>
    <?php endif; ?>
</body>
</html>