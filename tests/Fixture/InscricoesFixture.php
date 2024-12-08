<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InscricoesFixture
 */
class InscricoesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'usuario_id' => 1,
                'evento_id' => 1,
                'status' => 'Lorem ipsum dolor ',
                'created' => 1733171637,
                'modified' => 1733171637,
            ],
        ];
        parent::init();
    }
}
