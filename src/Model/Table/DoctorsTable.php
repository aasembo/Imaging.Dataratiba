<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class DoctorsTable extends Table {

    public function initialize(array $config): void {
        parent::initialize($config);
        $this->addBehavior('Timestamp');

        $this->belongsTo('Procedures', [
            'foreignKey' => 'procedures_id',  // Or use the correct foreign key field
            'joinType' => 'LEFT',  // Allows nulls if the association is optional
        ]);
        
        
    }

    public function validationDefault(Validator $validator): Validator {
        $validator
            ->requirePresence('title', true)
            ->notEmptyString('title');

        $validator
            ->requirePresence('firstname', true)
            ->notEmptyString('firstname');
        
        $validator
            ->requirePresence('lastname', true)
            ->notEmptyString('lastname');

        $validator
        ->notEmptyFile('doctor_photo', 'an image is required')
        ->requirePresence('doctor_photo', 'create')
        ->add('doctor_photo', [
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

        $validator
            ->allowEmptyString('OnSchedule', true); 

        $validator
            ->allowEmptyString('name');  
            // Make procedures_id optional but validate if present
        $validator
        ->integer('procedures_id')
        ->allowEmptyString('procedures_id', 'Procedure ID is optional')
        ->add('procedures_id', 'existsIn', [
            'rule' => function ($value, $context) {
                // Validate only if a value is provided
                return is_null($value) || $this->Procedures->exists(['id' => $value]);
            },
            'message' => 'Please select a valid procedure'
        ]);




        $validator
        ->integer('procedures_name')
        ->allowEmptyString('procedures_name', 'Procedure name is optional')
        ->add('procedures_name', 'existsIn', [
            'rule' => function ($value, $context) {
                // Validate only if a value is provided
                return is_null($value) || $this->Procedures->exists(['procedures_name' => $value]);
            },
            'message' => 'Please select a valid procedure'
        ]);

        return $validator;
    }
}
