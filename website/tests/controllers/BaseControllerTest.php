<?php

use Tests\Support\Test\UnitTestCase;
use App\Controllers\BaseController;

class ConcreteController extends BaseController {
    public function render(string $view): string {
        return view($view);
    }
}

class BaseControllerTest extends UnitTestCase
{
    public function testBaseControllerSetsCharsetToUTF8()
    {
        $controller = new ConcreteController();
        $result = $controller->render('home_page', ['title' => 'Test title']);
        $this->assertStringContainsString('<meta charset="utf-8" />', $result);
    }

    public function testBaseControllerSetsViewport()
    {
        $controller = new ConcreteController();
        $result = $controller->render('home_page');
        $this->assertMatchesRegularExpression('/<meta [^>]*name="viewport"/', $result);
    }

    public function testBaseControllerIncludesSiteCSS()
    {
        $controller = new ConcreteController();
        $result = $controller->render('home_page');
        $this->assertStringContainsString('<link href="/site.css" rel="stylesheet" />', $result);
    }

    public function testBaseControllerIncludesTitle()
    {
        $controller = new ConcreteController();
        $result = $controller->render('home_page');
        $this->assertStringContainsString('<title>' . lang('Home.title') . '</title>', $result);
    }

    public function testBaseControllerIncludesBootstrapJS()
    {
        $controller = new ConcreteController();
        $result = $controller->render('home_page');
        $this->assertMatchesRegularExpression('/<script src="\/bootstrap.*\.js"/', $result);
    }
}
