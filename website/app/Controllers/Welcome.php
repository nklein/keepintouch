<?php

namespace App\Controllers;

class Welcome extends BaseController
{
    public function index()
    {
        return $this->renderPage('welcome_message', [
            'title' => lang('Welcome.title'),
            'login' => lang('Auth.login'),
            'register' => lang('Auth.register'),
            'whatWeDo' => lang('Welcome.whatWeDo'),
            'whatWeDoIntroParagraph' => lang('Welcome.whatWeDoIntroParagraph'),
            'whatWeDoUserParagraph' => lang('Welcome.whatWeDoUserParagraph'),
        ]);
    }
}
