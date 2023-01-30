<?php

namespace App\Controllers;

class Welcome extends BaseController
{
    public function index()
    {
        return $this->renderPage('welcome_message', [
            'title' => lang('Welcome.title'),
        ]);
    }
}
