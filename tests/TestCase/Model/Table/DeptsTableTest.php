<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DeptsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DeptsTable Test Case
 */
class DeptsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DeptsTable
     */
    protected $Depts;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Depts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Depts') ? [] : ['className' => DeptsTable::class];
        $this->Depts = $this->getTableLocator()->get('Depts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Depts);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DeptsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
