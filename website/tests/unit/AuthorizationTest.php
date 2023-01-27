<?php

use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use Tests\Support\Database\Seeds\UserSeeder;

/**
 * @internal
 */
final class AuthorizationTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $migrateOnce = true;
    protected $namespace = '';
    protected $seed = UserSeeder::class;
    protected $seedOnce = true;

    private $users;

    protected function setUp(): void {
        parent::setUp();

        $this->users = model('UserModel');
    }

    private function getUser($name): ?User {
        return $this->users->findByCredentials([
            'email' => $name . '@example.com',
        ]);
    }

    // Superadmin group checks
    public function testSuperadminCanManageAdmins()
    {
        $user = $this->getUser('superadmin');
        $this->assertTrue( $user->can('superadmin.manage-admins'), "Cannot superadmin.manage-admins" );
    }

    public function testSuperadminCanAccessAdminPages()
    {
        $user = $this->getUser('superadmin');
        $this->assertTrue( $user->can('admin.access'), "Cannot admin.access" );
    }

    public function testSuperadminCanBecomeUser()
    {
        $user = $this->getUser('superadmin');
        $this->assertTrue( $user->can('admin.become-user'), "Cannot admin.become-user" );
    }

    public function testSuperadminCanLockUser()
    {
        $user = $this->getUser('superadmin');
        $this->assertTrue( $user->can('admin.lock-user'), "Cannot admin.lock-user" );
    }

    public function testSuperadminCanUnlockUser()
    {
        $user = $this->getUser('superadmin');
        $this->assertTrue( $user->can('admin.unlock-user'), "Cannot admin.unlock-user" );
    }

    public function testSuperadminCanAccessUserPages()
    {
        $user = $this->getUser('superadmin');
        $this->assertTrue( $user->can('user.access'), "Cannot user.access" );
    }

    public function testSuperadminCanEditFriends()
    {
        $user = $this->getUser('superadmin');
        $this->assertTrue( $user->can('user.edit-friends'), "Cannot user.edit-friends" );
    }

    public function testSuperadminCanEditProfile()
    {
        $user = $this->getUser('superadmin');
        $this->assertTrue( $user->can('user.edit-profile'), "Cannot user.edit-profile" );
    }

    public function testSuperadminCanLogContact()
    {
        $user = $this->getUser('superadmin');
        $this->assertTrue( $user->can('user.log-contact'), "Cannot user.log-contact" );
    }

    public function testSuperadminCanSearch()
    {
        $user = $this->getUser('superadmin');
        $this->assertTrue( $user->can('user.search'), "Cannot user.search" );
    }

    public function testSuperadminCanViewContactInfo()
    {
        $user = $this->getUser('superadmin');
        $this->assertTrue( $user->can('user.view-contact-info'), "Can view-contact-info" );
    }

    public function testSuperadminCanViewProfiles()
    {
        $user = $this->getUser('superadmin');
        $this->assertTrue( $user->can('user.view-profiles'), "Can view-profiles" );
    }

    // Admin group checks
    public function testAdminCannotManageAdmins()
    {
        $user = $this->getUser('admin');
        $this->assertFalse( $user->can('superadmin.manage-admins'), "Cannot superadmin.manage-admins" );
    }

    public function testAdminCanAccessAdminPages()
    {
        $user = $this->getUser('admin');
        $this->assertTrue( $user->can('admin.access'), "Cannot admin.access" );
    }

    public function testAdminCannotBecomeUser()
    {
        $user = $this->getUser('admin');
        $this->assertFalse( $user->can('admin.become-user'), "Cannot admin.become-user" );
    }

    public function testAdminCanLockUser()
    {
        $user = $this->getUser('admin');
        $this->assertTrue( $user->can('admin.lock-user'), "Cannot admin.lock-user" );
    }

    public function testAdminCanUnlockUser()
    {
        $user = $this->getUser('admin');
        $this->assertTrue( $user->can('admin.unlock-user'), "Cannot admin.unlock-user" );
    }

    public function testAdminCanAccessUserPages()
    {
        $user = $this->getUser('admin');
        $this->assertTrue( $user->can('user.access'), "Cannot user.access" );
    }

    public function testAdminCanEditFriends()
    {
        $user = $this->getUser('admin');
        $this->assertTrue( $user->can('user.edit-friends'), "Cannot user.edit-friends" );
    }

    public function testAdminCanEditProfile()
    {
        $user = $this->getUser('admin');
        $this->assertTrue( $user->can('user.edit-profile'), "Cannot user.edit-profile" );
    }

    public function testAdminCanLogContact()
    {
        $user = $this->getUser('admin');
        $this->assertTrue( $user->can('user.log-contact'), "Cannot user.log-contact" );
    }

    public function testAdminCanSearch()
    {
        $user = $this->getUser('admin');
        $this->assertTrue( $user->can('user.search'), "Cannot user.search" );
    }

    public function testAdminCanViewContactInfo()
    {
        $user = $this->getUser('admin');
        $this->assertTrue( $user->can('user.view-contact-info'), "Can view-contact-info" );
    }

    public function testAdminCanViewProfiles()
    {
        $user = $this->getUser('admin');
        $this->assertTrue( $user->can('user.view-profiles'), "Can view-profiles" );
    }

    // User group checks
    public function testUserCannotManageAdmins()
    {
        $user = $this->getUser('user');
        $this->assertFalse( $user->can('superadmin.manage-admins'), "Cannot superadmin.manage-admins" );
    }

    public function testUserCannotAccessAdminPages()
    {
        $user = $this->getUser('user');
        $this->assertFalse( $user->can('admin.access'), "Cannot admin.access" );
    }

    public function testUserCannotBecomeUser()
    {
        $user = $this->getUser('user');
        $this->assertFalse( $user->can('admin.become-user'), "Cannot admin.become-user" );
    }

    public function testUserCannotLockUser()
    {
        $user = $this->getUser('user');
        $this->assertFalse( $user->can('admin.lock-user'), "Cannot admin.lock-user" );
    }

    public function testUserCannotUnlockUser()
    {
        $user = $this->getUser('user');
        $this->assertFalse( $user->can('admin.unlock-user'), "Cannot admin.unlock-user" );
    }

    public function testUserCanAccessUserPages()
    {
        $user = $this->getUser('user');
        $this->assertTrue( $user->can('user.access'), "Cannot user.access" );
    }

    public function testUserCanEditFriends()
    {
        $user = $this->getUser('user');
        $this->assertTrue( $user->can('user.edit-friends'), "Cannot user.edit-friends" );
    }

    public function testUserCanEditProfile()
    {
        $user = $this->getUser('user');
        $this->assertTrue( $user->can('user.edit-profile'), "Cannot user.edit-profile" );
    }

    public function testUserCanLogContact()
    {
        $user = $this->getUser('user');
        $this->assertTrue( $user->can('user.log-contact'), "Cannot user.log-contact" );
    }

    public function testUserCanSearch()
    {
        $user = $this->getUser('user');
        $this->assertTrue( $user->can('user.search'), "Cannot user.search" );
    }

    public function testUserCanViewContactInfo()
    {
        $user = $this->getUser('user');
        $this->assertTrue( $user->can('user.view-contact-info'), "Can view-contact-info" );
    }

    public function testUserCanViewProfiles()
    {
        $user = $this->getUser('user');
        $this->assertTrue( $user->can('user.view-profiles'), "Can view-profiles" );
    }

    // Locked group checks
    public function testLockedCannotManageAdmins()
    {
        $user = $this->getUser('locked');
        $this->assertFalse( $user->can('superadmin.manage-admins'), "Cannot superadmin.manage-admins" );
    }

    public function testLockedCannotAccessAdminPages()
    {
        $user = $this->getUser('locked');
        $this->assertFalse( $user->can('admin.access'), "Cannot admin.access" );
    }

    public function testLockedCannotBecomeUser()
    {
        $user = $this->getUser('locked');
        $this->assertFalse( $user->can('admin.become-user'), "Cannot admin.become-user" );
    }

    public function testLockedCannotLockUser()
    {
        $user = $this->getUser('locked');
        $this->assertFalse( $user->can('admin.lock-user'), "Cannot admin.lock-user" );
    }

    public function testLockedCannotUnlockUser()
    {
        $user = $this->getUser('locked');
        $this->assertFalse( $user->can('admin.unlock-user'), "Cannot admin.unlock-user" );
    }

    public function testLockedCanAccessUserPages()
    {
        $user = $this->getUser('locked');
        $this->assertTrue( $user->can('user.access'), "Cannot user.access" );
    }

    public function testLockedCannotEditFriends()
    {
        $user = $this->getUser('locked');
        $this->assertFalse( $user->can('user.edit-friends'), "Cannot user.edit-friends" );
    }

    public function testLockedCanEditProfile()
    {
        $user = $this->getUser('locked');
        $this->assertTrue( $user->can('user.edit-profile'), "Cannot user.edit-profile" );
    }

    public function testLockedCannotLogContact()
    {
        $user = $this->getUser('locked');
        $this->assertFalse( $user->can('user.log-contact'), "Cannot user.log-contact" );
    }

    public function testLockedCannotSearch()
    {
        $user = $this->getUser('locked');
        $this->assertFalse( $user->can('user.search'), "Cannot user.search" );
    }

    public function testLockedCannotViewContactInfo()
    {
        $user = $this->getUser('locked');
        $this->assertFalse( $user->can('user.view-contact-info'), "Can view-contact-info" );
    }

    public function testLockedCannotViewProfiles()
    {
        $user = $this->getUser('locked');
        $this->assertFalse( $user->can('user.view-profiles'), "Can view-profiles" );
    }
}
