<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Eventos Model
 *
 * @property \App\Model\Table\InscricoesTable&\Cake\ORM\Association\HasMany $Inscricoes
 *
 * @method \App\Model\Entity\Evento newEmptyEntity()
 * @method \App\Model\Entity\Evento newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Evento> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Evento get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Evento findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Evento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Evento> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Evento|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Evento saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Evento>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Evento>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Evento>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Evento> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Evento>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Evento>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Evento>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Evento> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EventosTable extends Table
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

        $this->setTable('eventos');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Inscricoes', [
            'foreignKey' => 'evento_id',
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
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->scalar('descricao')
            ->requirePresence('descricao', 'create')
            ->notEmptyString('descricao');

        $validator
            ->dateTime('data_inicio')
            ->requirePresence('data_inicio', 'create')
            ->notEmptyDateTime('data_inicio');

        $validator
            ->dateTime('data_fim')
            ->requirePresence('data_fim', 'create')
            ->notEmptyDateTime('data_fim');

        $validator
            ->scalar('template_certificado')
            ->requirePresence('template_certificado', 'create')
            ->notEmptyString('template_certificado');

        return $validator;
    }
}
