<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Certificado Entity
 *
 * @property int $id
 * @property int $inscricao_id
 * @property string $codigo_validacao
 * @property string $url_validacao
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Inscrico $inscrico
 */
class Certificado extends Entity
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
        'inscricao_id' => true,
        'codigo_validacao' => true,
        'url_validacao' => true,
        'created' => true,
        'modified' => true,
        'inscrico' => true,
    ];
}
