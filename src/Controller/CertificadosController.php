<?php
declare(strict_types=1);

namespace App\Controller;

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
}