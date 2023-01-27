<?php

namespace App\Controllers;

use CodeIgniter\Shield\Authorization\AuthorizationException;

class Migrate extends BaseController
{
    static public function initialize() {
        $db = \Config\Database::connect();
        $migrate = \Config\Services::migrations();

        if (!$db->tableExists('users')) {
            $migrate->setNamespace('CodeIgniter\Shield');
            $migrate->latest();
        }

        if (!$db->tableExists('settings')) {
            $migrate->setNamespace('CodeIgniter\Settings');
            $migrate->latest();
        }

        if ($db->table('users')->countAll() === 0) {
            $seeder = \Config\Database::seeder();
            $seeder->call('AddInitialSuperadmin');
        }
    }

    public function index()
    {
        if (! can('admin.migrate') ) {
            throw new AuthorizationException(lang('Security.disallowedAction'));
        }

        $migrate = \Config\Services::migrations();
        $migrate->setNamespace(null);
        $migrate->latest();

        return $this->renderPage('simple_message', [
            'title' => lang('Migration.title'),
            'message' => lang('Migration.successful'),
        ]);
    }
}
