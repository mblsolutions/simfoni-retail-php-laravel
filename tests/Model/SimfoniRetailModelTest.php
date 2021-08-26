<?php

namespace MBLSolutions\SimfoniRetailLaravel\Tests\Model;

use MBLSolutions\SimfoniRetail\Profile;
use MBLSolutions\SimfoniRetailLaravel\Model\SimfoniRetailModel;
use MBLSolutions\SimfoniRetailLaravel\Tests\Stubs\Brand;
use MBLSolutions\SimfoniRetailLaravel\Tests\TestCase;

class SimfoniRetailModelTest extends TestCase
{

    /** @test **/
    public function can_create_a_new_inspired_deck_model()
    {
        $model = new Brand();

        $this->assertInstanceOf(SimfoniRetailModel::class, $model);
    }

    /** @test **/
    public function can_fill_attributes_on_model_construction()
    {
        $attributes = [
            'id' => 1,
            'name' => 'constructed'
        ];

        $model = new Brand($attributes);

        $this->assertEquals($attributes, $model->toArray());
    }

    /** @test **/
    public function can_fill_attributes()
    {
        $attributes = [
            'id' => 1,
            'name' => 'filled'
        ];

        $model = new Brand();

        $model->fill($attributes);

        $this->assertEquals($attributes, $model->toArray());
    }

    /** @test */
    public function can_convert_model_to_array()
    {
        $attributes = [
            'id' => 1,
            'name' => 'filled'
        ];

        $model = new Brand($attributes);

        $this->assertEquals($attributes, $model->toArray());
    }

    /** @test **/
    public function can_convert_model_to_json()
    {
        $attributes = [
            'id' => 1,
            'name' => 'filled'
        ];

        $model = new Brand($attributes);

        $this->assertEquals(json_encode($attributes), $model->toJson());
    }

    /** @test **/
    public function can_set_attribute()
    {
        $model = new Brand();

        $model->setAttribute('id', 1);

        $this->assertEquals(1, $model->id);
    }

    /** @test **/
    public function can_get_attribute()
    {
        $model = new Brand([
            'id' => 1
        ]);

        $this->assertEquals(1, $model->getAttribute('id'));
    }

    /** @test */
    public function can_get_models_resource()
    {
        $model = new Brand();

        $this->assertEquals(\MBLSolutions\SimfoniRetail\Brand::class, $model->getResource());
    }

    /** @test */
    public function can_set_the_models_resource()
    {
        $model = new Brand();

        $model->setResource('MBLSolutions\SimfoniRetail\Profile');

        $this->assertEquals(Profile::class, $model->getResource());
    }

    /** @test */
    public function can_get_resource()
    {
        $model = new Brand();

        $this->assertInstanceOf(\MBLSolutions\SimfoniRetail\Brand::class, $model->resource());
        $this->assertInstanceOf(\MBLSolutions\SimfoniRetail\Api\ApiResource::class, $model->resource());
    }

}