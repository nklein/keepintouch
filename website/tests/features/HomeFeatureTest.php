<?php

use CodeIgniter\Shield\Test\AuthenticationTesting;
use CodeIgniter\Shield\Authentication\Actions\Email2FA;
use CodeIgniter\Test\FeatureTestTrait;
use Tests\Support\Test\UnitTestCase;

class HomeFeatureTest extends UnitTestCase
{
    use AuthenticationTesting;
    use FeatureTestTrait;

    public function testAccessingHomeWithoutAUserRedirectsToWelcome()
    {
        $result = $this->get('/');

        $result->assertRedirectTo('welcome');
    }

    public function testUserCanAccessHome()
    {
        $result = $this->actingAs( $this->getUser('user') )
                       ->get('/');

        $result->assertStatus(200);
    }
}
