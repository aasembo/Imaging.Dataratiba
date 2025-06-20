<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Depts Model
 *
 * @method \App\Model\Entity\Dept newEmptyEntity()
 * @method \App\Model\Entity\Dept newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Dept> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dept get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Dept findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Dept patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Dept> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dept|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Dept saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Dept>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Dept>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Dept>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Dept> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Dept>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Dept>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Dept>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Dept> deleteManyOrFail(iterable $entities, array $options = [])
 */
class DeptsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('depts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->decimal('deptno')
            ->allowEmptyString('deptno');

        $validator
            ->scalar('dname')
            ->maxLength('dname', 14)
            ->allowEmptyString('dname');

        $validator
            ->scalar('loc')
            ->maxLength('loc', 13)
            ->allowEmptyString('loc');

        return $validator;
    }
}
