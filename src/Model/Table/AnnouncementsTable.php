<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class AnnouncementsTable extends Table {

    public function initialize(array $config): void {
        parent::initialize($config);
        
        $this->setTable('announcements');

        // Announcements belongs to Doctors
        $this->belongsTo('Doctors', [
            'foreignKey' => 'doctor_id',
            'joinType' => 'INNER', // or 'LEFT' depending on your requirements
        ]);

        $this->belongsTo('Procedures', [
            'foreignKey' => 'IR_PROCEDURES', // This is the foreign key in the Announcements table
            'joinType' => 'INNER', // Adjust join type if needed, e.g., LEFT if it's not mandatory
        ]);

        
    }



    public function validationDefault(Validator $validator): Validator {
        $validator
            ->requirePresence('Holiday_name', true)
            ->notEmptyString('Holiday_name');

        $validator
            ->requirePresence('Message', true)
            ->notEmptyString('Message');
        $validator
            ->notEmptyString('reg_date');

        $validator
        ->allowEmptyFile('announcement_photo', 'an image is required')
        ->requirePresence('announcement_photo', 'create')
        ->add('announcement_photo', [
            'mimeType' => [
                'rule' => [
                    'mimeType', [
                        'image/jpeg',
                        'image/png',
                        'image/jpg'
                    ],
                ],
                'message' => 'File type must be either .jpg, .jpeg or .png' 
            ],
        ]); 

        return $validator;
    }
    
}
