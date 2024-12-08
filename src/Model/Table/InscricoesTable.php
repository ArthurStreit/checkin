<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Inscricoes Model
 *
 * @property \App\Model\Table\UsuariosTable&\Cake\ORM\Association\BelongsTo $Usuarios
 * @property \App\Model\Table\EventosTable&\Cake\ORM\Association\BelongsTo $Eventos
 *
 * @method \App\Model\Entity\Inscrico newEmptyEntity()
 * @method \App\Model\Entity\Inscrico newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Inscrico> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Inscrico get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Inscrico findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Inscrico patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Inscrico> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Inscrico|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Inscrico saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Inscrico>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Inscrico>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Inscrico>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Inscrico> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Inscrico>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Inscrico>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Inscrico>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Inscrico> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InscricoesTable extends Table
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

        $this->setTable('inscricoes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Usuarios', [
            'foreignKey' => 'usuario_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Eventos', [
            'foreignKey' => 'evento_id',
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
            ->integer('usuario_id')
            ->notEmptyString('usuario_id');

        $validator
            ->integer('evento_id')
            ->notEmptyString('evento_id');

        $validator
            ->scalar('status')
            ->inList('status', ['ativa', 'cancelada', 'checked_in'], 'Status inválido')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

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
        $rules->add($rules->existsIn(['usuario_id'], 'Usuarios'), ['errorField' => 'usuario_id']);
        $rules->add($rules->existsIn(['evento_id'], 'Eventos'), ['errorField' => 'evento_id']);

        return $rules;
    }
}
