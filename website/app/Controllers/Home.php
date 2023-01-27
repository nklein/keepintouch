<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // There is probably a better place for this, but
        // it is effective at the moment.
        \App\Controllers\Migrate::initialize();

        if (! can('user.access') ) {
            return redirect()->to('/welcome');
        }
        return $this->renderPage('home_page', [ 'title' => lang('Home.title') ]);
    }
}
