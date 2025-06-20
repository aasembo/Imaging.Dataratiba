<?php
namespace App\Controller;
class DepartmentsController extends AppController {

    public function initialize(): void {
		parent::initialize();
	}

    public function index() {
        $this->set('title', 'Index');
        $this->paginate = [
            'limit' => 25,
            'order' => [
                'Departments.firsrname' => 'asc',
            ]
        ];
        $departments = $this->paginate($this->Departments);
        $this->set(compact('departments'));
    }

    public function add() {
        $this->set('title', 'Add Department');
        $department = $this->Departments->newEmptyEntity();
        if ($this->request->is(array('put', 'post'))) {
            $department = $this->Departments->patchEntity($department, $this->request->getData());
            $save = $this->Departments->save($department);
            if ($save) {
                $this->Flash->success(__('Department created successfully.'));
                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Departments',
                    'action' => 'index',
                ]);
                return $this->redirect($redirect);
            }
            else {
                $this->Flash->error(__('Error adding department.'));
            }
        }
        $this->set(compact('department'));
    }

    public function edit($id = null) {
        $this->set('title', 'Edit Department');
        if (empty($id)) {
            $this->Flash->error(__('Invalid request..'));
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Departments',
                'action' => 'index',
            ]);
            return $this->redirect($redirect);
        }
        $department = $this->Departments->get($id);
        if ($this->request->is(array('put', 'post'))) {
            $department = $this->Departments->patchEntity($department, $this->request->getData());
            $save = $this->Departments->save($department);
            if ($save) {
                $this->Flash->success(__('Department updated successfully.'));
                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Departments',
                    'action' => 'index',
                ]);
                return $this->redirect($redirect);
            }
            else {
                $this->Flash->error(__('Error updating department.'));
            }
        }
        $this->set(compact('department'));
    }
    
    public function delete($id = null) {
        if (empty($id)) {
            $this->Flash->error(__('Invalid request..'));
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Departments',
                'action' => 'index',
            ]);
            return $this->redirect($redirect);
        }
        
        $this->request->allowMethod(['get']);
        $department = $this->Departments->get($id);
        if ($this->Departments->delete($department)) {
            $this->Flash->success(__('The department has been deleted.'));
        } else {
            $this->Flash->error(__('The department could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}