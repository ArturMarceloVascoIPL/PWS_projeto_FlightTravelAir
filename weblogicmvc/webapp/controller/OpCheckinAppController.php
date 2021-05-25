<?php
use ArmoredCore\WebObjects\Debug;
use ArmoredCore\WebObjects\View;

class OpCheckinAppController extends BaseAuthController
{
    public function index()
    {
        $this->loginFilterByRole('opcheckin');
        return View::make('opcheckin.index');
    }
}