<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Certificados Model
 *
 * @property \App\Model\Table\InscricoesTable&\Cake\ORM\Association\BelongsTo $Inscricoes
 *
 * @method \App\Model\Entity\Certificado newEmptyEntity()
 * @method \App\Model\Entity\Certificado newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Certificado> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Certificado get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Certificado findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Certificado patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Certificado> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Certificado|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Certificado saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Certificado>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Certificado>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Certificado>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Certificado> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Certificado>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Certificado>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Certificado>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Certificado> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CertificadosTable extends Table
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

        $this->setTable('certificados');
        $this->setDisplayField('codigo_validacao');
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
            ->scalar('codigo_validacao')
            ->maxLength('codigo_validacao', 255)
            ->requirePresence('codigo_validacao', 'create')
            ->notEmptyString('codigo_validacao')
            ->add('codigo_validacao', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('url_validacao')
            ->requirePresence('url_validacao', 'create')
            ->allowEmptyString('url_validacao');

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
        $rules->add($rules->isUnique(['codigo_validacao']), ['errorField' => 'codigo_validacao']);
        $rules->add($rules->existsIn(['inscricao_id'], 'Inscricoes'), ['errorField' => 'inscricao_id']);

        return $rules;
    }
}
