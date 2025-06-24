<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ProceduresTable extends Table {

    public function initialize(array $config): void {
        parent::initialize($config);

        $this->belongsToMany('Doctors', [
            'joinTable' => 'doctor_procedures',
            'foreignKey' => 'procedure_id',
            'targetForeignKey' => 'doctor_id'
        ]);
    }
}
