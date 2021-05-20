<?php
use ArmoredCore\WebObjects\Debug;
use ArmoredCore\WebObjects\View;

class AdminAppController extends BaseAuthController
{
    public function index()
    {
        $this->loginFilterByRole('admin');
        return View::make('admin.index');
    }

    public function gerirUsers()
    {
        $this->loginFilterByRole('admin');
        //return View::make('admin.gerirusers');
        $users = User::all(array('conditions' => array('role != ?','passageiro')));
        return View::make('admin.gerirusers', ['users' => $users]);
    }

    public function gerirAeroportos()
    {
        $this->loginFilterByRole('admin');
        return View::make('admin.geriraeroportos');
    }

    public function create()
    {
        return View::make('book.create');
    }
}