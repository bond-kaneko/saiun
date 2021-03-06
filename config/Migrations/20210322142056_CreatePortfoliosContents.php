<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreatePortfoliosContents extends AbstractMigration
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
        $table = $this->table('portfolio_contents')
            ->addColumn('portfolio_id', 'integer', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('image_url', 'string', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('content', 'string', [
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
