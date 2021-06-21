<?php

use \ArmoredCore\WebObjects\View;

class PassageiroAppController extends BaseAuthController
{
    public function index()
    {
        $this->loginFilterByRole('passageiro');

        return View::make('passageiro.index');
    }
}