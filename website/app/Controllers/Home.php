<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if (! can('user.access') ) {
            return redirect()->to('/welcome');
        }
        return $this->renderPage('home_page', [ 'title' => lang('Home.title') ]);
    }
}
