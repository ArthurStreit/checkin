<?php
declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class LogComponent extends Component
{
    public function logRequest()
    {
        $request = $this->getController()->getRequest();
        $logsTable = TableRegistry::getTableLocator()->get('Logs');

        $rota = $request->getPath();
        $metodo = $request->getMethod();
        $payload = json_encode($request->getData());
        $resposta = null;

        $log = $logsTable->newEntity([
            'rota' => $rota,
            'metodo' => $metodo,
            'payload' => $payload,
            'resposta' => $resposta,
        ]);

        $logsTable->save($log);
    }
}