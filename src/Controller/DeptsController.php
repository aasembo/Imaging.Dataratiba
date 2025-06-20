<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Depts Controller
 *
 * @property \App\Model\Table\DeptsTable $Depts
 */
class DeptsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Depts->find();
        $depts = $this->paginate($query);

        $this->set(compact('depts'));
    }

    /**
     * View method
     *
     * @param string|null $id Dept id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dept = $this->Depts->get($id, contain: []);
        $this->set(compact('dept'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dept = $this->Depts->newEmptyEntity();
        if ($this->request->is('post')) {
            $dept = $this->Depts->patchEntity($dept, $this->request->getData());
            if ($this->Depts->save($dept)) {
                $this->Flash->success(__('The dept has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dept could not be saved. Please, try again.'));
        }
        $this->set(compact('dept'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dept id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dept = $this->Depts->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dept = $this->Depts->patchEntity($dept, $this->request->getData());
            if ($this->Depts->save($dept)) {
                $this->Flash->success(__('The dept has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dept could not be saved. Please, try again.'));
        }
        $this->set(compact('dept'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dept id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dept = $this->Depts->get($id);
        if ($this->Depts->delete($dept)) {
            $this->Flash->success(__('The dept has been deleted.'));
        } else {
            $this->Flash->error(__('The dept could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
