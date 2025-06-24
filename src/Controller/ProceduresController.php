<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Procedure Controller
 *
 * @property \App\Model\Table\ProcedureTable $Procedure
 */
class ProceduresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->set('title', 'Procedures');
        $query = $this->Procedures->find();
        $procedures = $this->paginate($query);

        $this->set(compact('procedures'));
    }

    /**
     * View method
     *
     * @param string|null $id procedure id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->set('title', 'View Procedure');
        $procedure = $this->Procedures->get($id, contain: []);
        $this->set(compact('procedure'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
         $this->set('title', 'Add Procedure');
        $procedure = $this->Procedures->newEmptyEntity();
        if ($this->request->is('post')) {
            $procedure = $this->Procedures->patchEntity($procedure, $this->request->getData());
            if ($this->Procedures->save($procedure)) {
                $this->Flash->success(__('The procedure has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The procedure could not be saved. Please, try again.'));
        }
        $this->set(compact('procedure'));
    }

    /**
     * Edit method
     *
     * @param string|null $id procedure id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
         $this->set('title', 'Edit Procedure');
        $procedure = $this->Procedures->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $procedure = $this->Procedures->patchEntity($procedure, $this->request->getData());
            if ($this->Procedures->save($procedure)) {
                $this->Flash->success(__('The procedure has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The procedure could not be saved. Please, try again.'));
        }
        $this->set(compact('procedure'));
    }

    /**
     * Delete method
     *
     * @param string|null $id procedure id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['get', 'delete']);
        $procedure = $this->Procedures->get($id);
        if ($this->Procedures->delete($procedure)) {
            $this->Flash->success(__('The procedure has been deleted.'));
        } else {
            $this->Flash->error(__('The procedure could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
