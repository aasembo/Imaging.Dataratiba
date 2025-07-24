<?php
namespace App\Controller;
class UsersController extends AppController {

    public function initialize(): void {
		parent::initialize();
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login']);
	}
    
    public function login() {

        $this->set('title', 'Login');
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {    
            $user = $this->Authentication->getIdentity();
            if ($user->status == 1) {
                // redirect to /doctors after login success
                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Doctors',
                    'action' => 'index',
                ]);

                return $this->redirect([
                    'controller' => 'Doctors',
                    'action' => 'index',
                ]);
            }
            else {
                $this->Authentication->logout();
                $this->Flash->error(__('User is not active.'));
            }
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
        // Set the layout.
        $this->viewBuilder()->setLayout('login');
    }

    public function logout() {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect('/');
        }
    }

    public function index() {
        $this->set('title', 'Users');
        $this->paginate = [
            'limit' => 25,
            'order' => [
                'Users.username' => 'asc',
            ]
        ];
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
    }

    public function add() {
        $this->set('title', 'Add User');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is(array('put', 'post'))) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $save = $this->Users->save($user);
            if ($save) {
                $this->Flash->success(__('User created successfully.'));
                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Users',
                    'action' => 'index',
                ]);
                return $this->redirect($redirect);
            }
            else {
                $this->Flash->error(__('Error adding user.'));
            }
        }
        $this->set(compact('user'));
    }

    public function edit($id = null) {
        $this->set('title', 'Edit User');
        if (empty($id)) {
            $this->Flash->error(__('Invalid request..'));
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Users',
                'action' => 'index',
            ]);
            return $this->redirect($redirect);
        }
        $user = $this->Users->get($id);
        if ($this->request->is(array('put', 'post'))) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $save = $this->Users->save($user);
            if ($save) {
                $this->Flash->success(__('User updated successfully.'));
                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Users',
                    'action' => 'index',
                ]);
                return $this->redirect($redirect);
            }
            else {
                $this->Flash->error(__('Error updating user.'));
            }
        }
        $this->set(compact('user'));
    }

    public function delete($id = null) {
        if (empty($id)) {
            $this->Flash->error(__('Invalid request..'));
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Users',
                'action' => 'index',
            ]);
            return $this->redirect($redirect);
        }
        
        $this->request->allowMethod(['get']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user profile has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}