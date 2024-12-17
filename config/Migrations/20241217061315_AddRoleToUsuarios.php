<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class AddRoleToUsuarios extends BaseMigration
{
    public function up()
    {
        $table = $this->table('usuarios');
        if (!$table->hasColumn('role')) {
            $table->addColumn('role', 'string', [
                'default' => 'user',
                'null' => false,
                'limit' => 20,
            ])->update();
        }
    }

    public function down()
    {
        $table = $this->table('usuarios');
        if ($table->hasColumn('role')) {
            $table->removeColumn('role')->update();
        }
    }
}
