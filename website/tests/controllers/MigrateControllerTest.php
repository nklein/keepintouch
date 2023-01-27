<?php

use CodeIgniter\Shield\Test\AuthenticationTesting;
use CodeIgniter\Test\ControllerTestTrait;
use Tests\Support\Test\UnitTestCase;

class MigrateControllerTest extends UnitTestCase
{
    use AuthenticationTesting;
    use ControllerTestTrait;

    public function testAccessingMigrateWithoutAUserRedirectsToWelcome()
    {
        $result = $this->withURI('http://example.com/migrate')
                       ->controller(\App\Controllers\Migrate::class)
                       ->execute('index');

        $result->assertStatus(401);
    }

    public function testSuperadminCanAccessMigrate()
    {
        $result = $this->actingAs( $this->getUser('superadmin') )
                       ->withURI('http://example.com/migrate')
                       ->controller(\App\Controllers\Migrate::class)
                       ->execute('index');

        $result->assertStatus(200);
    }

    public function testAdminCanAccessMigrate()
    {
        $result = $this->actingAs( $this->getUser('admin') )
                       ->withURI('http://example.com/migrate')
                       ->controller(\App\Controllers\Migrate::class)
                       ->execute('index');

        $result->assertStatus(200);
    }

    public function testUserCannotAccessMigrate()
    {
        $result = $this->actingAs( $this->getUser('user') )
                       ->withURI('http://example.com/migrate')
                       ->controller(\App\Controllers\Migrate::class)
                       ->execute('index');

        $result->assertStatus(401);
    }

    public function testLockedCannotAccessMigrate()
    {
        $result = $this->actingAs( $this->getUser('locked') )
                       ->withURI('http://example.com/migrate')
                       ->controller(\App\Controllers\Migrate::class)
                       ->execute('index');

        $result->assertStatus(401);
    }
}
