<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DeptsFixture
 */
class DeptsFixture extends TestFixture
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
                'deptno' => 1.5,
                'dname' => 'Lorem ipsum ',
                'loc' => 'Lorem ipsum',
            ],
        ];
        parent::init();
    }
}
