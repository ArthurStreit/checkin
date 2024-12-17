<?php
declare(strict_types=1);


namespace App\Controller;

use Cake\Mailer\Mailer;
use Dompdf\Dompdf;

/**
 * Certificados Controller
 *
 * @property \App\Model\Table\CertificadosTable $Certificados
 */
class CertificadosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Certificados->find()
            ->contain(['Inscricoes']);
        $certificados = $this->paginate($query);

        $this->set(compact('certificados'));
        $this->viewBuilder()->setOption('serialize', ['certificados']);
    }

    /**
     * View method
     *
     * @param string|null $id Certificado id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $certificado = $this->Certificados->get($id, ['contain' => ['Inscricoes']]);
        $this->set(compact('certificado'));
        $this->viewBuilder()->setOption('serialize', ['certificado']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $certificado = $this->Certificados->newEmptyEntity();
        if ($this->request->is('post')) {
            $certificado = $this->Certificados->patchEntity($certificado, $this->request->getData());
            if ($this->Certificados->save($certificado)) {
                $this->Flash->success(__('The certificado has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The certificado could not be saved. Please, try again.'));
        }
        $inscricoes = $this->Certificados->Inscricoes->find('list', ['limit' => 200])->all();
        $this->set(compact('certificado', 'inscricoes'));
        $this->viewBuilder()->setOption('serialize', ['certificado']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Certificado id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $certificado = $this->Certificados->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $certificado = $this->Certificados->patchEntity($certificado, $this->request->getData());
            if ($this->Certificados->save($certificado)) {
                $this->Flash->success(__('The certificado has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The certificado could not be saved. Please, try again.'));
        }
        $inscricoes = $this->Certificados->Inscricoes->find('list', ['limit' => 200])->all();
        $this->set(compact('certificado', 'inscricoes'));
        $this->viewBuilder()->setOption('serialize', ['certificado']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Certificado id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $certificado = $this->Certificados->get($id);
        if ($this->Certificados->delete($certificado)) {
            $this->Flash->success(__('The certificado has been deleted.'));
        } else {
            $this->Flash->error(__('The certificado could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function emitirCertificado($inscricaoId)
    {
        $this->request->allowMethod(['post']);
        
        try {
            $inscricao = $this->Certificados->Inscricoes->get($inscricaoId, [
                'contain' => ['Usuarios', 'Eventos']
            ]);
            
            $certificado = $this->Certificados->newEntity([
                'inscricao_id' => $inscricaoId,
                'codigo_validacao' => uniqid(),
                'url_validacao' => '/certificados/validar-certificado/' . uniqid(),
            ]);
            
            if ($this->Certificados->save($certificado)) {
                $email = new Mailer('default');
                $email->setTo($inscricao->usuario->email)
                    ->setSubject('Certificado Emitido')
                    ->setEmailFormat('html')
                    ->deliver("
                        Olá {$inscricao->usuario->nome},<br><br>
                        O certificado do evento <strong>{$inscricao->evento->nome}</strong> foi emitido com sucesso.<br>
                        Código de validação: <strong>{$certificado->codigo_validacao}</strong>.<br>
                        Para validar, acesse o link: <a href='{$certificado->url_validacao}'>{$certificado->url_validacao}</a>.<br><br>
                        Obrigado por participar!<br>
                        Equipe Checkin System.
                    ");
                
                $this->set(compact('certificado', 'inscricao'));
                $this->viewBuilder()->setTemplate('emitir_certificado');
                return;
            }

            throw new \Exception('Erro ao salvar o certificado.');
        } catch (\Exception $e) {
            $this->Flash->error(__('Erro ao emitir o certificado: ' . $e->getMessage()));
            return $this->redirect(['action' => 'index']);
        }
    }

    public function validarCertificado()
    {
        $this->request->allowMethod(['post', 'get']);
    
        if ($this->request->is('post')) {
            $codigoValidacao = $this->request->getData('codigo_validacao');
    
            $certificado = $this->Certificados->find()
                ->where(['codigo_validacao' => $codigoValidacao])
                ->contain(['Inscricoes.Usuarios', 'Inscricoes.Eventos'])
                ->first();
    
            if ($certificado) {
                $this->Flash->success(__('Certificado válido.'));
                $this->set('certificado', $certificado);
                $this->set('inscricao', $certificado->inscricao);
            } else {
                $this->Flash->error(__('Código de validação inválido.'));
            }
        }
    
        $this->viewBuilder()->setTemplate('validar_certificado');
    }    

}