<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Presencas Model
 *
 * @property \App\Model\Table\InscricoesTable&\Cake\ORM\Association\BelongsTo $Inscricoes
 *
 * @method \App\Model\Entity\Presenca newEmptyEntity()
 * @method \App\Model\Entity\Presenca newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Presenca> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Presenca get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Presenca findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Presenca patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Presenca> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Presenca|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Presenca saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Presenca>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Presenca>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Presenca>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Presenca> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Presenca>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Presenca>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Presenca>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Presenca> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PresencasTable extends Table
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

        $this->setTable('presencas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Inscricoes', [
            'foreignKey' => 'inscricao_id',
            'joinType' => 'INNER',
        ]);
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
            ->integer('inscricao_id')
            ->notEmptyString('inscricao_id');

        $validator
            ->dateTime('data_presenca')
            ->allowEmptyDateTime('data_presenca');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['inscricao_id'], 'Inscricoes'), ['errorField' => 'inscricao_id']);

        return $rules;
    }
}
