<?php

use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\View;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\Interfaces\ResourceControllerInterface;

class VooController extends BaseAuthController implements ResourceControllerInterface
{
    public function index()
    {
        $this->loginFilterByRole('gestorvoo');
        $voos = Voo::all();
        return View::make('voo.index', ['voos' => $voos]);
    }

    public function show($id)
    {
        $this->loginFilterByRole('gestorvoo');
        return $this->index();
    }

    public function create()
    {
        $this->loginFilterByRole('gestorvoo');
        return View::make('voo.create');
    }

    public function store()
    {
        $this->loginFilterByRole('gestorvoo');
        //create new resource (activerecord/model) instance with data from POST
        //your form name fields must match the ones of the table fields
        $voo = new Voo(Post::getAll());

        if ($voo->is_valid()) {
            $voo->save();
            Redirect::toRoute('voo/index');
        } else {
            //redirect to form with data and errors
            Redirect::flashToRoute('voo/create', ['voo' => $voo]);
        }
    }

    public function edit($idvoo)
    {
        $this->loginFilterByRole('gestorvoo');
        $voo = Voo::find([$idvoo]);

        if (is_null($voo)) {
            //TODO redirect to standard error page
        } else {
            return View::make('voo.edit', ['voo' => $voo]);
        }
    }

    public function update($idvoo)
    {
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $this->loginFilterByRole('gestorvoo');
        $voo = Voo::find([$idvoo]);
        $voo->update_attributes(Post::getAll());

        if ($voo->is_valid()) {
            $voo->save();
            Redirect::toRoute('voo/index');
        } else {
            //redirect to form with data and errors
            Redirect::flashToRoute('voo/edit', ['voo' => $voo]);
        }
    }

    public function destroy($idvoo)
    {
        $this->loginFilterByRole('gestorvoo');
        $voo = Voo::find([$idvoo]);
        $voo->delete();
        Redirect::toRoute('voo/index');
    }
}