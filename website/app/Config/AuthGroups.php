<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Shield\Config\AuthGroups as ShieldAuthGroups;

class AuthGroups extends ShieldAuthGroups
{
    /**
     * --------------------------------------------------------------------
     * Default Group
     * --------------------------------------------------------------------
     * The group that a newly registered user is added to.
     */
    public string $defaultGroup = 'user';

    /**
     * --------------------------------------------------------------------
     * Groups
     * --------------------------------------------------------------------
     * The available authentication systems, listed
     * with alias and class name. These can be referenced
     * by alias in the auth helper:
     *      auth('api')->attempt($credentials);
     */
    public array $groups = [
        'superadmin' => [
            'title'       => 'Super Admin',
            'description' => 'Complete control of the site.',
        ],
        'admin' => [
            'title'       => 'Admin',
            'description' => 'Day to day administrators of the site.',
        ],
        'user' => [
            'title'       => 'User',
            'description' => 'General users of the site. Often customers.',
        ],
        'locked' => [
            'title'       => 'Locked User',
            'description' => 'Have access to only their own information.',
        ],
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions
     * --------------------------------------------------------------------
     * The available permissions in the system. Each system is defined
     * where the key is the
     *
     * If a permission is not listed here it cannot be used.
     */
    public array $permissions = [
        'superadmin.manage-admins' => 'Can manage other admins',
        'admin.access'               => 'Can access the site admin area',
        'admin.become-user'         => 'Can become user',
        'admin.lock-user'            => 'Can move a user from the user group to the locked group',
        'admin.unlock-user'          => 'Can move a user from the locked group back to the user group',
        'user.access'                => 'Can access the site user area',
        'user.edit-friends'         => 'Can add friends and modify permission of friends',
        'user.edit-profile'         => 'Can edit personal information about self',
        'user.log-contact'          => 'Can log contact',
        'user.search'                => 'Can search for people',
        'user.view-contact-info'   => 'Can view contact info shared with them',
        'user.view-profiles'        => 'Can view user profiles',
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions Matrix
     * --------------------------------------------------------------------
     * Maps permissions to groups.
     */
    public array $matrix = [
        'superadmin' => [
            'superadmin.*',
            'admin.*',
            'user.*',
        ],
        'admin' => [
            'admin.access',
            'admin.lock-user',
            'admin.unlock-user',
            'user.*',
        ],
        'user' => [
            'user.*',
        ],
        'locked' => [
            'user.access',
            'user.edit-profile',
        ],
    ];
}
