<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Portfolios Model.
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Portfolio                                             newEmptyEntity()
 * @method \App\Model\Entity\Portfolio                                             newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Portfolio[]                                           newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Portfolio                                             get($primaryKey, $options = [])
 * @method \App\Model\Entity\Portfolio                                             findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Portfolio                                             patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Portfolio[]                                           patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Portfolio|false                                       save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Portfolio                                             saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Portfolio[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Portfolio[]|\Cake\Datasource\ResultSetInterface       saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Portfolio[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Portfolio[]|\Cake\Datasource\ResultSetInterface       deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PortfoliosTable extends Table
{
    /**
     * Initialize method.
     *
     * @param array $config the configuration for the Table
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('portfolios');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('PortfolioContents', [
            'foreignKey' => 'portfolio_id',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('Instructors', [
            'foreignKey' => 'instructor_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator validator instance
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules the rules object to be modified
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['instructor_id'], 'Instructors'), ['errorField' => 'instructor_id']);

        return $rules;
    }
}
