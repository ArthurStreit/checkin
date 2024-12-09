<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Mailer\Mailer;

/**
 * Inscricoes Controller
 *
 * @property \App\Model\Table\InscricoesTable $Inscricoes
 */
class InscricoesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Inscricoes->find()
            ->contain(['Usuarios', 'Eventos']);
        $inscricoes = $this->paginate($query);

        $this->set(compact('inscricoes'));
        $this->viewBuilder()->setOption('serialize', ['inscricoes']);
    }

    /**
     * View method
     *
     * @param string|null $id Inscricao id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $inscricao = $this->Inscricoes->get($id, ['contain' => ['Usuarios', 'Eventos']]);
        $this->set(compact('inscricao'));
        $this->viewBuilder()->setOption('serialize', ['inscricao']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $inscricao = $this->Inscricoes->newEmptyEntity();
        if ($this->request->is('post')) {
            $inscricao = $this->Inscricoes->patchEntity($inscricao, $this->request->getData());
            if ($this->Inscricoes->save($inscricao)) {
                $this->Flash->success(__('The inscricao has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The inscricao could not be saved. Please, try again.'));
        }
        $usuarios = $this->Inscricoes->Usuarios->find('list', ['limit' => 200])->all();
        $eventos = $this->Inscricoes->Eventos->find('list', ['limit' => 200])->all();
        $this->set(compact('inscricao', 'usuarios', 'eventos'));
        $this->viewBuilder()->setOption('serialize', ['inscricao']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Inscricao id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $inscricao = $this->Inscricoes->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inscricao = $this->Inscricoes->patchEntity($inscricao, $this->request->getData());
            if ($this->Inscricoes->save($inscricao)) {
                $this->Flash->success(__('The inscricao has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The inscricao could not be saved. Please, try again.'));
        }
        $usuarios = $this->Inscricoes->Usuarios->find('list', ['limit' => 200])->all();
        $eventos = $this->Inscricoes->Eventos->find('list', ['limit' => 200])->all();
        $this->set(compact('inscricao', 'usuarios', 'eventos'));
        $this->viewBuilder()->setOption('serialize', ['inscricao']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Inscricao id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inscricao = $this->Inscricoes->get($id);
        if ($this->Inscricoes->delete($inscricao)) {
            $this->Flash->success(__('The inscricao has been deleted.'));
        } else {
            $this->Flash->error(__('The inscricao could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function checkin($inscricaoId)
    {
        $this->request->allowMethod(['post']);
    
        $enviarEmail = $this->request->getData('enviarEmail') ?? false;
    
        try {
            $inscricao = $this->Inscricoes->get($inscricaoId, [
                'contain' => ['Usuarios', 'Eventos'],
            ]);
        } catch (\Exception $e) {
            if ($this->request->is('ajax')) {
                $this->set([
                    'success' => false,
                    'message' => __('Erro ao buscar a inscrição.'),
                    '_serialize' => ['success', 'message'],
                ]);
                return;
            }
    
            $this->Flash->error(__('Erro ao buscar a inscrição.'));
            return $this->redirect(['action' => 'index']);
        }
    
        $inscricao->status = 'checked_in';
    
        if ($this->Inscricoes->save($inscricao)) {
            if ($enviarEmail) {
                try {
                    $email = new Mailer('default');
                    $email->setTo($inscricao->usuario->email)
                        ->setSubject('Check-in realizado com sucesso!')
                        ->deliver("
                            Olá {$inscricao->usuario->nome},<br><br>
                            Você realizou o check-in no evento: <strong>{$inscricao->evento->nome}</strong>.<br>
                            Data do Evento: {$inscricao->evento->data_inicio} - {$inscricao->evento->data_fim}.<br><br>
                            Obrigado por participar!<br>
                            Equipe Checkin System.
                        ");
                } catch (\Exception $e) {
                    $this->log("Erro ao enviar o e-mail: {$e->getMessage()}", 'error');
                }
            }
    
            if ($this->request->is('ajax')) {
                $this->set('inscricao', $inscricao);
                $this->viewBuilder()->setTemplate('checkin');
                return;
            }
    
            $this->Flash->success(__('Check-in realizado com sucesso!'));
            return $this->redirect(['action' => 'index']);
        }
    
        if ($this->request->is('ajax')) {
            $this->set([
                'success' => false,
                'message' => __('Erro ao realizar o check-in.'),
                '_serialize' => ['success', 'message'],
            ]);
            return;
        }
    
        $this->Flash->error(__('Erro ao realizar o check-in.'));
        return $this->redirect(['action' => 'index']);
    }

    public function cancelCheckin($inscricaoId)
    {
        $this->request->allowMethod(['post']);
    
        $enviarEmail = $this->request->getData('enviarEmail') ?? false;
    
        try {
            $inscricao = $this->Inscricoes->get($inscricaoId, [
                'contain' => ['Usuarios', 'Eventos'],
            ]);
        } catch (\Exception $e) {
            if ($this->request->is('ajax')) {
                $this->set([
                    'success' => false,
                    'message' => __('Erro ao buscar a inscrição.'),
                    '_serialize' => ['success', 'message'],
                ]);
                return;
            }
    
            $this->Flash->error(__('Erro ao buscar a inscrição.'));
            return $this->redirect(['action' => 'index']);
        }
    
        $inscricao->status = 'cancelada';
    
        if ($this->Inscricoes->save($inscricao)) {
            if ($enviarEmail) {
                try {
                    $email = new Mailer('default');
                    $email->setTo($inscricao->usuario->email)
                        ->setSubject('Check-in cancelado!')
                        ->deliver("
                            Olá {$inscricao->usuario->nome},<br><br>
                            Seu check-in no evento: <strong>{$inscricao->evento->nome}</strong> foi cancelado.<br><br>
                            Caso tenha sido um engano, entre em contato.<br>
                            Equipe Checkin System.
                        ");
                } catch (\Exception $e) {
                    $this->log("Erro ao enviar o e-mail: {$e->getMessage()}", 'error');
                }
            }
    
            if ($this->request->is('ajax')) {
                $this->set('inscricao', $inscricao);
                $this->viewBuilder()->setTemplate('cancel_checkin');
                return;
            }
    
            $this->Flash->success(__('Check-in cancelado com sucesso!'));
            return $this->redirect(['action' => 'index']);
        }
    
        if ($this->request->is('ajax')) {
            $this->set([
                'success' => false,
                'message' => __('Erro ao cancelar o check-in.'),
                '_serialize' => ['success', 'message'],
            ]);
            return;
        }
    
        $this->Flash->error(__('Erro ao cancelar o check-in.'));
        return $this->redirect(['action' => 'index']);
    }    

    public function enviarEmailTeste()
    {
        try {
            $mailer = new Mailer('default');
            $mailer->setTo('destinatario@exemplo.com')
                ->setSubject('Teste de Envio de E-mail')
                ->deliver('Este é um e-mail de teste enviado usando o Mailtrap no CakePHP!');
    
            $this->Flash->success('E-mail enviado com sucesso!');
        } catch (\Exception $e) {
            $this->Flash->error('Erro ao enviar o e-mail: ' . $e->getMessage());
        }
    }
}