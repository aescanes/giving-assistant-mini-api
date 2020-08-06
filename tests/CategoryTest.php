<?php

use Laravel\Lumen\Testing\DatabaseMigrations;

class CategoryTest extends TestCase
{
    use DatabaseMigrations;

    /**
     *
     */
    public function setUp(): void
    {
        parent::setUp();
        // seed the database
        $this->artisan('db:seed');
    }

    /**
     *
     */
    public function testShowAllCategories()
    {
        $this->get('/categories');

        $responseToCheck = '[{"id":1,"name":"Accessories","created_at":null,"updated_at":null},{"id":2,"name":"Health & Beauty","created_at":null,"updated_at":null},{"id":3,"name":"Clothing","created_at":null,"updated_at":null}]';

        $this->assertEquals(200, $this->response->status());
        $this->assertEquals(
            $responseToCheck, $this->response->getContent(), 'Wrong response for GET categories'
        );
    }

    /**
     *
     */
    public function testShowOneCategory()
    {
        $this->get('/categories/1');

        $responseToCheck = '{"id":1,"name":"Accessories","created_at":null,"updated_at":null}';

        $this->assertEquals(200, $this->response->status());
        $this->assertEquals(
            $responseToCheck, $this->response->getContent(), 'Wrong response for GET category'
        );
    }

    /**
     *
     */
    public function testShowAllMerchantsFromCategoryWithMerchants()
    {
        $this->get('/categories/1/merchants');

        $responseToCheck = '[{"id":1,"name":"Brahmin","created_at":null,"updated_at":null,"category_id":"1"},{"id":2,"name":"DoorDash","created_at":null,"updated_at":null,"category_id":"1"}]';

        $this->assertEquals(200, $this->response->status());
        $this->assertEquals(
            $responseToCheck, $this->response->getContent(), 'Wrong response for GET Merchants per category'
        );
    }

    /**
     *
     */
    public function testShowAllMerchantsFromCategoryWithoutMerchants()
    {
        $this->get('/categories/3/merchants');

        $responseToCheck = '[]';

        $this->assertEquals(200, $this->response->status());
        $this->assertEquals(
            $responseToCheck, $this->response->getContent(), 'Wrong response for GET Merchants per category'
        );
    }
}
