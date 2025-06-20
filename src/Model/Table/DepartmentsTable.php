<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class DepartmentsTable extends Table {
    public function initialize(array $config): void {
        parent::initialize($config);
        $this->setTable('depts');
        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator): Validator {
        $validator
            ->decimal('deptno')
            ->add('deptno', 'unique', [
                'rule' => 'validateUnique',
                'provider' => 'table',
                'message' => 'This department number is already in use.'

            ])
            ->requirePresence('deptno', true)
            ->notEmptyString('deptno');

        $validator
            ->requirePresence('dname', true)
            ->notEmptyString('dname');
        
        $validator
            ->requirePresence('loc', true)
            ->notEmptyString('loc');  

        return $validator;
    }
}
