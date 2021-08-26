<?php

namespace MBLSolutions\SimfoniRetailLaravel\Tests\Model;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use MBLSolutions\SimfoniRetailLaravel\Tests\Stubs\funds;
use MBLSolutions\SimfoniRetailLaravel\Tests\TestCase;

class SimfoniRetailModelResourceMethodsTest extends TestCase
{
    /** @var funds $funds */
    protected $funds;

    /** {@inheritdoc} **/
    protected function setUp(): void
    {
        parent::setUp();

        $this->funds = new funds();

        $this->funds::fake();
    }

    /** @test */
    public function can_access_resource_method_that_returns_collection()
    {
        $this->funds->setFakeResponse([
            'data' => [
                [
                    'id' => 1,
                    'name' => 'Test funds 1',
                    'active' => true
                ],
                [
                    'id' => 2,
                    'name' => 'Test funds 2',
                    'active' => true
                ]
            ]
        ]);

        $funds = $this->funds->select();

        $this->assertInstanceOf(Collection::class, $funds);
        $this->assertInstanceOf(funds::class, $funds->first());
        $this->assertEquals([
            'id' => 1,
            'name' => 'Test funds 1',
            'active' => true
        ], $funds->first()->toArray());
    }

    /** @test **/
    public function can_access_resource_method_show()
    {
        $this->funds->setFakeResponse([
            'data' => [
                'id' => 1,
                'name' => 'Test funds',
                'active' => true
            ]
        ]);

        $funds = $this->funds->show(1);

        $this->assertInstanceOf(funds::class, $funds);
        $this->assertEquals([
            'id' => 1,
            'name' => 'Test funds',
            'active' => true
        ], $funds->toArray());
    }

    /** @test **/
    public function can_access_resource_method_all()
    {
        $this->funds->setFakeResponse([
            'data' => [
                [
                    'id' => 1,
                    'name' => 'Test funds 1',
                    'active' => true
                ],
                [
                    'id' => 2,
                    'name' => 'Test funds 2',
                    'active' => true
                ]
            ],
            'links' => [
                'first' => 'http://localhost?page=1',
                'last' => 'http://localhost?page=1',
                'prev' => null,
                'next' => null
            ],
            'meta' => [
                'current_page' => 1,
                'from' => 1,
                'last_page' => 1,
                'path' => 'http://localhost',
                'per_page' => 20,
                'to' => 1,
                'total' => 1
            ]
        ]);

        $funds = $this->funds->all();

        $this->assertInstanceOf(LengthAwarePaginator::class, $funds);
    }

}