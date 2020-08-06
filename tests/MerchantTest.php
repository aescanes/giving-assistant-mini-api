<?php

use Laravel\Lumen\Testing\DatabaseMigrations;

class MerchantTest extends TestCase
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
    public function testShowAllMerchants()
    {
        $this->get('/merchants');

        $responseToCheck = '[{"id":1,"name":"Brahmin","created_at":null,"updated_at":null,"category_id":"1"},{"id":2,"name":"DoorDash","created_at":null,"updated_at":null,"category_id":"1"},{"id":3,"name":"Home Depot","created_at":null,"updated_at":null,"category_id":"2"}]';

        $this->assertEquals(200, $this->response->status());
        $this->assertEquals(
            $responseToCheck, $this->response->getContent(), 'Wrong response for GET merchants'
        );
    }

    /**
     *
     */
    public function testShowOneMerchant()
    {
        $this->get('/merchants/1');

        $responseToCheck = '{"id":1,"name":"Brahmin","created_at":null,"updated_at":null,"category_id":"1"}';

        $this->assertEquals(200, $this->response->status());
        $this->assertEquals(
            $responseToCheck, $this->response->getContent(), 'Wrong response for GET merchant'
        );
    }
}
