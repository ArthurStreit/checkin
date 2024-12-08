<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Presencas Controller
 *
 * @property \App\Model\Table\PresencasTable $Presencas
 */
class PresencasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Presencas->find()
            ->contain(['Inscricoes']);
        $presencas = $this->paginate($query);

        $this->set(compact('presencas'));
        $this->viewBuilder()->setOption('serialize', ['presencas']);
    }

    /**
     * View method
     *
     * @param string|null $id Presenca id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $presenca = $this->Presencas->get($id, ['contain' => ['Inscricoes']]);
        $this->set(compact('presenca'));
        $this->viewBuilder()->setOption('serialize', ['presenca']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $presenca = $this->Presencas->newEmptyEntity();
        if ($this->request->is('post')) {
            $presenca = $this->Presencas->patchEntity($presenca, $this->request->getData());
            if ($this->Presencas->save($presenca)) {
                $this->Flash->success(__('The presenca has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The presenca could not be saved. Please, try again.'));
        }
        $inscricoes = $this->Presencas->Inscricoes->find('list', ['limit' => 200])->all();
        $this->set(compact('presenca', 'inscricoes'));
        $this->viewBuilder()->setOption('serialize', ['presenca']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Presenca id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $presenca = $this->Presencas->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $presenca = $this->Presencas->patchEntity($presenca, $this->request->getData());
            if ($this->Presencas->save($presenca)) {
                $this->Flash->success(__('The presenca has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The presenca could not be saved. Please, try again.'));
        }
        $inscricoes = $this->Presencas->Inscricoes->find('list', ['limit' => 200])->all();
        $this->set(compact('presenca', 'inscricoes'));
        $this->viewBuilder()->setOption('serialize', ['presenca']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Presenca id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $presenca = $this->Presencas->get($id);
        if ($this->Presencas->delete($presenca)) {
            $this->Flash->success(__('The presenca has been deleted.'));
        } else {
            $this->Flash->error(__('The presenca could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}