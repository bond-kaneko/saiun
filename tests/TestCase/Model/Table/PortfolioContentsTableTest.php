<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PortfolioContentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PortfolioContentsTable Test Case
 */
class PortfolioContentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PortfolioContentsTable
     */
    protected $PortfolioContents;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PortfolioContents',
        'app.Portfolios',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PortfolioContents') ? [] : ['className' => PortfolioContentsTable::class];
        $this->PortfolioContents = $this->getTableLocator()->get('PortfolioContents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PortfolioContents);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
