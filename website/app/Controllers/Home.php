<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if (! can('user.access') ) {
            return redirect()->to('/welcome');
        }
        return view('home_page', [ 'title' => 'Home Page' ]);
    }
}
