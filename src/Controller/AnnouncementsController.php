<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
class AnnouncementsController extends AppController {

    public function initialize(): void {
		parent::initialize();
	}

    public function index() {
        $this->set('title', 'Announcements');

        if ($this->request->is(array('put', 'post'))) {
            $fields = $this->request->getData('fields');
            foreach ($fields as $id => $options) {
                $updateData = array();
                $announcement = $this->Announcements->get($id);
                if (isset($options['IR_PROCEDURES'])) {
                    $updateData['IR_PROCEDURES'] = $options['IR_PROCEDURES'];
                }

                if (isset($options['doctor_id'])) {
                    $updateData['doctor_id'] = $options['doctor_id'];
                }

                $announcement = $this->Announcements->patchEntity($announcement, $updateData, ['validate' => false]);
                if (!$announcement->getErrors()) {
                    $this->Announcements->save($announcement);
                }
            }
        }

        $this->paginate = [
            'limit' => 25,
            'order' => [
                'Announcements.Holiday_name' => 'asc',
            ]
        ];
        $announcements = $this->paginate($this->Announcements->find()); 
        //debug($announcements) or die();
        $this->set(compact('announcements'));

        $doctorsTable = TableRegistry::getTableLocator()->get('Doctors');
        $doctors = $doctorsTable->find('list', keyField: 'id', valueField: 'firstname')
        ->toArray();
        $this->set(compact('doctors'));

        $procedureTable = TableRegistry::getTableLocator()->get('Procedures');
        $procedures = $procedureTable->find('list', keyField: 'id', valueField: 'procedure_name')
        ->toArray();
        $this->set(compact('procedures'));
    }

    public function add() {
        $this->set('title', 'Add Announcement');
        $announcement = $this->Announcements->newEmptyEntity();
        if ($this->request->is(array('put', 'post'))) {
            $announcement = $this->Announcements->patchEntity($announcement, $this->request->getData());
            if (!$announcement->getErrors()) {
                $photo = $this->request->getUploadedFile('announcement_photo');
                if ($photo && $photo->getError() === UPLOAD_ERR_OK) {
                    if (!is_dir(WWW_ROOT . 'img' . DS . 'announcements')) {
                        mkdir(WWW_ROOT . 'img' . DS . 'announcements');
                    }
                    $destination = WWW_ROOT . 'img' . DS . 'announcements' . DS . $photo->getClientFilename();
                    $photo->moveTo($destination);
                    $announcement->Image = 'announcements/' . $photo->getClientFilename(); // Save relative path
        
                } else {
                    // Handle the case where no file was uploaded
                    $announcement->Image = null; // or set a default value
                }

                $save = $this->Announcements->save($announcement);
                if ($save) {
                    $this->Flash->success(__('Announcement created successfully.'));
                    $redirect = $this->request->getQuery('redirect', [
                        'controller' => 'Announcements',
                        'action' => 'index',
                    ]);
                    return $this->redirect($redirect);
                }
                else {
                    $this->Flash->error(__('Error adding announcement.'));
                }
            }
        }

        $doctorsTable = TableRegistry::getTableLocator()->get('Doctors');
        $doctors = $doctorsTable->find('list', keyField: 'id', valueField: 'name')
        ->toArray();
        $this->set(compact('doctors'));

        $this->set(compact('announcement'));
    }

    public function edit($id = null) {
        $this->set('title', 'Edit Announcement');
        if (empty($id)) {
            $this->Flash->error(__('Invalid request..'));
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Announcements',
                'action' => 'index',
            ]);
            return $this->redirect($redirect);
        }
        $announcement = $this->Announcements->get($id);
        if ($this->request->is(array('put', 'post'))) {
            $announcement = $this->Announcements->patchEntity($announcement, $this->request->getData());
            if (!$announcement->getErrors()) {
                $photo = $this->request->getUploadedFile('announcement_photo');
                if ($photo && $photo->getError() === UPLOAD_ERR_OK) {
                    if (!is_dir(WWW_ROOT . 'img' . DS . 'announcements')) {
                        mkdir(WWW_ROOT . 'img' . DS . 'announcements');
                    }
                    $destination = WWW_ROOT . 'img' . DS . $announcement->Image;
                    if (file_exists($destination)) {
                        unlink($destination);
                    }

                    $destination = WWW_ROOT . 'img' . DS . 'announcements' . DS . $photo->getClientFilename();
                    $photo->moveTo($destination);
                    $announcement->Image = 'announcements/' . $photo->getClientFilename(); // Save relative path
        
                } else {
                    // Handle the case where no file was uploaded
                    $announcement->Image = null; // or set a default value
                }

                $save = $this->Announcements->save($announcement);
                if ($save) {
                    $this->Flash->success(__('Announcement created successfully.'));
                    $redirect = $this->request->getQuery('redirect', [
                        'controller' => 'Announcements',
                        'action' => 'index',
                    ]);
                    return $this->redirect($redirect);
                }
                else {
                    $this->Flash->error(__('Error adding announcement.'));
                }
            }
        }

        $doctorsTable = TableRegistry::getTableLocator()->get('Doctors');
        $doctors = $doctorsTable->find('list', keyField: 'id', valueField: 'name')
        ->toArray();
        $this->set(compact('doctors'));

        $this->set(compact('announcement'));
    }
    
    public function delete($id = null) {
        if (empty($id)) {
            $this->Flash->error(__('Invalid request..'));
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Announcements',
                'action' => 'index',
            ]);
            return $this->redirect($redirect);
        }
        
        $this->request->allowMethod(['get']);
        $announcement = $this->Announcements->get($id);
        if ($this->Announcements->delete($announcement)) {
            $destination = WWW_ROOT . 'img' . DS . $announcement->Image;
            if (file_exists($destination)) {
                unlink($destination);
            }
            $this->Flash->success(__('The announcement has been deleted.'));
        } else {
            $this->Flash->error(__('The announcement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}