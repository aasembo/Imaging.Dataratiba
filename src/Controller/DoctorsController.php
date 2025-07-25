<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use Cake\Cache\Cache;



class DoctorsController extends AppController {

    public function initialize(): void {
		parent::initialize();
        }
        public function beforeFilter(\Cake\Event\EventInterface $event): void
        {
            //logger('debug', 'DoctorsController beforeFilter called');
            parent::beforeFilter($event);

            $this->Authentication->addUnauthenticatedActions(['onschedule']);
        }


    public function clearCache()
    {

        Cache::clearAll();
        $this->Flash->success('Cache cleared.');
        return $this->redirect('/');
    }

    public function index()
{
    $this->set('title', 'Doctors');

    // Check if the form is submitted via PUT or POST
    if ($this->request->is(['put', 'post'])) {
        // Get the data from the form
        $fields = $this->request->getData('fields');

        // Process each doctor's data
        foreach ($fields as $id => $options) {
            // Fetch the doctor record
            //debug($options);
            $doctor = $this->Doctors->get($id);
            
            // Prepare the data to update
            $updateData = [];
            if (isset($options['OnSchedule'])) {
                $updateData['OnSchedule'] = $options['OnSchedule'];
            }
            if (isset($options['dept_id'])) {
                $updateData['dept_id'] = $options['dept_id'];
            }
            if (!empty($options['procedure_name'])) {
                $procedureId = $options['procedure_name'];

                // Try to find the procedure record by ID
                $procedure = $this->Doctors->Procedures->find()
                    ->where(['id' => $procedureId])
                    ->first();

                //debug($procedure);

                // If procedure is found, set the procedure_name in updateData
                if ($procedure) {
                    $updateData['procedures_id'] = $procedure->id;
                    $updateData['procedure_name'] = $procedure->procedure_name;
                } else {
                    // Skip updating procedure_name if the procedure ID is invalid
                    $this->Flash->error(__('Procedure not found for the provided ID. No changes made to procedure name.'));
                }
            }

            // Apply the updates to the doctor record
            $doctor = $this->Doctors->patchEntity($doctor, $updateData, ['validate' => false]);

            // Save the updated doctor record
            if ($this->Doctors->save($doctor)) {
                $this->Flash->success(__('Doctor details updated.'));
            } else {
                $this->Flash->error(__('Error updating doctor details.'));
            }
        }

        // Redirect back to the index page after saving the data
        return $this->redirect(['action' => 'index']);
    }

    // Pagination setup
    $this->paginate = [
        'limit' => 25,
        'order' => [
            'Doctors.firstname' => 'asc', // Corrected 'firsrname' to 'firstname'
        ]
    ];

    // Fetch doctors for display
    $doctors = $this->paginate($this->Doctors);
    $this->set(compact('doctors'));

    // Fetch departments and procedures for dropdowns
    $departmentsTable = TableRegistry::getTableLocator()->get('Departments');
    //$departments = $departmentsTable->find('list', ['keyField' => 'id', 'valueField' => 'dname'])->toArray();
    $departments = $departmentsTable->find('list', keyField: 'id', valueField: 'dname')->toArray();


    $proceduresTable = TableRegistry::getTableLocator()->get('Procedures');
    //$procedures = $proceduresTable->find('list', ['keyField' => 'id', 'valueField' => 'procedure_name'])->toArray();
    $procedures = $proceduresTable->find('list', keyField: 'id', valueField: 'procedure_name')->toArray();

    // Set departments and procedures for the view
    $this->set(compact('departments', 'procedures'));
}




    public function add() {
        $this->set('title', 'Add Doctor');
        $doctor = $this->Doctors->newEmptyEntity();
        if ($this->request->is(array('put', 'post'))) {
            $doctor = $this->Doctors->patchEntity($doctor, $this->request->getData());
            if (!$doctor->getErrors()) {
                $photo = $this->request->getUploadedFile('doctor_photo');
                if ($photo && $photo->getError() === UPLOAD_ERR_OK) {
                    if (!is_dir(WWW_ROOT . 'img' . DS . 'doctors')) {
                        mkdir(WWW_ROOT . 'img' . DS . 'doctors');
                    }
                    $destination = WWW_ROOT . 'img' . DS . 'doctors' . DS . $photo->getClientFilename();
                    $photo->moveTo($destination);
                    $doctor->photo = 'doctors/' . $photo->getClientFilename(); // Save relative path
        
                } else {
                    // Handle the case where no file was uploaded
                    $doctor->photo = null; // or set a default value
                }
                $doctor->admin_id = $this->authUser->id;
                $save = $this->Doctors->save($doctor);
                //debug($save);
                //die();
                if ($save) {
                    $this->Flash->success(__('Doctor created successfully.'));
                    $redirect = $this->request->getQuery('redirect', [
                        'controller' => 'Doctors',
                        'action' => 'index',
                    ]);
                    return $this->redirect($redirect);
                }
                else {
                    $this->Flash->error(__('Error adding doctor.'));
                }
            }
        }
        //$procedures = $this->Doctors->Procedures->find('list', ['keyField' => 'id', 'valueField' => 'procedure_name'])->toArray();
        $procedures = $this->Doctors->Procedures->find('list',keyField: 'id', valueField: 'procedure_name')->toArray();
        $this->set(compact('doctor', 'procedures'));
    }

    public function edit($id = null) {
        $this->set('title', 'Edit Doctor');
        if (empty($id)) {
            $this->Flash->error(__('Invalid request..'));
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Doctors',
                'action' => 'index',
            ]);
            return $this->redirect($redirect);
        }
        $doctor = $this->Doctors->get($id);
        if ($this->request->is(array('put', 'post'))) {
            $doctor = $this->Doctors->patchEntity($doctor, $this->request->getData());
            if (!$doctor->getErrors()) {
                $photo = $this->request->getUploadedFile('doctor_photo');
                if ($photo && $photo->getError() === UPLOAD_ERR_OK) {
                    if (!is_dir(WWW_ROOT . 'img' . DS . 'doctors')) {
                        mkdir(WWW_ROOT . 'img' . DS . 'doctors');
                    }
                    $destination = WWW_ROOT . 'img' . DS . $doctor->photo;
                    if (file_exists($destination)) {
                        unlink($destination);
                    }

                    $destination = WWW_ROOT . 'img' . DS . 'doctors' . DS . $photo->getClientFilename();
                    $photo->moveTo($destination);
                    $doctor->photo = 'doctors/' . $photo->getClientFilename(); // Save relative path
        
                } else {
                    // Handle the case where no file was uploaded
                    $doctor->photo = null; // or set a default value
                }
                $doctor->admin_id = $this->authUser->id;
                $save = $this->Doctors->save($doctor);
                if ($save) {
                    $this->Flash->success(__('Doctor updated successfully.'));
                    $redirect = $this->request->getQuery('redirect', [
                        'controller' => 'Doctors',
                        'action' => 'index',
                    ]);
                    return $this->redirect($redirect);
                }
                else {
                    $this->Flash->error(__('Error updating doctor.'));
                }
            }
        }
        $this->set(compact('doctor'));
    }
    
    public function delete($id = null) {
        if (empty($id)) {
            $this->Flash->error(__('Invalid request..'));
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Doctors',
                'action' => 'index',
            ]);
            return $this->redirect($redirect);
        }
        
        $this->request->allowMethod(['get']);
        $doctor = $this->Doctors->get($id);
        if ($this->Doctors->delete($doctor)) {
            $destination = WWW_ROOT . 'img' . DS . $doctor->photo;
            if (file_exists($destination)) {
                unlink($destination);
            }
            $this->Flash->success(__('The doctor profile has been deleted.'));
        } else {
            $this->Flash->error(__('The doctor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function save()   {

    if ($this->request->is('post')) {
        $doctorData = $this->request->getData('fields');
        
        foreach ($doctorData as $doctorId => $data) {
            $doctor = $this->Doctors->get($doctorId);
            $doctor = $this->Doctors->patchEntity($doctor, $data);
            
            if (!$this->Doctors->save($doctor)) {
                // Log the error to debug what is going wrong
                \Cake\Log\Log::write('error', 'Save failed for Doctor ID ' . $doctor->id . ': ' . json_encode($doctor->getErrors()));
                $this->Flash->error(__('Unable to update doctor details.'));
            } else {
                $this->Flash->success(__('Doctor details have been updated.'));
            }
            
}
    }
}


public function onschedule()
{
    $this->set('title', 'Schedules');

    // Load Departments with associated Doctors
    $departmentsTable = TableRegistry::getTableLocator()->get('Departments');
    $departmentsTable->hasMany('Doctors'); // Optional if already defined in DepartmentsTable
    $departments = $departmentsTable->find()
        ->contain(['Doctors'])
        ->all()
        ->toArray();
    $this->set(compact('departments'));

    // Load Announcements with associated Doctors and Procedures
    $announcementsTable = TableRegistry::getTableLocator()->get('Announcements');

    $announcements = $announcementsTable->find()
        ->leftJoinWith('Doctors')
    ->leftJoinWith('Procedures')
    ->contain(['Doctors', 'Procedures'])
    ->all();
    // debug($announcements);
    $this->set(compact('announcements'));
}


}