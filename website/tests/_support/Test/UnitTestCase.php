<?php

namespace Tests\Support\Test;

use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use Tests\Support\Database\Seeds\UserSeeder;

/**
 * @internal
 */
class UnitTestCase extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $migrateOnce = true;
    protected $namespace = '';
    protected $seed = UserSeeder::class;
    protected $seedOnce = true;

    protected $users;

    protected function setUp(): void {
        parent::setUp();

        $this->users = model('UserModel');
    }

    protected function tearDown(): void {
        parent::tearDown();

        auth()->logout();
    }

    protected function getUser($name): ?User {
        return $this->users->findByCredentials([
            'email' => $name . '@example.com',
        ]);
    }
}
