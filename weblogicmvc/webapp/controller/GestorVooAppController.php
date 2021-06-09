<?php
use ArmoredCore\WebObjects\Debug;
use ArmoredCore\WebObjects\View;

class GestorVooAppController extends BaseAuthController
{
    public function index()
    {
        $this->loginFilterByRole('gestorvoo');

        $voos = Voo::all();
        return View::make('gestorvoo.index', ['voos' => $voos]);
    }
}