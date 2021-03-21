<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class RenameUserIdToInstructorIdOnPortfolios extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * @return void
     */
    public function change()
    {
        $table = $this->table('portfolios');
        $table->renameColumn('user_id', 'instructor_id');
        $table->update();
    }
}