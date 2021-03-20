<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreatePortfolios extends AbstractMigration
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
        $table = $this->table('portfolios')
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('title', 'string', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('content', 'json', [
                'default' => null,
                'null' => false,
            ])

            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => false,
            ])
        ;
        $table->create();
    }
}
