<?php

use CodeIgniter\Shield\Test\AuthenticationTesting;
use CodeIgniter\Shield\Authentication\Actions\Email2FA;
use CodeIgniter\Test\ControllerTestTrait;
use Tests\Support\Test\UnitTestCase;

class HomeTest extends UnitTestCase
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
        $user = $this->getUser('user');
        $result = $this->actingAs($user)
                       ->withURI('http://example.com/')
                       ->controller(\App\Controllers\Home::class)
                       ->execute('index');

        $result->assertStatus(200);
    }
}
