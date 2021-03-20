<?php

declare(strict_types=1);

use Cake\Auth\DefaultPasswordHasher;
use Cake\I18n\FrozenTime;
use Migrations\AbstractSeed;

/**
 * Admins seed.
 */
class AdminsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $now = (new FrozenTime())->format('Y-m-d H:i:s');
        $password = (new DefaultPasswordHasher())->hash('password');
        $data = [
            'name' => 'テスト管理者',
            'email' => 'test@example.com',
            'password' => $password,
            'created' => $now,
            'modified' => $now,
        ];

        $table = $this->table('admins');
        $table->insert($data)->save();
    }
}
