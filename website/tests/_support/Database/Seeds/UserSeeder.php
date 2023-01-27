<?php

namespace Tests\Support\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\Shield\Entities\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        helper('setting');
        $users = [
            [
                'username' => 'superadmin',
                'email'    => 'superadmin@example.com',
                'password' => 'superadmin1',
                'group' => 'superadmin',
            ],
            [
                'username' => 'admin',
                'email'    => 'admin@example.com',
                'password' => 'admin1',
                'group' => 'admin',
            ],
            [
                'username' => 'user',
                'email'    => 'user@example.com',
                'password' => 'user1',
            ],
            [
                'username' => 'friend',
                'email'    => 'friend@example.com',
                'password' => 'friend1',
            ],
            [
                'username' => 'locked',
                'email'    => 'locked@example.com',
                'password' => 'locked1',
                'group' => 'locked',
            ],
        ];

        foreach ($users as $info) {
            $model = model('UserModel');
            $user = new User([
                'username' => $info['username'],
                'email' => $info['email'],
                'password' => $info['password'],
            ]);
            $model->save($user);

            $user = $model->findById($model->getInsertID());
            if (isset($info['group'])) {
                $user->syncGroups($info['group']);
                $model->save($user);
            } else {
                $model->addToDefaultGroup($user);
            }
        }
    }
}
