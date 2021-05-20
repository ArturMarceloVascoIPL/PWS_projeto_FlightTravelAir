<?php
use ArmoredCore\WebObjects\Debug;
use ArmoredCore\WebObjects\View;

class GestorVooAppController extends BaseAuthController
{
    public function index()
    {
        $this->loginFilterByRole('gestorvoo');
        return View::make('gestorvoo.index');
    }
}