<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Evento Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $descricao
 * @property \Cake\I18n\DateTime $data_inicio
 * @property \Cake\I18n\DateTime $data_fim
 * @property string $template_certificado
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Inscrico[] $inscricoes
 */
class Evento extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'nome' => true,
        'descricao' => true,
        'data_inicio' => true,
        'data_fim' => true,
        'template_certificado' => true,
        'created' => true,
        'modified' => true,
        'inscricoes' => true,
    ];
}
