<?php

use CodeIgniter\Shield\Test\AuthenticationTesting;
use CodeIgniter\Test\ControllerTestTrait;
use Tests\Support\Test\UnitTestCase;

class HomeControllerTest extends UnitTestCase
{
    use AuthenticationTesting;
    use ControllerTestTrait;

    public function testAccessingHomeWithoutAUserRedirectsToWelcome()
    {
        $result = $this->withURI('http://example.com/')
                       ->controller(\App\Controllers\Home::class)
                       ->execute('index');

        $result->assertRedirectTo('welcome');
    }

    public function testUserCanAccessHome()
    {
        $result = $this->actingAs( $this->getUser('user') )
                       ->withURI('http://example.com/')
                       ->controller(\App\Controllers\Home::class)
                       ->execute('index');

        $result->assertStatus(200);
    }
}
