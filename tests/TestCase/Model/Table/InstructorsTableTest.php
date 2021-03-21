<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InstructorsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InstructorsTable Test Case
 */
class InstructorsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InstructorsTable
     */
    protected $Instructors;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Instructors',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Instructors') ? [] : ['className' => InstructorsTable::class];
        $this->Instructors = $this->getTableLocator()->get('Instructors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Instructors);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
