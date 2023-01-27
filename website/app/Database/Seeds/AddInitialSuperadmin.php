<?php

namespace App\Database\Seeds;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Database\Seeder;
use CodeIgniter\Exceptions\ConfigException;
use CodeIgniter\Shield\Entities\User;

class Superadmin extends BaseConfig {
    public string $username = 'superadmin';
    public ?string $email = null;
    public ?string $password = null;
}

class AddInitialSuperadmin extends Seeder
{
    public function run()
    {
        $config = config('\App\Database\Seeds\Superadmin');
        $username = $config->username;
        $email = $config->email;
        $password = $config->password;

        if ($username === null || $email === null || $password === null) {
            throw new ConfigException('Must give username, email, and password');
        }

        $model = model('UserModel');
        $user = new User([
            'username' => $username,
            'email' => $email,
            'password' => $password,
        ]);
        $model->save($user);

        $user = $model->findById($model->getInsertID());
        $user->syncGroups('superadmin');
        $model->activate($user);
        $model->save($user);
    }
}
