<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\Shield\Authorization\AuthorizationException;

class Migrate extends BaseController
{
    public function index()
    {
        if (! can('admin.migrate') ) {
            throw new AuthorizationException(lang('Security.disallowedAction'));
        }

        $migrate = \Config\Services::migrations();
        $migrate->setNamespace(null);
        $migrate->latest();
    }
}