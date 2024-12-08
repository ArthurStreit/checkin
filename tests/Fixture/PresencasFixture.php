<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PresencasFixture
 */
class PresencasFixture extends TestFixture
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
                'inscricao_id' => 1,
                'data_presenca' => 1733171708,
                'created' => 1733171708,
                'modified' => 1733171708,
            ],
        ];
        parent::init();
    }
}
